<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ZMART - Home</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-white text-gray-800 font-sans">

    <!-- Navbar -->
    <!-- <header class="bg-white shadow fixed top-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-green-600">MyShop</h1>
            <nav class="space-x-4">
                <a href="#features" class="text-gray-700 hover:text-green-600">Features</a>
                <a href="/menu" class="text-gray-700 hover:text-green-600">Menu</a>
                <a href="/products" class="text-gray-700 hover:text-green-600">Products</a>
                <a href="#testimonials" class="text-gray-700 hover:text-green-600">Reviews</a>
                <a href="#cta" class="text-gray-700 hover:text-green-600">Join</a>
                <a href="/login" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Login</a>
            </nav>
        </div>
    </header> -->
    @include('layouts.navbar')

    <!-- Hero  -->

    <section class="pt-24 pb-16 bg-green-50 text-center">
        <div class="mt-10">
            <img src="{{ asset('images/zmart.png') }}" alt="MyShop Logo" class="mx-auto w-48 max-w-full object-contain rounded-lg" />
        </div>
        <div class="max-w-3xl mx-auto px-4">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-6">
                Everything You Need<br>Delivered Fast.
            </h1>
            <p class="text-lg text-gray-700 mb-8">
                Find the best products at unbeatable prices. Your one-stop online shop.
            </p>
            <a href="/menu" class="inline-block bg-green-600 text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-green-700 transition">
                Shop Now
            </a>

        </div>
    </section>

    <!-- Features -->
    <section id="features" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold mb-10">Why Shop With Us?</h3>
            <div class="grid md:grid-cols-3 gap-10">
                <div>
                    <img src="https://img.icons8.com/fluency/48/fast-cart.png" class="mx-auto mb-4" />
                    <h4 class="text-xl font-semibold">Fast Delivery</h4>
                    <p class="text-gray-600 mt-2">We deliver to your door in record time — safely and reliably.</p>
                </div>
                <div>
                    <img src="https://img.icons8.com/fluency/48/discount.png" class="mx-auto mb-4" />
                    <h4 class="text-xl font-semibold">Best Prices</h4>
                    <p class="text-gray-600 mt-2">Unbeatable deals, regular offers, and bundle discounts.</p>
                </div>
                <div>
                    <img src="https://img.icons8.com/fluency/48/warranty-card.png" class="mx-auto mb-4" />
                    <h4 class="text-xl font-semibold">Quality Guarantee</h4>
                    <p class="text-gray-600 mt-2">Only the top-rated products make it to our shelves.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products -->
    <section id="products" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h3 class="text-3xl font-bold text-center mb-10">Explore Our Newest Arrivals!</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($products as $product)
                <div class="product-card bg-white rounded-lg shadow hover:shadow-lg transition" data-name="{{ strtolower($product->name) }}" data-description="{{ strtolower($product->description) }}">
                    <img src="{{ $product->image_url ?? 'https://source.unsplash.com/300x200/?product' }}" alt="{{ $product->name }}" class="w-full rounded-t h-72" />
                    <div class="p-4">
                        <h4 class="h-12 text-lg font-semibold">{{ $product->name }}</h4>
                        <p class="h-20 text-sm text-gray-600 mt-1">{{ $product->description }}</p>
                        <p class="mt-2 text-green-600 font-bold">${{ number_format($product->price, 2) }}</p>
                        <div class="flex justify-between">
                            <a href="/login" class="mt-3 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Buy Now</a>
                            <a href="{{ route('product.details', $product->id) }}"
                                class="mt-3 inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <!-- Only show this if there are no products at all -->
                <p class="min-h-screen text-center col-span-4 text-gray-500">No products available.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <!-- Your Products section (already present) -->

<!-- Testimonials section -->
<section id="testimonials" class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4 text-center">
        <h3 class="text-3xl font-bold mb-10">What Our Customers Say</h3>

        @if($reviews->isEmpty())
            <p class="text-gray-600">No reviews available yet.</p>
        @else
        <div class="grid md:grid-cols-3 gap-6 text-left">
            @foreach($reviews as $review)
                <div class="bg-gray-50 p-6 rounded shadow">
                    <div class="flex items-center mb-2">
                        <div class="text-yellow-500 text-sm">
                            {!! str_repeat('★', $review->rating) !!}
                            {!! str_repeat('☆', 5 - $review->rating) !!}
                        </div>
                    </div>
                    <p class="text-gray-700 italic">“{{ $review->comment ?? 'No comment provided.' }}”</p>
                    <p class="mt-4 font-semibold text-green-600">– {{ $review->customer->name ?? 'Anonymous' }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            <a href="{{ url('/reviews') }}" class="text-green-700 font-semibold hover:underline">
                See All Reviews →
            </a>
        </div>
        @endif
    </div>
</section>



    <!-- Call to Action -->
    <section id="cta" class="py-20 bg-green-600 text-white text-center">
        <h3 class="text-3xl font-bold mb-4">Ready to Shop?</h3>
        <p class="mb-6 text-lg">Create an account and start exploring amazing deals today.</p>
        <a href="/register" class="bg-white text-green-600 font-bold px-6 py-3 rounded hover:bg-gray-100">Join Now</a>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>© {{ date('Y') }} ZMART. Built with ❤️ by Jakaria Kollol</p>
        </div>
    </footer>

    @vite('resources/js/app.js')
</body>

</html>
