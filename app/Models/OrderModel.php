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
                ->get();
    }
    static public function getAllRecord()
    {
        return self::select('order.*','users.id')
                ->join('users', 'order.user_id', '=', 'users.id')
                ->get();
    }
    static public function orderItems()
    {
        return $this->hasMany(OrderItemModel::class, 'order_id');
    }

}
