@extends('custom.master')
@section('content')

  <!-- Header Area-->
  <div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between">
      <!-- Navbar Toggler-->
      <div class="navbar--toggler" id="newstenNavbarToggler"><span></span><span></span><span></span><span></span></div>

      <!-- Logo-->
      <div class="logo-wrapper">
        <a href="home.html">
          <img src="img/core-img/logo.png" alt="">
        </a>
      </div>

      <!-- Search Form-->
      <div class="search-form">
        <a href="search.html">
          <i class="ti ti-search"></i>
        </a>
      </div>
    </div>
  </div>

  <!-- Sidenav Black Overlay-->
  <div class="sidenav-black-overlay"></div>

  <!-- Side Nav Wrapper-->
  <div class="sidenav-wrapper" id="sidenavWrapper">
    <!-- Time - Weather-->
    <div class="time-date-weather-wrapper text-center py-5" style="background-image: url('img/bg-img/1.jpg')">
      <div class="weather-update mb-4">
        <l class="icon ti ti-temperature-sun"></l>
        <h4 class="mb-1">92°F</h4>
        <h6 class="mb-0">India</h6>
        <p class="mb-0">Mostly sunny</p>
      </div>
      <div class="time-date">
        <div id="dashboardDate"></div>
        <div class="running-time d-flex justify-content-center">
          <div id="hours"></div><span>:</span>
          <div id="min"></div><span>:</span>
          <div id="sec"></div>
        </div>
      </div>
    </div>

    <!-- Sidenav Nav-->
    <ul class="sidenav-nav">
      <li>
        <a href="live.html"><i class="ti ti-player-play"></i>Live<span
            class="red-circle ms-2 flashing-effect"></span></a>
      </li>
      <li>
        <a href="profile.html"><i class="ti ti-user-circle"></i>My Profile</a>
      </li>
      <li>
        <a href="pages.html"><i class="ti ti-files"></i>All Pages<span class="ms-2 badge badge-danger">HOT</span></a>
      </li>
      <li>
        <a href="catagory.html"><i class="ti ti-layout"></i>All Category <span
            class="ms-2 badge badge-warning">14+</span></a>
      </li>
      <li>
        <a href="settings.html"><i class="ti ti-settings"></i>Settings</a>
      </li>
      <li>
        <a href="login.html"><i class="ti ti-login"></i>Log In</a>
      </li>
    </ul>

    <!-- Go Back Button-->
    <div class="go-home-btn" id="goHomeBtn">
      <i class="ti ti-arrow-left"></i>
    </div>
  </div>

  <!-- Toast -->
  <div class="toast home-page-toast shadow-lg" role="alert" aria-live="assertive" aria-atomic="true"
    data-bs-autohide="true" data-bs-delay="10000" id="installWrap">
    <div class="toast-body p-4">
      <div class="toast-text me-2">
        <h6>Welcome to News10</h6>
        <span class="d-block mb-3">Click the <strong>Install Now</strong> button & enjoy it just like an
          app.</span>
        <button id="installNews10" class="btn btn-primary btn-sm fw-bold">Install Now</button>
      </div>
    </div>
    <button class="btn btn-close position-absolute p-2" type="button" data-bs-dismiss="toast"
      aria-label="Close"></button>
  </div>

  <div class="page-content-wrapper">
    <!-- News Today Wrapper-->
    <div class="news-today-wrapper">
      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <h5 class="mb-3 ps-1 newsten-title">News Today</h5>
          <p class="mb-3 line-height-1" id="dashboardDate2"></p>
        </div>

        <!-- Hero Slides-->
       <div class="hero-slides owl-carousel">

    @foreach($categories as $category)

        @if($category->posts->count())
        @php $post = $category->posts->first(); @endphp

        <div class="single-hero-slide"
             style="background-image: url('{{ $post->image_url }}')">

            {{-- Background Shape --}}
            <div class="background-shape">
                <div class="circle2"></div>
                <div class="circle3"></div>
            </div>

            <div class="slide-content h-100 d-flex align-items-end">
                <div class="container-fluid mb-3">

                    {{-- Video Icon --}}
                    <div class="video-icon">
                        <i class="ti ti-player-play"></i>
                    </div>

                    {{-- Bookmark --}}
                    <form action="{{ route('bookmark.store', $post->id) }}" method="POST">
    @csrf

    <button type="submit" class="bookmark-post border-0 bg-transparent">
        <i class="ti ti-bookmark"></i>
    </button>
