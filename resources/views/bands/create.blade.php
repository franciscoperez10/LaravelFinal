@extends('layouts.fe_master')

@section('content')
<div class="container mt-4">
    <h1> Create New Band</h1>
    <form action="{{ route('bands.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Band Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
        <label for="cover_image" class="form-label">Cover Image</label>
        <input type="file" class="form-control" id="cover_image" name="cover_image" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Band</button>
    </form>
</div>
<a href="{{ route('bands.index') }}" class="btn btn-secondary mt-3">Back to Bands List</a>
@endsection
