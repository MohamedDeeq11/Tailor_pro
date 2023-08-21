<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Order_History;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
class Order_HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $pageTitle = 'Order History';
        $order_historys=Order_History::latest()->paginate(5);
          $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('client.Order_History.index',compact('order_historys','pageTitle','profile'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageTitle = 'Order History';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('client.Order_History.create',compact('pageTitle','profile'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'date' => 'required',
            'product' => 'required',
            'price' => 'required',
        ]);
        
        Order_History::create($request->all());
         
        return redirect('order_historys')
                        ->with('success','Created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($encrypted_id): View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $order_history = Order_History::find($id);
        $pageTitle = 'Order History';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('client.Order_History.show',compact('order_history','pageTitle','profile'));
    } catch (DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid encrypted ID.');
    }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $encrypted_id): View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $order_history = Order_History::find($id);
        $pageTitle = 'Order History';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('client.Order_History.edit',compact('order_history','pageTitle','profile'));
    } catch (DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid encrypted ID.');
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encrypted_id): RedirectResponse
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $order_history = Order_History::find($id);
        $request->validate([
            'date' => 'required',
            'product' => 'required',
            'price' => 'required',
        ]);
        
        $order_history->update($request->all());
        
        return redirect('/order_historys')
                        ->with('success','Updated successfully');
                    } catch (DecryptException $e) {
                        return redirect()->back()->with('error', 'Invalid encrypted ID.');
                    }
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Order_History::find($id)->delete();
         
        return redirect('order_historys')
                        ->with('success','Deleted successfully');
    }
}
