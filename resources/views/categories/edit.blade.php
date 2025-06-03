@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Category</h1>

        <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block font-semibold">Category Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                    class="border border-gray-300 rounded px-3 py-2 w-full" required>
                @error('name')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <br>
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Update</button>
            <a href="{{ route('categories.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
        </form>
    </div>
@endsection