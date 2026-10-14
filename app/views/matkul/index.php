<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mata Kuliah</title>
</head>
<body>
    <h2>Daftar Mata Kuliah</h2>
    <a href="index.php?page=matkul&action=create">Tambah Data</a>
    <table border="1" cellpadding="8" cellspacing="0" style="width:100%; margin-top:15px; border-collapse:collapse;">
        <tr>
            <th>Kode</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Dosen Pengampu</th>
            <th>Program Studi</th>
            <th>Aksi</th>
        </tr>
        <?php if (!empty($matakuliah)): ?>
            <?php foreach ($matakuliah as $mk): ?>
            <tr>
                <td><?= htmlspecialchars($mk['kode_matkul']) ?></td>
                <td><?= htmlspecialchars($mk['nama_matkul']) ?></td>
                <td><?= htmlspecialchars((string) $mk['sks']) ?></td>
                <td><?= htmlspecialchars((string) $mk['semester']) ?></td>
                <td><?= htmlspecialchars($mk['dosen_pengampu'] ?? '-') ?></td>
                <td><?= htmlspecialchars($mk['program_studi'] ?? '-') ?></td>
                <td>
                    <a href="index.php?page=matkul&action=edit&kode=<?= urlencode($mk['kode_matkul']) ?>">Edit</a>
                    <form method="post" action="index.php?page=matkul&action=delete" style="display:inline" onsubmit="return confirm('Hapus data mata kuliah ini?')">
                        <input type="hidden" name="kode_matkul" value="<?= htmlspecialchars($mk['kode_matkul']) ?>">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" style="text-align: center;">Belum ada data mata kuliah.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>