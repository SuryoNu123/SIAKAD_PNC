<?php
namespace App\Models;
use CodeIgniter\Model;

class DeadlineModel extends Model {
    protected $table = 'mbkm_deadlines';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title','due_date','type','npm','created_at'];
}
