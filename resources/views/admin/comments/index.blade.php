@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <h2 class="mb-4 font-semibold text-lg">Comments Management</h2>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left">#</th>
                    <th class="p-2 text-left">Post</th>
                    <th class="p-2 text-left">User</th>
                    <th class="p-2 text-left">Comment</th>
                    <th class="p-2 text-left">Status</th>
                    <th class="p-2 text-left">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($comments as $comment)
                <tr class="border-t">

                    {{-- ID --}}
                    <td class="p-2">{{ $loop->iteration }}</td>

                    {{-- POST --}}
                    <td class="p-2">
                        {{ $comment->post->title ?? '-' }}
                    </td>

                    {{-- USER 🔥 --}}
                    <td class="p-2">
                        <div class="font-medium">
                            {{ $comment->user->name ?? 'User Deleted' }}
                        </div>
                        <div class="text-xs text-gray-500">
                            {{ $comment->user->email ?? '' }}
                        </div>
                    </td>

                    {{-- COMMENT --}}
                    <td class="p-2">
                        <div class="max-w-xs truncate">
                            {{ $comment->comment }}
                        </div>
                    </td>

                    {{-- STATUS --}}
                    <td class="p-2">
                        @if($comment->is_approved)
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
                                Approved
                            </span>
                        @else
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">
                                Pending
                            </span>
                        @endif
                    </td>

                    {{-- ACTIONS --}}
                    <td class="p-2 flex gap-2">

                        {{-- APPROVE --}}
                        @if(!$comment->is_approved)
                        <a href="{{ route('admin.comments.approve', $comment->id) }}"
                           class="bg-green-600 text-white px-2 py-1 rounded text-sm">
                            Approve
                        </a>
                        @else
                        <a href="{{ route('admin.comments.reject', $comment->id) }}"
                           class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">
                            Reject
                        </a>
                        @endif

                        {{-- DELETE --}}
                        <form action="{{ route('admin.comments.destroy', $comment->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this comment?')">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-600 text-white px-2 py-1 rounded text-sm">
                                Delete
                            </button>
                        </form>

                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center p-4 text-gray-500">
                        No Comments Found
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>
@endsection