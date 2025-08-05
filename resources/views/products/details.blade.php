@extends('layouts.app')

@section('content')
<div class="bg-green-100 min-x-screen min-h-screen">
    <div class="max-w-4xl mx-auto py-12 px-4">
        <div class="bg-white rounded shadow p-6">
            {{-- Product Image --}}
            <img src="{{ $product->image_url ?? 'https://source.unsplash.com/400x300/?product' }}"
                class="w-full max-w-md mx-auto mb-6 rounded">

            {{-- Product Details --}}
            <h2 class="text-2xl font-bold mb-2">{{ $product->name }}</h2>
            <p class="text-gray-600 mb-4">{{ $product->description }}</p>
            <p class="text-green-600 font-bold text-lg mb-4">${{ number_format($product->price, 2) }}</p>

            {{-- Cart and Review Buttons --}}
            <div class="flex justify-between">
                <a href="/menu" class="text-green-700 hover:underline">← Back to Menu</a>

                <div class="flex space-x-4">
                    @auth
                        @if($product->posted_by !== auth()->id())
                            {{-- Add to Cart Button --}}
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                    Add to Cart
                                </button>
                            </form>

                            {{-- Add Review Button --}}
                            <button onclick="showReviewForm()"
                                class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                Add Review
                            </button>
                        @else
                            {{-- Disabled Add to Cart Button --}}
                            <form onsubmit="return showOwnerCartAlert(event)">
                                <button type="submit"
                                    class="inline-block bg-gray-400 text-white px-4 py-2 rounded cursor-not-allowed">
                                    Add to Cart
                                </button>
                            </form>

                            {{-- Disabled Add Review Button --}}
                            <button onclick="showOwnerReviewAlert(event)"
                                class="inline-block bg-gray-400 text-white px-4 py-2 rounded cursor-not-allowed">
                                Add Review
                            </button>
                        @endif
                    @else
                        {{-- Guests: Show login prompt on Add to Cart and Add Review buttons --}}
                        <a href="{{ route('login') }}"
                            class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            Add to Cart
                        </a>
                        <a href="{{ route('login') }}"
                            class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Add Review
                        </a>
                    @endauth
                </div>
            </div>

            {{-- Flash Messages --}}
            @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mt-4">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mt-4">
                {{ session('error') }}
            </div>
            @endif

            {{-- Reviews List --}}
            <h3 class="text-xl font-semibold mt-12 mb-4">Reviews ({{ $product->reviews->count() }})</h3>
            @if($product->reviews->isEmpty())
                <p class="text-gray-600">No reviews yet. Be the first to review!</p>
            @else
                <div class="space-y-6">
                    @foreach ($product->reviews as $review)
                        <div class="border rounded p-4 shadow-sm">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-semibold">{{ $review->customer->name ?? 'Unknown' }}</span>
                                <span class="text-yellow-500 font-bold">
                                    {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}
                                </span>
                            </div>
                            <p class="text-gray-700 mb-2">{{ $review->comment }}</p>
                            <small class="text-gray-500">{{ $review->created_at->format('F j, Y, g:i a') }}</small>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

{{-- Hidden form for review submission --}}
<form id="popupReviewForm" method="POST" action="{{ route('reviews.store', $product->id) }}" style="display:none;">
    @csrf
    <input type="hidden" name="rating" id="reviewRating">
    <input type="hidden" name="comment" id="reviewComment">
</form>

{{-- SweetAlert2 CDN --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Show SweetAlert2 review popup form
    function showReviewForm() {
        Swal.fire({
            title: 'Leave a Review',
            html:
                '<label for="swal-rating" class="block mb-1 font-medium text-left">Rating (1 to 5):</label>' +
                '<select id="swal-rating" class="swal2-input" style="width:100%;margin-bottom:15px;">' +
                '<option value="">Select</option>' +
                '<option value="1">1</option>' +
                '<option value="2">2</option>' +
                '<option value="3">3</option>' +
                '<option value="4">4</option>' +
                '<option value="5">5</option>' +
                '</select>' +
                '<label for="swal-comment" class="block mb-1 font-medium text-left">Comment:</label>' +
                '<textarea id="swal-comment" class="swal2-textarea" rows="4" placeholder="Write your review..."></textarea>',
            showCancelButton: true,
            confirmButtonText: 'Submit',
            cancelButtonText: 'Cancel',
            preConfirm: () => {
                const rating = document.getElementById('swal-rating').value;
                if (!rating) {
                    Swal.showValidationMessage('Please select a rating.');
                    return false;
                }
                const comment = document.getElementById('swal-comment').value;
                // Set hidden form values
                document.getElementById('reviewRating').value = rating;
                document.getElementById('reviewComment').value = comment;
                // Submit the hidden form
                document.getElementById('popupReviewForm').submit();
            }
        });
    }

    // Alert when owner tries to add to cart
    function showOwnerCartAlert(e) {
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: 'You cannot buy your own product.',
            confirmButtonColor: '#6b7280',
            confirmButtonText: 'OK'
        });
        return false;
    }

    // Alert when owner tries to add review
    function showOwnerReviewAlert(e) {
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: 'You cannot review your own product.',
            confirmButtonColor: '#6b7280',
            confirmButtonText: 'OK'
        });
        return false;
    }
</script>
@endsection
