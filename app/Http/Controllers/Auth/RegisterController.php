<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerSubmit(Request $request)
    {
	$request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:customers',
            'password' => 'required|string|min:1',
    	]);

        event(new Registered($user = $this->create($request->all())));

	Auth::guard()->login($user);

        return redirect()->route('customer.profile');
    }

    protected function create(array $data)
    {
        return Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
