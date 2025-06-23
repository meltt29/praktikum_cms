<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FilmController extends Controller
{
    // Menampilkan semua data film
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    // Menampilkan satu film dengan pengecekan error jika tidak ditemukan
    public function show($id)
    {
        try {
            $film = Film::findOrFail($id);
            return view('films.show', compact('film'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('films.index')->withErrors('Film tidak ditemukan.');
        }
    }
    // Menampilkan form tambah film
    public function create()
    {
        return view('films.create');
    }

    // Menyimpan data film ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tahun_rilis' => 'required|integer|min:1888|max:' . date('Y'),
            'sutradara' => 'required|string|max:255',
            'genre' => 'nullable|array',
            'aktor' => 'nullable|array',
        ]);

        Film::create($validated);

        return redirect()->route('films.index')->with('success', 'Film berhasil ditambahkan');
    }

    // Menampilkan form edit film
    public function edit($id)
    {
        $film = Film::findOrFail($id);
        return view('films.edit', compact('film'));
    }

    // Memperbarui data film di database
    public function update(Request $request, $id)
    {
        $film = Film::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tahun_rilis' => 'required|integer|min:1888|max:' . date('Y'),
            'sutradara' => 'required|string|max:255',
            'genre' => 'nullable|array',
            'aktor' => 'nullable|array',
        ]);

        $film->update($validated);

        return redirect()->route('films.index')->with('success', 'Film berhasil diupdate');
    }

    // Menghapus film dari database
    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();

        return redirect()->route('films.index')->with('success', 'Film berhasil dihapus');
    }
}