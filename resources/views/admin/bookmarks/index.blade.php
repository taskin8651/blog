@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <h2 class="mb-4 font-semibold text-lg">Bookmarks</h2>

    <table class="w-full border">

        <thead class="bg-gray-100">
            <tr>
                <th class="p-2">User</th>
                <th class="p-2">Post</th>
                <th class="p-2">Date</th>
                <th class="p-2">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($bookmarks as $bookmark)
            <tr class="border-t">

                <td class="p-2">
                    {{ $bookmark->user->name ?? 'User Deleted' }}
                </td>

                <td class="p-2">
                    {{ $bookmark->post->title ?? '-' }}
                </td>

                <td class="p-2">
                    {{ $bookmark->created_at->format('d M Y') }}
                </td>

                <td class="p-2">

                    <form action="{{ route('admin.bookmarks.destroy', $bookmark->id) }}" method="POST">
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
                <td colspan="4" class="text-center p-4 text-gray-500">
                    No Bookmarks Found
                </td>
            </tr>
            @endforelse
        </tbody>

    </table>

</div>
@endsection