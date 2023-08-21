<?php

namespace App\Http\Controllers\reports;

use App\Http\Controllers\Controller;
use App\Models\Order_History_Report;
use Illuminate\Http\Request;
use App\Models\Order_History;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
class Order_History_ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Order History Report';
        $order_historys=Order_History::latest()->paginate(5);
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('reports.order_history_report',compact('order_historys','pageTitle','profile'))
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
    public function show(Order_History_Report $order_History_Report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order_History_Report $order_History_Report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order_History_Report $order_History_Report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order_History_Report $order_History_Report)
    {
        //
    }
}
