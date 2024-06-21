<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pendingManagerController ;




Route::get('/', function () {
    return view('LandingPage');
});

Route::get('/Sign-inPurchase', function () {
    return view('Sign-inPurchase');
});

Route::get('/Sign-inSupplier', function () {
    return view('Sign-inSupplier');
});

Route::post('/createPendingManager' ,([pendingManagerController::class ,'store']));
Route::post('/createPendingSupplier' , ([pendingSupplierController::class ,'store']));

Route::post('/createManager' , ([managerController::class ,'store']));
Route::post('/deleteManager' , ([managerController::class ,'delete']));
Route::post('/updateManager' , ([managerController::class ,'update']));

Route::post('/createSupplier', ([supplierController::class ,'store']));
Route::post('/deleteSupplier', ([supplierController::class ,'delete']));
Route::post('/updateSupplier', ([supplierController::class ,'update']));
Route::post('/searchSuppliers', ([supplierController::class ,'search']));


Route::post('/modifyAdmin', ([adminController::class ,'update']));

Route::get('/loginView',function(){
    return view('login');
});

Route::get('/loginAdmin',function(){
    return view('loginAdmin');
});

Route::post('/login' , ([loginController::class , 'dashboardAccess']));
Route::post('/logout' , ([loginController::class , 'logout']));

Route::get('/adminDashboard' , function(){
    return view('dashboardAdmin') ; 
});

Route::get('/managerDashboard',function(){
    return view('dashboardManager');
});

Route::get('/supplierDashboard',function(){
    return view('dashboardSupplier');
});

Route::get('/loading', ([loadingRecordsController::class , 'loadingPendingManagersSupplierForAdmin']));

Route::post('/createOrder', ([orderController::class , 'store']));
Route::post('/deleteOrder', ([orderController::class , 'delete']));
Route::post('/offerOrDecline', ([orderController::class , 'offerOrDecline']));


Route::post('/pdf',[invoiceGenerator::class, 'generatePdf']);