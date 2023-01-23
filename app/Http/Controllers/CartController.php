<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function remove_item_from_cart(Request $request) {
        Cart::find($request->id)->delete();
        return ["status" => "true"];
    }
}
