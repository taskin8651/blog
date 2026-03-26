<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
{
    $request->validate([
        'comment' => 'required'
    ]);

    Comment::create([
        'post_id' => $post->id,
        'user_id' => auth()->id(), // 🔥 FIXED
        'comment' => $request->comment,
        'is_approved' => false
    ]);

    return back()->with('message', 'Comment added');
}
}