<?php
namespace App\Models;
use CodeIgniter\Model;

class MeetingModel extends Model {
    protected $table = 'mbkm_meetings';
    protected $primaryKey = 'id';
    protected $allowedFields = ['npm','meeting_topic','meeting_date','link','created_at'];
}
