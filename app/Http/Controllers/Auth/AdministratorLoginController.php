<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdministratorLoginController extends Controller {
	public function __construct() {
		$this->middleware('guest:administrator');
	}

	public function login() {
		return view('auth.admin-login');
	}

	public function loginSubmit(Request $request) {
		$this->validate($request, [
			'email' => 'required|string|email',
			'password' => 'required|string',
		]);

		if(Auth::guard('administrator')->attempt(['email' => $request->email, 'password' => $request->password])) {
			return redirect()->intended('administrator.profile'); 
		} else {
			return redirect()->back()->withInput($request->only('email'));		
		}
	}
}
