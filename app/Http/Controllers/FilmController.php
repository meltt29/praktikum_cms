<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

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
        return view('films.create');
    }

    public function store(Request $request)
    {
        $data = $request->only(['judul', 'tahun_rilis', 'sutradara', 'genre', 'aktor']);

        return redirect()->route('films.index')->with('success', 'Film berhasil ditambahkan (simulasi)');
    }

    public function edit($id)
    {
        $film = Film::find($id);
        return view('films.edit', compact('film'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['judul', 'tahun_rilis', 'sutradara', 'genre', 'aktor']);

        return redirect()->route('films.index')->with('success', 'Film berhasil diupdate (simulasi)');
    }

    public function destroy($id)
    {

        return redirect()->route('films.index')->with('success', 'Film berhasil dihapus (simulasi)');

    }
}