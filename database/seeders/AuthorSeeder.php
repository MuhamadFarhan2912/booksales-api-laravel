<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'name' => 'Andrea Hirata',
                'country' => 'Indonesia',
            ],
            [
                'name' => 'Tere Liye',
                'country' => 'Indonesia',
            ],
            [
                'name' => 'J.K. Rowling',
                'country' => 'Inggris',
            ],
            [
                'name' => 'George Orwell',
                'country' => 'Inggris',
            ],
            [
                'name' => 'Haruki Murakami',
                'country' => 'Jepang',
            ],
        ]);
    }
}
