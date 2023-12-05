<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {

        $data['getProduct']=ProductModel::getProduct(9 , null);
        $data['meta_title'] = 'E-commerce';
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';

        return view('home', $data);
    }
}
