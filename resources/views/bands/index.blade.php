@extends('layouts.fe_master')

@section('content')
<div class="container mt-4">
    <h1> List of Bands </h1>
    <a href="{{ route('bands.create') }}" class="btn btn-primary mb-3">Add New Band</a>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(count($bands) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Genre</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bands as $band)
            <tr>
                <td>
                    <a href="{{ route('bands.edit', $band->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ route('bands.show', $band->id) }}" class="btn btn-sm btn-info">View</a>
                    <form action="{{ route('bands.destroy', $band->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
                <td>{{ $band->name }}</td>
                <td>
                    @if ($band->photo)
                    <img src="{{ $band->photo }}" alt="{{ $band->name }}" style="width: 100px; height: auto;">
                    @else
                    <p>No photo available</p>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No bands available.</p>
    @endif
</div>
@endsection
