<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\pending_manager;
use App\Models\manager;
use Illuminate\Http\Request ;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use App\Mail\MailSender;
use Illuminate\Support\Facades\Auth;

class managerController extends Controller
{
    //
    public function store(Request  $request){
       
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'number' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
    
        $Manager = manager::create($validatedData);

        pending_manager::where('email', $request->input('email'))
               ->where('password', $request->input('password'))
               ->delete();

               $recipientEmail = $request->input('email');
               $message= 'Hello '.$request->input('first_name').', Admin accepted your request ! Login now and start your journey . ';
           
               Mail::to($recipientEmail)->send(new MailSender($message));
        return Redirect::to('/loading');
    
        }

        public function delete(Request $request){

            manager::where('email', $request->input('email'))
               ->where('password', $request->input('password'))
               ->delete();

        return Redirect::to('/loading');
        
        }
        
        public function update(Request $request){
            $manager = manager::find(Auth::guard('purchaseManager')->user()->id);
            $manager->first_name = $request->input('first_name');
            $manager->last_name = $request->input('last_name');
            
            $manager->save();
           
            
           return Redirect::to('/managerDashboard');
        }
}
