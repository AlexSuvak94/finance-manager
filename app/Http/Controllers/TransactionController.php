<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = auth()->user()->transactions()->with('category')->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = auth()->user()->categories()->get();
        return view('transactions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id'
        ]);

        auth()->user()->transactions()->create($request->only('amount', 'description', 'date', 'category_id'));
        return redirect()->route('transactions.index')->with('success', 'Transaction added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $categories = Category::where('user_id', auth()->id())->get();
        return view('transactions.edit', compact('transaction', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id'
        ]);

        $transaction->update($request->only('amount', 'description', 'date', 'category_id'));
        return redirect()->route('transactions.index')->with('success', 'Transaction updated.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted!');
    }
}
