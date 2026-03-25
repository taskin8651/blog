<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function __construct()
    {
        // 🔐 Permissions
        $this->middleware('can:bookmark_access')->only('index');
        $this->middleware('can:bookmark_delete')->only('destroy');
    }

    /**
     * Display all bookmarks
     */
    public function index()
    {
        $bookmarks = Bookmark::with(['user','post'])
            ->latest()
            ->get();

        return view('admin.bookmarks.index', compact('bookmarks'));
    }

    /**
     * Remove the specified bookmark
     */
    public function destroy(Bookmark $bookmark)
    {
        $bookmark->delete();

        return back()->with('message', 'Bookmark Deleted');
    }

    /**
     * Bulk delete (optional 🔥)
     */
    public function massDestroy(Request $request)
    {
        Bookmark::whereIn('id', $request->ids)->delete();

        return response()->noContent();
    }
}