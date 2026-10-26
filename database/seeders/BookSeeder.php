<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Laskar Pelangi',
                'author_id' => 1,
                'genre' => 'Drama',
            ],
            [
                'title' => 'Bumi',
                'author_id' => 2,
                'genre' => 'Fantasi',
            ],
            [
                'title' => 'Harry Potter',
                'author_id' => 3,
                'genre' => 'Fantasi',
            ],
            [
                'title' => 'Animal Farm',
                'author_id' => 4,
                'genre' => 'Satire',
            ],
            [
                'title' => 'Norwegian Wood',
                'author_id' => 5,
                'genre' => 'Fiksi',
            ],
        ]);
    }
}
