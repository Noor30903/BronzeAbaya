<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentImageModel extends Model
{
    use HasFactory;

    protected $table = 'payment_image';

    static public function getSingle($id)
    {
        return PaymentImageModel::find($id);
    }

    static public function getimageRecord($orderid)
    {
        return self::select('payment_image.*')
                ->where('payment_image.order_id','=',$orderid)
                ->orderBy('payment_image.id','desc')
                ->get();
    }  

    public function getLogo()
    {
        if(!empty($this->image_name) && file_exists('upload/payment/' .$this->image_name))
        {
            return url('upload/payment/' .$this->image_name);
        }
        else
        {
            return"";
        }

    }
}
