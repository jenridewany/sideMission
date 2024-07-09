<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ProductModel;

class Users extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        
        $session = session();
        $data['products'] = $productModel->orderBy('id', 'desc')->findAll();
        return view('user/products', $data);
    }

    public function profile($id)
    {
        $usersModel = new UsersModel();

        $data['profile'] = $usersModel->getProfile($id);
        return view('profiles', $data);
    }
}