<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItemModel;
use App\Models\CartModel;
use App\Models\ProductModel;
use Auth;

class CartController extends Controller
{
    public function list()
    {
        $cartItems = CartItemModel::getRecord();
        foreach ($cartItems as $item) {
            $productImage = ProductModel::getImageSingle($item->product_id);
            $item->productImage = $productImage ? $productImage->getLogo() : 'path/to/default/image.jpg'; // Replace with your default image path
        }

        $data = [
            'getRecord' => $cartItems,
            'header_title' => 'Cart'
        ];
    
        return view('cart.list', $data);

        
    }


    public function insert($productid)
    {
        //if(empty(Auth::check()))
	    //{
        //    return redirect('admin');
        //    
	    //}
        $user_id = Auth::user()->id;
        $cart = CartModel::where('user_id', $user_id)->first();
    
        if (!$cart) {
            $cart = new CartModel;
            $cart->user_id = $user_id;
            $cart->save();
        }
    
        $cartitem = new CartItemModel;
        $cartitem->cart_id = $cart->id;
        $cartitem->product_id = $productid;
        $cartitem->product_quantity = 1;
    
        $product = ProductModel::getSingle($productid);
        $cart->totalcost += $product->price;
        $cart->save();
        $cartitem->save();
    
        return redirect('product/list')->with('success', "Product added to cart successfully");


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

    public function delete($id)
    {
        $cartItem = CartItemModel::find($id);
        $cartID = $cartItem->cart_id;
        $cart= CartModel::find($cartID);
        $productid = $cartItem->product_id;
        $product = ProductModel::getSingle($productid);
        $cart->totalcost -= $product->price;
        $cart->save();
        CartItemModel::DeleteRecord($id);
        
        return redirect()->back()->with('success',"Item Successfully Deleted");
    }

}
