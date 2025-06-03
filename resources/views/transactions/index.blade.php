@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Your Transactions</h1>

        @if ($transactions->isEmpty())
            <p>No transactions yet.</p>
            <br><br>
            <a href="{{ route('transactions.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                + Add New Transaction
            </a>
        @else
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Date</th>
                        <th class="border px-4 py-2">Category</th>
                        <th class="border px-4 py-2">Amount</th>
                        <th class="border px-4 py-2">Description</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td class="border px-4 py-2">{{ $transaction->date }}</td>
                            <td class="border px-4 py-2">{{ $transaction->category->name }}</td>
                            <td class="border px-4 py-2">{{ $transaction->amount }}</td>
                            <td class="border px-4 py-2">{{ $transaction->description }}</td>
                            <td>
                                <a href="{{ route('transactions.edit', $transaction->id) }}" class="text-blue-500">Edit</a>

                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 ml-2"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <a href="{{ route('transactions.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                + Add New Transaction
            </a>
        @endif
    </div>
@endsection