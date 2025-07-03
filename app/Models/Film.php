<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'judul',
        'tahun_rilis',
        'sutradara',
        'genre',
        'aktor',
        'status',
        'poster',
        'deskripsi',
        'rating',
    ];

    // Agar Laravel tahu bahwa genre dan aktor adalah array (JSON)
    protected $casts = [
        'genre' => 'array',
        'aktor' => 'array',
    ];
}