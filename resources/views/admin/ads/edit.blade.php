@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

<form action="{{ route('admin.ads.update',$ad->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<input type="text" name="title" value="{{ $ad->title }}" class="w-full border p-2 mb-3">

<input type="text" name="link" value="{{ $ad->link }}" class="w-full border p-2 mb-3">

<select name="position" class="w-full border p-2 mb-3">
    <option value="top" {{ $ad->position=='top'?'selected':'' }}>Top</option>
    <option value="sidebar" {{ $ad->position=='sidebar'?'selected':'' }}>Sidebar</option>
</select>

<textarea name="script" class="w-full border p-2 mb-3">{{ $ad->script }}</textarea>

<input type="file" name="image" class="mb-3">

<button class="bg-green-600 text-white px-4 py-2">Update</button>

</form>

</div>
@endsection