@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <h2 class="text-lg font-semibold mb-4">Edit Live Stream</h2>

    <form action="{{ route('admin.live.update',$live->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text"
               name="title"
               value="{{ $live->title }}"
               class="w-full border p-2 mb-4 rounded">

        <input type="text"
               name="video_url"
               value="{{ $live->video_url }}"
               class="w-full border p-2 mb-4 rounded">

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>

</div>
@endsection