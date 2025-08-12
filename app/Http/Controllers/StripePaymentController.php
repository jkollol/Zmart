<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripePaymentController extends Controller
{

    public function checkout()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Your Product Name',
                    ],
                    'unit_amount' => 5000, // $50.00
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);

        return redirect($session->url);
    }
   public function success()
{
    // Use same update logic
    Cart::where('user_id', Auth::id())
        ->where('status', 'to-pay')
        ->update(['status' => 'pending']);

    return redirect()->route('cart.index')
        ->with('success', 'Payment successful! Your order is confirmed.');
}


    public function cancel()
    {
        return 'Payment cancelled.';
    }
}
