<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LiveStream;
use Illuminate\Http\Request;

class LiveStreamController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | List All Live Streams
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $lives = LiveStream::latest()->get();

        return view('admin.live.index', compact('lives'));
    }

    /*
    |--------------------------------------------------------------------------
    | Create Form
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('admin.live.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Live Stream
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'video_url' => 'required',
        ]);

        LiveStream::create([
            'title' => $request->title,
            'video_url' => $this->convertYoutube($request->video_url),
            'is_live' => true
        ]);

        return redirect()->route('admin.live.index')
            ->with('message', 'Live stream added');
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Form
    |--------------------------------------------------------------------------
    */
    public function edit(LiveStream $live)
    {
        return view('admin.live.edit', compact('live'));
    }

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, LiveStream $live)
    {
        $request->validate([
            'title' => 'required',
            'video_url' => 'required',
        ]);

        $live->update([
            'title' => $request->title,
            'video_url' => $this->convertYoutube($request->video_url),
        ]);

        return redirect()->route('admin.live.index')
            ->with('message', 'Updated successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */
    public function destroy(LiveStream $live)
    {
        $live->delete();

        return back()->with('message', 'Deleted');
    }

    /*
    |--------------------------------------------------------------------------
    | Toggle Live (ON/OFF 🔥)
    |--------------------------------------------------------------------------
    */
    public function toggle(LiveStream $live)
    {
        $live->update([
            'is_live' => !$live->is_live
        ]);

        return back()->with('message', 'Status updated');
    }

    /*
    |--------------------------------------------------------------------------
    | Convert YouTube URL to Embed 🔥
    |--------------------------------------------------------------------------
    */
    private function convertYoutube($url)
    {
        // watch?v= → embed/
        if (strpos($url, 'watch?v=') !== false) {
            return str_replace('watch?v=', 'embed/', $url);
        }

        return $url;
    }
}