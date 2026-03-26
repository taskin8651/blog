<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Post $post)
    {
        $like = Like::where('user_id', Auth::id())
            ->where('post_id', $post->id)
            ->first();

        if ($like) {
            // 🔥 Unlike
            $like->delete();
        } else {
            // 🔥 Like
            Like::create([
                'user_id' => Auth::id(),
                'post_id' => $post->id,
            ]);
        }

        return back();
    }
}