<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class WishListItemModel extends Model
{
    use HasFactory;
    protected $table = 'wishlist_item';

    static public function getSingle($id)
    {
        return self::find($id); 
    }

    static public function getRecord()
    {
        return self::select('wishlist_item.*', 'wishlist.user_id', 'product.title as product_title', 'product.price as product_price')
                    ->join('wishlist', 'wishlist.id', '=', 'wishlist_item.wishlist_id')
                    ->join('product', 'product.id', '=', 'wishlist_item.product_id')
                    ->where('wishlist.user_id', Auth::user()->id)
                    ->paginate(50);
    }
    
    static public function DeleteRecord($id) 
    {
        self::where('id', '=',$id)->delete();
    }

}

