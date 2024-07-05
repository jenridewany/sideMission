<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ProductModel;
use App\Models\CategoriesModel;
use CodeIgniter\Files\File;

class Products extends BaseController
{
    private $assetsProductDir = 'assets/uploads';
    
    /** Simpan data session */
    protected $session;
    
    public function __construct()
    {
        // Load session library
        $this->session = session();
        $this->checkSession(); // Check session on controller load
    }
    

    protected function checkSession()
    {
        // Check if user data exists in session
        if (!$this->session->has('logged_in')) {
            // If not, redirect to login page
            return redirect()->to('/login')->with('error', 'Session not valid.');
        } else if ($this->session->has('role') && $this->session->role != 'creator') {
            return redirect()->to('/login')->with('error', 'You dont have permission to access this resource.');
        }
    }
    
    public function index()
    {
        $productModel = new ProductModel();
        
        $session = session();
        $data['products'] = $productModel->getProductsWithCategoryUser($session->user_id);
        return view('/creator/listingProducts', $data);
    }

    public function add()
    {
        $category = new CategoriesModel();
        
        $data['categories'] = $category->findAll();
        return view('creator/addProducts', $data);
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

    public function edit($id)
    {
        $spesificProduct = new ProductModel();

        $data['product'] = $spesificProduct->getProductById($id);
        
        if (!$data['product']) {
            // throw new \CodeIgniter\Exceptions\PageNotFoundException('Product with ID ' . $id . ' not found.');
            return redirect()->to('/products')->with('message', "Product with ID ' . $id . ' not found.");
        }
        
        $session = session();
        if($data['product'] && $data['product']['user_id'] != $session->user_id) {
            // throw new \CodeIgniter\Exceptions\PageNotFoundException('You dont have permission to access this resource');
            return redirect()->to('/products')->with('message', 'You dont have permission to access this resource');
        }
        
        $category = new CategoriesModel();
        $data['categories'] = $category->findAll();
        
        return view('creator/editProducts', $data);
    }
    
    public function update($id)
    {
        $productModel = new ProductModel();
        
        $oldData = $productModel->getProductById($id);
        
        if (!$oldData) {
            // throw new \CodeIgniter\Exceptions\PageNotFoundException('Product with ID ' . $id . ' not found.');
            return redirect()->to('/products')->with('message', "Product with ID ' . $id . ' not found.");
        }
        
        $session = session();
        if($oldData && $oldData['user_id'] != $session->user_id) {
            // throw new \CodeIgniter\Exceptions\PageNotFoundException('You dont have permission to access this resource');
            return redirect()->to('/products')->with('message', 'You dont have permission to access this resource');
        }
    
        $tmp = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'category' => $this->request->getPost('category')
        ];

        if ($imageFile = $this->request->getFile('picture')) {
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                $imageName = $imageFile->getRandomName();
                $imageFile->move('uploads/', $imageName);
                $tmp['picture'] = 'uploads/' . $imageName;
            }
        }
        
        $data = [];
        foreach ($tmp as $key => $value) {
            if (!array_key_exists($key, $oldData) || $oldData[$key] !== $value) {
                $data[$key] = $value; // or $value, based on which array's changes you want to keep
            }
        }

        if ($productModel->updateProduct($id, $data)) {
            return redirect()->to('/products')->with('message', 'Successfully Edit '.$oldData['name']);
        } else {
            // Show validation errors or handle the failure
            // var_dump($productModel->errors());
            return redirect()->to('/products')->with('message', $productModel->errors());
        }
    }

    public function delete($id)
    {
        $productModel = new ProductModel();

        if ($productModel->deleteProduct($id)) {
            return redirect()->to('/products')->with('success', 'Product deleted successfully');
        } else {
            // Handle the failure
            echo "Failed to delete product.";
        }
    }
}
