<?php

namespace App\Http\Controllers\my_account;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Company;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
    
        $profile = Admin::with('company')->find($admin->id);
    

        $pageTitle = 'My Profile';
        return view('my_account.profile', compact('pageTitle', 'profile'));
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
    
            $data = Admin::find($admin->id);
           $data->fname=$request->fname;
           $data->lname=$request->lname;
           $data->email=$request->email;
           $data->mobile=$request->mobile;
           $data->address=$request->address;
           $data->country=$request->country;
           $data->userpic=$request->userpic;
        //    $data->email=$request->email;


        if ($userpic = $request->file('userpic')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $userpic->getClientOriginalExtension();
            $userpic->move($destinationPath, $profileImage);
            $data['userpic'] = $profileImage;
        } else {
            unset($data['userpic']); // If no new logo is uploaded, remove the LogoPic from input
        }

        $data->save();

        return redirect('my_profile')->with('success', 'Update Profile successfully.');
     
    }

    /**
     * Display the specified resource.
     */
    // public function show(Profile $profile)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    public function edit()
    {
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin

        $profile = Admin::find($admin->id);
        $pageTitle = 'Edit Profile';
        return view('my_account.edit_profile',compact('pageTitle','profile'));
    }
 
  

}
