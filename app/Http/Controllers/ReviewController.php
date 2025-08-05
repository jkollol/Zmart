<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

public function index()
{
    $reviews = Review::with(['product', 'customer'])->latest()->paginate(10);
    return view('reviews.index', compact('reviews'));
}

    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        // Prevent user from reviewing their own product
        if ($product->posted_by == Auth::id()) {
            return back()->with('error', 'You cannot review your own product.');
        }

        // Validate input
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Create review
        Review::create([
            'customer_id' => Auth::id(),
            'product_id' => $productId,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? null,
        ]);

        return back()->with('success', 'Review added successfully.');
    }
}
