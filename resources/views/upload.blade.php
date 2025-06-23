<!DOCTYPE html>
<html>
<head>
    <title>Upload Gambar</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Form Upload Gambar</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form Upload -->
    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Judul:</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Pilih Gambar:</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <!-- Preview Semua Gambar -->
    @if (isset($images) && count($images))
        <hr>
        <h3 class="mt-4">Daftar Gambar:</h3>
        <div class="row">
            @foreach ($images as $img)
                <div class="col-md-3 mt-3">
                    <div class="card">
                        <img src="{{ asset('storage/' . $img->image_path) }}" class="card-img-top" alt="{{ $img->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $img->title }}</h5>
                            <form action="{{ route('images.destroy', $img->id) }}" method="POST" onsubmit="return confirm('Hapus gambar ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
