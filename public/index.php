<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/models/Matkul.php';
require_once __DIR__ . '/../app/controllers/MatkulController.php';

// Membuat koneksi PDO melalui class Database
$db = (new Database())->connect();

// Inisialisasi Model dan Controller dengan dependency injection
$model = new Matkul($db);
$controller = new MatkulController($model);

// Menentukan parameter modul (page) dan aksi (action)
$page = $_GET['page'] ?? 'matkul';
$action = $_GET['action'] ?? 'index';

// Validasi halaman utama modul
if ($page !== 'matkul') {
    http_response_code(404);
    exit('Halaman tidak ditemukan.');
}

// Routing menggunakan struktur match expression sesuai modul
match ($action) {
    'index'  => $controller->index(),
    'create' => $controller->create(),
    'store'  => $controller->store(),
    'edit'   => $controller->edit(),
    'update' => $controller->update(),
    'delete' => $controller->delete(),
    default  => (function () {
        http_response_code(404);
        exit('Action tidak ditemukan.');
    })()
};