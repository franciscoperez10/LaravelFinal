@extends('layouts.fe_master')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Details of the Band</h1>
    <div class="row">
        <!-- Card Dados Banda -->
        <div class="col-md-4">
            <div class="card">
                @if ($band->photo)
                    <img src="{{ $band->photo }}" alt="{{ $band->name }}" class="card-img-top" style="object-fit:cover; max-height:200px;">
                @else
                    <div class="card-img-top bg-light text-center p-5 text-muted">No photo available</div>
                @endif
                <div class="card-body">
                    <h4 class="card-title text-center">{{ $band->name }}</h4>
                </div>
            </div>
            <a href="{{ route('bands.index') }}" class="btn btn-secondary w-100 mt-3">Back to Bands List</a>
            <a href="{{ route('home_name') }}" class="btn btn-outline-secondary w-100 mt-2">Back to Homepage</a>
        </div>

        <!-- Tabela de Álbuns -->
        <div class="col-md-8">
            <h3 class="mb-3">Albums of {{ $band->name }}</h3>
            @if ($albums && count($albums) > 0)
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Release Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($albums as $album)
                                <tr>
                                    <td>{{ $album->name }}</td>
                                    <td>
                                        @if ($album->image)
                                            <img src="{{ asset($album->image) }}" alt="{{ $album->name }}" style="max-width: 70px; max-height: 60px;">
                                        @else
                                            <span class="text-muted">No image</span>
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($album->release_date)) }}</td>
                                    <td>
                                        <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                        <a href="{{ route('albums.show', $album->id) }}" class="btn btn-info btn-sm me-1">View</a>
                                        <form action="{{ route('albums.destroy', $album->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted">No albums for this band.</p>
            @endif
        </div>
    </div>
</div>
@endsection
