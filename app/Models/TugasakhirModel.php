<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasakhirModel extends Model
{
    protected $table = 'tugas_akhir';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'judul',
        'dosen_pembimbing',
        'tanggal_mulai',
        'progress',
        'status_pengajuan',
        'status_advisor',
        'status_penelitian',
        'status_seminar',
        'status_sidang'
    ];

    protected $useTimestamps = true;
}
