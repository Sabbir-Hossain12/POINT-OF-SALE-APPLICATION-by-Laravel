<?php

namespace App\Http\Controllers;

use App\Helper\JWTTOKEN;
use App\Mail\otpMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{
    function userRegistration(Request $request)
    {
        try {

            $request->validate(
                [
                    'firstName' => 'required|string|max:50',
                    'lastName' => 'required|string|max:50',
                    'email' => 'required|email|max:50',
                    'mobile' => 'required|string|max:50',
                    'password' => 'required|string|max:50',

                ]
            );

//           check for duplicate user
            $count = User::where('email', $request->input('email'))->count();
            if ($count == 1) {
                return response()->json(['status' => 'failed', 'message' => 'User Already Exist']);
            } else {
                User::create($request->input());
                return response()->json(['status' => 'success', 'message' => 'registration successful']);
            }


        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }


    }

    function userLogin(Request $request)
    {
        try {

            $request->validate(
                [
                    'email' => 'required|email|max:50',
                    'password' => 'required|string|max:50'

                ]
            );


            $user = User::where($request->input())->count();

//if user exists
            if ($user == 1) {
                $email = $request->input('email');
                $id = User::where('email', $email)->value('id');
                $token = JWTTOKEN::createToken($email, $id);
                return response()->json(['status' => 'success', 'message' => 'Login Successful'])->cookie('token', $token, 60 * 24);
            } else {
                return response()->json(['status' => 'failed', 'message' => 'Invalid Credentials']);
            }

        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }

    function sendOtp(Request $request)
    {
        try {

            $request->validate(
                [
                    'email' => 'required|email|max:50'

                ]
            );


            $email = $request->input('email');
            $otp = rand(1000, 9999);
            $count = User::where('email', $email)->count();

            if ($count == 1) {

//                send otp to mail
                Mail::to($email)->send(new otpMail($otp));
//                 update otp column
                User::where('email', $email)->update(['otp' => $otp]);

                return response()->json(['status' => 'success', 'message' => '4 digits OTP code has been sent to the Email']);
            } else {
                return response()->json(['status' => 'failed', 'message' => 'Email not Exist']);
            }
        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }

    }

    function verifyOtp(Request $request)
    {
        try {
            $request->validate(
                [
                    'email' => 'required|email|max:50',
                    'otp' => 'required|string|max:50'

                ]
            );


            $email = $request->input('email');
            $otp = $request->input('otp');

            $count = User::where('email', $email)->where('otp', $otp)->count();

            if ($count == 1) {
                // database otp update
                User::where('email', $email)->update(['otp' => 0]);

                //pass reset token issue
                $token = JWTTOKEN::createTokenForOtp($email);

                return response()->json(['status' => 'success', 'message' => 'otp verification successful'])->cookie('token',$token,24*60);
            } else {
                return response()->json(['status' => 'failed', 'message' => 'unauthorized']);


            }

        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }


    }

    function resetPassword(Request $request)
    {
        try {
            $request->validate(
                [
                    'password' => 'required|string|max:50'

                ]
            );

            $email = $request->header('email');
            $password = $request->input('password');

            User::where('email', $email)->update(['password' => $password]);
            return response()->json(['status' => 'success', 'message' => 'password Reset successful']);
        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => 'unauthorized']);
        }

    }

    function userLogout()
    {
        return redirect('/login')->cookie('token','',-1);
    }
}
