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
    $user = User::find($order->user_id);
    $Add = AddressModel::getAddress($user->id);

    $mailData = [

        'subject' => 'thank you for your order ',
        'address'=> $Add,
        'order'=> $order,
        'orderitems'=> $orderitems,
        'user'=>$user,
    ];


    Mail::to($user->email)->send(new OrderEmail($mailData));

    //return redirect('product/list')->with('success', "Order added successfully");
    //dd($order);
    
}



?>
