@extends('layouts.fe_master')

@section('content')
<div class="container mt-5">
    <h1> Dashboard </h1>
    <p> Hello, {{ Auth::user()->name }}</p>

    <div class="mt-4">
        <a href="{{ route('albums.index') }}" class="btn btn-primary me-2"> See Albums</a>
        <a href="{{ route('bands.index') }}" class="btn btn-primary me-2"> See Bands</a>
        <a href="{{ route('home_name') }}" class="btn btn-primary me-2"> Return to Homepage</a>
</div>
@endsection
