<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin');
    }
}
