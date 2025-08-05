<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Show products posted by the logged-in user
    public function index()
    {
        $products = Product::where('posted_by', Auth::id())->get();
        return view('products.index', compact('products'));
    }

    // Show create product form
    public function create()
    {
        return view('products.create');
    }

    // Store a new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer|min:0',
            'image_url'   => 'nullable|url',
        ]);

        // Add the posted_by user id (seller)
        $validated['posted_by'] = Auth::id();

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    // Show edit form for a product
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update a product
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer|min:0',
            'image_url'   => 'nullable|url',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated!');
    }

    // Delete a product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted!');
    }

    // Show single product details
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.details', compact('product'));
        $product = Product::with('reviews.customer')->findOrFail($id);

return view('product.show', compact('product'));

    }

    // Any additional method you want (e.g. bkroy page)
    public function bkroy()
    {
        return view('products.bkroy');
    }
}
