@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="/" class="">
                            <h3 class="text-primary">{{ env('APP_NAME', 'POS ARUNIKA') }}
                            </h3>
                        </a>
                    </div>
                    <h3>Sign In</h3>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text"
                                class="form-control @error('username')
                                is-invalid
                            @enderror"
                                id="username" name="username">
                            <label for="username">Username/Email</label>
                            @error('username')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control @error('password') is-invalid @enderror "
                                id="password" name="password">
                            <label for="password">Password</label>
                            @error('password')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center justify-content-end mb-4">
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                    </form>
                    <p class="text-center mb-0">Don't have an Account? <a href="{{ route('register') }}">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->

@endsection
