<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use http\Env\Response;
use Illuminate\Http\Request;
use Mockery\Exception;
use Psy\Util\Json;

class CustomerController extends Controller
{

    function getCustomer(Request $request)
    {
        try {

            $id = $request->header('id');
            $count = Customer::where('user_id', $id)->count();

            if ($count) {
                return Customer::where('user_id', $id)->get();
            } else {
                return response()->json(['status' => 'failed', 'message' => 'No customer found']);
            }


        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);

        }
    }

    function createCustomer(Request $request)
    {
        try {
            $request->validate(
                [
                    'name' => 'string|required|min:3',
                    'email'=>'string|required',
                    'mobile'=>'string|required'

                ]
            );

            $user_id= $request->header('id');
            if(!Customer::where('email',$request->input('email'))->count())
            {

            Customer::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'mobile'=>$request->input('mobile'),
                'user_id'=>$user_id
            ]);
                return response()->json(['status' => 'success', 'message' => 'Customer Created Successfully']);
            }
            else
            {
                return response()->json(['status' => 'failed', 'message' => 'Customer already Exist']);
            }
            }



             catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => 'error']);

        }
    }

    function customerById(Request $request)
        {
            try {
                $user_id=$request->header('id');
                $id= $request->input('id');
                return Customer::where('id',$id)->where('user_id',$user_id)->first();
            }
            catch (Exception $exception)
            {
                return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
            }

        }

    function updateCustomer(Request $request)
    {
        try {

            $request->validate(
                [
                    'name' => 'string|min:3',
                    'mobile'=>'string'
                ]
            );

            $user_id= $request->header('id');
            $id= $request->input('id');

            $count= Customer::where('id',$id)->where('user_id',$user_id)->count();

            if($count)
            {

            Customer::where('id',$id)->where('user_id',$user_id)
                ->update([

                    'name'=>$request->input('name'),
                    'mobile'=>$request->input('mobile')
                ]);

            return response()->json(['status' => 'success', 'message' => 'Customer updated Successfully']);
            }
            else
            {
                return response()->json(['status' => 'failed', 'message' => 'No Customer Found']);
            }
        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);

        }
    }

    function deleteCustomer(Request $request)
    {
        try {



            $user_id= $request->header('id');
            $id= $request->input('id');

            $count= Customer::where('id',$id)->where('user_id',$user_id)->count();

            if($count)
            {

                Customer::where('id',$id)->where('user_id',$user_id)
                    ->delete();

                return response()->json(['status' => 'success', 'message' => 'Customer Removed Successfully']);
            }
            else
            {
                return response()->json(['status' => 'failed', 'message' => 'No Customer Found']);
            }
        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);

        }
    }


}
