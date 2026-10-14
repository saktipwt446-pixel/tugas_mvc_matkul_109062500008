```php
<?php

require_once __DIR__ . '/../models/Matkul.php';
require_once __DIR__ . '/../../config/database.php';

class MatkulController
{
    private Matkul $model;

    public function __construct(PDO $db)
    {
        $this->model = new Matkul($db);
    }

    // Menampilkan semua mata kuliah
    public function index(): array
    {
        return $this->model->getAll();
    }

    // Menampilkan detail mata kuliah
    public function show(string $kode): array|false
    {
        return $this->model->findById($kode);
    }

    // Menambahkan mata kuliah
    public function store(array $data): bool
    {
        return $this->model->create($data);
    }

    // Mengubah mata kuliah
    public function update(string $kode, array $data): bool
    {
        return $this->model->update($kode, $data);
    }

    // Menghapus mata kuliah
    public function destroy(string $kode): bool
    {
        return $this->model->delete($kode);
    }
}
```