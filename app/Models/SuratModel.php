<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratModel extends Model
{
    protected $table            = 'surat';
    protected $primaryKey       = 'id_surat';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'npm',
        'jenis_surat',
        'keterangan',
        'tanggal_pengajuan',
        'tanggal_update',
        'status'
    ];
}
