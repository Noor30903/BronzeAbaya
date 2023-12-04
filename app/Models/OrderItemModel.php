<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemModel extends Model
{
    use HasFactory;

    protected $table = 'order_item';

    static public function getSingle($id)
    {
        return self::find($id); 
    }

    static public function getRecord()
    {
        return self::select('order_item.*', 'order.user_id', 'product.title as product_title', 'product.price as product_price')
                    ->join('order', 'order.id', '=', 'order_item.order_id')
                    ->join('product', 'product.id', '=', 'order_item.product_id')
                    ->where('order.user_id', Auth::user()->id)
                    ->paginate(50);
    }
    
    static public function DeleteRecord($id) 
    {
        self::where('id', '=',$id)->delete();
    }
}
