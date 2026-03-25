<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::latest()->get();
        return view('admin.ads.index', compact('ads'));
    }

    public function create()
    {
        return view('admin.ads.create');
    }

    public function store(Request $request)
    {
        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('ads', 'public');
        }

        Ad::create([
            'title' => $request->title,
            'image' => $image,
            'link' => $request->link,
            'position' => $request->position,
            'type' => $request->type,
            'script' => $request->script,
            'is_active' => $request->is_active ?? 1,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'priority' => $request->priority ?? 0,
        ]);

        return redirect()->route('admin.ads.index')->with('message','Ad Created');
    }

    public function edit(Ad $ad)
    {
        return view('admin.ads.edit', compact('ad'));
    }

    public function update(Request $request, Ad $ad)
    {
        $image = $ad->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('ads', 'public');
        }

        $ad->update([
            'title' => $request->title,
            'image' => $image,
            'link' => $request->link,
            'position' => $request->position,
            'type' => $request->type,
            'script' => $request->script,
            'is_active' => $request->is_active ?? 1,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'priority' => $request->priority ?? 0,
        ]);

        return redirect()->route('admin.ads.index')->with('message','Updated');
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();
        return back()->with('message','Deleted');
    }
}