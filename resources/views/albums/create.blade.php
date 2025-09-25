@extends('layouts.fe_master')

@section('content')
    <div class="container mt-5">
        <h2>Create New Album</h2>
        <form action="{{ route('albums.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Album Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="release_date" class="form-label">Release Date</label>
                <input type="date" class="form-control" id="release_date" name="release_date" required>
            </div>
            <div class="mb-3">
                <label for="band_id" class="form-label">Band</label>
                <select id="band_id" name="band_id" class="form-select" required>
                    @foreach ($bands as $band)
                        <option value="{{ $band->id }}">{{ $band->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Album</button>
        </form>

    </div>
@endsection
