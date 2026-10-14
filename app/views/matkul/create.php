<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 30px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            padding: 25px;
            background: white;
            border-radius: 8px;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 12px;
        }

        input {
            width: 100%;
            padding: 9px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button, .back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #007bff;
            color: white;
        }

        .back {
            background: #6c757d;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Mata Kuliah</h2>

    <form action="../../../../index.php?action=store" method="POST">

        <label>Kode Mata Kuliah</label>
        <input type="text" name="kode_matkul"
               placeholder="Contoh: MK006" required>

        <label>Nama Mata Kuliah</label>
        <input type="text" name="nama_matkul"
               placeholder="Nama mata kuliah" required>

        <label>SKS</label>
        <input type="number" name="sks"
               min="1" max="6" required>

        <label>Semester</label>
        <input type="number" name="semester"
               min="1" max="14" required>

        <label>Dosen Pengampu</label>
        <input type="text" name="dosen_pengampu"
               placeholder="Nama dosen">

        <label>Program Studi</label>
        <input type="text" name="program_studi"
               placeholder="Contoh: Sistem Informasi">

        <button type="submit">Simpan</button>
        <a href="../../../../index.php" class="back">Kembali</a>

    </form>
</div>

</body>
</html>