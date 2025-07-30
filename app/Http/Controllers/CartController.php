<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    // Show cart items
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    // Add product to cart
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Check if product already exists in user's cart
        $existing = Cart::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        if ($existing) {
            // If already in cart, increase quantity
            $existing->increment('quantity');
        } else {
            // If not, create new cart item
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        // Redirect to cart page with success message
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }
}
