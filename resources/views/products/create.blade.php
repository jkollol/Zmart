@extends('layouts.app')

@section('content')
<div class="bg-green-100 min-x-screen min-h-screen">
    <div class="container mx-auto py-10">
        <h1 class="text-center font-extrabold text-3xl pt-10 text-green-800">Add New Product</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" class="max-w-3xl mx-auto space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium">Posted By</label>
            <input type="text" name="email" value="{{ auth()->user()->email }}" class="w-full border border-gray-300 p-2 rounded bg-gray-100" readonly>
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

        </div>

        <div>
            <label class="block text-sm font-medium">Product Name</label>
            <input type="text" name="name" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label class="block text-sm font-medium">Description</label>
            <textarea name="description" class="w-full border border-gray-300 p-2 rounded" rows="4"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Price ($)</label>
            <input type="number" step="0.01" name="price" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label class="block text-sm font-medium">Image URL</label>
            <input type="text" name="image_url" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div>
            <label class=" block text-sm font-medium">Stock</label>
            <input type="number" name="stock" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <button type="submit" class="min-w-full bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Add Product
        </button>
        <a class=" text-green-600 text-center hover:underline" href="{{ route('products.index') }}"><< Back to Products</a>
    </form>

    <br>
</div>
</div>
@endsection
