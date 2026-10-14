<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f4f4f4;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Data Mata Kuliah</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Dosen Pengampu</th>
                <th>Program Studi</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($matakuliah)): ?>
                <?php foreach ($matakuliah as $index => $mk): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($mk['kode_matkul']) ?></td>
                        <td><?= htmlspecialchars($mk['nama_matkul']) ?></td>
                        <td><?= htmlspecialchars((string) $mk['sks']) ?></td>
                        <td><?= htmlspecialchars((string) $mk['semester']) ?></td>
                        <td><?= htmlspecialchars($mk['dosen_pengampu'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($mk['program_studi'] ?? '-') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align:center;">
                        Belum ada data mata kuliah.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>