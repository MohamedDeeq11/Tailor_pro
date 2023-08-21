<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $pageTitle = 'Product Details';
        $products=Product::latest()->paginate(5);
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('product.product.index',compact('products','pageTitle','profile'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageTitle = 'Product Details';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('product.product.create',compact('pageTitle','profile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Registered_date' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'Unity' => 'required',
            'product_category_id' => [
                'required',
                Rule::exists('product_categories', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],

        ]);

        Product::create($request->all());

        return redirect('products')->with('success', 'Created successfully!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($encrypted_id): View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $product = Product::find($id);
        $pageTitle = 'Product Details';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('product.product.show',compact('product','pageTitle','profile'));
    } catch (DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid encrypted ID.');
    }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($encrypted_id): View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $product = Product::find($id);
        $pageTitle = 'Product Details';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('product.product.edit',compact('product','pageTitle','profile'));
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
    
            $product = Product::find($id);
        $request->validate([
            'Registered_date' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'Unity' => 'required',
            'product_category_id' => [
                'required',
                Rule::exists('product_categories', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
        ]);

        $product->update($request->all());

        return redirect('products')->with('success', 'Updated successfully!');
    } catch (DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid encrypted ID.');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        // Check if the correct model instance is retrieved.
    
    
        Product::find($id)->delete();
    
        return redirect('products')->with('success', 'Deleted successfully');
    }
}
