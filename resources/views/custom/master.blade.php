<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from designing-world.com/news10-v2.0/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Mar 2026 09:13:46 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="theme-color" content="#e42f08">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">

  <!-- Title-->
  <title>News10 - Blog &amp; Magazine Mobile HTML Template</title>

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">
  <link rel="apple-touch-icon" href="{{ asset('img/icons/icon-96x96.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/icons/icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('img/icons/icon-167x167.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/icons/icon-180x180.png') }}">

  <!-- Stylesheet-->
  <link rel="stylesheet" href="{{ asset('style.css') }}">

  <!-- Web App Manifest -->
  <link rel="manifest" href="{{ asset('manifest.json') }}">
</head>

<body>
  <!-- Preloader-->
  <div class="preloader" id="preloader">
    <div class="spinner-grow text-secondary" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>


  @yield('content')



  
  <!-- Footer Nav -->
  <div class="footer-nav-area" id="footerNav">
    <div class="newsten-footer-nav h-100">
      <ul class="h-100 d-flex align-items-center justify-content-between">
        <li class="active">
          <a href="{{ route('custom.home') }}">
            <i class="ti ti-home-2"></i>
          </a>
        </li>
        <li>
          <a href="{{ route('categories') }}">
            <i class="ti ti-layout"></i>
          </a>
        </li>
        <li>
          <a href="{{ route('trending') }}">
            <i class="ti ti-bolt"></i>
          </a>
        </li>
        <li>
          <a href="pages.html">
            <i class="ti ti-heart"></i>
          </a>
        </li>
        <li>
          <a href="{{ route('bookmarks') }}">
            <i class="ti ti-bookmark"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <!-- All JavaScript Files-->
  {{-- jQuery --}}
<script src="{{ asset('js/jquery.min.js') }}"></script>

{{-- Bootstrap --}}
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

{{-- Plugins --}}
<script src="{{ asset('js/waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.animatedheadline.min.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>

{{-- Custom --}}
<script src="{{ asset('js/date-clock.js') }}"></script>
<script src="{{ asset('js/dark-mode-switch.js') }}"></script>
<script src="{{ asset('js/active.js') }}"></script>

{{-- PWA --}}
{{-- <script src="{{ asset('js/pwa.js') }}"></script> --}}
</body>


<!-- Mirrored from designing-world.com/news10-v2.0/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Mar 2026 09:14:20 GMT -->
</html>