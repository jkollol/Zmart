@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="bg-green-100 text-green-700 p-2 rounded mb-4">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-100 text-red-700 p-2 rounded mb-4">
    {{ session('error') }}
</div>
@endif
{{-- Your menu page Blade --}}

@guest
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.onload = function() {
        Swal.fire({
            icon: 'info',
            title: 'Login Required',
            text: 'Please login to purchase.',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            willClose: () => {
                // Optional: you can do something when it closes
            }
        });
    }
</script>
@endguest


<!-- 🔍 Search Input Only (No Submit Button) -->

<section id="products" class="py-16 bg-gray-100 min-x-screen min-h-screen">
    <div class="max-w-7xl mx-auto px-4">
        <h3 class="text-3xl text-green-900 font-bold text-center mb-10">Find Your Desired Things..</h3>

        <div class="max-w-7xl text-center mx-auto my-6">
            <input
                type="text"
                id="live-search"
                value="{{ request('search') }}"
                placeholder="Search products..."
                class="w-full sm:w-1/3 px-4 py-2 border rounded">
        </div>
        <div id="product-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($products as $product)
            <div class="product-card bg-green-100 rounded-lg shadow hover:shadow-lg transition" data-name="{{ strtolower($product->name) }}" data-description="{{ strtolower($product->description) }}">
                <img src="{{ $product->image_url ?? 'https://source.unsplash.com/300x200/?product' }}" alt="{{ $product->name }}" class="w-full rounded-t h-72" />
                <div class="p-4">
                    <h4 class="h-12 text-lg font-semibold">{{ $product->name }}</h4>
                    <p class="text-sm text-gray-600 mt-1 h-20">{{ $product->description }}</p>
                    <p class="mt-2 text-green-600 font-bold">${{ number_format($product->price, 2) }}</p>
                    <div class="flex justify-between">
                        @auth
                        @if($product->posted_by !== auth()->id())
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="mt-3 inline-block bg-lime-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                Buy Now
                            </button>
                        </form>
                        @else
                        <form onsubmit="return showOwnerAlert(event)">
                            <button type="submit" class="mt-3 inline-block bg-gray-400 text-white px-4 py-2 rounded cursor-not-allowed">
                                Buy Now
                            </button>
                        </form>

                        {{-- SweetAlert2 CDN --}}
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                        <script>
                            function showOwnerAlert(e) {
                                e.preventDefault();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops!',
                                    text: 'You cannot buy your own product.',
                                    confirmButtonColor: '#6b7280' // Tailwind's gray-500
                                });
                                return false;
                            }
                        </script>
                        @endif
                        @endauth


                        <a href="{{ route('product.details', $product->id) }}"
                            class="mt-3 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <!-- Only show this if there are no products at all -->
            <p class="min-h-screen text-center col-span-4 text-gray-500">No products available.</p>
            @endforelse

            <!-- This message is always rendered, used for JS-based search filtering -->
            <p id="no-results" class="min-h-screen text-center col-span-4 text-gray-500" style="display: none;">
                No products found.
            </p>
        </div>

    </div>
</section>

<script>
    const searchInput = document.getElementById('live-search');
    const productCards = document.querySelectorAll('.product-card');
    const noResults = document.getElementById('no-results');

    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase().trim();
        let visibleCount = 0;

        productCards.forEach(card => {
            const name = card.dataset.name;
            const description = card.dataset.description;

            if (name.includes(query) || description.includes(query)) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (noResults) {
            noResults.style.display = visibleCount === 0 ? '' : 'none';
        }
    });
</script>

@endsection
