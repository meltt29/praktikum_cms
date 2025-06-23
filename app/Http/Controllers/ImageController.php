<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::latest()->get();
        return view('upload', compact('images'));
    }

    public function create()
    {
        return redirect()->route('images.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('image')->store('images', 'public');

        $image = Image::create([
            'title' => $request->title,
            'image_path' => $path,
        ]);

        return redirect()->route('images.index')->with(['success' => 'Gambar berhasil diupload.', 'image' => $image]);
    }

    public function destroy(Image $image)
    {
        // Hapus file dari storage
        Storage::disk('public')->delete($image->image_path);

        // Hapus data dari DB
        $image->delete();

        return redirect()->route('images.index')->with('success', 'Gambar berhasil dihapus.');
    }

    // Tidak digunakan
    public function show(Image $image) {}
    public function edit(Image $image) {}
    public function update(Request $request, Image $image) {}
}
