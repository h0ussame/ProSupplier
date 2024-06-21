<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\manager;
use App\Models\supplier;
use App\Models\order;


class invoiceGenerator extends Controller
{

    public function generatePdf(Request $request){

        $orderId=$request->input('id');

        $data=[
            'order'=> order::find($orderId),
            'manager'=> manager::find(order::find($orderId)->manager_id),
            'supplier'=> supplier::find(order::find($orderId)->supplier_id),
        ];

        $pdf = Pdf::loadView('pdf', $data);
        return $pdf->download('order '.$orderId.' Invoice.pdf');
    }
    
}
