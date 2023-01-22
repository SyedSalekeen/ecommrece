<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function register_submit(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required|same:confirm_password',
            'type' => 'required',
        ]);

        $store = new User();
        $store->email = $request->email;
        $store->password = Hash::make($request->password);
        $store->type = $request->type;
        $store->save();

        return redirect()->route('login')->with('message', "Registered Successfully");

    }

    public function login_submit(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        // dd($request->all());
        if (!Auth::attempt($request->only("email", "password"))) {
            return redirect()->route('login')->with("error", "Credentials not matched");

        } else {
            return redirect()->route('dasboard');
            
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
