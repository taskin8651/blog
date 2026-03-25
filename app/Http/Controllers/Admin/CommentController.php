<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        // 🔐 Permissions
        $this->middleware('can:comment_access')->only('index');
        $this->middleware('can:comment_approve')->only(['approve','reject']);
        $this->middleware('can:comment_delete')->only('destroy');
    }

    /**
     * Display all comments
     */
    public function index()
    {
        $comments = Comment::with(['post','user'])
            ->latest()
            ->get();

        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Approve comment
     */
    public function approve(Comment $comment)
    {
        if ($comment->is_approved) {
            return back()->with('message', 'Already Approved');
        }

        $comment->update([
            'is_approved' => true
        ]);

        return back()->with('message', 'Comment Approved');
    }

    /**
     * Reject comment
     */
    public function reject(Comment $comment)
    {
        if (!$comment->is_approved) {
            return back()->with('message', 'Already Pending');
        }

        $comment->update([
            'is_approved' => false
        ]);

        return back()->with('message', 'Comment Rejected');
    }

    /**
     * Delete comment
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('message', 'Comment Deleted');
    }
}