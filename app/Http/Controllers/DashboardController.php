<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\AddressModel;
use App\Models\User;
use Auth;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list()
    {
        $user = Auth::user();
        $orders = OrderModel::getRecord();
        $addresses = AddressModel::getRecord();
        $data = [
            'user' => $user,
            'orders' => $orders,
            'addresses' => $addresses,
            'header_title' => 'Account'
        ];
        
        return view('account.list',$data);
    }
    
}
