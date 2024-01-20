<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function saleReport(Request $request)
    {
        $user_id = $request->header('id');
        $fromDate = date('Y-m-d', strtotime($request->fromDate));
        $toDate = date('Y-m-d', strtotime($request->toDate));

        $total = Invoice::where('user_id', $user_id)->whereDate('created_at', '>=', $fromDate)->whereDate('created_at', '<=', $toDate)->sum('total');
        $discount = Invoice::where('user_id', $user_id)->whereDate('created_at', '>=', $fromDate)->whereDate('created_at', '<=', $toDate)->sum('discount');
        $vat = Invoice::where('user_id', $user_id)->whereDate('created_at', '>=', $fromDate)->whereDate('created_at', '<=', $toDate)->sum('vat');
        $payable = Invoice::where('user_id', $user_id)->whereDate('created_at', '>=', $fromDate)->whereDate('created_at', '<=', $toDate)->sum('payable');

        $details = Invoice::where('user_id', $user_id)->whereDate('created_at', '>=', $fromDate)->whereDate('created_at', '<=', $toDate)
            ->with('customer')->get();


        $data= [
            'total' => $total,
            'discount' => $discount,
            'vat' => $vat,
            'payable' => $payable,
            'details' => $details,
            'fromDate'=>$fromDate,
            'toDate'=>$toDate

        ];

        $pdf = Pdf::loadView('report.SalesReport', $data);
        return $pdf->download('invoice.pdf');


    }
}
