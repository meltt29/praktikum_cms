@extends('layouts.app')

@section('title', 'Daftar Film')

@php
    $background = \App\Models\Background::first();
    $modalId = 0;
@endphp

@section('content')
<div class="w-100 position-relative" style="position:fixed;left:0;top:0;width:100vw;height:500px;overflow:hidden;z-index:0;">
    @if($background && $background->path)
        <img src="{{ asset('storage/'.$background->path) }}" alt="Background" style="width:100vw;height:500px;object-fit:cover;filter:brightness(0.5);">
        <div style="position:absolute;left:0;top:0;width:100vw;height:500px;z-index:1;pointer-events:none;
            background:
                linear-gradient(to top, rgba(20,20,20,0.85) 0%, rgba(20,20,20,0) 30%),
                linear-gradient(to bottom, rgba(20,20,20,0.85) 0%, rgba(20,20,20,0) 30%),
                linear-gradient(to right, rgba(20,20,20,0.85) 0%, rgba(20,20,20,0) 30%),
                linear-gradient(to left, rgba(20,20,20,0.85) 0%, rgba(20,20,20,0) 30%);"></div>
    @else
        <div style="width:100vw;height:500px;background:#222;"></div>
    @endif
    <div class="position-absolute top-50 start-50 translate-middle text-center" style="z-index:3;pointer-events:none;">
        <span style="font-size:4.5rem;font-weight:900;letter-spacing:2px;color:#fff;text-shadow:0 4px 32px #000,0 1px 0 #e50914;user-select:none;">FILM<span style="color:#e50914;">KU</span></span>
    </div>
    <div class="position-absolute w-100 d-flex justify-content-center" style="top:380px;left:0;z-index:2;">
        <div class="filter-bar card shadow-sm p-4 mb-0" style="background:rgba(30,30,30,0.35); border:none; border-radius:1.2rem; max-width:900px; width:90vw;">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                <form method="GET" class="d-flex flex-grow-1 gap-2 align-items-center">
                    <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari judul, sutradara, genre, aktor..." style="min-width:220px;border:none;background:rgba(30,30,30,0.5);color:#fff;">
                    <button class="btn btn-secondary ms-2">Cari</button>
                    <a href="{{ route('films.index') }}" class="btn btn-outline-light ms-1">Reset</a>
                </form>
                <a href="{{ route('films.create') }}" class="btn btn-netflix btn-lg shadow" style="min-width:160px;">Tambah Film</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid px-0 mt-4">
    @if($films->isEmpty())
        <div class="alert alert-warning text-center">Tidak ada film ditemukan.</div>
    @endif

    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach($films as $film)
            <div class="col">
                <div class="card h-100 shadow position-relative">
                    @if($film->poster)
                        <div style="background:#181818;padding:8px 8px 4px 8px;border-radius:1.1rem 1.1rem 0 0;display:flex;align-items:center;justify-content:center;height:270px;">
                            <img src="{{ asset('storage/'.$film->poster) }}" class="card-img-top shadow" alt="Poster {{ $film->judul }}" style="max-height:250px;max-width:100%;object-fit:contain;border-radius:0.7rem;box-shadow:0 4px 24px rgba(0,0,0,0.18);background:#111;">
                        </div>
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-dark" style="height:270px;">
                            <i class="bi bi-film" style="font-size:4rem;color:#e50914;"></i>
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column p-3" style="font-size:0.97rem;">
                        <h5 class="card-title fw-bold mb-1" style="font-size:1.15rem;">{{ $film->judul }}</h5>
                        <div class="mb-2 small text-secondary" style="font-size:0.93rem;">{{ $film->tahun_rilis }} &bull; {{ $film->sutradara }}</div>
                        <div class="mb-1" style="font-size:0.85rem;">
                            <strong>Genre:</strong>
                            @php
                                $genre = $film->genre;
                                if (is_string($genre) && str_starts_with($genre, '[')) {
                                    $genre = json_decode($genre, true);
                                }
                            @endphp
                            @if(is_array($genre))
                                {{ implode(', ', $genre) ?: '-' }}
                            @elseif($genre)
                                {{ $genre }}
                            @else
                                -
                            @endif
                        </div>
                        <div class="mb-1" style="font-size:0.85rem;">
                            <strong>Aktor:</strong>
                            @php
                                $aktor = $film->aktor;
                                if (is_string($aktor) && str_starts_with($aktor, '[')) {
                                    $aktor = json_decode($aktor, true);
                                }
                            @endphp
                            @if(is_array($aktor))
                                {{ implode(', ', $aktor) ?: '-' }}
                            @elseif($aktor)
                                {{ $aktor }}
                            @else
                                -
                            @endif
                        </div>
                        <div class="mb-2" style="font-size:0.85rem;">
                            <strong>Rating:</strong> {{ $film->rating !== null ? number_format($film->rating, 1) : '-' }}
                        </div>
                        <div class="mt-auto d-flex gap-2 justify-content-center">
                            <a href="{{ route('films.show', $film->id) }}" class="btn btn-outline-light rounded-pill px-2 py-1" style="font-size:0.85rem;">Lihat</a>
                            <a href="{{ route('films.edit', $film->id) }}" class="btn btn-outline-light rounded-pill px-2 py-1" style="font-size:0.85rem;">Edit</a>
                            <button type="button" class="btn btn-outline-light rounded-pill px-2 py-1" style="border-color:#e50914;color:#e50914;font-size:0.85rem;" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $film->id }}">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Konfirmasi Hapus -->
            <div class="modal fade" id="modalHapus{{ $film->id }}" tabindex="-1" aria-labelledby="modalHapusLabel{{ $film->id }}" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background:#181818;color:#fff;border-radius:1.2rem;">
                  <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="modalHapusLabel{{ $film->id }}">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-center">
                    Yakin ingin menghapus film <span class="fw-bold" style="color:#e50914;">{{ $film->judul }}</span>?
                  </div>
                  <div class="modal-footer border-0 justify-content-center">
                    <form action="{{ route('films.destroy', $film->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-netflix px-4">Ya, Hapus</button>
                    </form>
                    <button type="button" class="btn btn-outline-light px-4" data-bs-dismiss="modal">Batal</button>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
    </div>
</div>
@endsection