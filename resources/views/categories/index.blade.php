@extends('layouts.app')

@section('content')

    <div class="container mx-auto p-4">


        @if ($categories->isEmpty())
            <br>
            <div class="text-center my-10">
                <p class="text-lg mb-4">No categories yet. Start by adding one!</p>
                <a href="{{ route('categories.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    + Add Your First Category
                </a>
            </div>
        @else
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Your Categories</h1>
                <a href="{{ route('categories.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    + Add Category
                </a>
            </div>
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $category->name }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('categories.show', $category) }}"
                                    class="bg-green-500 hover:bg-green-600 text-black font-bold py-1 px-3 rounded mr-2">
                                    View
                                </a>

                                <a href="{{ route('categories.edit', $category) }}"
                                    class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-1 px-3 rounded">Edit</a>

                                <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                    style="display:inline-block;"
                                    onsubmit="return confirm('Are you sure you want to delete this category? This cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-red font-bold py-1 px-3 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        @endif

        <br><br>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative my-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-4">
                <strong class="font-bold">Whoops!</strong> Something went wrong:
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                        <li class="ml-4 list-disc">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection