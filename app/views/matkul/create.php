<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Kuliah</title>
</head>
<body>
    <h2>Tambah Mata Kuliah</h2>
    <form method="post" action="index.php?page=matkul&action=store">
        <label>Kode Mata Kuliah</label><br>
        <input type="text" name="kode_matkul" required><br><br>

        <label>Nama Mata Kuliah</label><br>
        <input type="text" name="nama_matkul" required><br><br>

        <label>SKS</label><br>
        <input type="number" name="sks" min="1" max="6" required><br><br>

        <label>Semester</label><br>
        <input type="number" name="semester" min="1" max="14" required><br><br>

        <label>Dosen Pengampu</label><br>
        <input type="text" name="dosen_pengampu"><br><br>

        <label>Program Studi</label><br>
        <input type="text" name="program_studi"><br><br>

        <button type="submit">Simpan</button>
        <a href="index.php?page=matkul">Kembali</a>
    </form>
</body>
</html>