<?php

namespace App\Http\Controllers\my_account;

use App\Http\Controllers\Controller;
use App\Models\Payment_Method;
use Illuminate\Http\Request;
use app\Models\Admin;
use Illuminate\Support\Facades\Auth;
class Payment_MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin

        $profile = Admin::find($admin->id);


    $pageTitle = 'Payment Mehod';
    return view('my_account.payment_method', compact('pageTitle', 'profile'));
    }

    /**
     * Show the form for creating a new resource.
     */

}
