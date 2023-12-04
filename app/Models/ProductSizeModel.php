<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizeModel extends Model
{
    use HasFactory;

    protected $table = 'product_size';

    static public function getsizeRecord()
    {
        return self::select('product_size.*')
                ->orderBy('product_size.id','desc')
                ->get();
    }  

    static public function DeleteRecord($id)
    {
        self::where('id','=',$id)->delete(); 
    }


}
