<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class ReviewModel extends Model
{
    use HasFactory;
    protected $table = 'reviews';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord($productid)
    {
        return self::select('reviews.*','users.name')
                ->join('users', 'reviews.user_id', '=', 'users.id')
                ->where('reviews.product_id','=',$productid)
                ->get();
    }
}
