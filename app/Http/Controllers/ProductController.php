<?php

namespace App\Http\Controllers;

use App\Models\InvoiceProduct;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    function getProduct(Request $request)
    {
        try {

            $user_id = $request->header('id');

            return Product::where('user_id', $user_id)->get();

        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }

    function getProductById(Request $request)
    {
        try {
            $user_id = $request->header('id');
            $product_id = $request->input('id');

            return Product::where('user_id', $user_id)->where('id', $product_id)->first();

        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }

    function createProduct(Request $request)
    {
        try {

            $request->validate(
                [
                    'name' => 'string|required',
                    'price' => 'string|required',
                    'unit' => 'string|required',
                    'category_id' => 'string|required'
                ]
            );

            $user_id = $request->header('id');

            $image = $request->file('img');
            $fileName = $image->getClientOriginalName();
            $imageName = $user_id . '-' . md5(uniqid()) . time() . '.' . $fileName;
            $img_url = "upload/{$imageName}";
            $image->move(public_path('upload'), $imageName);

            Product::where('user_id', $user_id)->create(
                [
                    'user_id' => $user_id,
                    'category_id' => $request->input('category_id'),
                    'name' => $request->input('name'),
                    'price' => $request->input('price'),
                    'unit' => $request->input('unit'),
                    'img_url' => $img_url,

                ]
            );
            return response()->json(['status' => 'success', 'message' => 'Product Created Successfully']);
        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }

    function updateProduct(Request $request)
    {
        try {
            $user_id = $request->header('id');
            $product_id = $request->input('id');

            if ($request->hasFile('img')) {


                $image = $request->file('img');
                $fileName = $image->getClientOriginalName();
                $imageName = $user_id . '-' . md5(uniqid()) . time() . '.' . $fileName;
                $img_url = "upload/{$imageName}";
                $image->move(public_path('upload'), $imageName);

//                delete old image path
                $oldImage = $request->input('file_path');
                File::delete($oldImage);

                Product::where('user_id', $user_id)->where('id', $product_id)->update(
                    [
                        'user_id' => $user_id,
                        'category_id' => $request->input('category_id'),
                        'name' => $request->input('name'),
                        'price' => $request->input('price'),
                        'unit' => $request->input('unit'),
                        'img_url' => $img_url,

                    ]);
            } else {
                Product::where('user_id', $user_id)->where('id', $product_id)->update(
                    [
                        'user_id' => $user_id,
                        'category_id' => $request->input('category_id'),
                        'name' => $request->input('name'),
                        'price' => $request->input('price'),
                        'unit' => $request->input('unit'),


                    ]);
            }


            return response()->json(['status' => 'success', 'message' => 'Product Updated Successfully']);
        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }

    function deleteProduct(Request $request)
    {
        try {
            $user_id = $request->header('id');
            $product_id = $request->input('id');
            $img_url = $request->input('file_path');

//            $fileDelete = File::delete($img_url);

            $InvoiceProduct = InvoiceProduct::where('user_id', $user_id)->where('product_id', $product_id)->count();


            if (!$InvoiceProduct) {
                Product::where('user_id', $user_id)->where('id', $product_id)->delete();
                $fileDelete = File::delete($img_url);
                return response()->json(['status' => 'success', 'message' => 'Product Removed Successfully']);
            }
            else{
                return response()->json(['status' => 'failed', 'message' => 'Can not delete, Product is in Use ']);
            }




        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }
}
