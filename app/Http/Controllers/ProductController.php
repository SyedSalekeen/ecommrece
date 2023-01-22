<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;



class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('Products.index',get_defined_vars());
    }

    public function create() {
        $categories = Category::where('status','Active')->get();
        return view('Products.create',get_defined_vars());
    }
    public function store(Request $request) {

        $request->validate([
            'product_name' => 'required',
            'product_category' => 'required',
            'product_status' => 'required',
            'product_description' => 'required',
            'product_quantity' => 'required',
            'product_price' => 'required',
            'product_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $store = new Product();
        $store->name = $request->product_name;
        $store->category_id = $request->product_category;
        $store->status = $request->product_status;
        $store->description = $request->product_description;
        $store->quantity = $request->product_quantity;
        $store->price = $request->product_price;
        if($request->hasFile('product_thumbnail')) {
            $imageName = time().'.'.$request->product_thumbnail->extension();
            $request->product_thumbnail->move(public_path('product_thumbnail'), $imageName);
            $store->thumbnail = $imageName;
        }
        $store->save();
        if($request->hasFile('product_image')) {
            foreach ($request->product_image as $image) {
                $storeImage = new ProductImage();
                $imageName = time().'.'.$image->extension();
                $image->move(public_path('product_image'), $imageName);
                $storeImage->product_id = $store->id;
                $storeImage->image = $imageName;
                $storeImage->save();
            }
        }

        return redirect()->route('products')->with('success','Product added sucessfully');

    }

    public function edit($id) {
        $product = Product::find($id);
        $product_image = ProductImage::where('product_id',$id)->get();
        $categories = Category::where('status','Active')->get();
        return view('Products.edit',get_defined_vars());
    }

    public function update(Request $request, $id) {
       $request->validate([
            'product_name' => 'required',
            'product_category' => 'required',
            'product_status' => 'required',
            'product_description' => 'required',
            'product_quantity' => 'required',
            'product_price' => 'required',

        ]);

        $update =  Product::find($id);
        $update->name = $request->product_name;
        $update->category_id = $request->product_category;
        $update->status = $request->product_status;
        $update->description = $request->product_description;
        $update->quantity = $request->product_quantity;
        $update->price = $request->product_price;
        if($request->hasFile('product_thumbnail')) {
            unlink(public_path($update->thumbnail));
            $imageName = time().'.'.$request->product_thumbnail->extension();
            $request->product_thumbnail->move(public_path('product_thumbnail'), $imageName);
            $update->thumbnail = $imageName;
        }
        $update->save();
        if($request->hasFile('product_image')) {
            ProductImage::where('product_id',$id)->delete();
            foreach ($request->product_image as $image) {
                $storeImage = new ProductImage();
                $imageName = time().'.'.$image->extension();
                $image->move(public_path('product_image'), $imageName);
                $storeImage->product_id = $update->id;
                $storeImage->image = $imageName;
                $storeImage->save();
            }
        }

        return redirect()->route('products')->with('success','Product updated sucessfully');

    }
}
