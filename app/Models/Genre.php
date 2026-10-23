<?php

namespace App\Models;

class Genre
{
    public function getGenres()
    {
        return [
            ['id' => 1, 'name' => 'Fiksi', 'description' => 'Cerita imajinatif'],
            ['id' => 2, 'name' => 'Pendidikan', 'description' => 'Buku pembelajaran'],
            ['id' => 3, 'name' => 'Teknologi', 'description' => 'Ilmu teknologi dan komputer'],
            ['id' => 4, 'name' => 'Sejarah', 'description' => 'Kisah peristiwa masa lalu'],
            ['id' => 5, 'name' => 'Fantasi', 'description' => 'Cerita dunia fantasi'],
        ];
    }
}