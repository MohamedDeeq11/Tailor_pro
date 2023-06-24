<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Plan;
use Illuminate\Support\Facades\Hash;
use App\Mail\verifyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;


class AuthController extends Controller
{
    protected $maxAttempts = 5; 
    protected $decayMinutes = 1;
    
    public function loginpage()
    {
        if(!empty(Auth::check()))
        {
         
            return redirect('/dashboard');
         
        }
        return view('auth.login');
    }
  
    public function postlogin( Request $request){
     
        if($request->isMethod('post')){
            $data=$request->all();
           

            $rules=[
                'email'=>'required|email|max:255',
                'password'=>'required|max:30'
            ];
            $message=[
             'email.required'=>"email is required",
             'email.email'=>"valid email is required",
             'password.required'=>"password is required",
            ];
            $this->validate($request,$rules,$message);
            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])){
                return redirect("/dashboard");
            }
            else
            return redirect()->back()->with('error','please correct email or password');
        }
           return view('auth.login');
        }
        public function dashboard()
        {
         
          return view('admin.dashboard');
        }

   
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    public function forgetpage()
    {
        return view('auth.forget-password');
    }
    public function showRegistrationForm()
    {
        return view('auth.registration');
    }
    public function register(Request $request)
    {

        $validatedData =$request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'email' =>  'required|string|email|max:255|unique:Admins',
            'password' => 'required|string|min:8|confirmed',
            '_token' => 'required|string'
        ]);
        session(['registration_data' => $validatedData]);
     
        return redirect('/verified');
        // return redirect()->back()->with('success','pleas verify your email ');
    }
   
    public function verifiedpage()
    {
        return view('auth.verified');
    }
    public function verifyEmail(Request $request)
    {
        // Retrieve the registration data from the session
        $registrationData = session('registration_data');

        // Save the registration data to the database
        $admin = Admin::create([
            'fname' => $registrationData->input('fname'),
            'lname' => $registrationData->input('lname'),
            'mobile' => $registrationData->input('mobile'),
            'email' => $registrationData->input('email'),
            'password' => Hash::make($registrationData->input('password')),
            'remember_token' =>$registrationData->input('_token'),
        ]);

        // Clear the registration data from the session
        $request->session()->forget('registration_data');

        // Show a success message or redirect to a success page
        return redirect()->url('/plans')->with('success', 'Registration successful!');
    }

    public function planspage()
    {
        return view('auth.plans');
    }
    // public function savePlans(Request $request)
    // {
    //     // Retrieve the prices from the request
    //     $basicPrice = $request->input('basic_price');
    //     $standardPrice = $request->input('standard_price');
    //     $premiumPrice = $request->input('premium_price');

    //     // Save the prices to the database
    //     $plan = new Plan;
    //     $plan->name = 'Basic';
    //     $plan->price = $basicPrice;
    //     $plan->save();

    //     $plan = new Plan;
    //     $plan->name = 'Standard';
    //     $plan->price = $standardPrice;
    //     $plan->save();

    //     $plan = new Plan;
    //     $plan->name = 'Premium';
    //     $plan->price = $premiumPrice;
    //     $plan->save();

    //     return redirect()->back()->with('success', 'Prices saved successfully!');
    // }
    public function Checkoutpage()
    {
        return view('auth.Checkout');
    }
}
