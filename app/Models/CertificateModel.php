<?php
namespace App\Models;
use CodeIgniter\Model;

class CertificateModel extends Model {
    protected $table = 'mbkm_certificates';
    protected $primaryKey = 'id';
    protected $allowedFields = ['npm','program_id','file_path','created_at'];
}
