<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile() {
        $user = User::find(auth()->id());
        return view('Frontend.profile',get_defined_vars());
    }
}
