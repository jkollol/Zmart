@extends('layouts.app')

@section('content')
<div class="container bg-green-100 mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Add New Product</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
        @csrf
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
            <label class="block text-sm font-medium">Stock</label>
            <input type="number" name="stock" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add Product
        </button>
    </form>
</div>
@endsection
