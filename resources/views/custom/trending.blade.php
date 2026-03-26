@extends('custom.master')
@section('content')

<!-- Header -->
<div class="header-area">
    <div class="container h-100 d-flex align-items-center justify-content-between">

        <div class="back-button">
            <a href="{{ route('custom.home') }}">
                <i class="ti ti-chevron-left"></i>
            </a>
        </div>

        <div class="page-heading">
            <h6 class="mb-0">Trending Posts</h6>
        </div>

        <div class="search-form">
            <a href="#">
                <i class="ti ti-search"></i>
            </a>
        </div>
    </div>
</div>

<!-- Content -->
<div class="page-content-wrapper">
    <div class="catagory-posts-wrapper">

        <div class="container">
            <div class="d-flex align-items-center justify-content-between">

                <h5 class="mb-3 ps-2 newsten-title">
                    Trending
                </h5>

                <p class="mb-3 line-height-1">
                    {{ $posts->total() }} Posts
                </p>

            </div>
        </div>

        <div class="container">

            @forelse($posts as $post)
            <div class="single-news-post d-flex align-items-center bg-gray mb-3">

                <div class="post-thumbnail">

                    <img src="{{ $post->image_url }}" alt="">

                </div>

                <div class="post-content">

                    {{-- Title --}}
                    <a class="post-title"
                       href="{{ route('post.show', $post->slug) }}">
                        {{ $post->title }}
                    </a>

                    {{-- Meta --}}
                    <div class="post-meta d-flex align-items-center">

                        <a href="{{ route('category.show', $post->category->slug) }}">
                            {{ $post->category->name }}
                        </a>

                        <a href="#">
                            {{ $post->views_count }} Views
                        </a>

                    </div>

                </div>

            </div>
            @empty
                <p>No trending posts found</p>
            @endforelse

        </div>

        {{-- Pagination --}}
        <div class="container">
            <div class="text-center mt-3">
                {{ $posts->links() }}
            </div>
        </div>

    </div>
</div>

@endsection