<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class BackupController extends Controller
{
    public function index(){
        $pageTitle = 'Backup';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        return view('setting.backup',compact('pageTitle','profile'));
    }
    public function create()
    {
        Artisan::call('database:backup'); // Call the artisan command to perform the backup
        return redirect('/backup')->with('success', 'Database backup has been created successfully.');
    }
}