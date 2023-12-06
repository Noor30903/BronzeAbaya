<?php

namespace App\Http\Controllers;

use App\Mail\OrderEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    function orderEmail($orderId){

        $order = OrderModel::getSingle($orderId);
        $orderitems = OrderItemModel::getorderitem($orderId);
        $user = User::getSignal($orderitems->user_id);
        $orderAdd = AddressModel::getOrderAddress($orderId);
    
        $mailData = [
    
            'subject' => 'thank you for your order ',
            'orderaddress'=> $orderAdd,
            'order'=> $order,
            'orderitems'=> $orderitems,
            'user'=>$user,
        ];
    
    
        Mail::to($user->email)->send(new OrderEmail($mailData));
    
        //return redirect('product/list')->with('success', "Order added successfully");
        //dd($order);
        
    }
}

