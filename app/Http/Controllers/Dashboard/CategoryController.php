<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::filter($request->all())->orderBy('id', 'DESC')->paginate();
        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->except('_token'));

        $category->addMediaFromRequest('image')
        ->toMediaCollection('image');

        return redirect()->route('dashboard.category.index')->with('success', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $discounts = Discount::get();
        return view('dashboard.category.show', compact('category', 'discounts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('dashboard.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('dashboard.category.index');
    }

    public function addDiscount(Category $category, Request $request)
    {
        $request->validate(['discount_id' => 'required|exists:discounts,id']);
        $category->update(['discount_id' => $request->discount_id]);
        return redirect()->route('dashboard.category.index');
    }
}
