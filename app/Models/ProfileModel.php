<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'npm';
    protected $allowedFields = [
        'npm', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 
        'agama', 'email', 'no_telp', 'alamat', 'program_studi', 'jurusan', 
        'tahun_masuk', 'target_lulus', 'dosen_pembimbing', 'status_mahasiswa', 'foto'
    ];
}
