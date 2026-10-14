<?php

require_once __DIR__ . '/../models/Matkul.php';
require_once __DIR__ . '/../../config/database.php';

class MatkulController
{
    public function __construct(private Matkul $model) {}

    // Menampilkan semua mata kuliah
    public function index(): void
    {
        $matakuliah = $this->model->getAll();
        require_once __DIR__ . '/../views/matkul/index.php';
    }

    // Menampilkan form tambah mata kuliah
    public function create(): void
    {
        require_once __DIR__ . '/../views/matkul/create.php';
    }

    // Menyimpan mata kuliah baru
    public function store(): void
    {
        $data = $this->validateInput($_POST);
        $this->model->create($data);
        header('Location: index.php?page=matkul');
        exit;
    }

    // Menampilkan form edit mata kuliah berdasarkan kode/id
    public function edit(): void
    {
        $kode = $_GET['kode'] ?? '';
        $matkul = $this->model->findById($kode);
        
        if (!$matkul) {
            http_response_code(404);
            exit('Data mata kuliah tidak ditemukan.');
        }
        
        require_once __DIR__ . '/../views/matkul/edit.php';
    }

    // Mengubah data mata kuliah
    public function update(): void
    {
        $kode = $_POST['kode'] ?? '';
        $data = $this->validateInput($_POST);
        $this->model->update($kode, $data);
        header('Location: index.php?page=matkul');
        exit;
    }

    // Menghapus mata kuliah
    public function delete(): void
    {
        $kode = $_POST['kode'] ?? '';
        $this->model->delete($kode);
        header('Location: index.php?page=matkul');
        exit;
    }

    // Validasi input sederhana sesuai pola modul
    private function validateInput(array $input): array
    {
        $data = [
            'kode' => trim($input['kode'] ?? ''),
            'nama' => trim($input['nama'] ?? ''),
            'sks'  => trim($input['sks'] ?? ''),
            'smester' => trim($input['smester'] ?? '')
        ];

        if ($data['kode'] === '' || $data['nama'] === '' || $data['sks'] === '' || $data['smester'] === '') {
            exit('Semua field wajib diisi.');
        }

        return $data;
    }
}