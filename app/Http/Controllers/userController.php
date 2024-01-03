<?php

namespace App\Http\Controllers;

use App\Helper\JWTTOKEN;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

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
                $email=$request->input('email');
                $id= User::where('email',$email)->value('id');
                $token= JWTTOKEN::createToken($email,$id);
                return response()->json(['status' => 'success', 'message' => 'Registration Successful','token'=>$token]);
            } else {
                return response()->json(['status' => 'failed', 'message' => 'Invalid Credentials']);
            }

        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }
}
