<?php
use App\Mail\OrderEmail;
use Illuminate\Support\Facades\Mail;

use App\Models\OrderModel;

function orderEmail($orderId){

    $order = OrderModel::where('id',$orderId)->with('item')->first();

    $mailData = [

        'subject' => 'thank you for your order ',
        'order'=> $order,
    ];


    Mail::to($order->email)->send(new OrderEmail());
    //dd($order);
    
}



?>
