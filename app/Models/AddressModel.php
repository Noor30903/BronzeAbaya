<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model
{
    use HasFactory;

    protected $table = 'address';

    static public function getSingle($id)
    {
        return self::find($id); 
    }

}
