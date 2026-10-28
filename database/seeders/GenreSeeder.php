<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        Genre::create([
            'name' => 'Action',
            'description' => 'Genre yang menekankan pada adegan aksi, pertempuran, dan kecepatan.'
        ]);

        Genre::create([
            'name' => 'Romance',
            'description' => 'Genre yang menekankan pada hubungan romantis dan cinta.'
        ]);

        Genre::create([
            'name' => 'Fantasy',
            'description' => 'Genre yang mengeksplorasi imajinasi dan dunia yang tidak nyata.'
        ]);

        Genre::create([
            'name' => 'Dystopian',
            'description' => 'Genre yang menggambarkan masa depan suram dan sistem pemerintahan yang menindas.'
        ]);
    }
}