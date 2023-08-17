<?php

namespace App\Http\Controllers\finance;

use App\Http\Controllers\Controller;
use App\Models\Profit;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Contracts\Encryption\DecryptException;
class ProfitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $pageTitle = 'Profit';
        $profits=Profit::latest()->paginate(5);
        return view('Finance.Profit.index',compact('profits','pageTitle'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageTitle = 'Profit';
        return view('Finance.Profit.create',compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
            public function store(Request $request): RedirectResponse
        {
            $request->validate([
                'profit_name' => 'required',
                'total' => 'required',
            ]);
            
            Profit::create($request->all());
            
            return redirect('/profits')
                            ->with('success','Created successfully.');
        }
    /**
     * Display the specified resource.
     */
    public function show($encrypted_id): View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $profit = Profit::find($id);
        $pageTitle = 'Profit';
        return view('Finance.Profit.show',compact('profit','pageTitle'));
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
    
            $profit = Profit::find($id);
        $pageTitle = 'Profit';
        return view('Finance.Profit.edit',compact('profit','pageTitle'));
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
    
            $profit = Profit::find($id);
        $request->validate([
            'profit_name' => 'required',
            'total' => 'required',
        ]);
        
        $profit->update($request->all());
        
        return redirect('/profits')
                        ->with('success','Updated successfully');
                    } catch (DecryptException $e) {
                        return redirect()->back()->with('error', 'Invalid encrypted ID.');
                    }
                }

    public function destroy($id): RedirectResponse
    {
        Profit::find($id)->delete();
         
        return redirect('profits')
                        ->with('success','Deleted successfully');
    }

}
