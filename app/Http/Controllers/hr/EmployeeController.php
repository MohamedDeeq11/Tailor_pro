<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Encryption\DecryptException;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $pageTitle = 'Employee';
        $employees=Employee::latest()->paginate(5);
        return view('hr.employee.index',compact('employees','pageTitle'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageTitle = 'Employee';
        return view('hr.employee.create',compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        'name' => 'required',
        'phonenumber' => 'required',
        'Status' => 'required',
        'AccessToAllBranchs' => 'required',
        'address' => 'required',
        'position' => 'required',
        'Registered_date' => 'required',
        'Refrence_Name' => 'required',
        'Refrance_phone' => 'required',
        'Refrance_relation' => 'required',
        'Refrance_address' => 'required',
    ]);

    Employee::create($request->all());

    return redirect('employees')->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($encrypted_id):View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $employee = Employee::find($id);
        $pageTitle = 'Employee';
        return view('hr.employee.show',compact('employee','pageTitle'));
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
    
            $employee = Employee::find($id);
        $pageTitle = 'Employee';
        return view('hr.employee.edit',compact('employee','pageTitle'));
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
    
            $employee = Employee::find($id);
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
            'name' => 'required',
            'phonenumber' => 'required',
            'Status' => 'required',
            'AccessToAllBranchs' => 'required',
            'address' => 'required',
            'position' => 'required',
            'Registered_date' => 'required',
            'Refrence_Name' => 'required',
            'Refrance_phone' => 'required',
            'Refrance_relation' => 'required',
            'Refrance_address' => 'required',
        ]);
    
        $employee->update($request->all());
    
        return redirect('employees')->with('success', 'Updated successfully!');
    } catch (DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid encrypted ID.');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Employee::find($id)->delete();
         
        return redirect('employees')
                        ->with('success','Deleted successfully');
    }
}
