<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    // If admin click product categories on the left side bar than this code execute
    public function index() {
        $catgeory = Category::all();
        return view('category.index',get_defined_vars());
    }

    // If admin click add category button than this code execute
    public function create() {
        return view('category.create');
    }

    // If user create new category and click on the save button than this code execute, actually this code store category inforation to the database
    public function store(Request $request) {
        $request->validate([
            'category_name' => 'required',
            'category_status' => 'required',
            'category_description' => 'required',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $store = new Category();
        $store->name = $request->category_name;
        $store->status = $request->category_status;
        $store->description = $request->category_description;
        if($request->hasFile('category_image')) {
            $imageName = time().'.'.$request->category_image->extension();
            $request->category_image->move(public_path('category_image'), $imageName);
            $store->image = $imageName;
        }
        $store->save();

        return redirect()->route('categories')->with('success','Category added sucessfully');

    }

    // if user click edit on specific category than this code will be execute
    public function edit($id) {
        $category = Category::find($id);
        return view('category.edit',get_defined_vars());
    }


    // if user update the category details than this code will be execute
    public function update(Request $request, $id) {
        $request->validate([
            'category_name' => 'required',
            'category_status' => 'required',
            'category_description' => 'required',
        ]);

        $update = Category::find($id);
        $update->name = $request->category_name;
        $update->status = $request->category_status;
        $update->description = $request->category_description;
        if($request->hasFile('category_image')) {
            unlink(public_path($category->image));
            $imageName = time().'.'.$request->category_image->extension();
            $request->category_image->move(public_path('category_image'), $imageName);
            $update->image = $imageName;
        }
        $update->save();
        return redirect()->route('categories')->with('success','Category updated sucessfully');
    }

    // if user delete any category than this code will be execite
    public function delete($id) {
        Category::find($id)->delete();
        return redirect()->route('categories')->with('success','Category deleted sucessfully');
    }
}
