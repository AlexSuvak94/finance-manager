@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add Transaction</h1>

        <form action="{{ route('transactions.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1">Amount</label>
                <input type="number" step="0.01" name="amount" class="w-full border p-2" required>
            </div>

            <div>
                <label class="block mb-1">Category</label>
                <select name="category_id" class="w-full border p-2" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1">Date</label>
                <input type="date" name="date" class="w-full border p-2" required>
            </div>

            <div>
                <label class="block mb-1">Description</label>
                <input type="text" name="description" class="w-full border p-2">
            </div>

            <br>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Save Transaction
            </button>
        </form>
    </div>
@endsection