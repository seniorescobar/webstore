<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\Customer;
use App\Item;
use App\Order;
use Auth;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:seller', ['except' => ['login', 'loginSubmit']]);
        $this->middleware('guest:seller', ['only' => ['login', 'loginSubmit']]);
    }

    public function login()
    {
        return view('seller.login');
    }

    public function loginSubmit(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('seller')->attempt(['email' => $request->email, 'password' => $request->password, 'activated' => true])) {
            return redirect()->intended('seller.profile');
        } else {
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
    }

    public function index()
    {
        return redirect()->route('seller.profile');
    }

    public function profile()
    {
        $profile = Auth::user();

        return view('seller.profile', ['profile' => $profile]);
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

    public function customers()
    {
        $customers = Customer::all();
        return view('seller.customer.index', ['customers' => $customers]);
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
        $customer->activated=true;
        $customer->activation_code=str_random(128);
        $customer->save();

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

    public function items()
    {
        $items = Item::all();
        return view('seller.item.index', ['items' => $items]);
    }

    public function itemAdd()
    {
        return view('seller.item.add');
    }

    public function itemAddSubmit(Request $request)
    {
        $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|integer',
        ]);

        $item = new Item;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->save();

        return redirect()->route('seller.profile');
    }

    public function itemEdit($id)
    {
        $item = Item::find($id);
        return view('seller.item.edit', ['item' => $item]);
    }

    public function itemEditSubmit(Request $request, $id)
    {
        $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|integer',
        'activated' => 'nullable',
        ]);
        
        $item = Item::find($id);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->activated = $request->activated ? 1 : 0;
        $item->save();

        return redirect()->route('seller.items');
    }

    public function orders()
    {
        $submittedOrders = Order::where('status_id', 'oddano')->get();
        $approvedOrders = Order::where('status_id', 'potrjeno')->get();

        return view('seller.order.index', ['submittedOrders' => $submittedOrders, 'approvedOrders' => $approvedOrders]);
    }

    public function orderShow($id)
    {
        $order = Order::findOrFail($id);

        $sum = 0;
        foreach ($order->orderedItems as $item) {
            $sum += ($item->item->price * $item->quantity);
        }

        return view('seller.order.show', ['order' => $order, 'sum' => $sum]);
    }

    public function orderApprove($id)
    {
        $order = Order::findOrFail($id);
        $order->status_id = 'potrjeno';
        $order->save();

        return redirect()->route('seller.orders');
    }

    public function orderCancel($id)
    {
        $order = Order::findOrFail($id);
        $order->status_id = 'preklicano';
        $order->save();

        return redirect()->route('seller.orders');
    }
}
