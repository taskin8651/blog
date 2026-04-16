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
            <h3 class="mb-0">Welcome, Register Now!</h3>

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

        <!-- FORM -->
        <div class="register-form mt-5 px-3">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- NAME --}}
                <div class="form-group text-start mb-4">
                    <label>
                        <i class="ti ti-user-circle"></i>
                    </label>
                    <input class="form-control @error('name') is-invalid @enderror"
                           type="text"
                           name="name"
                           value="{{ old('name') }}"
                           placeholder="Username"
                           required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

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
                           required>
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

                {{-- CONFIRM PASSWORD --}}
                <div class="form-group text-start mb-4">
                    <label>
                        <i class="ti ti-circle-check"></i>
                    </label>
                    <input class="form-control"
                           type="password"
                           name="password_confirmation"
                           placeholder="Confirm Password"
                           required>
                </div>

                {{-- BUTTON --}}
                <button class="btn btn-primary btn-lg w-100">
                    Register Now
                </button>

            </form>
        </div>

        <!-- LOGIN LINK -->
        <div class="login-meta-data text-center">
            <p class="mt-3 mb-0">
                Already have an account?
                <a class="ms-2" href="{{ route('login') }}">Login</a>
            </p>
        </div>

    </div>
</div>

@endsection