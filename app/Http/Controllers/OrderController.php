<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\AddressModel;
use App\Models\CartModel;
use App\Models\CartItemModel;
use App\Models\PaymentImageModel;
use App\Models\User;
use App\Mail\OrderEmail;
use Auth;
use Str;
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

    public function addpayment(Request $request, $orderid){
        if(!empty($request->file('image')))
        {
            foreach($request->file('image') as $value)
            {
                if($value->isValid())
                {
                    $ext = $value->getClientOriginalExtension();
                    $randomStr = $orderid.Str::random(20);
                    $filename = strtolower ($randomStr).'.'.$ext;
                    $value->move('upload/payment/', $filename);
                    $imageupload = new PaymentImageModel;
                    $imageupload->image_name = $filename;
                    $imageupload->image_extention = $ext;
                    $imageupload->order_id = $orderid;
                    $imageupload->save();
                }
            }
        }
        $order = OrderModel::where('id', $orderid)->first();
        $address = AddressModel::where('user_id', Auth::id())->first();
        $orderitems = OrderItemModel::getorderitem($orderid);
        $user = User::find($order->user_id);

        $mailData = [
        
            'subject' => 'thank you for your order ',
            'address'=> $address,
            'order'=> $order,
            'orderitems'=> $orderitems,
            'user'=>$user,
        ];
        Mail::to($user->email)->send(new OrderEmail($mailData));
        return redirect('product/list')->with('success', "Order Placed waiting for confirming payment");
    }

    public function insert(Request $request)
    {
        $order = new OrderModel;
        $order->user_id = Auth::user()->id;

        $cart = CartModel::where('user_id', $order->user_id)->first();
        $cartItems = CartItemModel::getRecord(); 
        $order->totalcost = $cart->totalcost;
        $order->notes = $request->notes;
        $order->payment_method = $request->payment_method;
        $order->status = $request->payment_method === 'cash_on_delivery' ? 1 : 0;
        $order->save();

        foreach($cartItems as $item){
            $orderitem = new OrderItemModel;
            $orderitem->order_id = $order->id;
            $orderitem->product_id = $item->product_id;
            $orderitem->product_quantity = $item->product_quantity;
            $orderitem->product_size = $item->product_size;
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
        
        if($request->payment_method === 'cash_on_delivery'){
            Mail::to($user->email)->send(new OrderEmail($mailData));
            return redirect('product/list')->with('success', "Order Placed waiting for payment");
        }else{
            return view('checkout.payment', $mailData);
        }
        

    }
    
    
}
