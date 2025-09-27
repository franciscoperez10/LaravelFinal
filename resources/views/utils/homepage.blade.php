@extends('layouts.fe_master')

@section('content')

<h1>CRM de Bandas de Música</h1>

<ul>
    <li><a href= "{{ route('albums.index') }}">Albums</a></li>
    <li><a href= "{{ route('bands.index') }}">Bands</a></li>
</ul>

<p> Copyright: Francisco Perez, September 2025 </p>

