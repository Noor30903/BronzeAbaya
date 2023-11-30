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

    static public function getRecord()
    {
        return self::select('product.*','users.name as created_by_name')
                    ->join('users','users.id','=','product.created_by')
                    ->where('product.is_delete','=',0)
                    ->orderBy('product.id','desc')
                    ->paginate(50);
    }

    static public function getProduct($Catagory_id ='' , $SubCategory_id ='')
    {
        $return = ProductModel::select('product.*','users.name as created_by_name', 'category.name as category_name', 'category.slug as category_slug', 'sub_Catagory.name as sub_Catagory_name', 'sub_Catagory.slug as sub_Catagory_slug' )
        ->join('users','users.id','=','product.created_by')
        ->join('category','category.id','=','product.created.category_id')
        ->join('subCatagory','subCatagory.id','=','product.subCatagory_id');

        if(!empty($category_id))
        {
            $return = $return ->where('product.Catagory_id','=',$Catagory_id);
        }
        if(!empty($subCatagory_id))
        {
            $return = $return ->where('product.subCatagory_id','=',$subCatagory_id);
        }

        $return = $return ->where('product.is_delete','=',0)
        ->where('product.status','=',0)
        ->orderBy('product.id','desc')
        ->paginate(3);

        return $return;

    }
    static public function getImageSingle($Product_id)
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

    public function getSize()
    
        {
            return $this->hasMany(ProductSizeModel::class, "product_id");
        }

        public function getImage()
    
        {
            return $this->hasMany(ProductImageModel::class, "product_id")->orderBy('order_by', 'asc');
        }
    }
        
    
