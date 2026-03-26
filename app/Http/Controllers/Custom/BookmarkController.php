<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    // 🔥 Show user bookmarks
    public function index()
    {
        $bookmarks = Bookmark::with('post.category')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(12);

        return view('custom.bookmark', compact('bookmarks'));
    }

    public function store(Post $post)
{
    // 🔥 Already bookmarked?
    $exists = Bookmark::where('user_id', Auth::id())
        ->where('post_id', $post->id)
        ->exists();

    if (!$exists) {
        Bookmark::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
        ]);
    }

    return back()->with('message', 'Saved to bookmarks');
}

    // 🔥 Remove bookmark
    public function destroy(Bookmark $bookmark)
    {
        // Security check
        if ($bookmark->user_id !== Auth::id()) {
            abort(403);
        }

        $bookmark->delete();

        return back()->with('message', 'Bookmark removed');
    }
}