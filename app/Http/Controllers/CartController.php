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
    $userId = Auth::id();

    // Items waiting for payment
    $cartItemsToPay = Cart::with('product')
        ->where('user_id', $userId)
        ->where('status', 'to-pay')
        ->get();

    // Order history - items with status other than 'to-pay', latest first
    $orderHistory = Cart::with('product')
        ->where('user_id', $userId)
        ->where('status', '!=', 'to-pay')
        ->orderBy('created_at', 'desc')  // <-- order latest first
        ->get();

    return view('cart.index', compact('cartItemsToPay', 'orderHistory'));
}




    // Add product to cart
   public function addToCart(Request $request, $productId)
{
    $product = Product::findOrFail($productId);

    // Prevent user from adding their own product
    if ($product->posted_by == Auth::id()) {
        return back()->with('error', 'You cannot buy your own product.');
    }

    // Find a cart item with the product for this user **with status 'to-pay' only**
    $cartItem = Cart::where('user_id', Auth::id())
                    ->where('product_id', $product->id)
                    ->where('status', 'to-pay')  // <-- important filter here
                    ->first();

    if ($cartItem) {
        // If found with 'to-pay' status, increment quantity
        $cartItem->quantity += 1;
        $cartItem->save();
    } else {
        // If no 'to-pay' item found, create a new cart item with 'to-pay' status
        Cart::create([
            'user_id'    => Auth::id(),
            'product_id' => $product->id,
            'posted_by'  => $product->posted_by,
            'quantity'   => 1,
            'status'     => 'to-pay',
        ]);
    }

    return redirect()->route('cart.index')->with('success', 'Product added to cart.');
}

private function updateCartStatus($userId, $fromStatus = 'to-pay', $toStatus = 'pending')
    {
        Cart::where('user_id', $userId)
            ->where('status', $fromStatus)
            ->update(['status' => $toStatus]);
    }
public function cashOnDelivery()
{
    $this->updateCartStatus(Auth::id());
    return redirect()->route('cart.index')
        ->with('success', 'Order placed with Cash on Delivery.');
}
public function incrementQuantity($id)
{
    $cartItem = Cart::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    $cartItem->quantity += 1;
    $cartItem->save();

    return redirect()->back()->with('success', 'Quantity updated!');
}

public function decrementQuantity($id)
{
    $cartItem = Cart::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

    if ($cartItem->quantity > 1) {
        $cartItem->quantity -= 1;
        $cartItem->save();
    } else {
        // Optionally, remove item if quantity reaches zero
        $cartItem->delete();
    }

    return redirect()->back()->with('success', 'Quantity updated!');
}


    public function orderList()
{
    // Get all cart items where the product's posted_by = current user, excluding 'to-pay'
    $orders = Cart::with(['product', 'buyer'])
        ->where('posted_by', Auth::id())
        ->where('status', '!=', 'to-pay') // ✅ Exclude to-pay
        ->orderBy('created_at', 'desc')
        ->get();

    return view('orders.index', compact('orders'));
}

public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,shipped,delivered,cancelled',
    ]);

    $cart = Cart::findOrFail($id);
    $cart->status = $request->status;
    $cart->save();

    return redirect()->back()->with('success', 'Order status updated successfully!');
}


}
