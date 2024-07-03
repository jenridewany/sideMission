<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Products extends BaseController
{
    public function index()
    {
        return view('listingProducts');
    }
    public function add()
    {
        return view('addProducts');
    }
}
