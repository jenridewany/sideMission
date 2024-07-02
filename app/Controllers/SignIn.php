<?php

namespace App\Controllers;

use App\Models\UsersModel;

class SignIn extends BaseController
{
    public function index()
    {
        return view('signIn');
    }
}
