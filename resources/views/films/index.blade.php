<!DOCTYPE html>
<html>
<head>
    <title>Daftar Film</title>
</head>
<body>
    <h1>Daftar Film</h1>
    <ul>
        @foreach ($films as $film)
            <li>
                <a href="{{ route('films.show', $film['id']) }}">{{ $film['judul'] }}</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
