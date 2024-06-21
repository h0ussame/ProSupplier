<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\pending_supplier;
use App\Models\supplier;
use Illuminate\Http\Request ;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use App\Mail\MailSender;
use Illuminate\Support\Facades\Auth;

class supplierController extends Controller
{
    
    public function store(Request  $request){
        
            
            $supplier = supplier::create([
                'first_name' => $request->input('first_names'),
                'last_name' => $request->input('last_names'),
                'email' => $request->input('emails'),
                'password' => Hash::make($request->input('passwords')),
                'number' => $request->input('numbers'),
                'category' => $request->input('categorys'),
                'city' => $request->input('citys'),
                'zip_code' => $request->input('zip_codes'),
                'state'=>''
            ]);
        
            $recipientEmail = $request->input('emails');
            $message= 'Hello '.$request->input('first_names').' Admin just accepted your request . Login now and start your journey ! ';

            Mail::to($recipientEmail)->send(new MailSender($message));

            pending_supplier::where('email', $request->input('emails'))
                ->where('password', $request->input('passwords'))
                ->delete();


        
            return Redirect::to('/loading');
        
    
    }

    public function delete(Request $request){
        supplier::where('email', $request->input('email'))
                ->where('password', $request->input('password'))
                ->delete();
                return Redirect::to('/loading');
    }

    public function update(Request $request){
        $supplier=supplier::find(Auth::guard('supplier')->user()->id);
        $supplier->first_name=$request->input('first_name');
        $supplier->last_name=$request->input('last_name');
        $supplier->save();

        return redirect()->back();
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
    //     $suppliers = Supplier::where('first_name', 'LIKE', "%{$query}%")->where('last_name', 'LIKE', "%{$query}%")->get();
    //     dd($suppliers);
    //     return back()->with(['suppliers' => $suppliers, 'query' => $query]);
    // }
    
}
