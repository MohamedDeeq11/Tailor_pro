<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\finance\ExpenseController;
use App\Http\Controllers\finance\ProfitController;
use App\Http\Controllers\finance\RevenueController;
use App\Http\Controllers\product\Product_CategorieController;
use App\Http\Controllers\billing\Payment_ProcessingController;
use App\Http\Controllers\client\Order_HistoryController;
use App\Http\Controllers\company\CompanyController;
use App\Http\Controllers\company\BranchController;
use App\Http\Controllers\billing\InvoicingController;
use App\Http\Controllers\client\ClientController;
use App\Http\Controllers\hr\EmployeeController;
use App\Http\Controllers\product\ProductController;
use App\Http\Controllers\order\Order_DetailController;
use App\Http\Controllers\order\Order_TrackingController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\reports\ExpenseReportController;
use App\Http\Controllers\reports\RevenueReportController;
use App\Http\Controllers\reports\ProfitReportController;
use App\Http\Controllers\reports\Order_History_ReportController;
use App\Http\Controllers\my_account\ProfileController;
use App\Http\Controllers\my_account\SecurityController;
use App\Http\Controllers\my_account\Payment_MethodController;
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
// Route::post('/backup/create', 'BackupController')->name('backup.create');
Route::get('/payment_method', [Payment_MethodController::class, 'index']);
Route::get('/security', [SecurityController::class, 'index']);
Route::post('/security/submit', [SecurityController::class, 'submitSecurityForm'])->name('security.submit');
Route::get('/my_profile', [ProfileController::class, 'index']);
Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
Route::get('/edit_profile', [ProfileController::class, 'edit']);
Route::post('/backup/create', [BackupController::class, 'create'])->name('backup.create');
Route::get('/backup', [BackupController::class, 'index']);
Route::get('expenses_report',[ExpenseReportController::class,'index']);
Route::get('revenue_report',[RevenueReportController::class,'index']);
Route::get('profit_report',[ProfitReportController::class,'index']);
Route::get('order_history_report',[Order_History_ReportController::class,'index']);
Route::resource('expenses', \App\Http\Controllers\finance\ExpenseController::class);
Route::resource('profits', \App\Http\Controllers\finance\ProfitController::class);
Route::resource('revenues', \App\Http\Controllers\finance\RevenueController::class);
Route::resource('product_categories', \App\Http\Controllers\product\Product_CategorieController::class);
Route::resource('payment_processings', \App\Http\Controllers\billing\Payment_ProcessingController::class);
Route::resource('order_historys', \App\Http\Controllers\client\Order_HistoryController::class);
Route::resource('companys', \App\Http\Controllers\company\CompanyController::class);
Route::resource('branchs', \App\Http\Controllers\company\BranchController::class);
Route::resource('invoicings', \App\Http\Controllers\billing\InvoicingController::class);
Route::resource('clients', \App\Http\Controllers\client\ClientController::class);
Route::resource('employees', \App\Http\Controllers\hr\EmployeeController::class);
Route::resource('products', \App\Http\Controllers\product\ProductController::class);
Route::resource('order_details', \App\Http\Controllers\order\Order_DetailController::class);
Route::resource('order_trackings', \App\Http\Controllers\order\Order_TrackingController::class);
Route::get('login',[AuthController::class,'loginpage']);
Route::post('postlogin',[AuthController::class,'postlogin']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('verified',[AuthController::class,'verifiedpage']);
Route::post('verifyEmail',[AuthController::class,'verifyEmail']);
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('admin.verify');
Route::get('forget',[AuthController::class,'forgetpage']);

// Route::post('postverified/{id}',[AuthController::class,'postverified']);
// Route::get('plans',[AuthController::class,'planspage']);
// Route::get('cart',[AuthController::class,'cartpage']);
// Route::get('/dashboard', [BookController::class, 'index']);  
Route::get('/plans', [AuthController::class, 'planspage']);  
Route::get('/plans-cart', [AuthController::class, 'cart'])->name('plans.cart');
Route::get('/cart/{id}', [AuthController::class, 'addPlantoCart'])->name('addplan.to.cart');
Route::patch('/update.shopping.cart', [AuthController::class, 'updateCart'])->name('update.shopping.cart');
Route::delete('/delete.cart.product', [AuthController::class, 'deleteProduct'])->name('delete.cart.product');


Route::get('Checkout',[AuthController::class,'Checkoutpage']);
Route::post('place-order',[AuthController::class,'placeorder']);
// Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
Route::post('/save-plans', [AuthController::class, 'savePlans'])->name('plans.save');

Route::get('/dashboard',[Authcontroller::class, 'dashboard']);
Route::get('/private',[Authcontroller::class, 'private']);
Route::group(['middleware'=>'admin'],function(){
    
    Route::get('/logout',[Authcontroller::class, 'logout']);
});


// Route::get('company',[DashboardController::class,'company']);
// Route::get('branch',[DashboardController::class,'branch']);
// Route::get('invocing',[DashboardController::class,'invocing']);
// Route::get('payment_processing ',[DashboardController::class,'payment_processing']);
// Route::get('employee',[DashboardController::class,'employee']);
// Route::get('client_details',[DashboardController::class,'client_details']);
// Route::get('order_history',[DashboardController::class,'order_history']);
// Route::get('product_details',[DashboardController::class,'product_details']);
// Route::get('product_categories',[DashboardController::class,'product_categories']);
// Route::get('order_history',[DashboardController::class,'orders_order_history']);
// Route::get('order_tracking',[DashboardController::class,'order_tracking']);
// Route::get('expenses',[DashboardController::class,'expenses']);
// Route::get('revenue',[DashboardController::class,'revenue']);
// Route::get('profit',[DashboardController::class,'profit']);


// Finance;


// Route::resource('expenses', \App\Http\Controllers\finance\ExpenseController::class);
// Route::get('/finance/expenses', 'App\Http\Controllers\finance\ExpenseController@index')->name('finance.expenses.index');
// Route::get('/create', 'App\Http\Controllers\finance\ExpenseController@create')->name('Finance.Expenses.create');
// Route::post('/finance/expenses', 'App\Http\Controllers\finance\ExpenseController@store')->name('finance.expenses.store');
// Route::get('/{expense}/', 'App\Http\Controllers\finance\ExpenseController@edit')->name('Finance.Expenses.edit');
// Route::delete('/finance/expenses/{expense}', 'App\Http\Controllers\finance\ExpenseController@destroy')->name('Finance.Expenses.destroy');
// Route::get('/finance/expenses/{expense}', 'App\Http\Controllers\finance\ExpenseController@show')->name('Finance.Expenses.show');
// Route::put('/finance/expenses/{expense}', 'App\Http\Controllers\finance\ExpenseController@update')->name('finance.expenses.update');