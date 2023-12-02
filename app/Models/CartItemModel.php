<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItemModel extends Model
{
    use HasFactory;

    protected $table = 'cart_item';

    public function cart()
    {
        return $this->belongsTo(CartModel::class, 'cart_id');
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }

    // You can add a method to calculate the total cost of the cart item
    public function getTotalCostAttribute()
    {
        return $this->product_quantity * $this->product->price;
    }
}
