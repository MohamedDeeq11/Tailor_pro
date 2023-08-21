<?php

namespace App\Http\Controllers\private_account;

use App\Http\Controllers\Controller;
use App\Models\Private_Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Company;

class Private_ProfileController extends Controller
{

  public function index()
    {
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
    
        $profile = Admin::with('company')->find($admin->id);
    

        $pageTitle = 'My Profile';
        return view('my_account_private.profile', compact('pageTitle', 'profile'));
    }


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

        return redirect('private_my_profile')->with('success', 'Update Profile successfully.');
     
    }


    public function edit()
    {
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin

        $profile = Admin::find($admin->id);
        $pageTitle = 'Edit Profile';
        return view('my_account_private.edit_profile',compact('pageTitle','profile'));
    }



}
