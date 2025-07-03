@extends('layouts.app')

@section('title', 'Detail Film')

@section('content')
<div class="container py-4 d-flex justify-content-center align-items-center" style="min-height:70vh;">
    <div class="card shadow-lg p-4" style="max-width:700px;width:100%;background:#181818;">
        <div class="row g-4 align-items-center">
            <div class="col-md-5 text-center">
                @if($film->poster)
                    <img src="{{ asset('storage/'.$film->poster) }}" alt="Poster {{ $film->judul }}" class="img-fluid rounded mb-3 mb-md-0" style="max-height:340px;object-fit:contain;background:#111;">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-dark rounded" style="height:340px;">
                        <i class="bi bi-film" style="font-size:5rem;color:#e50914;"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-7">
                <h2 class="fw-bold mb-2" style="color:#e50914;">{{ $film->judul }}</h2>
                <div class="mb-2 text-secondary">{{ $film->tahun_rilis }} &bull; {{ $film->sutradara }}</div>
                <div class="mb-2">
                    <strong>Genre:</strong> <span>{{ is_array($film->genre) ? implode(', ', $film->genre) : $film->genre }}</span>
                </div>
                <div class="mb-2">
                    <strong>Aktor:</strong> <span>{{ is_array($film->aktor) ? implode(', ', $film->aktor) : $film->aktor }}</span>
                </div>
                <div class="mb-2">
                    <strong>Deskripsi:</strong> <span>{{ $film->deskripsi }}</span>
                </div>
                <div class="mb-2">
                    <strong>Rating:</strong> <span>{{ $film->rating !== null ? number_format($film->rating, 1) : '-' }}</span>
                </div>
                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('films.index') }}" class="btn btn-outline-light">Kembali</a>
                    <a href="{{ route('films.edit', $film->id) }}" class="btn btn-outline-primary">Edit</a>
                    <form action="{{ route('films.destroy', $film->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus film ini?')" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-secondary">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection