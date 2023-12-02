<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return self::select('cart_item.*','cart.user_id','cart.totalcost','product.title as product_title', 'product.price as product_price')
                ->join('product','product.id','=','cart_item.product_id')
                ->join('cart_item', 'cart_item.cart_id','=','cart.id')
                ->where('cart.user_id','=',Auth::user()->id)
                ->paginate(50);
    }
}
