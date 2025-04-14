<?php
namespace App\Http\Controllers;

use App\Models\Film;
class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    public function show($id)
    {
        $film = Film::find($id);
        return view('films.show', compact('film'));
    }

    public function create()
    {
        return view('films.create', compact('film'));
    }

    public function edit($id)
    {
        $film = Film::find($id);
        return view('films.edit', compact('film'));
    }

    public function update($id)
    {
        // Simulasi update hanya tampilkan request (karena data dummy)
        // Di sistem nyata, ini akan update ke database

        $data = request()->only(['judul', 'tahun_rilis', 'sutradara']);

        // Bisa tambahkan validasi & logika lain jika perlu

        return redirect()->route('films.index')->with('success', 'Film berhasil diupdate (simulasi)');
    }

    public function destroy($id)
    {
        // Karena ini data dummy, kita tidak bisa benar-benar menghapus
        // Jadi kita buat simulasi saja
        return redirect()->route('films.index')->with('success', 'Film berhasil dihapus (simulasi)');
    }

}