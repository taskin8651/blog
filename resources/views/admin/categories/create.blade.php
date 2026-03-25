@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <h2 class="text-lg font-semibold mb-4">Create Category</h2>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Category Name"
               class="w-full border p-2 mb-4 rounded">

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
    </form>

</div>
@endsection