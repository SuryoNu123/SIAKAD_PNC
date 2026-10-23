<?php
namespace App\Models;

use CodeIgniter\Model;

class JadwalKuliahModel extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';

    protected $allowedFields = [
        'id_jadwal',
        'npm',
        'hari',
        'mata_kuliah',
        'sks',
        'ruangan',
        'dosen',
        'jam_mulai',
        'jam_selesai'
    ];
}

?>