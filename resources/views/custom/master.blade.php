<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    
    <!-- Title-->
    <title>OnroadMedia</title>
  
    <!-- SEO Meta -->
    <meta name="description" content="@yield('description', 'OnRoadMedia is a fast-growing platform sharing travel vlogs, lifestyle content, real stories and influencer experiences across India.')">
    <meta name="keywords" content="@yield('keywords', 'OnRoadMedia, Travel Vlog India, Lifestyle Vlog, Influencer India, Social Media Creator, YouTube Vlogger, Reels Creator')">
    <meta name="author" content="OnRoadMedia">
    <meta name="robots" content="index, follow">
  
    <!-- Mobile -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://onroadmedia.in/">

    <!-- Theme -->
    <meta name="theme-color" content="#e42f08">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    
    <!-- Favicon & App Icons -->
    <link rel="icon" href="{{ asset('img/favicon/favicon.ico') }}">
    <link rel="icon" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
    
    <!-- Open Graph / Social Preview -->
    <meta property="og:title" content="OnRoadMedia – Travel Vlogs & Lifestyle Content">
    <meta property="og:description" content="Watch amazing travel vlogs, lifestyle content and real-life stories on OnRoadMedia. Follow the journey of a growing social media influencer.">
    <meta property="og:url" content="https://onroadmedia.in/">
    <meta property="og:type" content="website">
    
    <!-- OG Image -->
    <meta property="og:image" content="https://onroadmedia.in/img/og-image.jpg">
    <meta property="og:image:secure_url" content="https://onroadmedia.in/img/og-image.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="OnRoadMedia – Travel Vlogs & Influencer Content Preview">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="OnRoadMedia – Travel Vlogs & Lifestyle">
    <meta name="twitter:description" content="Explore travel, reels, lifestyle and influencer content on OnRoadMedia.">
    <meta name="twitter:image" content="https://onroadmedia.in/img/og-image.jpg">
    <meta name="twitter:image:alt" content="OnRoadMedia – Travel & Lifestyle Preview">
    <meta name="twitter:site" content="@onroadmedia">
    <meta name="twitter:creator" content="@onroadmedia">

    <!-- Stylesheet-->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    
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
       <li class="{{ request()->routeIs('custom.home') ? 'active' : '' }}">
    <a href="{{ route('custom.home') }}">
        <i class="ti ti-home-2"></i>
    </a>
</li>

<li class="{{ request()->routeIs('categories*') ? 'active' : '' }}">
    <a href="{{ route('categories') }}">
        <i class="ti ti-layout"></i>
    </a>
</li>

<li class="{{ request()->routeIs('trending') ? 'active' : '' }}">
    <a href="{{ route('trending') }}">
        <i class="ti ti-bolt"></i>
    </a>
</li>

<li class="{{ request()->is('password.edit*') ? 'active' : '' }}">
    <a href="{{ url('profile/password') }}">
        <i class="ti ti-user"></i> 
    </a>
</li>

<li class="{{ request()->routeIs('bookmarks') ? 'active' : '' }}">
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

</body>


<!-- Mirrored from designing-world.com/news10-v2.0/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Mar 2026 09:14:20 GMT -->
</html>