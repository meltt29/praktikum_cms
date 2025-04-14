<?php

namespace App\Models;

class Film
{
    // Data dummy film
    protected static function getDummyData()
    {
        return [
            [
                'id' => 1,
                'judul' => 'Inception',
                'tahun_rilis' => 2010,
                'sutradara' => 'Christopher Nolan',
                'genre' => ['Action', 'Sci-Fi'],
                'aktor' => ['Leonardo DiCaprio', 'Tom Hardy']
            ],
            [
                'id' => 2,
                'judul' => 'The Dark Knight',
                'tahun_rilis' => 2008,
                'sutradara' => 'Christopher Nolan',
                'genre' => ['Action', 'Drama'],
                'aktor' => ['Christian Bale', 'Heath Ledger']
            ],
        ];
    }

    // Ambil semua film
    public static function all()
    {
        return self::getDummyData();
    }

    // Cari film berdasarkan ID
    public static function find($id)
    {
        $films = self::getDummyData();
        foreach ($films as $film) {
            if ($film['id'] == $id) {
                return $film;
            }
        }
        return null;
    }
}