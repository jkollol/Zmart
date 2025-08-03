@extends('layouts.app')

@section('content')
<div class="bg-green-100 min-x-screen min-h-screen">
    <div class="max-w-5xl  mx-auto py-10 px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">All Products</h1>
        <a href="{{ route('products.create') }}"
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
            + Add Product
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow overflow-hidden rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left font-medium text-gray-700">Name</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-700">Price</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-700">Stock</th>
                    <th class="px-6 py-3 text-right font-medium text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach ($products as $product)
                    <tr>
                        <td class="px-6 py-4">{{ $product->name }}</td>
                        <td class="px-6 py-4">${{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4">{{ $product->stock }}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('product.details', $product->id) }}"
                               class="text-blue-500 hover:underline mr-4">Details</a>
                            <a href="{{ route('products.edit', $product) }}"
                               class="text-green-500 hover:underline mr-4">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="text-red-500 hover:underline"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
