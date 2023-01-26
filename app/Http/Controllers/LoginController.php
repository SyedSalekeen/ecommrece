<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


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
        $find = User::where('email',$request->email)->first();
        if($find){
            if($find->type == 1 || $find->type == 2) {
                if (!Auth::attempt($request->only("email", "password"))) {
                    return redirect()->route('login')->with("error", "Credentials not matched");

                } else {
                    return redirect()->route('dasboard');

                }
            } else {
                return redirect()->route('login')->with("error", "Credentials not matched");
            }

        }


    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function signup() {
        return view('Frontend.signup');
    }

    public function signup_submit(Request $request) {
        $request->validate([
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'username' => 'required',
        ]);
        $store = new User();
        $store->email = $request->email;
        $store->username = $request->username;
        $store->password = Hash::make($request->password);
        $store->type = "3";
        $store->status = "Active";
        $store->role = "User";
        $store->save();
        Alert::success('Success', 'Account created sucessfully');

        return redirect()->route('website');
    }
    public function login_user() {
        return view('Frontend.login');
    }

    public function signin_submit(Request $request) {


        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        // dd($request->all());
        $user = User::where('email', $request->email)->first();
        if($user) {
            if($user->type !== 3) {
                Alert::error('Error', 'Credentials not matched');
            return redirect()->route('login_user');
            }
        }
        if (!Auth::attempt($request->only("email", "password"))) {
            Alert::error('Error', 'Credentials not matched');
            return redirect()->route('login_user');

        } else {
            Alert::success('Success', 'You are login successfully');

            return redirect()->route('website');

        }
    }

    public function logout_user() {
        Auth::logout();
        Alert::success('Success', 'You are logout successfully');
        return redirect()->route('website');
    }
}
