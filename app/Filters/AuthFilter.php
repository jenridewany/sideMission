<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
    	// Load session library
        if (!session()->has('user_id')) {
            // If not, redirect to login page
            return redirect()->to('/sign-in')->with('error', 'Session not valid');
        }
        
        # cek route
        # jika role bukan creator, batasi akses ke halaman creator
        $creator_access = ['products', 'add-products', 'edit-products/([0-9]+)'];
        
        if(session('role') != 'creator' && in_array(service('router')->getMatchedRoute()[0], $creator_access)) {
            return redirect()->to('/sign-in')->with('error', 'You dont have access to this resource');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No actions required in this filter's 'after' method.
    }
}