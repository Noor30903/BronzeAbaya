<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return self::select('cart.*','product.title as product_title','product.price as product_price', 'product_image.name as image_name')
                    ->join('product','product.id','=','cart.product_id')
                    ->join('product','product.id','=','product_image.product_id')
                    ->where('product.is_delete','=',0)
                    ->paginate(50);
    }

}
