<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    public function show($id)
    {
        $tag = Tag::findOrFail($id);

        // 🔥 Get posts of this tag
        $posts = $tag->posts()
            ->with('category')
            ->latest()
            ->paginate(6);

        return view('custom.post', compact('tag','posts'));
    }
}