@extends('layouts.fe_master')

@section('content')
<div class="container mt-4">
    <h1> Details of the Band </h1>
    <div class="card mb-4" style="width: 18rem;">
        @if ($band->photo)
        <img src="{{ $band->photo }}" alt="{{ $band->name }}">
        @else
        <p>No photo available</p>
        @endif
    </div>
    <a href="{{ route('bands.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
