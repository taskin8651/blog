<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


class IndexController extends Controller
{
    public function index()
    {
        // 🔥 Each category with latest post
        $categories = Category::with(['posts' => function ($query) {
                $query->latest()->take(1);
            }])
            ->has('posts') // 👉 only categories jisme post hai
            ->get();

            // 🔥 Top Categories (most posts)
    $topCategories = Category::withCount('posts')
        ->orderBy('posts_count','desc')
        ->take(6)
        ->get();

        $trendingPosts = Post::with('category')
    ->withCount('likes')
    ->orderByDesc('views_count')
    ->orderByDesc('likes_count')
    ->take(5)
    ->get();

    $editorialPosts = Post::with('category')
    ->where('is_featured', 1)
    ->latest()
    ->take(6)
    ->get();

    $forYouPosts = Post::with('category')
    ->orderByDesc('views_count') // trending
    ->inRandomOrder() // random feel
    ->take(6)
    ->get();

    // 🔥 Newest
    $newestPosts = Post::latest()->take(5)->get();

    // 🔥 Popular (Trending)
    $popularPosts = Post::orderByDesc('views_count')
        ->take(5)
        ->get();

    // 🔥 Featured
    $featuredPosts = Post::where('is_featured', 1)
        ->latest()
        ->take(5)
        ->get();

        $tags = Tag::withCount('posts') // 🔥 kitne posts me use hua
    ->orderByDesc('posts_count')
    ->take(10)
    ->get();

        return view('custom.index', compact(
        'categories',
        'topCategories',
        'trendingPosts',
        'editorialPosts',
        'forYouPosts',
        'newestPosts',
        'popularPosts',
        'featuredPosts',
        'tags'
        ));
    }
}