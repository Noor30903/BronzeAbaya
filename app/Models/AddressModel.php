<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class AddressModel extends Model
{
    use HasFactory;

    protected $table = 'address';

    static public function getSingle($id)
    {
        return self::find($id); 
    }

    static public function getRecord()
    {
        return self::select('address.*','users.id')
                ->join('users', 'address.user_id', '=', 'users.id')
                ->where('address.user_id','=',Auth::user()->id)
                ->get();
    }

    static public function getAddress($Uid)
    {
        return self::select('address.*')
                ->where('address.user_id','=',$Uid)
                ->get();
    }


}
