<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $pageTitle = 'Client Details';
        $clients=Client::latest()->paginate(5);
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('client.client.index',compact('clients','pageTitle','profile'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        $pageTitle = 'Client Details';
        return view('client.client.create',compact('pageTitle','profile'));
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
            'Fullname' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:20',
            'Registered_date' => 'required',
            'address' => 'required|string|max:255',
        ]);

        Client::create($request->all());

        return redirect('clients')->with('success', 'Created successfully!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($encrypted_id): View
    {
        try {
            $id = decrypt($encrypted_id); 
    
            $client = Client::find($id);
        $pageTitle = 'Client Details';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('client.client.show',compact('client','pageTitle','profile'));
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
    
            $client = Client::find($id);
        $pageTitle = 'Client Details';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('client.client.edit',compact('client','pageTitle','profile'));
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
    
            $client = Client::find($id);
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
            'Fullname' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:20',
            'Registered_date' => 'required',
            'address' => 'required|string|max:255',
        ]);

        $client->update($request->all());

        return redirect('clients')->with('success', 'Updated successfully!');
    } catch (DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid encrypted ID.');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Client::find($id)->delete();
         
        return redirect('clients')
                        ->with('success','Deleted successfully');
    }
}
