<?php

namespace App\Http\Controllers;

use App\course;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('main.home');
    }
    
}
