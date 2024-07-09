<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'role'];
    protected $useTimestamps = true;

    public function getProfile($id) {
        return $this->find($id);
    }

    public function updateProfile($id, $data,)
    {
        return $this->update($id, $data);
    }
    
}
 