</form>

                    {{-- Category --}}
                    <a class="post-catagory"
                       href="{{ route('category.show', $category->slug) }}">
                        {{ $category->name }}
                    </a>

                    {{-- Title --}}
                    <a class="post-title d-block"
                       href="{{ route('post.show', $post->slug) }}">
                        {{ $post->title }}
                    </a>

                    {{-- Meta --}}
                    <div class="post-meta d-flex align-items-center">

                        <a href="#">
                            <i class="me-1 ti ti-user-circle"></i>
                            Admin
                        </a>

                        <a href="#">
                            <i class="me-1 ti ti-calendar-month"></i>
                            {{ $post->created_at->format('d M') }}
                        </a>

                        <span>
                            <i class="me-1 ti ti-chart-bar"></i>
                            {{ rand(3,10) }} min read
                        </span>

                    </div>

                </div>
            </div>

        </div>

        @endif

    @endforeach

</div>
      </div>
    </div>

    <!-- Top Catagories Wrapper-->
    <div class="top-catagories-wrapper">
      <div class="bg-shapes">
        <div class="shape1"></div>
        <div class="shape2"></div>
        <div class="shape3"></div>
        <div class="shape4"></div>
        <div class="shape5"></div>
      </div>

      <h6 class="mb-3 catagory-title">Top Catagories</h6>
      <div class="container">
        <!-- Catagory Slides-->
        <div class="catagory-slides owl-carousel">
          <!-- Catagory Card-->
         @foreach($topCategories as $category)
            <div class="card catagory-card">

                <a href="{{ route('category.show', $category->slug) }}">

                    {{-- Image --}}
                    <img src="{{ $category->image_url }}" alt="">

                    {{-- Name --}}
                    <h6>{{ $category->name }}</h6>

                </a>

            </div>
            @endforeach

       
        </div>
      </div>
    </div>

    <!-- Trending News Wrapper-->
    <div class="trending-news-wrapper">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0 ps-1 newsten-title">Trending</h5>

            <a class="btn btn-primary btn-sm" href="#">
                View All
            </a>
        </div>
    </div>

    <div class="container">

        @foreach($trendingPosts as $post)
        <div class="single-trending-post d-flex mb-3">

            <div class="post-thumbnail">

                {{-- Image --}}
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

                    {{-- Category --}}
                    <a href="{{ route('category.show', $post->category->slug) }}">
                        {{ $post->category->name }}
                    </a>

                    {{-- Date --}}
                    <a href="#">
                        {{ $post->created_at->format('d M y') }}
                    </a>

                </div>

            </div>

        </div>
        @endforeach

    </div>
</div>


    <!-- Editorial Choice News Wrapper-->
    <div class="editorial-choice-news-wrapper">
      <!-- Background Shapes-->
      <div class="bg-shape1"><img src="img/core-img/edito.png" alt=""></div>
      <div class="bg-shape2" style="background-image: url('img/core-img/edito2.png')"></div>

      <div class="container">
        <div class="editorial-choice-title text-center mb-4"><i class="ti ti-shield"></i>
          <h6 class="newsten-title">Editorial Choice</h6>
        </div>
      </div>

      <div class="container">
        <!-- Editorial Choice News Slide-->
        <div class="editorial-choice-news-slide owl-carousel">
          @foreach($editorialPosts as $post)
<div class="single-editorial-slide d-flex">

    <form action="{{ route('bookmark.store', $post->id) }}" method="POST">
    @csrf

    <button type="submit" class="bookmark-post border-0 bg-transparent">
        <i class="ti ti-bookmark"></i>
    </button>
