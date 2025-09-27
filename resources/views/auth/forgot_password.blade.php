@extends('layouts.fe_master')

@section('content')
<div class="containar mt-5">
    <h2>Forgot Password</h2>

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
        <a href="{{ route('home_name') }}" class="btn btn-link">Back to Homepage</a>
    </form>
</div>
@endsection
