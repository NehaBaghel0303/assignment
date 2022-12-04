<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return redirect(route('assignment.index'))->with('success','Welcome to my Page!');
        return view('website.home.index');
    }
}
