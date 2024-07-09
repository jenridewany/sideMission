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

    public function profile()
    {
        $usersModel = new UsersModel();
        $session = session();

        $id = $session->user_id;
        $data['user'] = $usersModel->getProfile($id);
        return view('profile', $data);
    }

    public function editProfile()
    {
        $usersModel = new UsersModel();
        $session = session();

        $id = $session->user_id;
        $data['user'] = $usersModel->getProfile($id);
        return view('editProfile', $data);
    }

    public function update()
    {
        $usersModel = new UsersModel();
        $session = session();
        $id = $session->user_id;
        $oldData = $usersModel->getProfile($id);
        
        if (!$oldData) {
            // throw new \CodeIgniter\Exceptions\PageNotFoundException('Product with ID ' . $id . ' not found.');
            return redirect()->to('/editProfile')->with('message', "User with ID ' . $id . ' not found.");
        }
    
        $tmp = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
            'password' => $oldData['password']
        ];

        // var_dump($tmp);die;
        
        $data = [];
        foreach ($tmp as $key => $value) {
            if (!array_key_exists($key, $oldData) || $oldData[$key] !== $value) {
                $data[$key] = $value; // or $value, based on which array's changes you want to keep
            }
        }

        if ($usersModel->updateProfile($id, $data)) {
            return redirect()->to('/profile')->with('message', 'Successfully Edit '.$oldData['username']);
        } else {
            return redirect()->to('/editProfile')->with('message', $usersModel->errors());
        }
    }

    public function changePass()
    {
        return view('changePass');
    }

    public function updatePass()
    {
        $usersModel = new UsersModel();
        $session = session();
        $id = $session->user_id;
        $oldData = $usersModel->getProfile($id);

        $validation = $this->validate([
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmPassword' => 'required|matches[password]'
        ]);

        // Check if validation passed
        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Retrieve input values
        $password = $this->request->getPost('password');

        if (empty($password)) {
            return redirect()->back()->withInput()->with('error', 'Password cannot be empty.');
        }

        $hashedPassword = password_hash((string)$password, PASSWORD_DEFAULT);

        if (!$hashedPassword) {
            return redirect()->back()->withInput()->with('error', 'Password hashing failed.');
        }

        // Save user data
        $data = [
            'username' => $oldData['username'],
            'email' => $oldData['email'],
            'password' => $hashedPassword,
            'role' => $oldData['role']
        ];
        
        $save = $usersModel->updateProfile($id, $data);

        // Redirect with success message
        return redirect()->to('/profile')->with('success', 'Password has been changed');
    }


}