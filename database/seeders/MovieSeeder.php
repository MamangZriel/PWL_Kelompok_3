<?php
// database/seeders/MovieSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $movies = [
            [
                'title' => 'Pengabdi Farrel: Al Mossad',
                'description' => 'Sebuah keluarga yang mencoba melarikan diri dari teror Penagih Hutang Pinjol masa lalu mereka.',
                'genre' => 'Horror',
                'duration' => 119,
                'director' => 'Gus Fadjar',
                'cast' => 'Farrel Alfarasi Haer, Gus Fadjar Busana, Reynal Rusdi Hambali',
                'release_date' => '2022-07-30',
                'rating' => 7.2,
                'status' => 'now_showing'
            ],
            [
                'title' => 'KKN di Desa Durian Runtuh',
                'description' => 'Kisah mahasiswa KKN yang mengalami teror Jomok.',
                'genre' => 'Horror',
                'duration' => 175,
                'director' => 'Fadjar Busana',
                'cast' => 'Dian Agustin, Reynal Dean Haikal',
                'release_date' => '2022-04-30',
                'rating' => 6.8,
                'status' => 'now_showing'
            ]
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}