</form>

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
        <a class="post-title d-block"
           href="{{ route('post.show', $post->slug) }}">
            {{ $post->title }}
        </a>

        {{-- Meta --}}
        <div class="post-meta d-flex align-items-center">
            <a href="#">
                <i class="me-1 ti ti-user-circle"></i> Admin
            </a>
            <a href="#">
                <i class="me-1 ti ti-clock"></i>
                {{ $post->created_at->format('d M') }}
            </a>
        </div>

    </div>

</div>
@endforeach
        </div>
      </div>
    </div>

    <!-- For You News Wrapper-->
  <div class="for-you-news-wrapper">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0 ps-1 newsten-title">For You</h5>
            <a class="btn btn-primary btn-sm" href="#">View All</a>
        </div>
    </div>

    <div class="container">
        <div class="row">

            @foreach($forYouPosts as $post)
            <div class="col-6 col-md-4">

                <div class="single-recommended-post mt-3">

                    {{-- Bookmark --}}
                     <form action="{{ route('bookmark.store', $post->id) }}" method="POST">
    @csrf

    <button type="submit" class="bookmark-post border-0 bg-transparent">
        <i class="ti ti-bookmark"></i>
    </button>
</form>

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
            @endforeach

        </div>
    </div>
</div>
    <!-- Tabs News Wrapper-->
  <div class="tabs-news-wrapper bg-gray">
    <div class="container">

        {{-- NAV TABS --}}
        <nav>
            <div class="nav nav-tabs" role="tablist">

                <button class="nav-link"
                        data-bs-toggle="tab"
                        data-bs-target="#nav-newest">
                    Newest
                </button>

                <button class="nav-link active"
                        data-bs-toggle="tab"
                        data-bs-target="#nav-popular">
                    Popular
                </button>

                <button class="nav-link"
                        data-bs-toggle="tab"
                        data-bs-target="#nav-featured">
                    Featured
                </button>

            </div>
        </nav>

        {{-- TAB CONTENT --}}
        <div class="tab-content">

            {{-- 🔥 NEWEST --}}
            <div class="tab-pane fade" id="nav-newest">
                @foreach($newestPosts as $post)
                <div class="single-news-post d-flex align-items-center">

                    <div class="post-thumbnail">
                        <img src="{{ $post->image_url }}" alt="">
                    </div>

                    <div class="post-content">
                        <a class="post-title"
                           href="{{ route('post.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>

                        <div class="post-meta">
                            <a href="#">
                                {{ $post->created_at->diffForHumans() }}
                            </a>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

            {{-- 🔥 POPULAR --}}
            <div class="tab-pane fade show active" id="nav-popular">
                @foreach($popularPosts as $post)
                <div class="single-news-post d-flex align-items-center">

                    <div class="post-thumbnail">
                        <img src="{{ $post->image_url }}" alt="">
                    </div>

                    <div class="post-content">
                        <a class="post-title"
                           href="{{ route('post.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>

                        <div class="post-meta">
                            <a href="{{ route('category.show', $post->category->slug) }}">
                                {{ $post->category->name }}
                            </a>

                            <a href="#">
                                {{ $post->views_count }} Views
                            </a>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

            {{-- 🔥 FEATURED --}}
            <div class="tab-pane fade" id="nav-featured">
                @foreach($featuredPosts as $post)
                <div class="single-news-post d-flex align-items-center">

                    <div class="post-thumbnail">
                        <img src="{{ $post->image_url }}" alt="">
                    </div>

                    <div class="post-content">
                        <a class="post-title"
                           href="{{ route('post.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>

                        <div class="post-meta">
                            <a href="#">
                                Featured
                            </a>

                            <a href="#">
                                {{ $post->created_at->format('d M') }}
                            </a>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

    <!-- Popular Tags-->
   <div class="popular-tags-wrapper">
    <div class="container">
        <h5 class="mb-3 ps-2 newsten-title">Popular Tags</h5>
    </div>

    <div class="container">
        <div class="popular-tags-list">
@php
$colors = ['primary','success','warning','danger','info'];
@endphp

            @foreach($tags as $tag)
            <a class="btn btn-{{ $colors[array_rand($colors)] }} btn-sm m-1"
               href="{{ route('tag.show', $tag->id) }}">

                #{{ $tag->name }}

            </a>
            @endforeach

        </div>
    </div>
</div>
  </div>
@endsection