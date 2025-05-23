@extends('layouts.app')

@section('title', 'Detail Film')

@section('content')
    <ul class="list-group">
        <li class="list-group-item"><strong>Judul:</strong> {{ $film['judul'] }}</li>
        <li class="list-group-item"><strong>Tahun Rilis:</strong> {{ $film['tahun_rilis'] }}</li>
        <li class="list-group-item"><strong>Sutradara:</strong> {{ $film['sutradara'] }}</li>
        <li class="list-group-item"><strong>Genre:</strong> {{ implode(', ', $film['genre']) }}</li>
        <li class="list-group-item"><strong>Aktor:</strong> {{ implode(', ', $film['aktor']) }}</li>
    </ul>

    <a href="{{ route('films.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
