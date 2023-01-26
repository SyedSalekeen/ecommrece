<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile() {
        $user = User::find(auth()->id());
        // dd($user);
        return view('Frontend.profile',get_defined_vars());
    }
    public function updateProfile(Request $request) {
        // dd($request->all());
        $user = User::find($request->user_id);
        // dd($user);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->role = $request->role;
        $user->contact = $request->contact;
        $user->status = $request->status;
        $user->address = $request->address;
        $user->save();
        return redirect('/');
    }
}
