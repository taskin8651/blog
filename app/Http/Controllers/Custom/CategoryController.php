<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    // All categories
  public function index()
{
    // 🔥 Top Categories (most posts)
    $topCategories = Category::withCount('posts')
        ->orderBy('posts_count','desc')
        ->take(6)
        ->get();

    // 🔥 All Categories
    $categories = Category::withCount('posts')
        ->latest()
        ->get();

    return view('custom.category', compact('topCategories','categories'));
}

    // Single category
   public function show($slug)
{
    $category = Category::where('slug', $slug)->firstOrFail();

    // 🔥 Get posts of this category
    $posts = \App\Models\Post::where('category_id', $category->id)
                ->latest()
                ->paginate(6);

    return view('custom.category-detail', compact('category','posts'));
}
}