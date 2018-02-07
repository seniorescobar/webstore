<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrator;
use App\Seller;
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

    public function index()
    {
        return redirect()->route('administrator.profile');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $profile = Auth::user();
        $sellers = Seller::all();

        return view('administrator.profile', ['profile' => $profile, 'sellers' => $sellers]);
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

    public function sellerEdit($id)
    {
        $seller = Seller::find($id);
        return view('administrator.seller.edit', ['seller' => $seller]);
    }

    public function sellerEditSubmit(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'new_password' => 'nullable|string',
            'activated' => 'nullable',
        ]);
        
        $seller = Seller::find($id);
        $seller->email = $request->email;
        $seller->first_name = $request->first_name;
        $seller->last_name = $request->last_name;
        if (!empty($request->new_password)) {
            $seller->password = bcrypt($request->new_password);
        }
        $seller->activated = $request->activated ? 1 : 0;
        $seller->save();

        return redirect()->route('administrator.seller.edit', ['id' => $seller->email]);
    }

    public function sellerAdd()
    {
        return view('administrator.seller.add');
    }

    public function sellerAddSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'password' => 'required|string',
        ]);

        $seller = new Seller;
        $seller->email = $request->email;
        $seller->first_name = $request->first_name;
        $seller->last_name = $request->last_name;
        $seller->password = bcrypt($request->password);
        $seller->activated=true; // comment this line after you run the migration
        $seller->save();
        
        return redirect()->route('administrator.seller.add');
    }
}
