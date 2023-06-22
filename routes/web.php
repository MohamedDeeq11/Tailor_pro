<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\PlanController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware(['auth'])->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect('/plans');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();

//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('login',[AuthController::class,'loginpage']);
Route::post('postlogin',[AuthController::class,'postlogin']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('forget',[AuthController::class,'forgetpage']);
Route::get('verified',[AuthController::class,'verifiedpage']);
Route::get('verifyEmail',[AuthController::class,'verifyEmail']);
// Route::post('postverified/{id}',[AuthController::class,'postverified']);
Route::get('plans',[AuthController::class,'planspage']);
Route::get('Checkout',[AuthController::class,'Checkoutpage']);
// Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
Route::post('/save-plans', [AuthController::class, 'savePlans'])->name('plans.save');

Route::get('/dashboard',[Authcontroller::class, 'dashboard']);
Route::group(['middleware'=>'admin'],function(){
    
    Route::get('/logout',[Authcontroller::class, 'logout']);
});


Route::get('company',[DashboardController::class,'company']);
Route::get('branch',[DashboardController::class,'branch']);
Route::get('invocing',[DashboardController::class,'invocing']);
Route::get('payment_processing ',[DashboardController::class,'payment_processing']);
Route::get('employee',[DashboardController::class,'employee']);
Route::get('client_details',[DashboardController::class,'client_details']);
Route::get('order_history',[DashboardController::class,'order_history']);
Route::get('product_details',[DashboardController::class,'product_details']);
Route::get('product_categories',[DashboardController::class,'product_categories']);
Route::get('order_history',[DashboardController::class,'orders_order_history']);
Route::get('order_tracking',[DashboardController::class,'order_tracking']);
Route::get('expenses',[DashboardController::class,'expenses']);
Route::get('revenue',[DashboardController::class,'revenue']);
Route::get('profit',[DashboardController::class,'profit']);