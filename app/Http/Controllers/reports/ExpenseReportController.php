<?php

namespace App\Http\Controllers\reports;

use App\Http\Controllers\Controller;
use App\Models\ExpenseReport;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Expanse Report'; 
        $expenses=Expense::latest()->paginate(5);
        return view('Reports.expansesreport',compact('expenses','pageTitle'))
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
    public function show(ExpenseReport $expenseReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExpenseReport $expenseReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExpenseReport $expenseReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseReport $expenseReport)
    {
        //
    }
}
