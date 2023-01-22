<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;

class DashbordController extends Controller
{
    public function index(){
      
        // dd($vendors_payment_info);
        return view('Dashboard.dashboard',get_defined_vars());
    }
}
