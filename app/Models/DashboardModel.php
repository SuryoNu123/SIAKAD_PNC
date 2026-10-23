<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    public function getPengumuman()
    {
        return [
            [
                'tipe' => 'danger',
                'judul' => 'Batas KRS Online',
                'isi' => 'Pendaftaran KRS berakhir 15 September 2025'
            ],
            [
                'tipe' => 'success',
                'judul' => 'Beasiswa Tersedia',
                'isi' => 'Program beasiswa prestasi semester genap dibuka'
            ],
            [
                'tipe' => 'info',
                'judul' => 'Seminar Nasional',
                'isi' => 'Pendaftaran seminar IT dibuka hingga 20 Oktober'
            ],
        ];
    }

    public function getJadwalHariIni()
    {
        return [
            [
                'jam' => '07:30',
                'mata_kuliah' => 'Matematika Diskrit',
                'ruang' => 'A301',
                'dosen' => 'Rosika Listyaningsih, S.Si., M.Si.'
            ],
            [
                'jam' => '09:25',
                'mata_kuliah' => 'Sistem Informasi Manajemen',
                'ruang' => 'B205',
                'dosen' => 'Riyadi Purwanto, ST., M.Eng.'
            ],
            [
                'jam' => '11:15',
                'mata_kuliah' => 'Praktikum Sistem Operasi',
                'ruang' => 'Lab C102',
                'dosen' => 'Rahmanan Bagus Trianto, S.Kom., M.Kom.'
            ]
        ];
    }
}
