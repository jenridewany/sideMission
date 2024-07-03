<?php

namespace App\Controllers;

use App\Models\UsersModel;

class SignUp extends BaseController
{
    public function index()
    {
        return view('signUp');
    }
    
    public function process()
    {
        // Validate input
        $validation = $this->validate([
            'username' => 'required|min_length[4]|max_length[100]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmPassword' => 'required|matches[password]',
            'role' => 'required|in_list[creator,user]'
        ]);

        // Check if validation passed
        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Retrieve input values
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');

        if (empty($password)) {
            return redirect()->back()->withInput()->with('error', 'Password cannot be empty.');
        }

        $hashedPassword = password_hash((string)$password, PASSWORD_DEFAULT);

        if (!$hashedPassword) {
            return redirect()->back()->withInput()->with('error', 'Password hashing failed.');
        }

        // Save user data
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword,
            'role' => $role
        ];

        $usersModel = new UsersModel();
        $save = $usersModel->save($data);

        // Redirect with success message
        return redirect()->to('/sign-in')->with('success', 'Registration successful. Please log in.');
    }
}
