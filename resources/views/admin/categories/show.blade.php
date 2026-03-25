@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <h2 class="text-lg font-semibold mb-4">Category Detail</h2>

    <p><strong>Name:</strong> {{ $category->name }}</p>
    <p><strong>Slug:</strong> {{ $category->slug }}</p>

</div>
@endsection