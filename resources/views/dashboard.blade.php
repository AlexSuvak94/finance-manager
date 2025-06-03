@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-center">💰 Financial Dashboard</h1>

    <!-- Summary Row -->
    <div class="flex flex-wrap gap-4 mb-8">
        <div class="w-full md:w-1/3 p-4 bg-green-200 rounded-lg shadow text-center">
            <h2 class="font-semibold text-lg mb-2">💼 Total Balance</h2>
            <p class="text-2xl font-bold">${{ number_format($totalBalance, 2) }}</p>
        </div>
        <div class="w-full md:w-1/3 p-4 bg-blue-200 rounded-lg shadow text-center">
            <h2 class="font-semibold text-lg mb-2">⬆️ Total Income</h2>
            <p class="text-2xl font-bold">${{ number_format($totalIncome, 2) }}</p>
        </div>
        <div class="w-full md:w-1/3 p-4 bg-red-200 rounded-lg shadow text-center">
            <h2 class="font-semibold text-lg mb-2">⬇️ Total Expenses</h2>
            <p class="text-2xl font-bold">${{ number_format(abs($totalExpenses), 2) }}</p>
        </div>
    </div>

    <br><br><br><br>

    <!-- Monthly Row -->
    <div class="flex flex-wrap gap-4 mb-8">
        <div class="w-full md:w-1/2 p-4 bg-purple-200 rounded-lg shadow text-center">
            <h2 class="font-semibold text-lg mb-2">📅 This Month Income</h2>
            <p class="text-2xl font-bold">${{ number_format($monthlyIncome, 2) }}</p>
        </div>
        <div class="w-full md:w-1/2 p-4 bg-yellow-200 rounded-lg shadow text-center">
            <h2 class="font-semibold text-lg mb-2">📅 This Month Expenses</h2>
            <p class="text-2xl font-bold">${{ number_format(abs($monthlyExpenses), 2) }}</p>
        </div>
    </div>

    <br><br><br><br><br><br>

    <!-- Category Breakdown -->
    <div>
        <h2 class="text-xl font-bold mb-4">📊 Category Breakdown</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded shadow">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="text-left px-4 py-2">Category</th>
                        <th class="text-right px-4 py-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categoryBreakdown as $item)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $item->category->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2 text-right">${{ number_format($item->total, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection