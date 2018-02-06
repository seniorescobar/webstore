<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrator;
use Auth;

class AdministratorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:administrator');
    }

    public function index() {
    	return redirect()->route('administrator.profile');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('admin');
    }

    public function profileEdit(Request $request) {
   	$request->validate([
	    'email' => 'required|email',
	    'first_name' => 'required|string',
	    'last_name' => 'required|string',
	    'password' => 'nullable|string',
    ]);

	$id = Auth::id();

	$administrator = Administrator::find($id);
	$administrator->email = $request->email;
	$administrator->first_name = $request->first_name;
	$administrator->last_name = $request->last_name;
	if (!empty($request->new_password)) {
		$administrator->password = bcrypt($request->new_password);
	}
	$administrator->save();

	return redirect()->route('administrator.profile');

    }
}
