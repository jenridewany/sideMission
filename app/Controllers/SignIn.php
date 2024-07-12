<?php

namespace App\Controllers;

use App\Models\UsersModel;

class SignIn extends BaseController
{
    public function index()
    {
        return view('signIn');
    }
    
    public function process()
    {
        $session = session();

        // Load the user model
        $model = new UsersModel();

        // Validate input
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        // Check if user exists
        if(filter_var($username, FILTER_VALIDATE_EMAIL)){
            $user = $model->where('email', $username)->first();
        }else{
            $user = $model->where('username', $username)->first();
        }
        

        if ($user) {
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Set session data for authenticated user
                $session->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'logged_in' => true
                ]);
                
                if($user['role'] == 'creator') {
                    // Redirect to a success page or dashboard
                    return redirect()->to('/products');
                }else if($user['role'] == 'superadmin') {
                    // Redirect to a success page or dashboard
                    return redirect()->to('/admin-dashboard');
                } else {
                    return redirect()->to('/dashboard');
                }
            }
        }

        // Redirect back to login if authentication fails
        return redirect()->to('/sign-in')->withInput()->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/sign-in');
    }
}
