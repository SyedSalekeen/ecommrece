<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index(){
        $feedbacks = Feedback::all();
        return view('Feedbacks.index',get_defined_vars());
    }
}
