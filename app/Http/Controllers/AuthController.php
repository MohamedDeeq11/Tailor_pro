<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Plan;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Hash;
use App\Mail\verifyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use App\Models\Expense;
use App\Models\Revenue;
use App\Models\Order_Detail;
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
                return redirect("/private");
            }
            else
            return redirect()->back()->with('error','please correct email or password');
        }
           return view('auth.login');
        }
        public function dashboard()
        {
            $expensesCount = Expense::count();
            $revenuesCount = Revenue::count();
            $OrderCount = Order_Detail::count();
            $pageTitle = 'Dashboard';
          return view('admin.dashboard' ,compact('expensesCount', 'revenuesCount','OrderCount','pageTitle'));
        }
        public function private()
        { 
            $pageTitle = 'Private';
            return view('private.private', compact('pageTitle'));
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
           $email = session('registration_data.email');
            return view('auth.verified',['email' => $email]);
    }
    public function verifyEmail(Request $request)
    {
        // Retrieve the registration data from the session
        
        $registrationData = session('registration_data');

        // Save the registration data to the database
       
        $admin = Admin::create(
            [
            'fname' => $registrationData['fname'],
            'lname' => $registrationData['lname'],
            'mobile' => $registrationData['mobile'],
            'email' => $registrationData['email'],
            'password' => Hash::make($registrationData['password']),
            'remember_token' =>$registrationData['_token'],
            'status' => 'verified',
        ]);
        $remember_token = Str::random(64);
        // Clear the registration data from the session
        Mail::send('emails.verify-email', ['_token' => $remember_token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });
        $request->session()->forget('registration_data');
        
        // Show a success message or redirect to a success page
        return redirect('/account/verify/{token}');
    }

    public function verifyAccount($remember_token): RedirectResponse
    {
        $admin = Admin::where('remember_token', $remember_token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($admin) ){
      
              
            if(!$admin->is_email_verified) {
                $admin->is_email_verified = 1;
                $admin->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
  
      return redirect('/plans')->with('message', $message);
    }

    public function planspage()
    {
        $plans=Plan::all();
        return view('auth.plans',compact('plans'));
    }
   
    public function addPlantoCart($id)
    {
        $plan = Plan::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $plan->name,
                "quantity" => 1,
                "price" => $plan->price,
                "description" => $plan->description
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Plan has been added to cart!');
    }
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully Removed.');
        }
    }
    public function cart()
    {
        return view('auth.cart');
    }

    public function Checkoutpage()
    {
        return view('auth.Checkout');
    }
    public function placeorder(Request $request)
    {
        // Create a new order instance and fill the order details
        $order = new Order();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->mobile = $request->input('mobile');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->country = $request->input('country');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->pincode = $request->input('pincode');
        $order->tracking_no = 'huud' . rand(111, 999);
        $order->save();
    
        // Get the cart items for the authenticated user
        $cart = session()->get('cart', []);
        foreach ($cart as $item) {
            // Assuming the 'plan_id' and 'quantity' are keys in the session cart data
            // Modify them accordingly based on how you store items in the cart
            $plan_id = $item['plan_id'];
            $quantity = $item['quantity'];
    
            // Create order item for each cart item
            OrderItem::create([
                'order_id' => $order->id,
                'plan_id' => $plan_id,
                'qty' => $quantity,
                'price' => 0, // You should calculate the price based on the plan or any other criteria
            ]);
        }
    
        // Update admin information if applicable
        if (Auth::guard('admin')->check()) {
            $admin = Admin::find(Auth::id());
            if ($admin && $admin->address1 === null) {
            $admin=Admin::where('id',Auth::id());
            $admin->fname=$request->input('fname');
            $admin->fname=$request->input('lname');
            $admin->email=$request->input('email');
            $admin->mobile=$request->input('mobile');
            $admin->address1=$request->input('address1');
            $admin->address2=$request->input('address2');
            $admin->country=$request->input('country');
            $admin->city=$request->input('city');
            $admin->state=$request->input('state');
            $admin->pincode=$request->input('pincode');
            $admin->update();
          }
        }
           return redirect('login')->with('status',"order placed successfully");
    }

}
