<?php

namespace App\Http\Controllers\my_account;

use App\Http\Controllers\Controller;
use App\Models\SecurityQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $securityQuestions = [
        'What was your childhood nickname?', 
        'In what city did you meet your spouse/significant other?', 
        'What is the name of your favorite childhood friend?',
        'Where did you vacation last year?',
        'What are the last 5 digits of your driver\'s license number?',
    ];
        $pageTitle = 'Security';
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
       
        $profile = Admin::find($admin->id);
        $currentDate = now();
        return view('my_account.security',compact('pageTitle','securityQuestions','profile','currentDate'));
    }
    public function submitPasswordForm(Request $request)
    {
        // Check if the admin user is authenticated
        if (Auth::guard('admin')->check()) {
            $admin = Auth::guard('admin')->user(); // Get the authenticated admin

            // Validate the form inputs
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|string|min:8|confirmed',
            ]);

            // Verify the current password
            if (!Hash::check($request->input('current_password'), $admin->password)) {
                return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }

            // Hash the new password
            $newPasswordHash = Hash::make($request->input('new_password'));

            // Update the admin's password in the database
            $admin->password = $newPasswordHash;
            $admin->save();

            // Redirect with success message
            return redirect()->back()->with('success', 'Password changed successfully.');
        } else {
            // Handle the case where the admin is not authenticated
            return redirect()->back()->withErrors(['authentication' => 'You are not authenticated as an admin.']);
        }
    }

    public function submitSecurityForm(Request $request)
    {
        // Check if the admin user is authenticated
        if (Auth::guard('admin')->check()) {
            $admin = Auth::guard('admin')->user(); // Get the authenticated admin

            // Validate the form inputs for security questions
            $request->validate([
                'question1' => 'required',
                'answer1' => 'required',
                'question2' => 'required',
                'answer2' => 'required',
                'question3' => 'required',
                'answer3' => 'required',
                'date' => 'required|date',
            ]);

            // Find or create a security record for the admin
            $security = SecurityQuestion::updateOrCreate(
                ['admin_id' => $admin->id],
                [
                    'question1' => $request->input('question1'),
                    'answer1' => $request->input('answer1'),
                    'question2' => $request->input('question2'),
                    'answer2' => $request->input('answer2'),
                    'question3' => $request->input('question3'),
                    'answer3' => $request->input('answer3'),
                    'date' => $request->input('date'),
                ]
            );

            // Redirect with success message
            return redirect()->back()->with('success', 'Security information updated successfully.');
        } else {
            // Handle the case where the admin is not authenticated
            return redirect()->back()->withErrors(['authentication' => 'You are not authenticated as an admin.']);
        }
    }




}
