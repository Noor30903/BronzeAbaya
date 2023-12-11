<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class OrderModel extends Model
{
    use HasFactory;

    protected $table = 'order';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return self::select('order.*','users.id')
                ->join('users', 'order.user_id', '=', 'users.id')
                ->where('order.user_id','=',Auth::user()->id)
                ->paginate(5);
    }

    static public function getAllRecord()
    {
        return self::select('order.*','users.name as user_name' , 'users.phone as user_phone' ,'order_item.product_size as product_size')
                ->join('users', 'order.user_id', '=', 'users.id')
                ->join('order_item', 'order_item.order_id', '=', 'order.id')
                ->paginate(5);
    }
    static public function orderItems()
    {
        return $this->hasMany(OrderItemModel::class, 'order_id');
    }

    static public function getImageSingle($orderid)
    {
        return PaymentImageModel::where( 'order_id' , '=',$orderid)->orderBy('order_by', 'asc')->first();
    }

}
