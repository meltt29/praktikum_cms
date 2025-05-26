<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film
{
    use HasFactory;
    // Data dummy film
    public static function getDummyData()
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
            [
                'id' => 3,
                'judul' => 'Interstellar',
                'tahun_rilis' => 2014,
                'sutradara' => 'Christopher Nolan',
                'genre' => ['Adventure', 'Drama'],
                'aktor' => ['Matthew McConaughey', 'Anne Hathaway']
            ],
            [
                'id' => 4,
                'judul' => 'The Matrix',
                'tahun_rilis' => 1999,
                'sutradara' => 'Lana Wachowski, Lilly Wachowski',
                'genre' => ['Action', 'Sci-Fi'],
                'aktor' => ['Keanu Reeves', 'Laurence Fishburne']
            ],
            [
                'id' => 5,
                'judul' => 'The Shawshank Redemption',
                'tahun_rilis' => 1994,
                'sutradara' => 'Frank Darabont',
                'genre' => ['Drama'],
                'aktor' => ['Tim Robbins', 'Morgan Freeman']
            ],
            [
                'id' => 6,
                'judul' => 'Pulp Fiction',
                'tahun_rilis' => 1994,
                'sutradara' => 'Quentin Tarantino',
                'genre' => ['Crime', 'Drama'],
                'aktor' => ['John Travolta', 'Uma Thurman']
            ],
            [
                'id' => 7,
                'judul' => 'Forrest Gump',
                'tahun_rilis' => 1994,
                'sutradara' => 'Robert Zemeckis',
                'genre' => ['Drama', 'Romance'],
                'aktor' => ['Tom Hanks', 'Robin Wright']
            ],
            [
                'id' => 8,
                'judul' => 'The Godfather',
                'tahun_rilis' => 1972,
                'sutradara' => 'Francis Ford Coppola',
                'genre' => ['Crime', 'Drama'],
                'aktor' => ['Marlon Brando', 'Al Pacino']
            ],
            [
                'id' => 9,
                'judul' => 'The Lord of the Rings: The Return of the King',
                'tahun_rilis' => 2003,
                'sutradara' => 'Peter Jackson',
                'genre' => ['Action', 'Adventure'],
                'aktor' => ['Elijah Wood', 'Ian McKellen']
            ],
            [
                'id' => 10,
                'judul' => 'Fight Club',
                'tahun_rilis' => 1999,
                'sutradara' => 'David Fincher',
                'genre' => ['Drama'],
                'aktor' => ['Brad Pitt', 'Edward Norton']
            ],
             [
                'id' => 11,
                'judul' => 'Final Destination:Bloodlines',
                'tahun_rilis' => 2024,
                'sutradara' => 'John Doe',
                'genre' => ['Horror', 'Thriller'],
                'aktor' => ['Jane Smith', 'John Smith']
            ]
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