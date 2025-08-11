@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-100 via-green-50 to-white flex items-center justify-center p-6">
    <div class="max-w-7xl w-full bg-white rounded-2xl shadow-2xl p-10 mx-auto">

        {{-- Logo + Welcome --}}
        <header class="mb-10 text-center">
            <div class="flex justify-center mb-5">
                <img src="{{ asset('images/zmart.png') }}"
                     alt="Zmart Logo"
                     class="w-48 max-w-full object-contain rounded-lg shadow-md" />
            </div>
            <p class="text-green-600 text-lg">
                Welcome back, <span class="font-semibold">{{ auth()->user()->name }}</span>!
            </p>
        </header>

        {{-- Cards Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            {{-- Profile Card --}}
            <a href="{{ route('profile.edit') }}"
               class="flex flex-col justify-center items-start bg-green-100 rounded-xl shadow-md p-6 hover:bg-green-200 transition duration-300 group">
                <div class="mb-4">
                    <svg class="w-10 h-10 text-green-700 group-hover:text-green-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 0116 9m-5-7a4 4 0 110 8m7-2a4 4 0 11-8 0m4 13v1m2-1v1M12 12v8" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-green-800 mb-2">Profile</h2>
                <p class="text-green-700">Manage your profile and update your password.</p>
            </a>

            {{-- Products Card --}}
            <a href="{{ route('products.index') }}"
               class="flex flex-col justify-center items-start bg-green-100 rounded-xl shadow-md p-6 hover:bg-green-200 transition duration-300 group">
                <div class="mb-4">
                    <svg class="w-10 h-10 text-green-700 group-hover:text-green-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-green-800 mb-2">Products</h2>
                <p class="text-green-700">Browse, add, or update your products.</p>
            </a>

            {{-- Menu Card --}}
            <a href="{{ route('menu') }}"
               class="flex flex-col justify-center items-start bg-green-100 rounded-xl shadow-md p-6 hover:bg-green-200 transition duration-300 group">
                <div class="mb-4">
                    <svg class="w-10 h-10 text-green-700 group-hover:text-green-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-green-800 mb-2">Menu</h2>
                <p class="text-green-700">View available menus.</p>
            </a>

            {{-- Cart Card --}}
            <a href="{{ route('cart.index') }}"
               class="flex flex-col justify-center items-start bg-green-100 rounded-xl shadow-md p-6 hover:bg-green-200 transition duration-300 group">
                <div class="mb-4">
                    <svg class="w-10 h-10 text-green-700 group-hover:text-green-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4" />
                      <circle cx="7" cy="21" r="1" />
                      <circle cx="17" cy="21" r="1" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-green-800 mb-2">Cart</h2>
                <p class="text-green-700">View and manage your cart items.</p>
            </a>

            {{-- Orders Card --}}
            <a href="{{ route('orders.index') }}"
               class="flex flex-col justify-center items-start bg-green-100 rounded-xl shadow-md p-6 hover:bg-green-200 transition duration-300 group">
                <div class="mb-4">
                    <svg class="w-10 h-10 text-green-700 group-hover:text-green-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2a4 4 0 018 0v2m-6 4h6" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 21v-6a2 2 0 00-2-2h-4a2 2 0 00-2 2v6" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-green-800 mb-2">Orders</h2>
                <p class="text-green-700">Check your order history and statuses.</p>
            </a>

            {{-- Reviews Card --}}
            <a href="{{ route('reviews.index') }}"
               class="flex flex-col justify-center items-start bg-green-100 rounded-xl shadow-md p-6 hover:bg-green-200 transition duration-300 group">
                <div class="mb-4">
                    <svg class="w-10 h-10 text-green-700 group-hover:text-green-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 20l9-5-9-5-9 5 9 5z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 12V4" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-green-800 mb-2">Reviews</h2>
                <p class="text-green-700">Read or add product reviews.</p>
            </a>

            {{-- Checkout Card --}}
            <a href="{{ route('checkout') }}"
               class="flex flex-col justify-center items-start bg-green-100 rounded-xl shadow-md p-6 hover:bg-green-200 transition duration-300 group">
                <div class="mb-4">
                    <svg class="w-10 h-10 text-green-700 group-hover:text-green-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h10" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 21h6" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-green-800 mb-2">Checkout</h2>
                <p class="text-green-700">Proceed to payment and complete your purchase.</p>
            </a>

            {{-- Logout Card --}}
            <form method="POST" action="{{ route('logout') }}"
                  class="flex flex-col justify-center items-start bg-red-100 rounded-xl shadow-md p-6 hover:bg-red-200 transition duration-300 group">
                @csrf
                <button type="submit" class="w-full text-left">
                    <div class="mb-4">
                        <svg class="w-10 h-10 text-red-700 group-hover:text-red-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                          <path stroke-linecap="round" stroke-linejoin="round" d="M7 16v-1a4 4 0 014-4h4" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-red-800 mb-2">Logout</h2>
                    <p class="text-red-700">Sign out of your account safely.</p>
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
