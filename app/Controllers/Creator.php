<?php

namespace App\Controllers;
use App\Models\ProductModel;

class Creator extends BaseController
{

    
    /** Simpan data session */
    protected $session;
    
    public function __construct()
    {
        // Load session library
        $this->session = \Config\Services::session();
        $this->checkSession(); // Check session on controller load
    }
    

    protected function checkSession()
    {
        // Check if user data exists in session
        if (!$this->session->has('logged_in')) {
            // If not, redirect to login page
            return redirect()->to('/login')->withInput()->with('error', 'Session not valid.');
        } else if ($this->session->has('role') && $this->session->role != 'creator') {
            return redirect()->to('/login')->withInput()->with('error', 'You dont have permission to access this resource.');
        }
    }
    
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
    
    public function addProduct()
    {
        $productModel = new ProductModel();

        if ($this->request->getMethod() === 'post') {
            $data = [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'stock' => $this->request->getPost('stock')
            ];

            if ($productModel->save($data)) {
                return redirect()->to('/products/show/' . $productModel->insertID());
            } else {
                // Show validation errors or handle the failure
                var_dump($productModel->errors());
            }
        }
    }
    
    public function update($id)
    {
        $productModel = new ProductModel();

        if ($this->request->getMethod() === 'post') {
            $data = [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'stock' => $this->request->getPost('stock')
            ];

            if ($productModel->update($id, $data)) {
                return redirect()->to('/products/show/' . $id);
            } else {
                // Show validation errors or handle the failure
                var_dump($productModel->errors());
            }
        }
    }

    public function delete($id)
    {
        $productModel = new ProductModel();

        if ($productModel->delete($id)) {
            return redirect()->to('/products');
        } else {
            // Handle the failure
            echo "Failed to delete product.";
        }
    }
}

