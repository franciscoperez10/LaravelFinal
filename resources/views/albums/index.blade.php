@extends('layouts.fe_master')

@section('content')
<div class="container mt-4">
    <h1> Albums List</h1>
    <a href="{{ route('albums.create') }}" class="btn btn-primary mb-3">Create New Album</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count)($albums) > 0)
    <table class="table table-striped table bordered">
        <thead>
            <tr>
                <th>Name></th>
                <th>Description</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
            <tr>
                <td>{{ $album->name }}</td>
                <td>{{ $album->description }}</td>
                <td>{{ $album->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>No albums found.</p>
    @endif
</div>
@endsection
