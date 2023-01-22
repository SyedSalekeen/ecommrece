<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index(){
        $catgeories = Category::where('status',"Active")->get();
        $newProducts = Product::orderBy('created_at','desc')->take(5)->get();
        // dd($newProducts);
        return view('Frontend.index',get_defined_vars());
    }
}
