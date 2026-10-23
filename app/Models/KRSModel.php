<?php

namespace App\Models;

use CodeIgniter\Model;

class KRSModel extends Model
{
    protected $table            = 'krs';
    protected $primaryKey       = 'id_krs';
    protected $allowedFields    = [
        'npm',
        'mk',
        'semester',
        'tahun_ajaran',
        'status',
        'dosen',
        'foto_dosen'
    ];
    protected $useTimestamps = true; 
    protected $createdField  = 'created_at';
}
