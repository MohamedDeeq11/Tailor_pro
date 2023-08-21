<?php

namespace App\Http\Controllers\billing;

use App\Http\Controllers\Controller;
use App\Models\Payment_Processing;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
class Payment_ProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        $pageTitle = 'Payment processing';
        $payment_processings=Payment_Processing::latest()->paginate(5);
        return view('billing.Payment_Processing.index',compact('payment_processings','pageTitle','profile'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        $pageTitle = 'Payment processing';
        return view('billing.Payment_Processing.create',compact('pageTitle','profile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'payment_method_Name' => 'required',
            'Number' => 'required',
            'payment_status' => 'required',
        ]);
        
        Payment_Processing::create($request->all());
         
        return redirect('payment_processings')
                        ->with('success','Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($encrypted_id): View
    {
        try {
            $id = decrypt($encrypted_id); 
    
             $payment_processing = Payment_Processing::find($id);
        $pageTitle = 'Payment processing';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('billing.Payment_Processing.show',compact('payment_processing','pageTitle','profile'));
    } catch (DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid encrypted ID.');
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($encrypted_id) :View
    {
        try {
            $id = decrypt($encrypted_id); 
    
             $payment_processing = Payment_Processing::find($id);
            $pageTitle = 'Payment processing';
            $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
            $profile = Admin::find($admin->id);
            return view('billing.Payment_Processing.edit',compact('payment_processing','pageTitle','profile'));
            } catch (DecryptException $e) {
                return redirect()->back()->with('error', 'Invalid encrypted ID.');
            }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$encrypted_id): RedirectResponse
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $payment_processing= payment_processing::find($id);
        $request->validate([
            'payment_method_Name' => 'required',
            'Number' => 'required',
            'payment_status' => 'required',
        ]);
        
        $payment_processing->update($request->all());
        
        return redirect('/payment_processings')
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
        Payment_Processing::find($id)->delete();
         
        return redirect('payment_processings')
                        ->with('success','Deleted successfully');
    }
}
