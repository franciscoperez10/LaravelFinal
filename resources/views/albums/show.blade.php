@extends('layouts.fe_master')

@section('content')
    <h4> Album Details </h4>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Album Name: {{ $album->name }}</h5>
            <p class="card-text">Release Date: {{ $album->release_date }}</p>
            <a href="{{ route('albums.index') }}" class="btn btn-primary">Back to Albums</a>
        </div>
    </div>
@endsection
