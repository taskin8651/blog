@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <h2 class="text-lg font-semibold mb-4">Create Post</h2>

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- TITLE --}}
        <label class="block mb-1 font-medium">Title</label>
        <input type="text" id="title" name="title"
               value="{{ old('title') }}"
               class="w-full border p-2 mb-3 rounded">

        {{-- SLUG --}}
        <label class="block mb-1 font-medium">Slug</label>
        <input type="text" id="slug" name="slug"
               value="{{ old('slug') }}"
               class="w-full border p-2 mb-3 rounded">

        {{-- CATEGORY --}}
        <label class="block mb-1 font-medium">Category</label>
        <select name="category_id" class="w-full border p-2 mb-3 rounded">
            <option value="">Select Category</option>
            @foreach($categories as $id => $cat)
                <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>
                    {{ $cat }}
                </option>
            @endforeach
        </select>

        {{-- TAGS --}}
        <label class="block mb-1 font-medium">Tags</label>
        <select name="tags[]" multiple class="w-full border p-2 mb-3 rounded select2">
            @foreach($tags as $id => $tag)
                <option value="{{ $id }}">{{ $tag }}</option>
            @endforeach
        </select>

        {{-- DESCRIPTION --}}
        <label class="block mb-1 font-medium">Description</label>
        <textarea name="description" id="editor"
                  class="w-full border p-2 mb-3 rounded">{{ old('description') }}</textarea>

        {{-- IMAGE --}}
        <label class="block mb-1 font-medium">Image</label>
        <input type="file" name="image" class="mb-3">

        {{-- FEATURED --}}
        <div class="mb-3">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="is_featured" value="1">
                Featured Post
            </label>
        </div>

        {{-- SEO SECTION 🔥 --}}
        <hr class="my-4">

        <h3 class="font-semibold mb-2">SEO Settings</h3>

        <input type="text" name="meta_title" placeholder="Meta Title"
               value="{{ old('meta_title') }}"
               class="w-full border p-2 mb-3 rounded">

        <textarea name="meta_description" placeholder="Meta Description"
                  class="w-full border p-2 mb-3 rounded">{{ old('meta_description') }}</textarea>

        <input type="text" name="meta_keywords" placeholder="Keywords (comma separated)"
               value="{{ old('meta_keywords') }}"
               class="w-full border p-2 mb-3 rounded">

        {{-- SUBMIT --}}
        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Save Post
        </button>

    </form>

</div>
@endsection

@section('scripts')
<script>
// CKEditor
ClassicEditor.create(document.querySelector('#editor'));

// Auto Slug 🔥
document.getElementById('title').addEventListener('keyup', function () {
    let slug = this.value
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/(^-|-$)/g, '');

    document.getElementById('slug').value = slug;
});

// Select2 (tags)
$('.select2').select2();
</script>
@endsection