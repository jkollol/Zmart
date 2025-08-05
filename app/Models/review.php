<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'rating',
        'comment',
    ];

    // Relation to User (customer)
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    // Relation to Product (optional)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
