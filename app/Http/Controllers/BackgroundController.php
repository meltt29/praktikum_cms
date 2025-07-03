<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Background;
use Illuminate\Support\Facades\Log;

class BackgroundController extends Controller
{
    public function edit()
    {
        Log::info('Memasuki function edit', [
            'user' => auth()->user()?->email,
            'request' => isset($request) ? $request->all() : null
        ]);

        $background = Background::first();
        return view('background.edit', compact('background'));
    }

    public function update(Request $request)
    {
        Log::info('Memasuki function update', [
            'user' => auth()->user()?->email,
            'request' => isset($request) ? $request->all() : null
        ]);

        $request->validate([
            'background' => 'required|mimes:jpg,jpeg,png,heic|max:4096',
        ]);

        $background = Background::first() ?? new Background();

        // Hapus file lama jika ada
        if ($background->path && file_exists(storage_path('app/public/'.$background->path))) {
            @unlink(storage_path('app/public/'.$background->path));
        }

        $path = $request->file('background')->store('background', 'public');
        $background->path = $path;
        $background->save();

        return redirect('/films')->with('success', 'Background berhasil diupdate!');
    }
}
