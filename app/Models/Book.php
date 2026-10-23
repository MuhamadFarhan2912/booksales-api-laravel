<?php

namespace App\Models;

class Book
{
    public function getBooks()
    {
        return [
            ['id' => 1, 'title' => 'Laskar Pelangi', 'author' => 'Andrea Hirata', 'genre' => 'Fiksi'],
            ['id' => 2, 'title' => 'Bumi', 'author' => 'Tere Liye', 'genre' => 'Fantasi'],
            ['id' => 3, 'title' => 'Filosofi Teras', 'author' => 'Henry Manampiring', 'genre' => 'Pengembangan Diri'],
            ['id' => 4, 'title' => 'Negeri 5 Menara', 'author' => 'Ahmad Fuadi', 'genre' => 'Fiksi'],
            ['id' => 5, 'title' => 'Bumi Manusia', 'author' => 'Pramoedya Ananta Toer', 'genre' => 'Sejarah'],
        ];
    }
}