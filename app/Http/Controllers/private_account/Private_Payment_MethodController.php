<?php

namespace App\Http\Controllers\private_account;

use App\Http\Controllers\Controller;
use App\Models\Private_Payment_Method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class Private_Payment_MethodController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin

        $profile = Admin::find($admin->id);


    $pageTitle = 'Payment Mehod';
    return view('my_account_private.payment_method', compact('pageTitle', 'profile'));
    }
}
