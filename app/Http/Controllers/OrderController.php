<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\AddressModel;
use App\Models\CartModel;
use App\Models\CartItemModel;
use App\Models\User;
use App\Mail\OrderEmail;
use Auth;

class OrderController extends Controller
{

    public function list()
    {
        $userId = Auth::user()->id; // Assuming you're getting the current user's ID
        $cart = CartModel::where('user_id', $userId)->first(); // Get the user's cart
        $address = AddressModel::where('user_id', Auth::id())->first();

        $cartItems = CartItemModel::getRecord(); 
        $data = [
            'cart' => $cart,
            'cartItems' => $cartItems,
            'address' => $address,
            'header_title' => 'Checkout',
        ];

        return view('checkout.list', $data);
    }

    public function insert(Request $request)
    {
        $order = new OrderModel;
        $order->user_id = Auth::user()->id;

        $cart = CartModel::where('user_id', $order->user_id)->first();
        $cartItems = CartItemModel::getRecord(); 
        $order->totalcost = $cart->totalcost;
        $order->status = 0;
        $order->notes = $request->notes;
        $order->save();
        foreach($cartItems as $item){
            $orderitem = new OrderItemModel;
            $orderitem->order_id = $order->id;
            $orderitem->product_id = $item->product_id;
            $orderitem->product_quantity = $item->product_quantity;
            $orderitem->save();

            $item->DeleteRecord($item->id);
        }

        $address = AddressModel::where('user_id', Auth::id())->first();
        if (!$address) {
            $address = new AddressModel;
            $address->user_id = Auth::user()->id;
            $address->city= trim($request->city);
            $address->country= trim($request->country);
            $address->street= trim($request->street);
            $address->save();
        }
        
        $address->city= trim($request->city);
        $address->country= trim($request->country);
        $address->street= trim($request->street);

        $cart->DeleteRecord($cart->id);
        $address->save();

        $orderitems = OrderItemModel::getorderitem($order->id);
        $user = User::find($order->user_id);
        $mailData = [
        
            'subject' => 'thank you for your order ',
            'address'=> $address,
            'order'=> $order,
            'orderitems'=> $orderitems,
            'user'=>$user,
        ];
        
        
        Mail::to($user->email)->send(new OrderEmail($mailData));

        return redirect('product/list')->with('success', "Order added successfully");

        
        
    }
    
}
