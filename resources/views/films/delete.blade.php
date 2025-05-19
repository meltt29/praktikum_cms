@extends('layouts.app')

@section('title', 'Hapus Film')

@section('content')
    <div class="alert alert-danger">
        <p>Apakah Anda yakin ingin menghapus film <strong>{{ $film['judul'] }}</strong>?</p>
    </div>

    <form action="{{ route('films.destroy', $film['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('films.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
