<?php

namespace App\Http\Controllers;

use App\Models\Product;

class WelcomeController extends Controller
{
    public function index()
    {
        // Get the latest 4 products (ordered by created_at descending)
        $products = Product::latest()->take(4)->get();
        return view('welcome', compact('products'));
    }
}
