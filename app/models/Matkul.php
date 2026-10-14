<?php

class Matakuliah
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // Mengambil semua data mata kuliah
    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT kode_matkul, nama_matkul, sks, semester,
                    dosen_pengampu, program_studi
             FROM matakuliah
             ORDER BY nama_matkul'
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mengambil satu mata kuliah berdasarkan kode
    public function findById(string $kode): array|false
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM matakuliah
             WHERE kode_matkul = :kode'
        );

        $stmt->execute(['kode' => $kode]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menambahkan mata kuliah
    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO matakuliah
             (kode_matkul, nama_matkul, sks, semester,
              dosen_pengampu, program_studi)
             VALUES
             (:kode, :nama, :sks, :semester, :dosen, :prodi)'
        );

        return $stmt->execute([
            'kode'    => $data['kode_matkul'],
            'nama'    => $data['nama_matkul'],
            'sks'     => $data['sks'],
            'semester'=> $data['semester'],
            'dosen'   => $data['dosen_pengampu'] ?? null,
            'prodi'   => $data['program_studi'] ?? null
        ]);
    }

    // Mengubah data mata kuliah
    public function update(string $kode, array $data): bool
    {
        $stmt = $this->db->prepare(
            'UPDATE matakuliah
             SET nama_matkul = :nama,
                 sks = :sks,
                 semester = :semester,
                 dosen_pengampu = :dosen,
                 program_studi = :prodi
             WHERE kode_matkul = :kode'
        );

        return $stmt->execute([
            'kode'     => $kode,
            'nama'     => $data['nama_matkul'],
            'sks'      => $data['sks'],
            'semester' => $data['semester'],
            'dosen'    => $data['dosen_pengampu'] ?? null,
            'prodi'    => $data['program_studi'] ?? null
        ]);
    }

    // Menghapus mata kuliah
    public function delete(string $kode): bool
    {
        $stmt = $this->db->prepare(
            'DELETE FROM matakuliah
             WHERE kode_matkul = :kode'
        );

        return $stmt->execute(['kode' => $kode]);
    }
}