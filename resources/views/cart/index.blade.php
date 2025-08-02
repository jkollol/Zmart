@extends('layouts.app')

@section('content')
<div class="bg-green-100">
    <div class="max-w-4xl min-h-screen  mx-auto py-12 px-4">
    <h2 class="text-2xl font-bold mb-4">Your Cart</h2>

    @if(session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if($cartItems->isEmpty())
    <p>Your cart is empty.</p>
    @else
    <div>
        <ul class="space-y-4">
            @foreach($cartItems as $item)
            <li class="bg-white p-4 shadow rounded flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-semibold">{{ $item->product->name }}</h3>
                    <p class="text-gray-600">Quantity: {{ $item->quantity }}</p>
                    <p class="text-green-600 font-bold">${{ number_format($item->product->price, 2) }}</p>
                </div>
            </li>
            @endforeach
        </ul>
        <form action="{{ route('checkout') }}" method="POST">
    @csrf
    <button type="submit" class="mt-3 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Checkout
    </button>
</form>

    </div>
    @endif
</div>
</div>
@endsection