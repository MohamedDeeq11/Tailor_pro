<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use App\Models\Order_Tracking;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
class Order_TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $pageTitle = 'Order Tracking';
        $order_trackings=Order_Tracking::latest()->paginate(5);
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('order.order_tracking.index',compact('order_trackings','pageTitle','profile'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageTitle = 'Order Tracking';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('order.order_tracking.create',compact('pageTitle','profile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'status' => 'required',
        'expected_date_completion' => 'required',
    ]);
    
    Order_Tracking::create($request->all());
    
    return redirect('/order_trackings')
                    ->with('success','Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($encrypted_id):View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $order_tracking = Order_Tracking::find($id);
        $pageTitle = 'Order Tracking';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('order.order_tracking.show',compact('order_tracking','pageTitle','profile'));
    } catch (DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid encrypted ID.');
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($encrypted_id):View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $order_tracking = Order_Tracking::find($id);
        $pageTitle = 'Order Tracking';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('order.order_tracking.edit',compact('order_tracking','pageTitle','profile'));
    } catch (DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid encrypted ID.');
    }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$encrypted_id)
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $order_tracking = Order_Tracking::find($id);
        $request->validate([
        'status' => 'required',
        'expected_date_completion' => 'required',
    ]);
    
    $order_tracking->update($request->all());
    
    return redirect('/order_trackings')
                    ->with('success','Updated successfully.');
                } catch (DecryptException $e) {
                    return redirect()->back()->with('error', 'Invalid encrypted ID.');
                }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Order_Tracking::find($id)->delete();
         
        return redirect('order_trackings')
                        ->with('success','Deleted successfully');
    }
}
