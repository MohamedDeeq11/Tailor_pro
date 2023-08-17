<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Encryption\DecryptException;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $pageTitle = 'Company';
        $companys=Company::latest()->paginate(5);
        return view('company.company.index',compact('companys','pageTitle'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageTitle = 'Company';
        return view('company.company.create',compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $existingCompany = Company::first();
        if ($existingCompany) {
            return redirect('companys')->with('error', 'Only one company can be added.');
        }

        $request->validate([
            'Name' => 'required',
            'LogoPic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Registered_date' => 'required',
            'Email' => 'required|email',
            'website' => 'required',
            'address' => 'required',
        ]);

        $input = $request->all();

        if ($LogoPic = $request->file('LogoPic')) {
            $destinationPath = 'images/';
            $profileImage = uniqid() . "." . $LogoPic->getClientOriginalExtension();
            $LogoPic->move($destinationPath, $profileImage);
            $input['LogoPic'] = $profileImage;
        }

        Company::create($input);

        return redirect('/companys')->with('success', 'Created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show($encrypted_id): View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $company = Company::find($id);
    
        $pageTitle = 'Company';
        return view('company.company.show',compact('company','pageTitle'));
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
            
            $company = Company::find($id);
    
            if (!$company) {
                return redirect()->back()->with('error', 'Company not found.');
            }
    
            $pageTitle = 'Company';
            return view('company.company.edit', compact('company', 'pageTitle'));
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', 'Invalid encrypted ID.');
        }
    }
    public function update(Request $request, $encrypted_id): RedirectResponse
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $company = Company::find($id);
    
            if (!$company) {
                return redirect()->back()->with('error', 'Company not found.');
            }
    
            $request->validate([
                'Name' => 'required',
                'LogoPic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'Registered_date' => 'required',
                'Email' => 'required|email',
                'website' => 'required',
                'address' => 'required',
            ]);
    
            $input = $request->all();
    
            if ($LogoPic = $request->file('LogoPic')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $LogoPic->getClientOriginalExtension();
                $LogoPic->move($destinationPath, $profileImage);
                $input['LogoPic'] = $profileImage;
            } else {
                unset($input['LogoPic']); // If no new logo is uploaded, remove the LogoPic from input
            }
    
            $company->update($input);
    
            return redirect('companys')->with('success', 'Company updated successfully');
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', 'Invalid encrypted ID.');
        }
    }

    public function destroy($id): RedirectResponse
    {
        Company::find($id)->delete();
         
        return redirect('companys')
                        ->with('success','Deleted successfully');
    }
}
