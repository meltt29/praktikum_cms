@extends('layouts.app')

@section('title', 'Tambah Film')

@section('content')
    <form method="POST" action="{{ route('films.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Tahun Rilis</label>
            <input type="number" name="tahun_rilis" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Sutradara</label>
            <input type="text" name="sutradara" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('films.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
