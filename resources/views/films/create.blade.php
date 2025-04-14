<!DOCTYPE html>
<html>
<head>
    <title>Tambah Film</title>
</head>
<body>
    <h1>Tambah Film Baru</h1>
    <form action="{{ route('films.store') }}" method="POST">
        @csrf
        <p>
            Judul:<br>
            <input type="text" name="judul" required>
        </p>
        <p>
            Tahun Rilis:<br>
            <input type="number" name="tahun_rilis" required>
        </p>
        <p>
            Sutradara:<br>
            <input type="text" name="sutradara" required>
        </p>
        <p>
            Genre (pisahkan dengan koma):<br>
            <input type="text" name="genre">
        </p>
        <p>
            Aktor (pisahkan dengan koma):<br>
            <input type="text" name="aktor">
        </p>
        <button type="submit">Simpan</button>
        <a href="{{ route('films.index') }}">← Batal</a>
    </form>
</body>
</html>
