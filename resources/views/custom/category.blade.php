@extends('custom.master')
@section('content')


  <!-- Header Area-->
  <div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between">
      <!-- Back Button-->
      <div class="back-button">
        <a href="/">
          <i class="ti ti-chevron-left"></i>
        </a>
      </div>

      <!-- Page Title-->
      <div class="page-heading">
        <h6 class="mb-0">Catagoryddd</h6>
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
    <!-- Top Catagories Wrapper-->
    <div class="top-catagories-wrapper">
    <div class="bg-shapes">
        <div class="shape1"></div>
        <div class="shape2"></div>
        <div class="shape3"></div>
        <div class="shape4"></div>
        <div class="shape5"></div>
    </div>

    <h6 class="mb-3 catagory-title">Top Categories</h6>

    <div class="container">
        <div class="catagory-slides owl-carousel">

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

    <!-- All Catagory Wrapper-->
    <div class="all-catagory-wrapper">
    <div class="container">
        <h5 class="mb-3 newsten-title">All Categories</h5>
    </div>

    <div class="container">
        <div class="row">

            @foreach($categories as $category)
            <div class="col-6 col-sm-4">
                <div class="card catagory-card mb-3">

                    <a href="{{ route('category.show', $category->slug) }}">

                        {{-- Image --}}
                        <img src="{{ $category->image_url }}" alt="">

                        {{-- Name + Count 🔥 --}}
                        <h6>
                            {{ $category->name }}
                            ({{ $category->posts_count }})
                        </h6>

                    </a>

                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
  </div>

  @endsection