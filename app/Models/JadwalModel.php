<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $allowedFields = ['npm', 'hari', 'mata_kuliah', 'jam_mulai', 'jam_selesai', 'ruangan', 'dosen'];
}
