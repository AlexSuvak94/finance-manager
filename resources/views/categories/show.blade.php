@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Category Details</h1>

        <div class="bg-white shadow rounded p-4">
            <p><strong>Name:</strong> {{ $category->name }}</p>
            <p><strong>Created At:</strong> {{ $category->created_at->format('d M Y, H:i') }}</p>
            <p><strong>Updated At:</strong> {{ $category->updated_at->format('d M Y, H:i') }}</p>
        </div>

        <div class="mt-4">
            <a href="{{ route('categories.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">Back to List</a>
        </div>
    </div>
@endsection