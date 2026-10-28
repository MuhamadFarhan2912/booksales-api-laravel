<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Laskar Pelangi',
            'description' => 'Kisah inspiratif perjuangan 10 anak dan 2 guru di desa terpencil Belitung dalam meraih pendidikan.',
            'price' => 85000,
            'stock' => 20,
            'cover_photo' => 'laskar_pelangi.jpg',
            'genre_id' => 1,
            'author_id' => 1,
        ]);

        Book::create([
            'title' => 'Bumi',
            'description' => 'Petualangan Raib, Seli, dan Ali menjelajahi klan dan dunia paralel dengan kekuatan super mereka.',
            'price' => 90000,
            'stock' => 15,
            'cover_photo' => 'bumi.jpg',
            'genre_id' => 2,
            'author_id' => 2,
        ]);

        Book::create([
            'title' => 'Harry Potter and The Prisoner of Azkaban',
            'description' => 'Harry Potter tahun ketiga di Hogwarts harus menghadapi pelarian berbahaya dari Azkaban.',
            'price' => 120000,
            'stock' => 25,
            'cover_photo' => 'harry_potter_azkaban.jpg',
            'genre_id' => 2,
            'author_id' => 3,
        ]);

        Book::create([
            'title' => '1984',
            'description' => 'Novel distopia tentang pengawasan totaliter dan perjuangan manusia melawan sistem.',
            'price' => 75000,
            'stock' => 10,
            'cover_photo' => '1984.jpg',
            'genre_id' => 3,
            'author_id' => 4,
        ]);

        Book::create([
            'title' => 'Norwegian Wood',
            'description' => 'Kisah cinta dan kehilangan Toru Watanabe di masa mudanya di Tokyo.',
            'price' => 95000,
            'stock' => 18,
            'cover_photo' => 'norwegian_wood.jpg',
            'genre_id' => 4,
            'author_id' => 5,
        ]);
    }
}