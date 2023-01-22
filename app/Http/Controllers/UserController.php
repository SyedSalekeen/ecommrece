<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::where('type','2')->orWhere('type','3')->get();
        return view('users.index',get_defined_vars());
    }
    public function create() {
        return view('users.create');
    }
    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'contact' => 'required',
            'status' => 'required',
            'role' => 'required',
            'address' => 'required',
        ]);


        $store = new User();
        $store->name = $request->name;
        $store->username = $request->username;
        $store->email = $request->email;
        $store->password = Hash::make($request->password);
        $store->contact = $request->contact;
        $store->status = $request->status;
        if($request->role == "user") {
            $store->type = '3';
        } else {
            $store->type = '2';
        }
        $store->role = $request->role;
        $store->address = $request->address;
        $store->save();


        return redirect()->route('users')->with('success','User added sucessfully');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('users.edit',get_defined_vars());

    }

    public function update(Request $request, $id) {

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',

            'contact' => 'required',
            'status' => 'required',
            'role' => 'required',
            'address' => 'required',
        ]);


        $update = User::find($id);
        $update->name = $request->name;
        $update->username = $request->username;
        $update->email = $request->email;
        if($request->password) {
            $update->password = Hash::make($request->password);
        }
        $update->contact = $request->contact;
        $update->status = $request->status;
        if($request->role == "user") {
            $update->type = '3';
        } else {
            $update->type = '2';
        }
        $update->role = $request->role;
        $update->address = $request->address;
        $update->save();

        return redirect()->route('users')->with('success','User updated sucessfully');

    }
}
