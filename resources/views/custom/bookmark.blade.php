@extends('custom.master')

@section('content')

<!-- Header -->
<div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between">

        <div class="back-button">
            <a href="{{ route('custom.home') }}">
                <i class="ti ti-chevron-left"></i>
            </a>
        </div>

        <div class="page-heading">
            <h6 class="mb-0">Bookmarks</h6>
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

    <div class="for-you-news-wrapper">

        <div class="container">
            <div class="d-flex align-items-center justify-content-between">

                <h5 class="mb-0 newsten-title">Your Bookmarks</h5>

                <p class="mb-0 line-height-1">
                    {{ $bookmarks->total() }} Posts
                </p>

            </div>
        </div>

        <div class="container">
            <div class="row">

                @forelse($bookmarks as $bookmark)
                @php $post = $bookmark->post; @endphp

                <div class="col-6 col-md-4">
                    <div class="single-recommended-post mt-3">

                        {{-- Dropdown --}}
                        <div class="bookmark-customize-option">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="ti ti-dots"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-end">

                                {{-- Remove --}}
                                <form action="{{ route('bookmarks.destroy', $bookmark->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="dropdown-item">
                                        <i class="me-1 ti ti-trash"></i> Remove
                                    </button>
                                </form>

                            </div>
                        </div>

                        {{-- Image --}}
                        <div class="post-thumbnail">
                            <img src="{{ $post->image_url }}" alt="">
                        </div>

                        {{-- Content --}}
                        <div class="post-content">

                            <a class="post-catagory"
                               href="{{ route('category.show', $post->category->slug) }}">
                                {{ $post->category->name }}
                            </a>

                            <a class="post-title"
                               href="{{ route('post.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>

                        </div>

                    </div>
                </div>

                @empty
                <div class="col-12 text-center mt-4">
                    <p>No bookmarks found</p>
                </div>
                @endforelse

            </div>

            {{-- Pagination --}}
            <div class="text-center mt-3">
                {{ $bookmarks->links() }}
            </div>

        </div>

    </div>

</div>

@endsection