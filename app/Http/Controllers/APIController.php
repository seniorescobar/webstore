<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ApiController extends Controller
{
    public function __construct()
    {
    }

    public function items()
    {
        return Item::where('activated', true)->get(['id', 'name'])->toJson();
    }

    public function item($id)
    {
        return Item::find($id)->toJson();
    }
}
