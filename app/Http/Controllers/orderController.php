<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\supplier;
use App\Models\manager;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use App\Mail\MailSender;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    public function store(Request $request)
    {
            order::create([
                'product' => $request->input('product'),
                'quantity' => $request->input('quantity'),
                'supplier_id' => $request->input('supplierId'),
                'manager_id' => $request->input('managerId'),
            ]);
            
            $managerEmail = Auth::guard('purchaseManager')->user()->email ;
            $messageManager= 'Hello '.$request->input('first_name').' your Order is now Pending , wait for the supplier to offer a price . ';
            Mail::to($managerEmail)->send(new MailSender($messageManager));

            $Supplier = supplier::find($request->input('supplierId'));
            $messageSupplier = 'Hello '.$Supplier->first_name.' you just received an offer from Manager '.Auth::guard('purchaseManager')->user()->first_name .' . Login now and offer a price !' ;
            Mail::to($Supplier->email)->send(new MailSender($messageSupplier));
           
            return redirect('/managerDashboard');
        }

        public function delete(Request $request){
             order::where('id',$request->input('id'))->delete();
             return redirect('/managerDashboard');
         }

         public function offerOrDecline(Request $request){
            $submit=$request->input('submit');
            $idOrder=$request->input('id');
            $order=order::find($idOrder);
            if($submit === 'offer'){
                $order->offered_price=$request->input('offered_price');
                $order->status='offered';

                 $manager = manager::find($order->manager_id) ;
                 $messageManager= 'Hello '.$manager->first_name.' you just received and offer for order with id #' .$order->id.' . Login now and manage your orders';
                 Mail::to($manager->email)->send(new MailSender($messageManager));

            }else if($submit === 'decline' ){
                $order->motif =  $request->input('motif');
                $order->status='declined';  
                $order->save();
                $Supplier = supplier::find($order->supplier_id);
                $Manager = manager::find($order->manager_id);

                $message = 'Hello ! Offer for order with id #'.$order->id.' was declined .Motif : '.$order->motif ;
                Mail::to($Supplier->email)->send(new MailSender($message));
                Mail::to($Manager->email)->send(new MailSender($message));
            }else if($submit === 'accept' ){
                $order->status='accepted';
                $Supplier = supplier::find($order->supplier_id);
            $messageSupplier = 'Hello '.$Supplier->first_name.' , your offer for order with id #'.$order->id.' was accepted . Login now and see more details ! ' ;
            Mail::to($Supplier->email)->send(new MailSender($messageSupplier));
            }
            $order->save();
            
            return redirect()->back();
         }

}
