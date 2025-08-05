<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Show cart items
    public function index()
{
    $cartItems = Cart::with('product')
        ->where('user_id', Auth::id())
        ->get();

    return view('cart.index', compact('cartItems'));
}


    // Add product to cart
    public function addToCart(Request $request, $productId)
{
    
    $product = Product::findOrFail($productId);

    // Prevent user from adding their own product
    if ($product->posted_by == Auth::id()) {
        return back()->with('error', 'You cannot buy your own product.');
    }

    // Check if product is already in cart for this user
    $cartItem = Cart::where('user_id', Auth::id())
                    ->where('product_id', $product->id)
                    ->first();

    if ($cartItem) {
        // If found, increment quantity
        $cartItem->quantity += 1;
        $cartItem->save();
    } else {
        // If not found, create new cart item
        Cart::create([
            'user_id'    => Auth::id(),
            'product_id' => $product->id,
            'posted_by'  => $product->posted_by, // seller id
            'quantity'   => 1,
            'status'     => 'pending',
        ]);
    }

return redirect()->route('cart.index')->with('success', 'Product added to cart.');
}


    public function orderList()
{
    // Get all cart items where the product's posted_by = current user
    $orders = Cart::with(['product', 'buyer'])
        ->where('posted_by', Auth::id())
        ->get();

    return view('orders.index', compact('orders'));
}
public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,shipped,delivered,cancel',
    ]);

    $cart = Cart::findOrFail($id);
    $cart->status = $request->status;
    $cart->save();

    return redirect()->back()->with('success', 'Order status updated successfully!');
}


}
