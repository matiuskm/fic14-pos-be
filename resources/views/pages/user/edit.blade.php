@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="row pt-4 px-4 align-items-center justify-content-center">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit User</h6>
                <form action={{ route('users.update', $user) }} method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            name="username" placeholder="jhondoe" value="{{ $user->username }}">
                        <label for="username">Username</label>
                        @error('username')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Jhon Doe" value="{{ $user->name }}">
                        <label for="name">Name</label>
                        @error('name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="name@example.com" name="email" value="{{ $user->email }}">
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
                    <div class="form-floating mb-3">
                        <select class="form-select" id="role" name="role" aria-label="Add role">
                            <option value="user" @if($user->role == 'user') checked @endif>User</option>
                            <option value="staff" @if($user->role == 'staff') checked @endif>Staff</option>
                            <option value="admin" @if($user->role == 'admin') checked @endif>Admin</option>
                        </select>
                        <label for="role">Choose user role</label>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
