<?php

namespace App\Http\Controllers\finance;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    { 
        $pageTitle = 'Expenses';
        $expenses=Expense::latest()->paginate(5);
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('Finance.Expenses.index',compact('expenses','pageTitle','profile'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageTitle = 'Expenses';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('Finance.Expenses.create',compact('pageTitle','profile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
     public function store(Request $request): RedirectResponse
     {
         $request->validate([
             'date' => 'required',
             'category' => 'required',
             'amount' => 'required',
         ]);
 
         Expense::create($request->all());
 
         return redirect('expenses')
             ->with('success', 'Created successfully.');
     }
 

    /**
     * Display the specified resource.
     */
    public function show($encrypted_id): View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $expense = Expense::find($id);
        $pageTitle = 'Expenses';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('Finance.Expenses.show',compact('expense','pageTitle','profile'));
    } catch (DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid encrypted ID.');
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $encrypted_id) :View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $expense = Expense::find($id);
            $pageTitle = 'Expenses';
            $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
            $profile = Admin::find($admin->id);
           return view('Finance.Expenses.edit',compact('expense','pageTitle','profile'));
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
    
            $expense = Expense::find($id);
        $request->validate([
            'date' => 'required',
            'category' => 'required',
            'amount' => 'required',
        ]);

        $expense->update($request->all());

        return redirect('/expenses')
            ->with('success', 'Updated successfully');
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', 'Invalid encrypted ID.');
        }
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Expense::find($id)->delete();
        return redirect('expenses')
            ->with('success', 'Deleted successfully');
    }
}
