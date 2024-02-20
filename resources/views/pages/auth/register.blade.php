@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="row align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="/" class="">
                        <h3 class="text-primary">{{ env('APP_NAME', 'POS ARUNIKA') }}</h3>
                    </a>
                </div>
                <h3 class="mb-3">Sign Up</h3>
                <form action={{ route('register') }} method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            name="username" placeholder="jhondoe">
                        <label for="username">Username</label>
                        @error('username')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Jhon Doe">
                        <label for="name">Name</label>
                        @error('name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="name@example.com" name="email">
                        <label for="email">Email address</label>
                        @error('email')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password"
                            class="form-control @error('password')
                            is-invalid
                        @enderror "
                            id="password" name="password" placeholder="Password">
                        <label for="password">Password</label>
                        @error('password')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password"
                            class="form-control @error('password_confirmation')
                            is-invalid
                        @enderror"
                            id="password_confirmation" name="password_confirmation" placeholder="Password">
                        <label for="password_confirmation">Password</label>
                        @error('password_confirmation')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                </form>
                <p class="text-center mb-0">Already have an Account? <a href="{{ route('login') }}">Sign In</a></p>
            </div>
        </div>
    </div>
@endsection
