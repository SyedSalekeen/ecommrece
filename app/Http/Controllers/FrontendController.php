<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ProductImage;
use App\Models\Review;
use App\Models\Wishlet;
use App\Models\Feedback;
use RealRashid\SweetAlert\Facades\Alert;


class FrontendController extends Controller
{
    public function index(){
        $catgeories = Category::where('status',"Active")->get();
        $newProducts = Product::orderBy('created_at','desc')->take(5)->get();
        $allProducts = Product::where('status','Active')->get();

        // dd($newProducts);
        return view('Frontend.index',get_defined_vars());
    }

    public function search(Request $request) {

        $catgeories = Category::where('status',"Active")->get();
        $newProducts = Product::orderBy('created_at','desc')->take(5)->get();
        $allProducts = Product::where('status','Active')->get();
        $serchProduct = Product::where('name', 'like', '%' . $request->serach . '%')->get();
        return view('Frontend.search',get_defined_vars());

    }
    public function catgeory($id) {
        // dd($id);
        $catgeories = Category::where('status',"Active")->get();
        $newProducts = Product::orderBy('created_at','desc')->take(5)->get();

        $category = Category::find($id);
        $getProducts = Product::where('category_id',$id)->get();
        return view('Frontend.category-inner',Get_defined_vars());
    }

    public function add_to_cart($id) {
        // dd($id);
        if(auth()->user()) {
            // dd("sacascas");
            $cart = new Cart();
            $cart->user_id = auth()->id();
            $cart->product_id = $id;
            $cart->save();
            Alert::success('Success', 'Product added into the cart');
            return redirect()->back();
        } else {
            Alert::info('Info', 'Please login first');
            return redirect()->route('login_user');
        }
    }


    public function add_to_wishlet($id) {
        if(auth()->user()) {
            // dd("sacascas");
            $store = new Wishlet();
            $store->user_id = auth()->id();
            $store->product_id = $id;
            $store->save();
            Alert::success('Success', 'Product added into the wishlet');
            return redirect()->back();
        } else {
            Alert::info('Info', 'Please login first');
            return redirect()->route('login_user');
        }
    }

    public function remove_item_from_wishlet(Request $request) {
        Wishlet::find($request->id)->delete();
        return ["status" => "true"];
    }
    public function product_inner($id) {
        $reviews = Review::where('product_id',$id)->with('user')->get();

        $product = Product::find($id);
        $product_images = ProductImage::where('product_id',$id)->get();
        return view('Frontend.product-inner',get_defined_vars());
    }

    public function submit_review(Request $request) {
        $store = new Review();
        $store->user_id = auth()->id();
        $store->product_id = $request->product_id;
        $store->review = $request->comment;
        $store->save();
        Alert::success('Success', 'Review has been added');
        return redirect()->back();

    }

    public function feedback(Request $request) {
        $store = new Feedback();
        $store->feedback = $request->feedback;
        $store->save();
        Alert::success('Success', 'Your feedback has been sent to the admin');
        return redirect()->back();
    }
}
