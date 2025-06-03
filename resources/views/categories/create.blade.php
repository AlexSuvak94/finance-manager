@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 max-w-md">
        <h1 class="text-2xl font-bold mb-4">Add New Category</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block font-semibold mb-1">Category Name:</label>
                <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded px-3 py-2"
                    value="{{ old('name') }}" required>
            </div>
            <br>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Add
                Category</button>
        </form>
    </div>
@endsection