<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => $request->slug ?? Str::slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'is_featured' => $request->is_featured ?? 0,

            // SEO
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        // 🖼️ Media Library
        if ($request->hasFile('image')) {
            $post->addMediaFromRequest('image')->toMediaCollection('post_image');
        }

        // 🏷️ Tags
        $post->tags()->sync($request->tags ?? []);

        return redirect()->route('admin.posts.index')->with('message', 'Post Created');
    }

    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post->update([
            'title' => $request->title,
            'slug' => $request->slug ?? Str::slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'is_featured' => $request->is_featured ?? 0,

            // SEO
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        // 🖼️ Media Update
        if ($request->hasFile('image')) {
            $post->clearMediaCollection('post_image');
            $post->addMediaFromRequest('image')->toMediaCollection('post_image');
        }

        // 🏷️ Tags
        $post->tags()->sync($request->tags ?? []);

        return redirect()->route('admin.posts.index')->with('message', 'Post Updated');
    }

    public function destroy(Post $post)
    {
        // delete media also
        $post->clearMediaCollection('post_image');

        $post->delete();

        return back()->with('message', 'Post Deleted');
    }
}