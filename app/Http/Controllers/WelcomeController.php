<?php

namespace App\Http\Controllers;

use App\Models\Product;
    use App\Models\Review;

class WelcomeController extends Controller
{
     public function index()
    {
        // Latest 4 products
        $products = Product::latest()->take(4)->get();

        // Latest 3 reviews with customer (user) relationship
        $reviews = Review::with('customer')
                    ->latest()
                    ->take(3)
                    ->get();

        return view('welcome', compact('products', 'reviews'));
    }

}
