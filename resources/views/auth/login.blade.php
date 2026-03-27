@extends('custom.master')

@section('content')

<div class="login-wrapper d-flex align-items-center justify-content-center">

    <!-- Shapes -->
    <div class="login-shape">
        <img src="{{ asset('img/core-img/login.png') }}" alt="">
    </div>

    <div class="login-shape2">
        <img src="{{ asset('img/core-img/login2.png') }}" alt="">
    </div>

    <div class="container">

        <!-- Header -->
        <div class="login-text text-center">
            <img class="login-img" src="{{ asset('img/bg-img/12.png') }}" alt="">
            <h3 class="mb-0">Welcome Back!</h3>

            <div class="bg-shapes">
                <div class="shape1"></div>
                <div class="shape2"></div>
                <div class="shape3"></div>
                <div class="shape4"></div>
                <div class="shape5"></div>
                <div class="shape6"></div>
                <div class="shape7"></div>
                <div class="shape8"></div>
            </div>
        </div>

        <!-- MESSAGE -->
        @if(session('message'))
            <div class="alert alert-info text-center mt-3">
                {{ session('message') }}
            </div>
        @endif

        <!-- FORM -->
        <div class="register-form mt-5 px-3">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- EMAIL --}}
                <div class="form-group text-start mb-4">
                    <label>
                        <i class="ti ti-mail-opened"></i>
                    </label>
                    <input class="form-control @error('email') is-invalid @enderror"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Email Address"
                           required autofocus>

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="form-group text-start mb-4">
                    <label>
                        <i class="ti ti-circle-key"></i>
                    </label>
                    <input class="form-control @error('password') is-invalid @enderror"
                           type="password"
                           name="password"
                           placeholder="Password"
                           required>

                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- REMEMBER --}}
                <div class="form-check mb-3">
                    <input type="checkbox" name="remember" class="form-check-input">
                    <label class="form-check-label">Remember me</label>
                </div>

                {{-- BUTTON --}}
                <button class="btn btn-primary btn-lg w-100">
                    Login
                </button>

            </form>
        </div>

        <!-- LINKS -->
        <div class="login-meta-data text-center">

            {{-- Forgot Password --}}
            @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="d-block mt-2">
                    Forgot Password?
                </a>
            @endif

            {{-- Register --}}
            <p class="mt-3 mb-0">
                Don't have an account?
                <a class="ms-2" href="{{ route('register') }}">Register</a>
            </p>

        </div>

    </div>
</div>

@endsection