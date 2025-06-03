@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Transaction</h1>

        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label>Amount</label>
                <input type="number" step="0.01" name="amount" class="w-full border p-2" value="{{ $transaction->amount }}"
                    required>
            </div>

            <div>
                <label>Category</label>
                <select name="category_id" class="w-full border p-2" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $transaction->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Date</label>
                <input type="date" name="date" class="w-full border p-2" value="{{ $transaction->date }}" required>
            </div>

            <div>
                <label>Description</label>
                <input type="text" name="description" class="w-full border p-2" value="{{ $transaction->description }}" required>
            </div>
            <br>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Update Transaction
            </button>
        </form>
    </div>
@endsection