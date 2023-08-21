<?php

namespace App\Http\Controllers\reports;

use App\Http\Controllers\Controller;
use App\Models\ExpenseReport;
use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
class ExpenseReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Expanse Report'; 
        $expenses=Expense::latest()->paginate(5);
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('Reports.expansesreport',compact('expenses','pageTitle','profile'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */

}
