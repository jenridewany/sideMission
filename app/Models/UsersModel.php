<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'phone', 'password'. 'role'];
    protected $useTimestamps = true;

    // Optional: validation rules for the model data
    protected $validationRules = [
        'password' => 'required'
    ];

    // Optional: validation error messages
    protected $validationMessages = [
        'password' => [
            'required' => 'Password is required.'
        ]
    ];

}
