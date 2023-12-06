<?php

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderEmail;
use App\Models\OrderItemModel;
use App\Models\AddressModel;
use App\Models\OrderModel;
use App\Models\User;
function orderEmail($orderId){

    $order = OrderModel::getSingle($orderId);
    $orderitems = OrderItemModel::getorderitem($orderId);
    $user = User::find($orderitems->user_id);
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



?>
