@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-6">All Product Reviews</h1>

    @if($reviews->isEmpty())
        <p class="text-gray-600">No reviews available.</p>
    @else
        <div class="space-y-6">
            @foreach($reviews as $review)
                <div class="bg-white p-5 rounded shadow">
                    <div class="flex justify-between items-center mb-2">
                        <div>
                            <h2 class="text-xl font-semibold">{{ $review->product->name ?? 'Unknown Product' }}</h2>
                            <p class="text-sm text-gray-500">By {{ $review->customer->name ?? 'Unknown' }}</p>
                        </div>
                        <span class="text-yellow-500 text-lg">
                            {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}
                        </span>
                    </div>
                    <p class="text-gray-800">{{ $review->comment }}</p>
                    <small class="text-gray-500">{{ $review->created_at->format('F j, Y, g:i a') }}</small>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $reviews->links() }}
        </div>
    @endif
</div>
@endsection
