<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'posted_by', 'quantity', 'status'];

    // The buyer who added the product to the cart
    public function buyer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // The product in the cart
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // The seller who posted the product
    public function seller()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }
}
