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
        <h6 class="mb-0">#{{ $tag->name }}</h6>
      </div>

      <!-- Search Form-->
      <div class="search-form">
        <a href="search.html">
          <i class="ti ti-search"></i>
        </a>
      </div>
    </div>
  </div>

  
    <!-- All Catagory Wrapper-->
    <div class="all-catagory-wrapper mt-5">
    <div class="container">
        <h5 class="mb-3 newsten-title">All {{ $tag->name }}</h5>
    </div>

    <div class="container">
        <div class="row">

           @forelse($posts as $post)
            <div class="col-6 col-md-4">

                <div class="single-recommended-post mt-3">

                    {{-- Image --}}
                    <div class="post-thumbnail">
                        <img src="{{ $post->image_url }}" alt="">
                    </div>

                    <div class="post-content">

                        {{-- Category --}}
                        <a class="post-catagory"
                           href="{{ route('category.show', $post->category->slug) }}">
                            {{ $post->category->name }}
                        </a>

                        {{-- Title --}}
                        <a class="post-title"
                           href="{{ route('post.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>

                    </div>

                </div>

            </div>
            @empty
                <p>No posts found for this tag</p>
            @endforelse

              {{-- Pagination --}}
        <div class="text-center mt-3">
            {{ $posts->links() }}
        </div>

        </div>
    </div>
</div>
  </div>

  @endsection