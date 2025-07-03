<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class FilmController extends Controller
{
    // Menampilkan semua data film
    public function index(Request $request)
    {
        Log::info('Memasuki function index FilmController', [
            'user' => auth()->user()?->email,
            'request' => $request->all()
        ]);
        $query = Film::query();

        // Search
        if ($request->filled('q')) {
            $q = strtolower($request->q);
            $query->where(function($sub) use ($q) {
                $sub->whereRaw('LOWER(judul) LIKE ?', ["%$q%"])
                    ->orWhereRaw('LOWER(sutradara) LIKE ?', ["%$q%"])
                    ->orWhereRaw('LOWER(aktor) LIKE ?', ["%$q%"])
                    ->orWhereRaw('LOWER(genre) LIKE ?', ["%$q%"]);
            });
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter genre
        if ($request->filled('genre')) {
            $query->where('genre', 'like', "%{$request->genre}%");
        }

        // Filter aktor
        if ($request->filled('aktor')) {
            $query->where('aktor', 'like', "%{$request->aktor}%");
        }

        $films = $query->latest()->get();

        // Ambil semua genre & aktor unik untuk filter
        $allGenres = Film::select('genre')->get()->pluck('genre')->flatten()->unique()->sort()->values();
        $allAktor = Film::select('aktor')->get()->pluck('aktor')->flatten()->unique()->sort()->values();

        return view('films.index', compact('films', 'allGenres', 'allAktor'));
    }

    // Menampilkan satu film dengan pengecekan error jika tidak ditemukan
    public function show($id)
    {
        Log::info('Memasuki function show FilmController', [
            'user' => auth()->user()?->email,
            'id' => $id
        ]);
        try {
            $film = Film::findOrFail($id);
            if (!$film) {
                Log::warning('Film tidak ditemukan di show FilmController', [
                    'user' => auth()->user()?->email,
                    'id' => $id
                ]);
            }
            return view('films.show', compact('film'));
        } catch (ModelNotFoundException $e) {
            Log::error('Error di show FilmController: ' . $e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return redirect()->route('films.index')->withErrors('Film tidak ditemukan.');
        }
    }
    // Menampilkan form tambah film
    public function create()
    {
        Log::info('Memasuki function create FilmController', [
            'user' => auth()->user()?->email
        ]);
        return view('films.create');
    }

    // Menyimpan data film ke database
    public function store(Request $request)
    {
        Log::info('Memasuki function store FilmController', [
            'user' => auth()->user()?->email,
            'request' => $request->all()
        ]);
        try {
            // Ubah input aktor dari string ke array jika perlu
            if ($request->has('aktor') && is_string($request->aktor)) {
                $request->merge([
                    'aktor' => array_map('trim', explode(',', $request->aktor))
                ]);
            }
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'tahun_rilis' => 'required|integer|min:1888|max:' . date('Y'),
                'sutradara' => 'required|string|max:255',
                'genre' => 'required|array',
                'aktor' => 'required|array',
                'poster' => 'nullable|image|max:2048',
            ]);

            // Handle upload poster
            if ($request->hasFile('poster')) {
                $path = $request->file('poster')->store('poster', 'public');
                $validated['poster'] = $path;
            }

            Film::create($validated);

            return redirect()->route('films.index')->with('success', 'Film berhasil ditambahkan');
        } catch (\Throwable $e) {
            Log::error('Error di store FilmController: ' . $e->getMessage(), [
                'request' => $request->all(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return redirect()->route('films.create')->withErrors('Terjadi error saat menambah film.');
        }
    }

    // Menampilkan form edit film
    public function edit($id)
    {
        Log::info('Memasuki function edit FilmController', [
            'user' => auth()->user()?->email,
            'id' => $id
        ]);
        $film = Film::findOrFail($id);
        return view('films.edit', compact('film'));
    }

    // Memperbarui data film di database
    public function update(Request $request, $id)
    {
        Log::info('Memasuki function update FilmController', [
            'user' => auth()->user()?->email,
            'id' => $id,
            'request' => $request->all()
        ]);
        try {
            $film = Film::findOrFail($id);
            if (!$film) {
                Log::warning('Film tidak ditemukan di update FilmController', [
                    'user' => auth()->user()?->email,
                    'id' => $id
                ]);
            }
            // Ubah input aktor dari string ke array jika perlu
            if ($request->has('aktor') && is_string($request->aktor)) {
                $request->merge([
                    'aktor' => array_map('trim', explode(',', $request->aktor))
                ]);
            }
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'tahun_rilis' => 'required|integer|min:1888|max:' . date('Y'),
                'sutradara' => 'required|string|max:255',
                'genre' => 'required|array',
                'aktor' => 'required|array',
                'poster' => 'nullable|image|max:2048',
            ]);

            // Handle upload poster baru
            if ($request->hasFile('poster')) {
                // Hapus poster lama jika ada
                if ($film->poster && file_exists(storage_path('app/public/'.$film->poster))) {
                    @unlink(storage_path('app/public/'.$film->poster));
                }
                $path = $request->file('poster')->store('poster', 'public');
                $validated['poster'] = $path;
            }

            $film->update($validated);

            return redirect()->route('films.index')->with('success', 'Film berhasil diupdate');
        } catch (\Throwable $e) {
            Log::error('Error di update FilmController: ' . $e->getMessage(), [
                'id' => $id,
                'request' => $request->all(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return redirect()->route('films.index')->withErrors('Terjadi error saat update film.');
        }
    }

    // Menghapus film dari database
    public function destroy($id)
    {
        Log::info('Memasuki function destroy FilmController', [
            'user' => auth()->user()?->email,
            'id' => $id
        ]);
        try {
            $film = Film::findOrFail($id);
            if (!$film) {
                Log::warning('Film tidak ditemukan di destroy FilmController', [
                    'user' => auth()->user()?->email,
                    'id' => $id
                ]);
            }
            $film->delete();
            return redirect()->route('films.index')->with('success', 'Film berhasil dihapus');
        } catch (\Throwable $e) {
            Log::error('Error di destroy FilmController: ' . $e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return redirect()->route('films.index')->withErrors('Terjadi error saat menghapus film!');
        }
    }
}