<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{


public function index()
{
    $products = Product::where('user_id', Auth::id())->get(); // 👈 Filter by logged-in user
    return view('products.index', compact('products'));
}



public function create() {
    return view('products.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'description' => 'nullable',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image_url' => 'nullable|url',
    ]);

$validated['user_id'] = Auth::id();

    Product::create($validated);

    return redirect()->route('products.index')->with('success', 'Product added successfully!');
}


public function edit(Product $product) {
    return view('products.edit', compact('product'));
}

public function update(Request $request, Product $product) {
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
    ]);

    $product->update($request->all());
    return redirect()->route('products.index')->with('success', 'Product updated!');
}

public function destroy(Product $product) {
    $product->delete();
    return redirect()->route('products.index')->with('success', 'Product deleted!');
}

public function show($id)
    {
        $product = Product::findOrFail($id); // Returns 404 if not found
        return view('products.details', compact('product'));
    }

public function bkroy() {
    return view('products.bkroy');
}


}
