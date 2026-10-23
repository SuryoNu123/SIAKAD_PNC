<?php

namespace App\Models;

use CodeIgniter\Model;

class PresensiModel extends Model
{
    protected $table            = 'presensi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields    = [
        'npm',
        'id_jadwal',
        'pertemuan_ke',
        'tanggal',
        'waktu_masuk',
        'status',
        'keterangan'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function presensiHariIni($idMahasiswa)
    {
        return $this->select("
                presensi.*,
                jadwal.mata_kuliah AS nama_matkul,
                jadwal.ruangan,
                jadwal.jam_mulai,
                jadwal.jam_selesai
            ")
            ->join('jadwal', 'jadwal.id_jadwal = presensi.id_jadwal', 'left')
            ->where('presensi.npm', $idMahasiswa)
            ->where('presensi.tanggal', date('Y-m-d'))
            ->orderBy('jadwal.jam_mulai', 'ASC')
            ->findAll();
    }

  
    public function presentasiKehadiran($idMahasiswa)
    {
        return $this->select("
                presensi.id_jadwal,
                jadwal.mata_kuliah AS nama_matkul,
                SUM(presensi.status = 'present') AS hadir,
                SUM(presensi.status = 'excused') AS izin,
                SUM(presensi.status = 'absent') AS alpa,
                COUNT(*) AS total,
                ROUND((SUM(presensi.status = 'present') / COUNT(*)) * 100, 0) AS persentase
            ")
            ->join('jadwal', 'jadwal.id_jadwal = presensi.id_jadwal', 'left')
            ->where('presensi.npm', $idMahasiswa)
            ->groupBy('presensi.id_jadwal')
            ->orderBy('persentase', 'DESC')
            ->findAll();
    }


    public function cekSudahPresensi($idMahasiswa, $idJadwal)
    {
        return $this->where([
            'npm' => $idMahasiswa,
            'id_jadwal'    => $idJadwal,
            'tanggal'      => date('Y-m-d')
        ])->first();
    }
 
}
