<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use App\Models\CheckoutProduct;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class CheckoutController extends Controller
{
   public function showCheckout(Request $request){
    $catgeories = Category::where('status',"Active")->get();
    $newProducts = Product::orderBy('created_at','desc')->take(5)->get();
    $allProducts = Product::where('status','Active')->get();


    $products = Cart::where('user_id', auth()->id())->where('status','1')
     ->with('getProducts')
     ->get();
    //  dd($products);
    $subTotal = $request->subtotal;
    // dd($products);
    return view('Frontend.checkout',get_defined_vars());
   }

   public function checkout(Request $request) {
    // dd($request->all());

    $store = new Checkout();
    $store->first_name = $request->first_name;
    $store->last_name = $request->last_name;
    $store->email = $request->email;
    $store->address = $request->address;
    $store->city = $request->city;
    $store->country = $request->country;
    $store->zip_code = $request->zip_code;
    $store->tel = $request->tel;
    $store->amount = $request->amount;
    $store->save();
    $count = 0;
    foreach($request->product_id as $item) {
        $storeIds = new CheckoutProduct();
        $storeIds->user_id = auth()->id();
        $storeIds->product_id = $item;
        $storeIds->cart_id = $request->cart_id[$count];
        $storeIds->checkout_id = $store->id;
        $storeIds->save();
        $count ++;
    }
    foreach ($request->cart_id as $item2) {
        $find = Cart::find($item2);
        $find->status = 0;
        $find->save();
    }

    Alert::success('Success', 'Your order will be delivered within 4 to 5 working days');
    return redirect()->route('website');
   }
}
