@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap items-center md:justify-between justify-center">

            <!-- Left Text -->
            <div class="w-full md:w-4/12 px-4">
                <div class="text-sm text-blueGray-500 font-semibold py-1 text-center md:text-left">
                    © {{ date('Y') }} Developed by
                    <a href="https://sanketkumarofficial.com"
                       class="font-semibold"
                       style="color:#DB2777; transition:0.2s;"
                       onmouseover="this.style.color='#BE185D'"
                       onmouseout="this.style.color='#DB2777'"
                       target="_blank">
                        Sanket Kumar
                    </a>.
                </div>
            </div>

            <!-- Hidden Links Removed / Cleaned -->
            <div class="w-full md:w-8/12 px-4">
                <ul class="flex flex-wrap list-none md:justify-end justify-center hidden">
                    <!-- Empty because you want a clean footer -->
                </ul>
            </div>

        </div>
</div>
@endsection
@section('scripts')
@parent

@endsection