<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use App\Models\Company;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
class BranchController extends Controller
{
    public function index(): View
    {
        $pageTitle = 'Branches';
        $branchs = Branch::latest()->paginate(5);
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('company.branch.index', compact('branchs', 'pageTitle','profile'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(Company $company): View
    {
        $pageTitle = 'Branches';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('company.branch.create', compact('pageTitle', 'company','profile'));
    }

   public function store(Request $request, Company $company)
{
    $request->validate([
        'branch_name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'address' => 'required|string|max:255',
    ]);

    $branchData = $request->except(['_token']); // Remove the token from the data
    $branchData['company_id'] = $company->id;

    Branch::create($branchData);

    return redirect('branchs')->with('success', 'Created successfully!');
}

    public function show($encrypted_id): View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $branch = Branch::find($id);
        $pageTitle = 'Branches';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('company.branch.show', compact('branch', 'pageTitle','profile'));
    } catch (DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid encrypted ID.');
    }
    }

    public function edit($encrypted_id): View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $branch = Branch::find($id);
        $pageTitle = 'Branches';
        $company = $branch->company;
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('company.branch.edit', compact('pageTitle', 'branch', 'company','profile'));
    } catch (DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid encrypted ID.');
    }
    }

    public function update(Request $request,$encrypted_id)
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $branch = Branch::find($id);
        $request->validate([
            'branch_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        $branch->update($request->all());

        return redirect('branchs')->with('success', 'Updated successfully!');
    } catch (DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid encrypted ID.');
    }
    }

    public function destroy($id): RedirectResponse
    {
        Branch::find($id)->delete();

        return redirect('branchs')->with('success', 'Deleted successfully');
    }
}