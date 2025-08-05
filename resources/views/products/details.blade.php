@extends('layouts.app')

@section('content')
<div class="bg-green-100 min-x-screen min-h-screen">
    <div class="max-w-4xl mx-auto py-12 px-4">
        <div class="bg-white rounded shadow p-6">
            <img src="{{ $product->image_url ?? 'https://source.unsplash.com/400x300/?product' }}"
                class="w-full max-w-md mx-auto mb-6 rounded">

            <h2 class="text-2xl font-bold mb-2">{{ $product->name }}</h2>
            <p class="text-gray-600 mb-4">{{ $product->description }}</p>
            <p class="text-green-600 font-bold text-lg mb-4">${{ number_format($product->price, 2) }}</p>

            <div class="flex justify-between">
                <a href="/menu" class="text-green-700 hover:underline">← Back to Menu</a>
                @auth
                        @if($product->posted_by !== auth()->id())
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                Add to Cart
                            </button>
                        </form>
                        @else
                        <form onsubmit="return showOwnerAlert(event)">
                            <button type="submit" class="inline-block bg-gray-400 text-white px-4 py-2 rounded cursor-not-allowed">
                               Add to Cart
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

                <!-- <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Add to Cart
                    </button>
                </form> -->
            </div>

        </div>
    </div>
</div>
@endsection
