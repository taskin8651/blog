
@extends('custom.master')
@section('content')



  <!-- Header Area-->
  <div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between">
      <!-- Back Button-->
      <div class="back-button">
        <a href="{{ route('custom.home') }}">
          <i class="ti ti-chevron-left"></i>
        </a>
      </div>

      <!-- Page Title-->
      <div class="page-heading">
        <h6 class="mb-0">{{ $category->name }}</h6>
      </div>

      <!-- Search Form-->
      <div class="search-form">
        <a href="search.html">
          <i class="ti ti-search"></i>
        </a>
      </div>
    </div>
  </div>

 <div class="page-content-wrapper">
    <div class="catagory-posts-wrapper">

        <div class="container">
            <div class="d-flex align-items-center justify-content-between">

                {{-- Category Name --}}
                <h5 class="mb-3 ps-2 newsten-title">
                    {{ $category->name }}
                </h5>

                {{-- Total Posts --}}
                <p class="mb-3 line-height-1">
                    {{ $posts->total() }} Posts
                </p>

            </div>
        </div>

        <div class="container">

            @forelse($posts as $post)
            <!-- Single News Post-->
            <div class="single-news-post d-flex align-items-center bg-gray mb-3">

                <div class="post-thumbnail">

                    {{-- Image --}}
                    <img src="{{ $post->image_url 
                        ? asset($post->image_url) 
                        : asset('img/default.jpg') }}" alt="">

                </div>

                <div class="post-content">

                    {{-- Title --}}
                    <a class="post-title"
                       href="{{ route('post.show', $post->slug ?? $post->id) }}">
                        {{ $post->title }}
                    </a>

                    {{-- Time --}}
                    <div class="post-meta d-flex align-items-center">
                        <a href="#">
                            {{ $post->created_at->diffForHumans() }}
                        </a>
                    </div>

                </div>

            </div>
            @empty
                <p>No posts found in this category</p>
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