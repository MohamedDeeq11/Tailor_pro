<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    public function index(){
        $pageTitle = 'Backup';
        return view('setting.backup',compact('pageTitle'));
    }
    public function create()
    {
        Artisan::call('database:backup'); // Call the artisan command to perform the backup
        return redirect('/backup')->with('success', 'Database backup has been created successfully.');
    }
}