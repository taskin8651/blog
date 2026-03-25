@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <h2 class="mb-4 font-semibold">Edit Tag</h2>

    <form action="{{ route('admin.tags.update',$tag->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name"
               value="{{ $tag->name }}"
               class="w-full border p-2 mb-3 rounded">

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</div>
@endsection