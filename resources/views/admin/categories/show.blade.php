@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Category Details</h2>

        <a href="{{ route('admin.categories.index') }}"
           class="bg-gray-500 text-white px-4 py-2 rounded">
            Back
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Image 🔥 --}}
        <div>
            <h4 class="font-medium mb-2">Image</h4>

            @if($category->getFirstMediaUrl('category_image'))
                <img src="{{ $category->getFirstMediaUrl('category_image') }}"
                     class="w-full max-w-xs rounded shadow">
            @else
                <img src="{{ asset('assets/img/default.jpg') }}"
                     class="w-full max-w-xs rounded shadow">
            @endif
        </div>

        {{-- Details --}}
        <div>
            <h4 class="font-medium mb-2">Details</h4>

            <p class="mb-2">
                <strong>Name:</strong> {{ $category->name }}
            </p>

            <p class="mb-2">
                <strong>Slug:</strong> {{ $category->slug }}
            </p>

            <p class="mb-2">
                <strong>Created:</strong>
                {{ $category->created_at->format('d M Y') }}
            </p>
        </div>

    </div>

    {{-- Actions --}}
    <div class="mt-6 flex gap-2">

        <a href="{{ route('admin.categories.edit', $category->id) }}"
           class="bg-yellow-500 text-white px-4 py-2 rounded">
            Edit
        </a>

        <form action="{{ route('admin.categories.destroy', $category->id) }}"
              method="POST"
              onsubmit="return confirm('Delete this category?')">
            @csrf
            @method('DELETE')

            <button class="bg-red-600 text-white px-4 py-2 rounded">
                Delete
            </button>
        </form>

    </div>

</div>
@endsection