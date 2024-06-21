<?php

namespace App\Http\Controllers;

use App\Models\pending_manager;
use App\Models\pending_supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    
    public function dashboardAccess(Request $request){

        $userType = $request->input('userType');
        $credentials = $request->only('email','password');
        

        if(Auth::guard($userType)->attempt($credentials)){
            $user=Auth::guard($userType);
            if($userType ==='purchaseManager') return redirect('/managerDashboard');
            else if ($userType === 'supplier') return redirect('/supplierDashboard');
            else if($userType === 'admin') return redirect('/loading');
        
           
        }else {
            $errorMessage = 'The email or password is incorrect.';
            if($userType === 'admin') return redirect('/loginAdmin')->with('error', $errorMessage);
            return redirect('/loginView')->with('error', $errorMessage);
        }
        
        
    }

    public function logout(Request $request){
        $userType=$request->input('userType');
        Auth::guard($userType)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if($request->input('submit')=='home') return view('LandingPage');

        if($userType=='admin') return redirect('/loginAdmin');
        else return view('login');
                    
        }
    }

