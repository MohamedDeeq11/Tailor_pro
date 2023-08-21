<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use App\Models\Order_Detail;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
class Order_DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $pageTitle = 'Order details';
        $order_details=Order_Detail::latest()->paginate(5);
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('order.order.index',compact('order_details','pageTitle','profile'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageTitle = 'Order details';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('order.order.create',compact('pageTitle','profile'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companys,id',
            'branch_id' => 'required|exists:branchs,id',
            'client_id' => 'required|exists:clients,id',
            'date' => 'required',
            'product_id' => 'required|exists:products,id',
            'price' => 'required',
            'Rodered_date' => 'required',
        ]);

        Order_Detail::create($request->all());

        return redirect('order_details')->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($encrypted_id):View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $order_detail = Order_Detail::find($id);
        $pageTitle = 'Order details';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('order.order.show',compact('order_detail','pageTitle','profile'));
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
    
            $order_detail = Order_Detail::find($id);
        $pageTitle = 'Order details';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('order.order.edit',compact('order_detail','pageTitle','profile'));
    } catch (DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid encrypted ID.');
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encrypted_id)
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $order_detail = Order_Detail::find($id);
        $request->validate([
            'company_id' => [
                'required',
                Rule::exists('companys', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'branch_id' => [
                'required',
                Rule::exists('branchs', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'client_id' => [
                'required',
                Rule::exists('clients', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'date' => 'required',
            'product_id' => [
                'required',
                Rule::exists('products', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],

            'price' => 'required',
            'Rodered_date' => 'required',
        ]);

        $order_detail->update($request->all());

        return redirect('order_details')->with('success', 'Updated successfully!');
    } catch (DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid encrypted ID.');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Order_Detail::find($id)->delete();
         
        return redirect('order_details')
                        ->with('success','Deleted successfully');
    }
}
