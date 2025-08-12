@extends('layouts.app')

@section('content')
<div class="bg-green-100">
    <div class="max-w-4xl min-h-screen mx-auto py-12 px-4">
        <h2 class="text-2xl font-bold mb-4">Your Cart</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Cart Items to Pay --}}
        <h3 class="text-xl font-semibold mb-2">Items to Pay</h3>
        @if($cartItemsToPay->isEmpty())
            <p>Your cart is empty or all items are paid.</p>
        @else
            <ul class="space-y-4">
                @foreach($cartItemsToPay as $item)
    <li class="bg-white p-4 shadow rounded flex justify-between items-center">
        <div>
            <h4 class="text-lg font-semibold">{{ $item->product->name }}</h4>
            <div class="flex items-center space-x-2 my-3">
                {{-- Minus button --}}
                <form action="{{ route('cart.decrement', $item->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-300 text-white px-2 rounded hover:bg-red-400">-</button>
                </form>

                {{-- Quantity --}}
                <span class="text-gray-700 font-semibold px-2">{{ $item->quantity }}</span>

                {{-- Plus button --}}
                <form action="{{ route('cart.increment', $item->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-300 text-white px-2 rounded hover:bg-green-400">+</button>
                </form>
            </div>
            <p class="text-green-600 font-bold mt-1">${{ number_format($item->product->price, 2) }}</p>
        </div>
    </li>
@endforeach

            </ul>

            {{-- Payment Options --}}
            <div class="flex justify-between mt-6">
                <form action="{{ route('cart.cod') }}" method="POST" class="w-1/2 mr-2">
                    @csrf
                    <button type="submit" class="w-full bg-yellow-500 text-white p-4 rounded hover:bg-yellow-600">
                        Cash on Delivery
                    </button>
                </form>

                <form action="{{ route('checkout') }}" method="POST" class="w-1/2 ml-2">
                    @csrf
                    <button type="submit" class="w-full bg-green-600 text-white p-4 rounded hover:bg-green-700">
                        Pay with Stripe
                    </button>
                </form>
            </div>
        @endif

        {{-- Order History --}}
        <h3 class="text-xl font-semibold mt-12 mb-2">Order History</h3>
        @if($orderHistory->isEmpty())
            <p>No past orders found.</p>
        @else
            <ul class="space-y-4">
                @foreach($orderHistory as $order)
                    <li class="bg-white p-4 shadow rounded flex justify-between items-center">
                        <div>
                            <h4 class="text-lg font-semibold">{{ $order->product->name }}</h4>
                            <p class="text-gray-600">Quantity: {{ $order->quantity }}</p>
                            <p class="text-gray-700">Status: <span class="font-semibold">{{ ucfirst($order->status) }}</span></p>
                            <p class="text-green-600 font-bold">${{ number_format($order->product->price, 2) }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

    </div>
</div>
@endsection
