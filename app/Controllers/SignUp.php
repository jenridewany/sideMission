<?php

namespace App\Controllers;

use App\Models\UsersModel;

class SignUp extends BaseController
{
    public function index()
    {
        return view('signUp');
    }
}
