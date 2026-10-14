<?php

require_once __DIR__ . '/../models/Matkul.php';

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

    // Menampilkan form edit mata kuliah berdasarkan kode
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
        $kode = $_POST['kode_lama'] ?? $_POST['kode_matkul'] ?? '';
        $data = $this->validateInput($_POST);
        $this->model->update($kode, $data);
        header('Location: index.php?page=matkul');
        exit;
    }

    // Menghapus mata kuliah
    public function delete(): void
    {
        $kode = $_POST['kode_matkul'] ?? '';
        $this->model->delete($kode);
        header('Location: index.php?page=matkul');
        exit;
    }

    // Validasi input disesuaikan dengan kolom di database
    private function validateInput(array $input): array
    {
        $data = [
            'kode_matkul'    => trim($input['kode_matkul'] ?? ''),
            'nama_matkul'    => trim($input['nama_matkul'] ?? ''),
            'sks'            => trim($input['sks'] ?? ''),
            'semester'       => trim($input['semester'] ?? ''),
            'dosen_pengampu' => trim($input['dosen_pengampu'] ?? ''),
            'program_studi'  => trim($input['program_studi'] ?? '')
        ];

        // Field utama yang wajib diisi (sesuai kolom database yang bertanda 'No' pada Null)
        if ($data['kode_matkul'] === '' || $data['nama_matkul'] === '' || $data['sks'] === '' || $data['semester'] === '') {
            exit('Kode, Nama Mata Kuliah, SKS, dan Semester wajib diisi.');
        }

        return $data;
    }
}