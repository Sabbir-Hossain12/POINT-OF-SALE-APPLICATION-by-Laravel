<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceProduct;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{

    function createInvoice(Request $request)
    {
        try {

            DB::beginTransaction();

            $user_id = $request->header('id');

            $invoice = Invoice::create([

                'total' => $request->input('total'),
                'discount' => $request->input('discount'),
                'vat' => $request->input('vat'),
                'payable' => $request->input('payable'),

                'user_id' => $user_id,
                'customer_id' => $request->input('customer_id'),
            ]);

            $products = $request->input('products');

            foreach ($products as $eachProduct) {
                InvoiceProduct::create([

                    'invoice_id' => $invoice->id,
                    'user_id' => $user_id,
                    'product_id' => $eachProduct['product_id'],
                    'qty' => $eachProduct['qty'],
                    'sale_price' => $eachProduct['sale_price'],

                ]);
            }

            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'invoice Created Successfully']);

        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }

    function listInvoice(Request $request)
    {
        try {

            $user_id = $request->header('id');

            return Invoice::where('user_id', $user_id)->with('customer')->get();


        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }

    function invoiceDetails(Request $request)
    {
        try {

            $user_id = $request->header('id');
            $invoice_id = $request->input('invoice_id');
            $customer_id = $request->input('customer_id');

            $invoice_details = Invoice::where('user_id', $user_id)->where('id', $invoice_id)->first();
            $invoice_products_details = InvoiceProduct::where('user_id', $user_id)->where('invoice_id', $invoice_id)->with('product')->get();
            $customer_details = Customer::where('user_id', $user_id)->where('id', $customer_id)->get();


            return array(
                'customer' => $customer_details,
                'invoices' => $invoice_details,
                'product' => $invoice_products_details
            );
        } catch (Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);

        }
    }

    function deleteInvoice(Request $request)
    {
        try {
            DB::beginTransaction();


            $inv_id = $request->input('invoice_id');
            InvoiceProduct::where('invoice_id', $inv_id)->delete();

            Invoice::where('id', $inv_id)->delete();


            DB::commit();

            return response()->json(['status' => 'success', 'message' => 'invoice Removed Successfully']);
        } catch (Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }
}
