<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItemModel;
use App\Models\CartModel;

use Auth;

class CartController extends Controller
{
    public function list()
    {
        $data['getRecord']= CartItemModel::getRecord();
        $data['header_title']= 'Cart';
        return view('cart.list',$data);
        
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'quantity' => 'required|integer|min:1'
    ]);

    $cartItem = CartItemModel::find($id);
    if($cartItem) {
        $cartItem->product_quantity = $request->quantity;
        $cartID = $cartItem->cart_id;
        $cart= CartModel::find($cartID);
        $cart->totalcost = $request->total;
        $cartItem->save();
        $cart->save();

        return redirect()->back()->with('success', 'Cart updated successfully.');
    } else {
        return redirect()->back()->with('error', 'Cart item not found.');
    }
}

}
