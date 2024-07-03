<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ProductModel;
use App\Models\CategoriesModel;
use CodeIgniter\Files\File;

class Products extends BaseController
{
    private $assetsProductDir = 'assets/uploads';
    
    public function index()
    {
        $productModel = new ProductModel();
        
        $session = session();
        $data['products'] = $productModel->getProductsWithCategoryUser($session->user_id);
        return view('listingProducts', $data);
    }
    public function add()
    {
        $category = new CategoriesModel();
        
        $data['categories'] = $category->findAll();
        return view('addProducts', $data);
    }
    
    public function addProduct()
    {
        $productModel = new ProductModel();
        
        $session = session();
        
        $data = [
            'user_id' => $session->user_id,
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'category' => $this->request->getPost('category'),
            'download' => 0
        ];
        
        $img = $this->request->getFile('uploadImg');
        if (!$img->hasMoved()) {
            $newName = $img->getRandomName();

            // Attempt to move the uploaded file to a new location.
            if ($img->move(ROOTPATH . 'public/'.$this->assetsProductDir, $newName)) {
                $data['picture'] = $this->assetsProductDir.'/'.$newName;
                
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to upload picture.');
            }
            
        }


        if ($productModel->save($data)) {
            return redirect()->to('/products'); // /show/' . $productModel->insertID());
        } else {
            // Show validation errors or handle the failure
            var_dump($productModel->errors());
        }
    }
    
    public function update($id)
    {
        $productModel = new ProductModel();
        
        $data = [
            'name' => $this->request->getPost('name'),
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
