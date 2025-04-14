<!DOCTYPE html>
<html>
<head>
    <title>Edit Film</title>
</head>
<body>
    <h1>Edit Film</h1>
    <form action="{{ route('films.update', $film['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <p>
            Judul:<br>
            <input type="text" name="judul" value="{{ $film['judul'] }}">
        </p>
        <p>
            Tahun Rilis:<br>
            <input type="number" name="tahun_rilis" value="{{ $film['tahun_rilis'] }}">
        </p>
        <p>
            Sutradara:<br>
            <input type="text" name="sutradara" value="{{ $film['sutradara'] }}">
        </p>
        <button type="submit">Simpan</button>
        <a href="{{ route('films.show', $film['id']) }}">← Kembali ke detail</a>
    </form>
</body>
</html>
