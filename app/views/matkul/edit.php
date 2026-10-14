<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>

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
    <h2>Edit Mata Kuliah</h2>

    <form action="../../../../index.php?action=update&kode=<?= urlencode($matkul['kode_matkul']) ?>"
          method="POST">

        <label>Kode Mata Kuliah</label>
        <input type="text"
               name="kode_matkul"
               value="<?= htmlspecialchars($matkul['kode_matkul']) ?>"
               readonly>

        <label>Nama Mata Kuliah</label>
        <input type="text"
               name="nama_matkul"
               value="<?= htmlspecialchars($matkul['nama_matkul']) ?>"
               required>

        <label>SKS</label>
        <input type="number"
               name="sks"
               min="1"
               max="6"
               value="<?= htmlspecialchars((string) $matkul['sks']) ?>"
               required>

        <label>Semester</label>
        <input type="number"
               name="semester"
               min="1"
               max="14"
               value="<?= htmlspecialchars((string) $matkul['semester']) ?>"
               required>

        <label>Dosen Pengampu</label>
        <input type="text"
               name="dosen_pengampu"
               value="<?= htmlspecialchars($matkul['dosen_pengampu'] ?? '') ?>">

        <label>Program Studi</label>
        <input type="text"
               name="program_studi"
               value="<?= htmlspecialchars($matkul['program_studi'] ?? '') ?>">

        <button type="submit">Simpan Perubahan</button>
        <a href="../../../../index.php" class="back">Kembali</a>

    </form>
</div>

</body>
</html>