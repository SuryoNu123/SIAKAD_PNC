<?php
namespace App\Models;

use CodeIgniter\Model;

class EvaluationModel extends Model
{
    protected $table = 'mbkm_evaluations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['program_id','evaluator_name','role','rating','note','created_at'];
    protected $useTimestamps = true;

    public function forProgram($programId)
    {
        return $this->where('program_id', $programId)->orderBy('created_at','DESC')->findAll();
    }
}
