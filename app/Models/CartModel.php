<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CartModel extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $fillable = [
        'totalcost',
    ];
    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return self::select('cart.*','users.id')
                ->join('users', 'cart.user_id', '=', 'users.id')
                ->where('cart.user_id','=',Auth::user()->id)
                ->paginate(50);
    }
    static public function DeleteRecord($id) 
    {
        self::where('id', '=',$id)->delete();
    }
     public function cartItems()
    {
        return $this->hasMany(CartItemModel::class, 'cart_id');
    }
    
}
