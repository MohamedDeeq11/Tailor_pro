<?php

namespace App\Http\Controllers\billing;

use App\Http\Controllers\Controller;
use App\Models\Invoicing;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use App\Models\Company;
use Illuminate\Contracts\Encryption\DecryptException;
class InvoicingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $pageTitle = 'Invoicing';
        $invoicings=Invoicing::latest()->paginate(5);
        $companys=Company::latest()->paginate(5);
        return view('billing.invoicing.index',compact('invoicings','pageTitle'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company): View
    {
        $pageTitle = 'Invoicing';
        return view('billing.invoicing.create',compact('pageTitle','company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Invoicing $Invoicing)
    {

        $request->validate([
            'company_id' => [
                'required',
                Rule::exists('companys', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'From' => 'required',
            'Registered_date' => 'required',
            'To' => 'required',
            'product' => 'required',
            'price' => 'required',
            'PaymentStatus' => 'required',
            'PaymentMethod' => 'required',
        ]);

        Invoicing::create($request->all());

        return redirect('invoicings',compact('invoicing'))->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show( $encrypted_id): View
    {
        try {
            $id = decrypt($encrypted_id); 
            
            $invoicing = Invoicing::find($id);
        $pageTitle = 'Invoicing';
        return view('billing.invoicing.show',compact('invoicing','pageTitle'));
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
            
            $invoicing = Invoicing::find($id);
    
          
    
            $pageTitle = 'Invoicing';
            return view('billing.invoicing.edit',compact('invoicing','pageTitle'));
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
    
            $invoicing = Invoicing::find($id);
        $request->validate([
            'company_id' => [
                'required',
                Rule::exists('companys', 'id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'From' => 'required',
            'Registered_date' => 'required',
            'To' => 'required',
            'product' => 'required',
            'price' => 'required',
            'PaymentStatus' => 'required',
            'PaymentMethod' => 'required',
        ]);

        $invoicing->update($request->all());

        return redirect('invoicings')->with('success', 'Updated successfully!');
    } catch (DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid encrypted ID.');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Invoicing::find($id)->delete();
        return redirect('invoicings')
                        ->with('success','Deleted successfully');
    }
}
