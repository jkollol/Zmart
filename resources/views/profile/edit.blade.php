@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold mb-6">Profile Information</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded shadow space-y-4">
        <div>
            <label class="block font-semibold">Name:</label>
            <p class="text-gray-700">{{ auth()->user()->name }}</p>
        </div>

        <div>
            <label class="block font-semibold">Email:</label>
            <p class="text-gray-700">{{ auth()->user()->email }}</p>
        </div>

        <div>
            <label class="block font-semibold mb-1">Password:</label>
            <div class="relative">
                <input type="password" id="passwordField" value="********" class="w-full px-4 py-2 border rounded" readonly>
                <button onclick="togglePassword()" type="button" class="absolute top-2 right-3 text-gray-600">
                    👁️
                </button>
            </div>
        </div>
    </div>

    <h3 class="text-xl font-bold mt-10 mb-4">Update Password</h3>

    <form method="POST" action="{{ route('profile.updatePassword') }}" class="bg-white p-6 rounded shadow space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold mb-1">New Password:</label>
            <input type="password" name="new_password" class="w-full px-4 py-2 border rounded" required>
            @error('new_password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Confirm Password:</label>
            <input type="password" name="new_password_confirmation" class="w-full px-4 py-2 border rounded" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Update Password
        </button>
    </form>
</div>

<script>
    function togglePassword() {
        const field = document.getElementById("passwordField");
        if (field.type === "password") {
            field.type = "text";
            field.value = "{{ auth()->user()->getAuthPassword() }}"; // will show hashed password (optional)
        } else {
            field.type = "password";
            field.value = "********";
        }
    }
</script>
@endsection
