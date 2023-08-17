<?php

namespace App\Http\Controllers\reports;

use App\Http\Controllers\Controller;
use App\Models\RevenueReport;
use Illuminate\Http\Request;
use App\Models\Revenue;
class RevenueReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Revenue Report';
        $revenues=Revenue::latest()->paginate(5);
        return view('reports.revenue_report',compact('revenues','pageTitle'))
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
    public function show(RevenueReport $revenueReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RevenueReport $revenueReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RevenueReport $revenueReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RevenueReport $revenueReport)
    {
        //
    }
}
