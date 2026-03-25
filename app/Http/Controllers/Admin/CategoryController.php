<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        // 🔥 Image Upload (Spatie)
        if ($request->hasFile('image')) {
            $category->addMediaFromRequest('image')
                     ->toMediaCollection('category_image');
        }

        return redirect()->route('admin.categories.index')
            ->with('message', 'Category Created');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        // 🔥 Image Update
        if ($request->hasFile('image')) {
            $category->clearMediaCollection('category_image');

            $category->addMediaFromRequest('image')
                     ->toMediaCollection('category_image');
        }

        return redirect()->route('admin.categories.index')
            ->with('message', 'Category Updated');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function destroy(Category $category)
    {
        // 🔥 Delete image also
        $category->clearMediaCollection('category_image');

        $category->delete();

        return back()->with('message', 'Category Deleted');
    }
}