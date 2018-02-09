<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\Customer;
use App\Order;
use App\OrderedItems;
use Auth;

class ShoppingCartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    public function index()
    {
        $shoppingCartItems = ShoppingCart::all();

        return view('customer.shopping-cart.index', ['shoppingCartItems' => $shoppingCartItems]);
    }

    public function add($item_id)
    {
        $customerEmail = Auth::id();

        $shoppingCart = ShoppingCart::firstOrCreate(['customer_email' => $customerEmail, 'item_id' => $item_id], ['quantity' => 0 ]);
        $shoppingCart->increment('quantity');
        $shoppingCart->save();
        
        return redirect()->back();
    }

    public function edit($item_id)
    {
        $customerEmail = Auth::id();
        
        $shoppingCart = ShoppingCart::where(['customer_email' => $customerEmail, 'item_id' => $item_id])->firstOrFail();

        return view('customer.shopping-cart.edit', ['item' => $shoppingCart]);
    }

    public function editSubmit(Request $request, $item_id)
    {
        $request->validate([
            'quantity' => 'required|integer',
        ]);

        $customerEmail = Auth::id();

        $shoppingCart = ShoppingCart::where(['customer_email' => $customerEmail, 'item_id' => $item_id])->firstOrFail();
        $shoppingCart->quantity = $request->quantity;
        $shoppingCart->save();
        
        return redirect()->route('shopping-cart.index');
    }

    public function remove($item_id)
    {
        $customerEmail = Auth::id();

        ShoppingCart::where(['customer_email' => $customerEmail, 'item_id' => $item_id])->delete();

        return redirect()->route('shopping-cart.index');
    }

    public function order()
    {
        $customerEmail = Auth::id();

        $shoppingCartItems = ShoppingCart::where(['customer_email' => $customerEmail])->get();

        $sum = 0;
        foreach ($shoppingCartItems as $item) {
            $sum += ($item->item->price * $item->quantity);
        }
        
        return view('customer.shopping-cart.order', ['shoppingCartItems' => $shoppingCartItems, 'sum' => $sum]);
    }

    public function orderSubmit()
    {
        $customerEmail = Auth::id();

        $order = new Order;
        $order->customer_email = $customerEmail;
        $order->status_id = 'oddano';
        $order->save();

        $shoppingCartItems = ShoppingCart::where(['customer_email' => $customerEmail])->get();
        foreach ($shoppingCartItems as $item) {
            $orderedItems = new OrderedItems;
            $orderedItems->order_id = $order->id;
            $orderedItems->item_id = $item->item_id;
            $orderedItems->quantity = $item->quantity;
            $orderedItems->save();
        }

        ShoppingCart::where(['customer_email' => $customerEmail])->delete();

        return redirect()->route('customer.profile');
    }
}
