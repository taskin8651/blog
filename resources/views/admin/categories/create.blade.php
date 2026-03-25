@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <h2 class="text-lg font-semibold mb-4">Create Category</h2>

    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Name --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Category Name</label>
            <input type="text" name="name"
                   value="{{ old('name') }}"
                   placeholder="Category Name"
                   class="w-full border p-2 rounded">
            @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- Image 🔥 --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Category Image</label>
            <input type="file" name="image" class="w-full border p-2 rounded">
            @error('image')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- Button --}}
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Save
        </button>

    </form>

</div>
@endsection