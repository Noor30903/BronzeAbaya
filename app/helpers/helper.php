<?php
use App\Mail\orderEmail;
use Illuminate\Http\Mail;

function orderEmail($orderId){

    $order = OrderModel::where('id',$orderId)->with('item')->first();

    $mailData = [

        'subject' => 'thank you for your order ',
        'order'=> $order,
    ];


    Mail::to($order->email)->send(new orderEmail());
    //dd($order);
    
}


?>
