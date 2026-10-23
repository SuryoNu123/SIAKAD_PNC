<?php
namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
{
    protected $table = 'mbkm_programs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title','company','duration','status','progress','created_at'];
    protected $useTimestamps = false;
}
