<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolePermission;

class RolePermissionController extends Controller
{
    public function index() {
        $role = RolePermission::first();
        // dd($role);
        return view('RoleAndPermission.indexs',get_defined_vars());
    }

    public function add_permission() {
        return view('RoleAndPermission.create');
    }

    public function submit_permission(Request $request) {
        // dd($request->all());

        foreach($request->permissions as $item) {
            $store = new RolePermission();
            $store->role = $request->role;
            $store->permission = $item;
            $store->save();
        }
        return redirect()->route('role_permissions')->with('success',"Role & Permsission has been craeted");
    }
}
