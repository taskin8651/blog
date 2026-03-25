@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <h2 class="mb-4 font-semibold">Create Tag</h2>

    <form action="{{ route('admin.tags.store') }}" method="POST">
        @csrf

        <input type="text" name="name"
               class="w-full border p-2 mb-3 rounded"
               placeholder="Tag Name">

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Save
        </button>

    </form>

</div>
@endsection