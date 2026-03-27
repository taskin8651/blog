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
        <h6 class="mb-0">Live Now</h6>
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
        @if($live)
    <!-- Live Video-->
    <div class="live-video-url">
  <div class="ratio ratio-16x9">
    <iframe 
      class="embed-responsive-item"
      src="{{ $live->video_url }}?autoplay=1&mute=1"
      allow="autoplay; encrypted-media"
      allowfullscreen>
    </iframe>
  </div>
</div>

    <!-- Live Video Info-->
    <div class="live-video-info">
      <div class="container">
        <h5 class="video-title mb-3">{{ $live->title }}</h5>
        <div class="d-flex align-items-center justify-content-between"><span class="video-time"><span
              class="red-circle me-1 flashing-effect"></span>Live Now</span>
          <span class="viwer-count d-flex align-items-center"><i class="h5 mb-0 me-1 ti ti-eye"></i> {{ number_format($live->views) }}
            viewing</span>
        </div>
      </div>
    </div>

      @else

    <!-- NO LIVE -->
    <div class="container text-center mt-5">
        <h5>No Live Stream Available</h5>
    </div>

    @endif

    </div> 


@endsection