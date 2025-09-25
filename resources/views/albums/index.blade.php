@extends('layouts.fe_master')

@section('content')
    <div class="container mt-4">
        <h1>Albums List</h1>
        <a href="{{ route('home_name') }}" class="btn btn-secondary mb-3">Back to Homepage</a>
        <a href="{{ route('albums.create') }}" class="btn btn-primary mb-3">Create New Album</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (count($albums) > 0)
            <table class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Release Date</th>
                        <th>Created At</th>
                        <th style="width: 220px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($albums as $album)
                        <tr>
                            <td>{{ $album->name }}</td>
                            <td>
                                @if ($album->image)
                                    <img src="{{ asset($album->image) }}" alt="Album Image"
                                        style="max-width: 80px; max-height: 60px;">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>{{ date('d-m-Y', strtotime($album->release_date)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($album->created_at)) }}</td>

                            <td>
                                <a href="{{ route('albums.edit', $album->id) }}"
                                    class="btn btn-warning btn-sm me-1">Edit</a>
                                <a href="{{ route('albums.show', $album->id) }}" class="btn btn-info btn-sm me-1">View</a>
                                <form action="{{ route('albums.destroy', $album->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No albums found.</p>
        @endif
    </div>
@endsection
