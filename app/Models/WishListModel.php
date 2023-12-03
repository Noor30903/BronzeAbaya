<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class WishListModel extends Model
{
    use HasFactory;

    protected $table = 'wishlist';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return self::select('wishlist.*','users.is')
                ->join('wishlist', 'wishlist.user_id','=','users.id')
                ->where('wishlist.user_id','=',Auth::user()->id)
                ->paginate(50);
    }
}
