<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index() {
		return redirect()->route('customer.profile');
	}

    public function profile()
    {
        return view('admin');
    }
}
