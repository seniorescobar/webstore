<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\Customer;
use Auth;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    public function index()
    {
        return redirect()->route('seller.profile');
    }

    public function profile()
    {
        $profile = Auth::user();
        $customers = Customer::all();

        return view('seller.profile', ['profile' => $profile, 'customers' => $customers]);
    }
    
    public function profileEdit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'new_password' => 'nullable|string',
        ]);

        $id = Auth::id();

        $seller = Seller::find($id);
        $seller->email = $request->email;
        $seller->first_name = $request->first_name;
        $seller->last_name = $request->last_name;
        if (!empty($request->new_password)) {
            $seller->password = bcrypt($request->new_password);
        }
        $seller->save();

        return redirect()->route('seller.profile');
    }
    public function customerEdit($id)
    {
        $customer = Customer::find($id);
        return view('seller.customer.edit', ['customer' => $customer]);
    }

    public function customerEditSubmit(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'home_address' => 'required|string',
            'phone_number' => 'required|string',
            'new_password' => 'nullable|string',
            'activated' => 'nullable',
        ]);
        
        $customer = Customer::find($id);
        $customer->email = $request->email;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->home_address = $request->home_address;
        $customer->phone_number = $request->phone_number;
        if (!empty($request->new_password)) {
            $customer->password = bcrypt($request->new_password);
        }
        $customer->activated = $request->activated ? 1 : 0;
        $customer->save();

        return redirect()->route('seller.profile');
    }

    public function customerAdd()
    {
        return view('seller.customer.add');
    }

    public function customerAddSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'home_address' => 'required|string',
            'phone_number' => 'required|string',
            'password' => 'required|string',
        ]);

        $customer = new Customer;
        $customer->email = $request->email;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->home_address = $request->home_address;
        $customer->phone_number = $request->phone_number;
        $customer->password = bcrypt($request->password);
        $customer->activated=false; // comment this line after you run the migration
        $customer->activation_code=str_random(128);
        $customer->save();

        //send email
        
        return redirect()->route('seller.profile');
    }
}
