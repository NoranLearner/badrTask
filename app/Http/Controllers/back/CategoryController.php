<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('parent')->get();
        return view('back.categories.all', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mainCategories = Category::whereNull('parent_cat_id')->get();
        return view('back.categories.add', compact('mainCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // @dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'parent_cat_id' => 'nullable|exists:categories,id',
        ]);

        Category::create([
            'name' => $request->name,
            'parent_cat_id' => $request->parent_cat_id,
        ]);

        return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $mainCategories = Category::whereNull('parent_cat_id')->where('id', '!=', $category->id)->get();
        return view('back.categories.edit', compact('mainCategories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // @dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_cat_id' => 'nullable|exists:categories,id',
        ]);

        $category->update([
            'name' => $request->name,
            'parent_cat_id' => $request->parent_cat_id,
        ]);

        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->children()->update(['parent_cat_id' => null]);

        $category->delete();

        return redirect()->route('categories.index');
    }
}
