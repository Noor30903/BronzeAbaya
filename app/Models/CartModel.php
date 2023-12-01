<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class CartModel extends Model
{
    use HasFactory;

    protected $table = 'cart';
    
    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return self::select('cart.*', 'product.title as product_title', 'product.price as product_price', 'users.id as cart_user')
                    ->join('users', 'users.id', '=', 'cart.user_id')
                    ->join('product', 'product.id', '=', 'cart.product_id')
                    //->join('product_image', 'product_image.product_id', '=', 'product.id')
                    ->where('cart.user_id','=',Auth::user()->id)
                    ->paginate(50);
    }


}
