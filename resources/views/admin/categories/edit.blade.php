@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <h2 class="text-lg font-semibold mb-4">Edit Category</h2>

    <form action="{{ route('admin.categories.update', $category->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Category Name</label>
            <input type="text" name="name"
                   value="{{ old('name', $category->name) }}"
                   class="w-full border p-2 rounded">

            @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- Current Image 🔥 --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Current Image</label>

            @if($category->getFirstMediaUrl('category_image'))
                <img src="{{ $category->getFirstMediaUrl('category_image') }}"
                     class="w-24 h-24 object-cover rounded mb-2">
            @else
                <p class="text-gray-500 text-sm">No image uploaded</p>
            @endif
        </div>

        {{-- Upload New Image --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Change Image</label>
            <input type="file" name="image" class="w-full border p-2 rounded">

            @error('image')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- Button --}}
        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</div>
@endsection