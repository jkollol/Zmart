<?php

namespace App\Http\Controllers;
use App\Models\Cart;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function checkout(Request $request)
    {
$cartItems = Auth::user()->cart->load('product');

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $lineItems = [];

        foreach ($cartItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item->product->name,
                    ],
                    'unit_amount' => $item->product->price * 100, // in cents
                ],
                'quantity' => $item->quantity,
            ];
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url);
    }
private function updateCartStatus($userId, $fromStatus = 'to-pay', $toStatus = 'pending')
    {
        Cart::where('user_id', $userId)
            ->where('status', $fromStatus)
            ->update(['status' => $toStatus]);
    }
    public function success()
{
    $this->updateCartStatus(Auth::id());

    return redirect()->route('cart.index')->with('success', 'Payment successful! Your order has been placed.');
}

public function cancel()
{
    return redirect()->route('cart.index')->with('error', 'Payment cancelled.');
}

}
