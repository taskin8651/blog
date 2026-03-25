<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * All likes list
     */
    public function index()
    {
        $likes = Like::with(['post', 'user'])
                    ->latest()
                    ->get();

        return view('admin.likes.index', compact('likes'));
    }

    /**
     * Delete single like
     */
    public function destroy(Like $like)
    {
        $like->delete();

        return back()->with('message', 'Like Deleted');
    }

    /**
     * Bulk delete (optional 🔥)
     */
    public function massDestroy(Request $request)
    {
        Like::whereIn('id', $request->ids)->delete();

        return response()->noContent();
    }
}