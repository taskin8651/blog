<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\LiveStream;

class LiveStreamController extends Controller
{
    public function index()
    {
        // 🔥 latest active live
        $live = LiveStream::where('is_live', true)
                    ->latest()
                    ->first();

        // 🔥 view count increase
        if ($live) {
            $live->increment('views');
        }

        return view('custom.live', compact('live'));
    }
}