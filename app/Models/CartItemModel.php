<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class CartItemModel extends Model
{
    use HasFactory;
    protected $table = 'cart_item';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return self::select('cart_item.*', 'cart.user_id', 'product.title as product_title', 'product.price as product_price')
                    ->join('cart', 'cart.id', '=', 'cart_item.cart_id')
                    ->join('product', 'product.id', '=', 'cart_item.product_id')
                    ->where('cart.user_id', Auth::user()->id)
                    ->paginate(50);
    }
    
    static public function DeleteRecord($id) 
    {
        self::where('id', '=',$id)->delete();
    }

}
