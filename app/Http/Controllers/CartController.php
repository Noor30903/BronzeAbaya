<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItemModel;
use App\Models\CartModel;
use App\Models\ProductModel;
use Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function updateQuantity(Request $request)
{
    $request->validate([
        'id' => 'required|integer',
        'quantity' => 'required|integer|min:1'
    ]);

    $cartItem = CartItemModel::find($request->id);
    if (!$cartItem) {
        return response()->json(['error' => 'Cart item not found'], 404);
    }

    $cartItem->product_quantity = $request->quantity;
    $cartItem->save();

    $cart = CartModel::find($cartItem->cart_id);

    if ($cart) {
        $totalCost = 0;
        $productTotals = [];
        foreach ($cart->cartItems as $item) {
            $product = ProductModel::find($item->product_id);
            $totalCost += $item->product_quantity * $product->price;
            $productTotals[$item->id] = $item->product_quantity * $product->price;
        }

        $cart->totalcost = $totalCost;
        $cart->save();

        return response()->json([
            'message' => 'Quantity updated successfully', 
            'totalCost' => $totalCost,
            'productTotals' => $productTotals
        ]);
    } else {
        return response()->json(['error' => 'Cart not found'], 404);
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
