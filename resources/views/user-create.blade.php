@extends('layouts.dashboard-layout')

@section('content')
    <main class="main-content">
        <div class="container-fluid py-5">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h4 class="card-title">User Registration Form</h4>
                            <p class="mb-0">Fill out the form below to register a new user</p>
                        </div>
                        <div class="card-body">
                            @if (session('alert-class') && session('alert-message'))
                                <div class="alert {{ session('alert-class') }} alert-dismissible fade show p-2" role="alert">
                                    {{ session('alert-message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('user.register') }}">
                                @csrf
                                <!-- Name Field -->
                                <div class="mb-4">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter your full name" >
                                    @error('name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email Field -->
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter your email address" >
                                    @error('email')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password Field -->
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Enter a strong password" >
                                    @error('password')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password Field -->
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Re-enter your password" >
                                    @error('password_confirmation')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
