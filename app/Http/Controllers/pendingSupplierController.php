<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pending_supplier;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use App\Mail\MailSender;

class pendingSupplierController extends Controller
{
    //
    public function store(Request $request){

        
        $validateData = $request->validate([
            'first_name'=>'required',
            'last_name' => 'required',
            'email' => 'required|unique:pending_supplier',
            'password' =>'required|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d).+$/',
            'number'=>'digits:10',
            'category'=>'required',
            'city'=>'required',
            'zip_code'=>'required',
            'state '=>'nullable'
        ],[
            'email.unique' => 'The email address has already been taken. try to login !',
            'password.regex'=>'The password must be at least 8 characters long and contain both letters and numbers.',
            'number.digits'=>'the number should be exactly 10 digits'
        ]) ; 

        

        $recipientEmail = $request->input('email');
        $message= 'Hello '.$request->input('first_name').' your Request is now Pending , wait for Admin to approve it . ';
    
        Mail::to($recipientEmail)->send(new MailSender($message));
        $pendingSupplier=pending_supplier::create($validateData);

        return redirect('/');
    }
    
}
