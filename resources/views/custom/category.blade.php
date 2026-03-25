@extends('custom.master')
@section('content')


  <!-- Header Area-->
  <div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between">
      <!-- Back Button-->
      <div class="back-button">
        <a href="home.html">
          <i class="ti ti-chevron-left"></i>
        </a>
      </div>

      <!-- Page Title-->
      <div class="page-heading">
        <h6 class="mb-0">Catagory</h6>
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

      <h6 class="mb-3 catagory-title">Top Catagories</h6>
      <div class="container">
        <!-- Catagory Slides-->
        <div class="catagory-slides owl-carousel">
          <!-- Catagory Card-->
          <div class="card catagory-card">
            <a href="single-catagory.html">
              <img src="img/bg-img/8.jpg" alt="">
              <h6>Politics</h6>
            </a>
          </div>

         
        </div>
      </div>
    </div>

    <!-- All Catagory Wrapper-->
    <div class="all-catagory-wrapper">
      <div class="container">
        <h5 class="mb-3 newsten-title">All Catagory</h5>
      </div>

      <div class="container">
        <div class="row">
          <!-- Catagory Card-->
          <div class="col-6 col-sm-4">
            <div class="card catagory-card mb-3">
              <a href="single-catagory.html">
                <img src="img/bg-img/8.jpg" alt="">
                <h6>Politics (27)</h6>
              </a>
            </div>
          </div>

          <!-- Catagory Card-->
          <div class="col-6 col-sm-4">
            <div class="card catagory-card mb-3">
              <a href="single-catagory.html">
                <img src="img/bg-img/3.jpg" alt="">
                <h6>Fashion (31)</h6>
              </a>
            </div>
          </div>

          <!-- Catagory Card-->
          <div class="col-6 col-sm-4">
            <div class="card catagory-card mb-3">
              <a href="single-catagory.html">
                <img src="img/bg-img/6.jpg" alt="">
                <h6>Tech (19)</h6>
              </a>
            </div>
          </div>

          <!-- Catagory Card-->
          <div class="col-6 col-sm-4">
            <div class="card catagory-card mb-3">
              <a href="single-catagory.html">
                <img src="img/bg-img/15.jpg" alt="">
                <h6>Lifestyle (42)</h6>
              </a>
            </div>
          </div>

          <!-- Catagory Card-->
          <div class="col-6 col-sm-4">
            <div class="card catagory-card mb-3">
              <a href="single-catagory.html">
                <img src="img/bg-img/9.jpg" alt="">
                <h6>Sports (67)</h6>
              </a>
            </div>
          </div>

          <!-- Catagory Card-->
          <div class="col-6 col-sm-4">
            <div class="card catagory-card mb-3">
              <a href="single-catagory.html">
                <img src="img/bg-img/10.jpg" alt="">
                <h6>World (23)</h6>
              </a>
            </div>
          </div>

          <!-- Catagory Card-->
          <div class="col-6 col-sm-4">
            <div class="card catagory-card mb-3">
              <a href="single-catagory.html">
                <img src="img/bg-img/14.jpg" alt="">
                <h6>Environment (11)</h6>
              </a>
            </div>
          </div>

          <!-- Catagory Card-->
          <div class="col-6 col-sm-4">
            <div class="card catagory-card mb-3">
              <a href="single-catagory.html">
                <img src="img/bg-img/13.jpg" alt="">
                <h6>People (36)</h6>
              </a>
            </div>
          </div>

          <!-- Catagory Card-->
          <div class="col-6 col-sm-4">
            <div class="card catagory-card mb-3">
              <a href="single-catagory.html">
                <img src="img/bg-img/12.jpg" alt="">
                <h6>Gadgets (24)</h6>
              </a>
            </div>
          </div>

          <!-- Catagory Card-->
          <div class="col-6 col-sm-4">
            <div class="card catagory-card mb-3">
              <a href="single-catagory.html">
                <img src="img/bg-img/7.jpg" alt="">
                <h6>Health (72)</h6>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection