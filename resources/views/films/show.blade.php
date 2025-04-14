<!DOCTYPE html>
<html>
<head>
    <title>{{ $film['judul'] }}</title>
</head>
<body>
    <h1>{{ $film['judul'] }}</h1>
    <p><strong>Tahun Rilis:</strong> {{ $film['tahun_rilis'] }}</p>
    <p><strong>Sutradara:</strong> {{ $film['sutradara'] }}</p>
    <p><strong>Genre:</strong> {{ implode(', ', $film['genre']) }}</p>
    <p><strong>Aktor:</strong> {{ implode(', ', $film['aktor']) }}</p>

    <p>
        ✏️ <a href="{{ route('films.edit', $film['id']) }}">Edit</a> |
        🗑 <form action="{{ route('films.destroy', $film['id']) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Yakin ingin menghapus film ini?')" style="background:none;border:none;color:blue;cursor:pointer;">Hapus</button>
        </form>
    </p>

    <p><a href="{{ route('films.index') }}">← Kembali ke daftar</a></p>
</body>
</html>
