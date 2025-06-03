<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('user_id', auth()->id())->paginate(4);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = new Category();
        $category->name = $validated['name'];
        $category->user_id = auth()->id(); // Set the owner!
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // $this->authorize('view', $category);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //return view('categories.edit', compact('category'));

        if ($category->user_id !== auth()->id()) {
            abort(403);
        }

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if ($category->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'CATEGORY UPDATED!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->user_id !== auth()->id()) {
            abort(403);
        }

        $category->delete();
        return redirect()->route('categories.index')->with('success', 'CATEGORY DELETED!');
    }
}
