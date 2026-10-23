<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'npm';
    protected $allowedFields = ['npm', 'password'];
}
