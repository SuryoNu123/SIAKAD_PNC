<?php
namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $table = 'mbkm_reports';
    protected $primaryKey = 'id';
    protected $allowedFields = ['program_id','npm','title','file_path','status','created_at'];
    protected $useTimestamps = true;

    public function forUser($npm)
    {
        return $this->where('npm', $npm)->orderBy('created_at','DESC')->findAll();
    }
}
