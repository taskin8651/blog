@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Categories</h2>

        <a href="{{ route('admin.categories.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Add Category
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left">#</th>
                    <th class="p-2 text-left">Image</th>
                    <th class="p-2 text-left">Name</th>
                    <th class="p-2 text-left">Slug</th>
                    <th class="p-2 text-left">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($categories as $category)
                <tr class="border-t">

                    {{-- ID --}}
                    <td class="p-2">{{ $loop->iteration }}</td>

                    {{-- Image 🔥 --}}
                    <td class="p-2">
                        <img src="{{ $category->getFirstMediaUrl('category_image') ?: asset('assets/img/default.jpg') }}"
                             class="w-12 h-12 object-cover rounded">
                    </td>

                    {{-- Name --}}
                    <td class="p-2 font-medium">{{ $category->name }}</td>

                    {{-- Slug --}}
                    <td class="p-2 text-gray-600">{{ $category->slug }}</td>

                    {{-- Actions --}}
                    <td class="p-2 flex gap-2">

                        {{-- Edit --}}
                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                           class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">
                            Edit
                        </a>

                        {{-- Delete --}}
                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this category?')">
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
                    <td colspan="5" class="text-center p-4 text-gray-500">
                        No Categories Found
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>
@endsection