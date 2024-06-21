<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\admin;
use Illuminate\Support\Facades\Redirect;

class adminController extends Controller
{
    
    
public function update(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        
    ], );

    $admin = admin::find(Auth::guard('admin')->user()->id);
    $admin->first_name = $request->input('first_name');
    $admin->last_name = $request->input('last_name');
    // $admin->number = $request->input('number');
    
    $admin->save();
   
    
   return Redirect::to('/loading'); 
}



}
