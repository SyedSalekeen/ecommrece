<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class CheckoutController extends Controller
{
   public function showCheckout(Request $request){
    $catgeories = Category::where('status',"Active")->get();
    $newProducts = Product::orderBy('created_at','desc')->take(5)->get();
    $allProducts = Product::where('status','Active')->get();


    $products = Cart::where('user_id', auth()->id())
     ->with('getProducts')
     ->get();
    $subTotal = $request->subtotal;
    // dd($products);
    return view('Frontend.checkout',get_defined_vars());
   }
}
