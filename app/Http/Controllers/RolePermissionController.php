<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolePermission;

class RolePermissionController extends Controller
{
    public function index()
    {
        $role = RolePermission::first();
        // dd($role);
        return view('RoleAndPermission.indexs', get_defined_vars());
    }

    public function add_permission()
    {
        return view('RoleAndPermission.create');
    }

    public function submit_permission(Request $request)
    {
        // dd($request->all());

        foreach ($request->permissions as $item) {
            $store = new RolePermission();
            $store->role = $request->role;
            $store->permission = $item;
            $store->save();
        }
        return redirect()->route('role_permissions')->with('success', "Role & Permsission has been craeted");
    }

    public function edit_permission($id)
    {


        $add_user = RolePermission::where("permission", "Add User")->first();
        $edit_user = RolePermission::where("permission", "Edit User")->first();
        $delete_user = RolePermission::where("permission", "Delete User")->first();

        $add_product = RolePermission::where("permission", "Add Product")->first();
        $edit_product = RolePermission::where("permission", "Edit Product")->first();
        $delete_product = RolePermission::where("permission", "Delete Product")->first();

        $add_category = RolePermission::where("permission", "Add Category")->first();
        $edit_category = RolePermission::where("permission", "Edit Category")->first();
        $delete_category = RolePermission::where("permission", "Delete Category")->first();

        $edit_reviews = RolePermission::where("permission", "Edit Reviews")->first();
        $delete_reviews = RolePermission::where("permission", "Delete Reviews")->first();

        return view('RoleAndPermission.edit', get_defined_vars());
    }

    public function update_permission(Request $request) {
        // dd($request->all());
        $role = RolePermission::all();
        // $role->delete();
        foreach($role as $key => $deleteRole) {
            if($key != 0) {
                RolePermission::find($deleteRole->id)->delete();

            }
        }
        if($request->permissions) {
            foreach ($request->permissions as $item) {
                $store = new RolePermission();
                $store->role = $request->role;
                $store->permission = $item;
                $store->save();
            }
        }

        return redirect()->route('role_permissions')->with('success', "Role & Permsission has been updated");
    }
}
