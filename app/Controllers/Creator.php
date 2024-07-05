<?php

namespace App\Controllers;
use App\Models\ProductModel;

class Creator extends BaseController
{

    
    
    
    public function index()
    {
        $data['session'] = $this->session;   
        return view('dashboard', $data);
    }
    
    public function new()
    {
        return view('products/new');
    }
    
    public function edit($id)
    {
        $productModel = new ProductModel();
        $data['product'] = $productModel->find($id);

        return view('products/edit', $data);
    }
    
    
}

