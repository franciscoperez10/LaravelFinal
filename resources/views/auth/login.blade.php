@extends('layouts.fe_master')

@section('content')
<div class ="container mt-5">
    <h2> Login </h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="{{ route('register') }}" class="btn btn-link">Register</a>
        <a href="{{ route('password.request') }}" class="btn btn-link">Forgot Your Password?</a>
        <a href="{{ route('home_name') }}" class="btn btn-link">Back to Homepage</a>
    </form>
</div>
@endsection
