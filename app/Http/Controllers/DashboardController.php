<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\AddressModel;
use App\Models\User;
use Auth;


class DashboardController extends Controller
{
    public function list()
    {
        $data['getUser']= User::getUser();
        $data['getOrderRecord'] = OrderModel::getRecord();
        $data['getUserAddress'] = AddressModel::getRecord();
        $data['header_title']= 'account';
        return view('account.list',$data);
    }
}
