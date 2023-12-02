<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function aboutUs()
    {
        //return "About Us Page is working";
        return view('about');
    }
}