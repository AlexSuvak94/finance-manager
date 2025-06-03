<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $totalBalance = $user->transactions()->sum("amount");
        $totalIncome = $user->transactions()->where('amount', '>', 0)->sum('amount');
        $totalExpenses = $user->transactions()->where('amount', '<', 0)->sum('amount');

        $recentTransactions = $user->transactions()->latest()->take(5)->get();

        // Spending per category
        $categoryBreakdown = $user->transactions()
            ->selectRaw('category_id, SUM(amount) as total')
            ->groupBy('category_id')
            ->with('category')
            ->get();

        // Monthly summary
        $monthlyIncome = $user->transactions()
            ->where('amount', '>', 0)
            ->whereMonth('date', now()->month)
            ->sum('amount');

        $monthlyExpenses = $user->transactions()
            ->where('amount', '<', 0)
            ->whereMonth('date', now()->month)
            ->sum('amount');

        return view('dashboard', compact(
            'totalBalance',
            'totalIncome',
            'totalExpenses',
            'recentTransactions',
            'categoryBreakdown',
            'monthlyIncome',
            'monthlyExpenses'
        ));
    }
}
