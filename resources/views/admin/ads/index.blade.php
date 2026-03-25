@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-semibold">Ads</h2>

        <a href="{{ route('admin.ads.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Add Ad
        </a>
    </div>

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2">Title</th>
                <th class="p-2">Position</th>
                <th class="p-2">Type</th>
                <th class="p-2">Status</th>
                <th class="p-2">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($ads as $ad)
            <tr>
                <td class="p-2">{{ $ad->title }}</td>
                <td class="p-2">{{ $ad->position }}</td>
                <td class="p-2">{{ $ad->type }}</td>
                <td class="p-2">
                    {{ $ad->is_active ? 'Active' : 'Inactive' }}
                </td>

                <td class="p-2 flex gap-2">
                    <a href="{{ route('admin.ads.edit',$ad->id) }}"
                       class="bg-yellow-500 text-white px-2 py-1 rounded">
                        Edit
                    </a>

                    <form action="{{ route('admin.ads.destroy',$ad->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-600 text-white px-2 py-1 rounded">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection