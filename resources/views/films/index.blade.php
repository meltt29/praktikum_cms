@extends('layouts.app')

@section('title', 'Daftar Film')

@section('content')

<div class="px-3">
    <a href="{{ route('films.create') }}" class="btn btn-success my-3">Tambah Film</a>

    <table class="table table-bordered align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Tahun Rilis</th>
                <th>Sutradara</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($films as $film)
                <tr>
                    <td>{{ $film['id'] }}</td>
                    <td>{{ $film['judul'] }}</td>
                    <td>{{ $film['tahun_rilis'] }}</td>
                    <td>{{ $film['sutradara'] }}</td>
                    <td class="d-flex gap-1 justify-content-center">
                        <a href="{{ route('films.show', $film['id']) }}" class="btn btn-sm" style="background-color: #ADD8E6; color: black;">Lihat</a>
                        <a href="{{ route('films.edit', $film['id']) }}" class="btn btn-sm" style="background-color: #0D6EFD; color: white;">Edit</a>
                        <form action="{{ route('films.destroy', $film['id']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm" style="background-color: #6c757d; color: white;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
