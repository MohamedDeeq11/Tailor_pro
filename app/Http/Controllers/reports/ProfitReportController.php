<?php

namespace App\Http\Controllers\reports;

use App\Http\Controllers\Controller;
use App\Models\ProfitReport;
use Illuminate\Http\Request;
use App\Models\Profit;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
class ProfitReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Profit Report';
        $profits=Profit::latest()->paginate(5);
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('reports.profit_report',compact('profits','pageTitle','profile'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfitReport $profitReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfitReport $profitReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfitReport $profitReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfitReport $profitReport)
    {
        //
    }
}
