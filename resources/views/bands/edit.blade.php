@extends('layouts.fe_master')

@section('content')
<div class="container mt-4">
    <h1> Edit Band</h1>
    <form action="{{ route('bands.update', $band->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Band Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $band->name }}" required>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo URL</label>
            <input type="url" class="form-control" id="photo" name="photo" value="{{ $band->photo }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Band</button>
    </form>
</div>
<a href="{{ route('bands.index') }}" class="btn btn-secondary mt-3">Back to Bands List</a>
@endsection

