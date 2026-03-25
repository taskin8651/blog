@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-semibold">Tags</h2>

        <a href="{{ route('admin.tags.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Add Tag
        </a>
    </div>

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2">#</th>
                <th class="p-2">Name</th>
                <th class="p-2">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($tags as $tag)
            <tr>
                <td class="p-2">{{ $loop->iteration }}</td>
                <td class="p-2">{{ $tag->name }}</td>
                <td class="p-2 flex gap-2">

                    <a href="{{ route('admin.tags.edit',$tag->id) }}"
                       class="bg-yellow-500 text-white px-2 py-1 rounded">
                        Edit
                    </a>

                    <form action="{{ route('admin.tags.destroy',$tag->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-600 text-white px-2 py-1 rounded">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center p-4 text-gray-500">
                    No Tags Found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection