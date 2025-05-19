<?php
namespace App\Controllers;
use App\Models\BukuModel;

class Buku extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'session']);
    }

    private function cekLogin()
    {
        if (!session()->get('logged_in')) {
            session()->setFlashdata('error', 'Login terlebih dahulu!');
            return redirect()->to('/login')->send();
            exit;
        }
    }

    public function index()
    {
        if ($redirect = $this->cekLogin()) {
            return $redirect;
        }

        $bukuModel = new BukuModel();
        $data = [
            'buku' => $bukuModel->findAll()
        ];
        return view('buku/index', $data);
    }

    public function create()
    {
        if ($redirect = $this->cekLogin()) {
            return $redirect;
        }

        return view('buku/create');
    }

    public function store()
    {
        if ($redirect = $this->cekLogin()) {
            return $redirect;
        }

        $rules = [
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer|greater_than[1800]|less_than_equal_to[' . date('Y') . ']'
        ];

        $messages = [
            'judul' => ['required' => 'Judul harus diisi.'],
            'penulis' => ['required' => 'Penulis harus diisi.'],
            'penerbit' => ['required' => 'Penerbit harus diisi.'],
            'tahun_terbit' => [
                'required' => 'Tahun harus diisi.',
                'integer' => 'Tahun harus berupa angka.',
                'greater_than' => 'Tahun minimal 1801.',
                'less_than_equal_to' => 'Tahun maksimal ' . date('Y') . '.',
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return view('buku/create', ['validation' => $this->validator]);
        }

        $bukuModel = new BukuModel();
        $bukuModel->save($this->request->getPost());
        return redirect()->to('/buku');
    }

    public function delete($id)
    {
        if ($redirect = $this->cekLogin()) {
            return $redirect;
        }

        $bukuModel = new BukuModel();
        $bukuModel->delete($id);
        return redirect()->to('/buku');
    }

public function edit($id)
{
    if ($redirect = $this->cekLogin()) {
        return $redirect;
    }

    $buku = new BukuModel();
    $data['buku'] = $buku->find($id);

    if (!$data['buku']) {
        return redirect()->to('/buku')->with('error', 'Data buku tidak ditemukan');
    }

    return view('buku/edit', $data);
}

public function update($id)
{
    if ($redirect = $this->cekLogin()) {
        return $redirect;
    }

    $rules = [
        'judul' => 'required',
        'penulis' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required|integer|greater_than[1800]|less_than[2024]'
    ];

    $messages = [
        'judul' => ['required' => 'Judul harus diisi.'],
        'penulis' => ['required' => 'Penulis harus diisi.'],
        'penerbit' => ['required' => 'Penerbit harus diisi.'],
        'tahun_terbit' => [
            'required' => 'Tahun harus diisi.',
            'integer' => 'Tahun harus berupa angka.',
            'greater_than' => 'Tahun minimal 1901.',
            'less_than' => 'Tahun maksimal 2023.',
        ]
    ];

    if (!$this->validate($rules, $messages)) {
        return view('buku/edit', [
            'validation' => $this->validator,
            'buku' => $this->request->getPost()
        ]);
    }

    $buku = new BukuModel();
    $data = $this->request->getPost();
    $data['id'] = $id;

    $buku->save($data);

    return redirect()->to('/buku')->with('success', 'Data buku berhasil diupdate');
}

}
