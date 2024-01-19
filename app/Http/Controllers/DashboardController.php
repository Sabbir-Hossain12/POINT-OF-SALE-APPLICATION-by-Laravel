<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function DashSummery(Request $request)
    {

        try {
          $user_id= $request->header('id');
            $product= Product:: where('user_id',$user_id)->count();
            $customer= Customer:: where('user_id',$user_id)->count();
            $category= Category:: where('user_id',$user_id)->count();
            $invoice= Invoice:: where('user_id',$user_id)->count();
            $total= Invoice::where('user_id',$user_id)->sum('total');
            $vat= Invoice::where('user_id',$user_id)->sum('vat');
            $payable= Invoice::where('user_id',$user_id)->sum('payable');

            return [

                'product'=>$product,
                'customer'=>$customer,
                'category'=>$category,
                'invoice'=>$invoice,
                'total'=>$total,
                'vat'=>$vat,
                'payable'=>$payable

            ];


        }
        catch (Exception $exception)
        {
            return response()->json(['status'=>'failed','message'=>$exception->getMessage()]);
        }
    }
}
