<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pending_manager;
use App\Models\pending_supplier;
use App\Models\manager;
use App\Models\supplier;
use Illuminate\Support\Facades\Auth;

class loadingRecordsController extends Controller
{

    public function loadingPendingManagersSupplierForAdmin(Request $request){
        $pendingManagerRecords = pending_manager::all();
        $pendingSupplierRecords = pending_supplier::all(); 
        $supplierRecords=supplier::all();
        $managerRecords=manager::all();
        return view('dashboardAdmin',compact('pendingManagerRecords', 'pendingSupplierRecords','supplierRecords','managerRecords'));
    }

}

