@extends('custom.master')

@section('content')

<div class="container mt-4">

    <!-- PROFILE CARD -->
    <div class="card mb-3">
        <div class="card-body text-center">

            {{-- Profile Image --}}
            <img src="{{ auth()->user()->profile_image }}"
                 class="rounded-circle mb-2"
                 width="80">

            <h5>{{ auth()->user()->name }}</h5>
            <p class="text-muted mb-0">{{ auth()->user()->email }}</p>

        </div>
    </div>

    <!-- UPDATE PROFILE -->
    <div class="card mb-3">
        <div class="card-body">

            <h6 class="mb-3">Update Profile</h6>

            <form method="POST"
                  action="{{ route('profile.password.updateProfile') }}"
                  enctype="multipart/form-data">
                @csrf

                {{-- Name --}}
                <div class="form-group mb-2">
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ auth()->user()->name }}"
                           placeholder="Name" required>
                </div>

                {{-- Email --}}
                <div class="form-group mb-2">
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ auth()->user()->email }}"
                           placeholder="Email" required>
                </div>

                {{-- Phone --}}
                <div class="form-group mb-2">
                    <input type="text"
                           name="phone"
                           class="form-control"
                           value="{{ auth()->user()->phone }}"
                           placeholder="Phone">
                </div>

                {{-- Designation --}}
                <div class="form-group mb-2">
                    <input type="text"
                           name="designation"
                           class="form-control"
                           value="{{ auth()->user()->designation }}"
                           placeholder="Designation">
                </div>

                {{-- Address --}}
                <div class="form-group mb-2">
                    <textarea name="address"
                              class="form-control"
                              placeholder="Address">{{ auth()->user()->address }}</textarea>
                </div>

                {{-- Image --}}
                <div class="form-group mb-3">
                    <input type="file" name="image" class="form-control">
                </div>

                <button class="btn btn-primary w-100">
                    Update Profile
                </button>

            </form>

        </div>
    </div>

    <!-- CHANGE PASSWORD -->
    <div class="card change-password-card mb-3">
        <div class="card-body">

            <h6 class="mb-3">Change Password</h6>

            <form method="POST" action="{{ route('profile.password.update') }}">
                @csrf

                <div class="form-group mb-3">
                    <span>New Password</span>
                    <input class="form-control" type="password" name="password" required>
                </div>

                <div class="form-group mb-3">
                    <span>Repeat Password</span>
                    <input class="form-control" type="password" name="password_confirmation" required>
                </div>

                <button class="btn btn-success w-100">
                    Update Password
                </button>
            </form>

        </div>
    </div>

    <!-- DELETE ACCOUNT -->
    <div class="card">
        <div class="card-body text-center">

            <form method="POST"
                  action="{{ route('profile.password.destroyProfile') }}"
                  onsubmit="return confirm('Are you sure?')">
                @csrf

                <button class="btn btn-danger w-100">
                    Delete Account
                </button>
            </form>

        </div>
    </div>

</div>

@endsection