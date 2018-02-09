<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Mail\Verification;
use Auth;

class CustomerRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    public function register()
    {
        return view('customer.register');
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'home_address' => 'required|string',
            'phone_number' => 'required|string',
            'password' => 'required|string',
            'captcha' => 'required|captcha',
        ]);

        $customer = new Customer;
        $customer->email = $request->email;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->home_address = $request->home_address;
        $customer->phone_number = $request->phone_number;
        $customer->password = bcrypt($request->password);
        $customer->activated=false;
        $customer->activation_code=str_random(128);
        $customer->save();

        Mail::to($customer->email)->send(new Verification(route('customer.activate', $customer->activation_code)));
        
        return redirect()->route('customer.profile');
    }
}
