<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'product';
    
    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getSearch($search_data_value)
    {
        return self::select('product.*')
                    ->where('description', 'like', '%' . $search_data_value . '%')
                    ->orWhere('title', 'like', '%' . $search_data_value . '%')
                    ->paginate(12);
    }

    static public function getRecord($perPage = 12)
    {
        return self::select('product.*','users.name as created_by_name')
                ->join('users','users.id','=','product.created_by')
                ->where('product.is_delete','=',0)
                ->orderBy('product.id','desc')
                ->paginate($perPage);
    }

    static public function getProduct($category_id ='' , $subCategory_id ='')
    {
        $return = ProductModel::select('product.*','users.name as created_by_name', 'category.name as category_name', 'category.slug as category_slug', 'sub_category.name as sub_category_name', 'sub_category.slug as sub_category_slug' )
        ->join('users','users.id','=','product.created_by')
        ->join('category','category.id','=','product.category_id')
        ->join('sub_category','sub_category.id','=','product.sub_category_id');

        if(!empty($category_id))
        {
            $return = $return ->where('product.category_id','=',$category_id);
        }
        if(!empty($subCategory_id))
        {
            $return = $return ->where('product.sub_category_id','=',$subCategory_id);
        }

        $return = $return ->where('product.is_delete','=',0)
        ->where('product.status','=',0)
        ->orderBy('product.id','desc')
        ->paginate(12);

        return $return;

    }
    static public function getImageSingle($product_id)
    {
        return ProductImageModel::where( 'product_id' , '=',$product_id)->orderBy('order_by', 'asc')->first();
    }

    static public function checkSlug($slug)
    {
        return self::where('slug','=',$slug)->count();

    }
    public function getColor()
    
        {
            return $this->hasMany(ProductColorModel::class, "product_id");
        }

    public function getImage()
    
        {
            return $this->hasMany(ProductImageModel::class, "product_id")->orderBy('order_by', 'asc');
        }
}
        
    
