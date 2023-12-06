<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewModel extends Model
{
    use HasFactory;
    protected $table = 'reviews';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return self::select('reviews.*','users.id')
                ->join('users', 'reviews.user_id', '=', 'users.id')
                ->where('reviews.user_id','=',Auth::user()->id)
                ->get();
    }
}
