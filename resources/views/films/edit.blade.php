@extends('layouts.app')

@section('title', 'Edit Film')

@section('content')
    <form method="POST" action="{{ route('films.update', $film['id']) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $film['judul'] }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Tahun Rilis</label>
            <input type="number" name="tahun_rilis" class="form-control" value="{{ $film['tahun_rilis'] }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Sutradara</label>
            <input type="text" name="sutradara" class="form-control" value="{{ $film['sutradara'] }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('films.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
