@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

<form action="{{ route('admin.ads.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<input type="text" name="title" placeholder="Title" class="w-full border p-2 mb-3">

<input type="text" name="link" placeholder="Link" class="w-full border p-2 mb-3">

<select name="position" class="w-full border p-2 mb-3">
    <option value="top">Top</option>
    <option value="sidebar">Sidebar</option>
    <option value="inline">Inline</option>
    <option value="footer">Footer</option>
</select>

<select name="type" class="w-full border p-2 mb-3">
    <option value="image">Image</option>
    <option value="script">Script</option>
</select>

<textarea name="script" placeholder="Ad Script" class="w-full border p-2 mb-3"></textarea>

<input type="file" name="image" class="mb-3">

<input type="datetime-local" name="start_at" class="w-full border p-2 mb-3">
<input type="datetime-local" name="end_at" class="w-full border p-2 mb-3">

<input type="number" name="priority" placeholder="Priority" class="w-full border p-2 mb-3">

<label>
    <input type="checkbox" name="is_active" value="1" checked> Active
</label>

<button class="bg-blue-600 text-white px-4 py-2">Save</button>

</form>

</div>
@endsection