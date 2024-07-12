<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ProductModel;
use App\Models\CategoriesModel;
use CodeIgniter\Files\File;

class Admin extends BaseController
{
    
    public function index()
    {
        $usersModel = new UsersModel();
        
        $data['users'] = $usersModel->orderBy('id', 'asc')->findAll();
        return view('/admin/listUser', $data);
    }

    public function categories()
    {
        $categoriesModel = new CategoriesModel();

        $data['categories']= $categoriesModel->orderBy('id','asc')->findAll();
        return view('admin/listCategories',$data);
    }

    public function addCategory()
    {
        return view('admin/addCategory');
    }

    public function editCategory($id)
    {        
        $spesificCategory = new CategoriesModel();
        $data['category'] = $spesificCategory->getCategoryById($id);
        return view('admin/editCategory', $data);
    }

    
}
