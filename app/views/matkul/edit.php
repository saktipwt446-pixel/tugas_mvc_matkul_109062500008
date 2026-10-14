<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mata Kuliah</title>
</head>
<body>
    <h2>Edit Mata Kuliah</h2>
    <form method="post" action="index.php?page=matkul&action=update">
        <input type="hidden" name="kode_matkul" value="<?= htmlspecialchars($matkul['kode_matkul']) ?>">

        <label>Kode Mata Kuliah</label><br>
        <input type="text" value="<?= htmlspecialchars($matkul['kode_matkul']) ?>" disabled><br><br>

        <label>Nama Mata Kuliah</label><br>
        <input type="text" name="nama_matkul" value="<?= htmlspecialchars($matkul['nama_matkul']) ?>" required><br><br>

        <label>SKS</label><br>
        <input type="number" name="sks" min="1" max="6" value="<?= htmlspecialchars((string) $matkul['sks']) ?>" required><br><br>

        <label>Semester</label><br>
        <input type="number" name="semester" min="1" max="14" value="<?= htmlspecialchars((string) $matkul['semester']) ?>" required><br><br>

        <label>Dosen Pengampu</label><br>
        <input type="text" name="dosen_pengampu" value="<?= htmlspecialchars($matkul['dosen_pengampu'] ?? '') ?>"><br><br>

        <label>Program Studi</label><br>
        <input type="text" name="program_studi" value="<?= htmlspecialchars($matkul['program_studi'] ?? '') ?>"><br><br>

        <button type="submit">Update</button>
        <a href="index.php?page=matkul">Kembali</a>
    </form>
</body>
</html>