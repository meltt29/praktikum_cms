@extends('layouts.app')

@section('title', 'Edit Film')

@section('head')
<!-- Select2 CDN -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height:70vh;">
    <div class="card p-4 shadow-lg" style="max-width:500px;width:100%;background:#181818;">
        <h2 class="fw-bold mb-4 text-center" style="color:#e50914;">Edit Film</h2>
        <form method="POST" action="{{ route('films.update', $film->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul', $film->judul) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun Rilis</label>
                <input type="number" name="tahun_rilis" class="form-control" value="{{ old('tahun_rilis', $film->tahun_rilis) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Sutradara</label>
                <input type="text" name="sutradara" class="form-control" value="{{ old('sutradara', $film->sutradara) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Genre</label>
                <select name="genre[]" class="form-select" multiple required>
                    @php $genreList = ['Action','Drama','Comedy','Romance','Horror','Animation','Adventure','Science Fiction','Thriller']; @endphp
                    @foreach($genreList as $g)
                        <option value="{{ $g }}" @if(collect(old('genre', $film->genre))->contains($g)) selected @endif>{{ $g }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Aktor</label>
                <input type="text" name="aktor" class="form-control" value="{{ is_array(old('aktor', $film->aktor)) ? implode(', ', old('aktor', $film->aktor)) : old('aktor', $film->aktor) }}" placeholder="Pisahkan dengan koma jika lebih dari satu">
                <small class="text-secondary">Contoh: Tom Hardy, Brad Pitt</small>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $film->deskripsi) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Rating</label>
                <input type="number" name="rating" class="form-control" min="0" max="10" step="0.1" value="{{ old('rating', $film->rating) }}" required>
                <small class="text-secondary">Nilai 0 - 10 (boleh desimal, contoh: 7.5)</small>
            </div>
            <div class="mb-3">
                <label class="form-label">Poster (opsional)</label>
                @if($film->poster)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$film->poster) }}" alt="Poster Lama" class="img-fluid rounded" style="max-height:180px;object-fit:cover;">
                    </div>
                @endif
                <input type="file" name="poster" class="form-control" accept="image/*">
            </div>
            <div class="d-flex gap-2 justify-content-center mt-4">
                <button type="submit" class="btn btn-netflix px-4">Update</button>
                <a href="{{ route('films.index') }}" class="btn btn-outline-light">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            tags: true,
            theme: 'classic',
            width: '100%'
        });
    });
</script>
@endsection