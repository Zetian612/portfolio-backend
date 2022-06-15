@extends('layouts.guest')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills justify-content-center">
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/admin/home') }}">Home</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('login') }}">Login</a>
                        </li>
                        @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection