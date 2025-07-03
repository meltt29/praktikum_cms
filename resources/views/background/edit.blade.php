@extends('layouts.app')

@section('title', 'Upload Background')

@section('content')
<div class="container py-5 d-flex flex-column align-items-center justify-content-center" style="min-height:70vh;">
    <div class="card p-4 shadow-lg" style="max-width:500px;width:100%;background:#181818;">
        <h2 class="fw-bold mb-4 text-center" style="color:#e50914;">Upload Background Hero</h2>
        @if($background && $background->path)
            <div class="mb-3 text-center">
                <img src="{{ asset('storage/'.$background->path) }}" alt="Background" class="img-fluid rounded" style="max-height:200px;object-fit:cover;">
            </div>
        @endif
        <form method="POST" action="{{ route('background.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input type="file" name="background" class="form-control" accept="image/*" required>
            </div>
            <div class="d-flex gap-2 justify-content-center mt-3">
                <button type="submit" class="btn btn-netflix px-4">Upload</button>
                <a href="/" class="btn btn-outline-light">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection 