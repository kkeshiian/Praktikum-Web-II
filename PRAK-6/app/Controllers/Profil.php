<?php

namespace App\Controllers;
use App\Models\MahasiswaModel;

class Profil extends BaseController
{
    public function index()
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->getData();
        return view('layout/template', ['content' => view('profil', $data)]);
    }
}
