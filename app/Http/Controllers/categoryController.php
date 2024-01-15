<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    function getCategory(Request $request)
    {
        try {
            $user_id= $request->header('id');
           return Category::where('user_id',$user_id)->get();
        }
        catch (Exception $exception)
        {
            return response()->json(['status'=>'failed','message'=>$exception->getMessage()]);
        }
    }
    function createCategory(Request $request)
    {
        try {
            $user_id= $request->header('id');

            Category::create(
                [
                    'name'=>$request->input('name'),
                    'user_id'=>$user_id
                ]
            );

            return response()->json(['status'=>'success','message'=>'Category Created Successfully']);
        }
        catch (Exception $exception)
        {
            return response()->json(['status'=>'failed','message'=>$exception->getMessage()]);

        }

    }

    function deleteCategory(Request $request)
    {
        try {
            $user_id= $request->header('id');
            $id= $request->input('id');
          $count=  Category:: where('user_id',$user_id)->where('id',$id)->count();

          if ($count)
          {
              Category:: where('user_id',$user_id)->where('id',$id)->delete();
              return response()->json(['status'=>'success','message'=>'Category Deleted Successfully']);
          }
          else
          {
              return response()->json(['status'=>'failed','message'=>'No data found']);

          }



        }
        catch (Exception $exception)
        {
            return response()->json(['status'=>'failed','message'=>$exception->getMessage()]);

        }
    }
    function updateCategory(Request $request)
    {
        try {
            $user_id= $request->header('id');
            $id= $request->input('id');
         $count=   Category:: where('user_id',$user_id)->where('id',$id)->count();

         if($count)
         {

             Category:: where('user_id',$user_id)->where('id',$id)  ->update(
                [
                    'name'=>$request->input('name')
                ]
            );
             return response()->json(['status'=>'success','message'=>'Category updated Successfully']);
         }
         else{
             return response()->json(['status'=>'failed','message'=>'No data found']);

         }


        }
        catch (Exception $exception)
        {
            return response()->json(['status'=>'failed','message'=>$exception->getMessage()]);

        }
    }
}
