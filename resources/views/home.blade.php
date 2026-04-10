@extends('layouts.admin')

@section('content')
<div class="content">

    <!-- Dashboard Card -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-header">
                    <strong>Dashboard</strong>
                </div>

                <div class="card-body">

                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 class="mb-0">You are logged in!</h5>

                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="flex flex-wrap items-center md:justify-between justify-center mt-4">

        <!-- Left Text -->
        <div class="w-full md:w-1/2 px-4">
            <div class="text-sm text-gray-500 font-semibold py-2 text-center md:text-left">
                © {{ date('Y') }} Developed by
                <a href="https://sanketkumarofficial.com"
                   class="font-semibold"
                   style="color:#DB2777; transition:0.2s;"
                   onmouseover="this.style.color='#BE185D'"
                   onmouseout="this.style.color='#DB2777'"
                   target="_blank">
                    Sanket Kumar
                </a>
            </div>
        </div>

        <!-- Right Side (Empty for now) -->
        <div class="w-full md:w-1/2 px-4 text-center md:text-right">
            <!-- Future links or content -->
        </div>

    </div>

</div>
@endsection


@section('scripts')
@parent
@endsection