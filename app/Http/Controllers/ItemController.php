<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Rating;
use Auth;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer', ['only' => 'rate']);
    }

    public function index($id)
    {
        $item = Item::findOrFail($id);
        return view('item', ['item' => $item]);
    }

    public function rate($id, $rating)
    {
        $customer = Auth::user();

        $ratingModel = Rating::firstOrNew(['customer_email' => $customer->email, 'item_id' => $id]);
        $ratingModel->rating = $rating;
        $ratingModel->save();

        return response()->json([
            'avgRating' => Item::find($id)->ratings->avg('rating'),
        ]);
    }
}
