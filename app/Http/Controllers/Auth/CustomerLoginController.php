<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CustomerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    public function login()
    {
        return view('auth.customer-login');
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
}
