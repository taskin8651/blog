@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <h2 class="text-lg font-semibold mb-4">Edit Category</h2>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $category->name }}"
               class="w-full border p-2 mb-4 rounded">

        <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
    </form>

</div>
@endsection