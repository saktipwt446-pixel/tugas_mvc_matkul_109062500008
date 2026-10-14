<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/models/Matkul.php';
require_once __DIR__ . '/../app/controllers/MatkulController.php';

// Koneksi database
$db = require __DIR__ . '/../config/database.php';

// Membuat controller
$controller = new MatkulController($db);

// Menentukan aksi
$action = $_GET['action'] ?? 'index';

switch ($action) {

    case 'index':
        $matakuliah = $controller->index();
        require __DIR__ . '/../app/views/matkul/index.php';
        break;

    case 'create':
        require __DIR__ . '/../app/views/matkul/create.php';
        break;

    case 'store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->store($_POST);
        }

        header('Location: index.php');
        exit;

    case 'edit':
        $kode = $_GET['kode'] ?? '';
        $matkul = $controller->show($kode);

        if (!$matkul) {
            http_response_code(404);
            exit('Data mata kuliah tidak ditemukan.');
        }

        require __DIR__ . '/../app/views/matkul/edit.php';
        break;

    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kode = $_GET['kode'] ?? '';
            $controller->update($kode, $_POST);
        }

        header('Location: index.php');
        exit;

    case 'delete':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kode = $_POST['kode_matkul'] ?? '';
            $controller->destroy($kode);
        }

        header('Location: index.php');
        exit;

    default:
        http_response_code(404);
        echo 'Halaman tidak ditemukan.';
        break;
}