<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Post;

class TrendingController extends Controller
{
    public function index()
    {
        // 🔥 Trending = most viewed
        $posts = Post::with('category')
            ->orderByDesc('views_count')
            ->paginate(10);

        return view('custom.trending', compact('posts'));
    }
}