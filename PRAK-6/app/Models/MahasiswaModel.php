<?php

namespace App\Models;
use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    public function getData()
    {
        return [
            'nama' => 'Muhammad Rizky',
            'nim' => '2310817310011',
            'prodi' => 'Teknologi Informasi',
            'hobi' => 'Membaca, Coding',
            'skill' => ['HTML', 'CSS', 'JavaScript  ', 'Internet of Things', 'Machine Learning'],
            'gambar' => 'pasfoto.jpg',
            'greenwatch' => 'greenwatch.png',
            'coldstorage' => 'coldstorage.png',
        ];
    }
}
