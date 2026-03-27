@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-semibold">Live Streams</h2>

        <a href="{{ route('admin.live.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Add Live
        </a>
    </div>

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2">Title</th>
                <th class="p-2">Status</th>
                <th class="p-2">Views</th>
                <th class="p-2">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($lives as $live)
            <tr>
                <td class="p-2">{{ $live->title }}</td>

                <td class="p-2">
                    {{ $live->is_live ? 'Live' : 'Offline' }}
                </td>

                <td class="p-2">
                    {{ number_format($live->views) }}
                </td>

                <td class="p-2 flex gap-2">

                    {{-- Toggle --}}
                    <form action="{{ route('admin.live.toggle',$live->id) }}" method="POST">
                        @csrf
                        <button class="bg-green-600 text-white px-2 py-1 rounded">
                            Toggle
                        </button>
                    </form>

                    {{-- Edit --}}
                    <a href="{{ route('admin.live.edit',$live->id) }}"
                       class="bg-yellow-500 text-white px-2 py-1 rounded">
                        Edit
                    </a>

                    {{-- Delete --}}
                    <form action="{{ route('admin.live.destroy',$live->id) }}" method="POST">
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