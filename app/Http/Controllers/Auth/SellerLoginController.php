<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SellerLoginController extends Controller {
	public function __construct() {
		$this->middleware('guest:seller');
	}

	public function login() {
		return view('auth.seller-login');
	}

	public function loginSubmit(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|string',
		]);

		if(Auth::guard('seller')->attempt(['email' => $request->email, 'password' => $request->password])) {
			return redirect()->intended('seller.profile'); 
		} else {
			return redirect()->back()->withInput($request->only('email', 'remember'));		
		}


	}
}
