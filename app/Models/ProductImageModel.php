<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImageModel extends Model
{
    use HasFactory;

    protected $table = 'product_image';

    static public function getSingle($id)
    {
        return ProductImageModel::find($id);
    }

    static public function getimageRecord($productid)
    {
        return self::select('product_image.*')
                ->where('product_image.product_id','=',$productid)
                ->orderBy('product_image.id','desc')
                ->get();
    }  

    public function getLogo()
    {
        if(!empty($this->image_name) && file_exists('upload/product/' .$this->image_name))
        {
            return url('upload/product/' .$this->image_name);
        }
        else
        {
            return"";
        }

    }

}
