<?php

class Matkul
{
    public function __construct(private PDO $db) {}

    // Mengambil semua data mata kuliah
    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT kode_matkul, nama_matkul, sks, semester, dosen_pengampu, program_studi 
             FROM matakuliah 
             ORDER BY nama_matkul'
        );
        return $stmt->fetchAll();
    }

    // Mengambil satu mata kuliah berdasarkan kode
    public function findById(string $kode): array|false
    {
        $stmt = $this->db->prepare(
            'SELECT kode_matkul, nama_matkul, sks, semester, dosen_pengampu, program_studi 
             FROM matakuliah 
             WHERE kode_matkul = :kode'
        );
        $stmt->execute(['kode' => $kode]);
        return $stmt->fetch();
    }

    // Menambahkan mata kuliah baru
    public function create(array $data): bool
    {
        $sql = 'INSERT INTO matakuliah (kode_matkul, nama_matkul, sks, semester, dosen_pengampu, program_studi) 
                VALUES (:kode, :nama, :sks, :semester, :dosen, :prodi)';
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':kode'     => $data['kode_matkul'],
            ':nama'     => $data['nama_matkul'],
            ':sks'      => $data['sks'],
            ':semester' => $data['semester'],
            ':dosen'    => $data['dosen_pengampu'] ?? null,
            ':prodi'    => $data['program_studi'] ?? null
        ]);
    }

    // Mengubah data mata kuliah
    public function update(string $kode, array $data): bool
    {
        $sql = 'UPDATE matakuliah 
                SET nama_matkul = :nama, 
                    sks = :sks, 
                    semester = :semester, 
                    dosen_pengampu = :dosen, 
                    program_studi = :prodi 
                WHERE kode_matkul = :kode';
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':kode'     => $kode,
            ':nama'     => $data['nama_matkul'],
            ':sks'      => $data['sks'],
            ':semester' => $data['semester'],
            ':dosen'    => $data['dosen_pengampu'] ?? null,
            ':prodi'    => $data['program_studi'] ?? null
        ]);
    }

    // Menghapus mata kuliah
    public function delete(string $kode): bool
    {
        $stmt = $this->db->prepare(
            'DELETE FROM matakuliah WHERE kode_matkul = :kode'
        );
        return $stmt->execute(['kode' => $kode]);
    }
}