<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function show($slug)
{
    $post = Post::where('slug', $slug)->firstOrFail();

    // 🔥 increment views
    $post->incrementViews();

    // 🔥 Related posts (same category)
    $relatedPosts = Post::where('category_id', $post->category_id)
        ->where('id', '!=', $post->id)
        ->latest()
        ->take(4)
        ->get();

    return view('custom.post-detail', compact('post','relatedPosts'));
}
}