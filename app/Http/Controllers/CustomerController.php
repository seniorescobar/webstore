<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Auth;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'activate']);
    }

    public function index()
    {
        return redirect()->route('customer.profile');
    }

    public function profile()
    {
        $profile = Auth::user();

        return view('customer.profile', ['profile' => $profile]);
    }

    public function profileEdit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'home_address' => 'required|string',
            'phone_number' => 'required|string',
            'new_password' => 'nullable|string',
        ]);

        $id = Auth::id();

        $customer = Customer::find($id);
        $customer->email = $request->email;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->home_address = $request->home_address;
        $customer->phone_number = $request->phone_number;
        if (!empty($request->new_password)) {
            $customer->password = bcrypt($request->new_password);
        }
        $customer->save();

        return redirect()->route('customer.profile');
    }

    public function activate($activation_code)
    {
        $customer = Customer::where('activation_code', $activation_code)->firstOrFail();
        $customer->activated=false;
        $customer->activation_code=null;
        $customer->save();

        Auth::guard('customer')->login($customer);

        return redirect()->route('customer.profile');
    }
}
