<?php

namespace App\Models;
use CodeIgniter\Model;

class TranscriptModel extends Model
{
    protected $table = 'nilai';      // tabel nilai
    protected $primaryKey = 'id';

    public function getTranskripByMahasiswa($id, $semester)
    {
        return $this->select('nilai.*, mata_kuliah.nama_mk, mata_kuliah.sks')
                    ->join('mata_kuliah', 'mata_kuliah.kode_mk = nilai.kode_mk')
                    ->where('nilai.npm', $id)
                    ->where('nilai.semester', $semester)
                    ->findAll();
    }

    public function getAllTranskrip($id)
    {
        return $this->select('nilai.*, mata_kuliah.nama_mk, mata_kuliah.sks')
                    ->join('mata_kuliah', 'mata_kuliah.kode_mk = nilai.kode_mk')
                    ->where('nilai.npm', $id)
                    ->orderBy('semester', 'ASC')
                    ->findAll();
    }

    public function getFirstSemester($id)
    {
        return $this->select('semester')
                    ->where('npm', $id)
                    ->orderBy('semester', 'ASC')
                    ->first();
    }
}
