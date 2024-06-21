<?php

namespace App\Http\Controllers;

use App\Mail\MailSender;
use App\Models\pending_manager;
use Illuminate\Http\Request ;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;



class pendingManagerController extends Controller
{
    public function store(Request  $request){

        
    $validatedData = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'email|unique:pending_manager',
        'password' => 'nullable|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d).+$/',
        'number' => 'required|digits:10',
    ], [
        'email.unique' => 'The email address has already been taken. wait for approval!',
        'password.regex' => 'The password must be at least 8 characters long and contain both letters and numbers.',
        'number.digits' => 'the number should be exactly 10 digits '
    ]);
    
    $recipientEmail = $request->input('email');
    $message= 'Hello '.$request->input('first_name').' your Request is now Pending , wait for Admin to approve it . ';

    Mail::to($recipientEmail)->send(new MailSender($message));

    $pendingManager = pending_manager::create($validatedData);
    return redirect('/');


    }
}
