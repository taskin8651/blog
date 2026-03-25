@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-semibold">Categories</h2>
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add</a>
    </div>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2">#</th>
                <th class="p-2">Name</th>
                <th class="p-2">Slug</th>
                <th class="p-2">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $category)
            <tr>
                <td class="p-2">{{ $loop->iteration }}</td>
                <td class="p-2">{{ $category->name }}</td>
                <td class="p-2">{{ $category->slug }}</td>
                <td class="p-2 flex gap-2">

                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                       class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>

                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-2 py-1 rounded">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection