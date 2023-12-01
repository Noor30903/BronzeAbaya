<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartModel;

use Auth;

class CartController extends Controller
{
    public function list()
    {
        $data['getRecord']= CartModel::getRecord();
        $data['header_title']= 'Cart';
        return view('admin.cart.list',$data);
    }


}
