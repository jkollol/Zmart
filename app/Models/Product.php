<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
protected $fillable = [
    'name',
    'description',
    'price',
    'image_url',
    'stock',
    'posted_by', // ✅ make sure this is included
];

    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }

    public function reviews()
{
    return $this->hasMany(Review::class);
}

}
