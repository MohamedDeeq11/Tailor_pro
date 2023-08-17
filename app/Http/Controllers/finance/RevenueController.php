<?php

namespace App\Http\Controllers\finance;

use App\Http\Controllers\Controller;
use App\Models\Revenue;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Contracts\Encryption\DecryptException;
class RevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $pageTitle = 'Revenue';
        $revenues=Revenue::latest()->paginate(5);
        return view('Finance.Revenue.index',compact('revenues','pageTitle'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageTitle = 'Revenue';
        return view('Finance.Revenue.create',compact('pageTitle'));
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
        
        Revenue::create($request->all());
        
        return redirect('/revenues')
                        ->with('success','Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($encrypted_id):View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $revenue = Revenue::find($id);
        $pageTitle = 'Revenue';
        return view('Finance.Revenue.show',compact('revenue','pageTitle'));
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
    
            $revenue = Revenue::find($id);
        $pageTitle = 'Revenue';
        return view('Finance.Revenue.edit',compact('revenue','pageTitle'));
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
    
            $revenue = Revenue::find($id);
        $request->validate([
            'date' => 'required',
            'product' => 'required',
            'price' => 'required',
        ]);
        
        $revenue->update($request->all());
        
        return redirect('/revenues')
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
        Revenue::find($id)->delete();
         
        return redirect('revenues')
                        ->with('success','Deleted successfully');
    }
}
