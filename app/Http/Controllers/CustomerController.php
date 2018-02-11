<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Verification;
use App\Customer;
use App\Order;
use Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('https');
        $this->middleware('auth:customer', ['except' => ['register', 'registerSubmit', 'login', 'loginSubmit', 'activate']]);
        $this->middleware('guest:customer', ['only' => ['register', 'registerSubmit', 'login', 'loginSubmit', 'activate']]);
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
        $customer->password = Hash::make($request->password);
        $customer->activated=false;
        $customer->activation_code=str_random(128);
        $customer->save();

        Mail::to($customer->email)->send(new Verification(route('customer.activate', $customer->activation_code)));
        
        return redirect()->route('customer.profile');
    }

    public function login()
    {
        return view('customer.login');
    }

    public function loginSubmit(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password, 'activated' => true])) {
            return redirect()->intended(route('customer.profile'));
        } else {
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
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

    public function orders()
    {
        $customerEmail = Auth::id();
        $orders = Order::where('customer_email', $customerEmail)->get();

        return view('customer.order.index', ['orders' => $orders]);
    }

    public function orderShow($id)
    {
        $orderedItems = Order::findOrFail($id)->orderedItems;

        $sum = 0;
        foreach ($orderedItems as $item) {
            $sum += ($item->item->price * $item->quantity);
        }

        return view('customer.orders.show', ['orderedItems' => $orderedItems, 'sum' => $sum]);
    }
}
