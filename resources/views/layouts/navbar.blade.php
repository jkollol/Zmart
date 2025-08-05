<!-- Navbar -->
<nav class="bg-white shadow fixed top-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="text-2xl font-bold text-green-600">ZMART</a>

        <!-- Navigation Links -->
        <div class="space-x-4 flex items-center">
            <a href="/menu" class="text-gray-700 hover:text-green-600">Menu</a>
            <a href="/reviews" class="text-gray-700 hover:text-green-600">Reviews</a>

            @auth
            <!-- Avatar Dropdown: Opens on hover, closes on click outside -->
<div x-data="{ dropdownOpen: false }"
     @mouseenter="dropdownOpen = true"
     @mouseleave="dropdownOpen = true"
     @click.away="dropdownOpen = false"
     class="relative">

    <!-- Avatar Button -->
    <div class="flex items-center justify-center w-10 h-10 rounded-full overflow-hidden cursor-pointer">
        <img src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png"
             alt="User Avatar"
             class="w-10 h-10 object-cover rounded-full border border-green-400">
    </div>

    <!-- Dropdown -->
    <div
        x-show="dropdownOpen"
        x-transition
        class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded shadow-lg z-50"
    >
        <a href="{{ route('profile.edit') }}"
           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
        <a href="{{ route('products.index') }}"
           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Products</a>
        <a href="{{ route('cart.index') }}"
           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cart</a>
        <a href="{{ route('orders.index') }}"
           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">OrderList</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Logout
            </button>
        </form>
    </div>
</div>


            @else
            <!-- Guest Buttons -->
            <a href="{{ route('login') }}"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Login</a>
            <a href="{{ route('register') }}" class="text-green-600 hover:underline">Register</a>
            @endauth
        </div>
    </div>
</nav>
