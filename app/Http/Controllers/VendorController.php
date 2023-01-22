<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;


class VendorController extends Controller
{
    //
    public function index(){


        return view('vendor.index',get_defined_vars());
    }

    public function create(){
        return view('vendor.craete');
    }

    // public function store(Request $request){
    //     $request->validate([
    //         'vendor_type' => 'required',
    //     ]);

    //     $store = new Vendor();
    //     $store->first_name = $request->first_name;
    //     $store->last_name = $request->last_name;
    //     $store->contact_number = $request->contact_number;
    //     $store->vendor_description = $request->vendor_description;
    //     $store->vendor_type = $request->vendor_type;

    //     $store->save();
    //     return redirect()->route('vendor')->with('success', "Vendor Created Successfully");
    // }

    public function edit($id){

        // return view('vendor.edit', get_defined_vars());

    }

    // public function update(Request $request, $id) {
    //     $request->validate([
    //         'vendor_type' => 'required',
    //     ]);

    //     $vendor = Vendor::find($id);
    //     $vendor->first_name = $request->first_name;
    //     $vendor->last_name = $request->last_name;
    //     $vendor->contact_number = $request->contact_number;
    //     $vendor->vendor_description = $request->vendor_description;
    //     $vendor->vendor_type = $request->vendor_type;
    //     $vendor->save();
    //     return redirect()->route('vendor')->with('success', "Vendor Updated Successfully");

    // }

    // public function delete($id){
    //     Vendor::find($id)->delete();
    //     return redirect()->route('vendor')->with('success', "Vendor Deleted Successfully");

    // }



}
