@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Posts</h2>

        <a href="{{ route('admin.posts.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Add Post
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left">#</th>
                    <th class="p-2 text-left">Image</th>
                    <th class="p-2 text-left">Title</th>
                    <th class="p-2 text-left">Category</th>
                    <th class="p-2 text-left">Featured</th>
                    <th class="p-2 text-left">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($posts as $post)
                <tr class="border-t">

                    {{-- ID --}}
                    <td class="p-2">{{ $loop->iteration }}</td>

                    {{-- IMAGE (Spatie) 🔥 --}}
                    <td class="p-2">
                        @if($post->image_url)
                            <img src="{{ $post->image_url }}"
                                 class="w-16 h-12 object-cover rounded">
                        @else
                            <span class="text-gray-400 text-sm">No Image</span>
                        @endif
                    </td>

                    {{-- TITLE --}}
                    <td class="p-2">
                        <div class="font-medium">{{ $post->title }}</div>
                        <div class="text-xs text-gray-500">{{ $post->slug }}</div>
                    </td>

                    {{-- CATEGORY --}}
                    <td class="p-2">
                        {{ $post->category->name ?? '-' }}
                    </td>

                    {{-- FEATURED --}}
                    <td class="p-2">
                        @if($post->is_featured)
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
                                Yes
                            </span>
                        @else
                            <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs">
                                No
                            </span>
                        @endif
                    </td>

                    {{-- ACTIONS --}}
                    <td class="p-2 flex gap-2">

                        {{-- Edit --}}
                        <a href="{{ route('admin.posts.edit', $post->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                            Edit
                        </a>

                        {{-- Delete --}}
                        <form action="{{ route('admin.posts.destroy', $post->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this post?')">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-600 text-white px-3 py-1 rounded text-sm">
                                Delete
                            </button>
                        </form>

                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center p-4 text-gray-500">
                        No Posts Found
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>
@endsection