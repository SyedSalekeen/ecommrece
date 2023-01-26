<?php

namespace App\Http\Controllers;
use App\Models\Checkout;
use App\Models\CheckoutProduct;


use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $order = Checkout::all();
        return view('order.view',get_defined_vars());
    }

    public function detail_order($id) {
        $checkout_detals1 = Checkout::find($id);

        $checkout_detals2 = CheckoutProduct::where('checkout_id',$id)->with('getProducts')->get();
        dd($checkout_detals2);
        return view('order.detail',get_defined_vars());

    }
}
