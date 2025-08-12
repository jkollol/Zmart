use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\Cart;

public function cashOnDelivery()
{
    $userId = auth()->id();
    $cartItems = Cart::where('user_id', $userId)->get();

    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Your cart is empty.');
    }

    $totalAmount = $cartItems->sum(function($item) {
        return $item->quantity * $item->product->price;
    });

    $totalQuantity = $cartItems->sum('quantity');

    Order::create([
        'order_id' => Str::upper(Str::random(10)),
        'user_id' => $userId,
        'quantity' => $totalQuantity,
        'amount' => $totalAmount,
        'status' => 'pending'
    ]);

    // Clear cart
    Cart::where('user_id', $userId)->delete();

    return redirect()->route('orders.index')->with('success', 'Order placed successfully with Cash on Delivery.');
}
