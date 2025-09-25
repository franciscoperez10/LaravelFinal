@extends('layouts.fe_master')

@section('content')

<h4>Edit Album</h4>
<form action="{{ route('albums.update', $album->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method(('PUT'))

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $album->title }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ $album->description }}</textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Cover Image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Update Album</button>
</form>
@endsection
