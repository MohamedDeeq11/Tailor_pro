<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\Product_Categorie;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Contracts\Encryption\DecryptException;
class Product_CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $pageTitle = 'Product Categories';
        $product_categories=Product_Categorie::latest()->paginate(5);
        return view('product.product_categories.index',compact('product_categories','pageTitle'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageTitle = 'Product Categories';
        return view('product.product_categories.create',compact('pageTitle'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'CategorieName' => 'required',
        ]);
        
        Product_Categorie::create($request->all());
        
        return redirect('/product_categories')
                        ->with('success','Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($encrypted_id): View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $product_category = Product_Categorie::find($id);
        $pageTitle = 'Product Categories';
        return view('product.product_categories.show',compact('product_category','pageTitle'));
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
    
            $product_category = Product_Categorie::find($id);
        $pageTitle = 'Product Categories';
        return view('product.product_categories.edit', compact('product_category','pageTitle'));
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
    
            $product_category = Product_Categorie::find($id);
        $request->validate([
            'CategorieName' => 'required',
        ]);
    
        $product_category->update($request->all());
    
        return redirect('/product_categories')->with('success', 'Updated successfully');
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
    
    
        Product_Categorie::find($id)->delete();
    
        return redirect('product_categories')->with('success', 'Deleted successfully');
    }
}
