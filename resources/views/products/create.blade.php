@extends('layout.app')

@section('content')
<div class="container">
    <h1>Add New Product</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div>
            <label>Name:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label>Description:</label><br>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>
        <div>
            <label>Price:</label><br>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" required>
        </div>
        <div>
            <label>Stock:</label><br>
            <input type="number" name="stock" value="{{ old('stock', 0) }}" required>
        </div>
        <button type="submit">Add Product</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">Back to Products</a>
</div>
@endsection
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Add New Product</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div>
            <label>Name:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label>Description:</label><br>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>
        <div>
            <label>Price:</label><br>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" required>
        </div>
        <div>
            <label>Stock:</label><br>
            <input type="number" name="stock" value="{{ old('stock', 0) }}" required>
        </div>
        <button type="submit">Add Product</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">Back to Products</a>
</div>
@endsection
