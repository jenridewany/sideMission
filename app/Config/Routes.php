<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/sign-up', 'SignUp::index');
$routes->post('/sign-up/process', 'SignUp::process');
$routes->get('/sign-in', 'SignIn::index');
$routes->post('/sign-in/process', 'SignIn::process');
$routes->get('/sign-out', 'SignIn::logout');

// tambahkan middleware authfilter untuk melakukan pengecekan session di halaman produk
$routes->group('', ['filter' => 'authfilter'], function($routes) {
    // user
    $routes->get('/dashboard', 'Users::index');
    $routes->get('/download/(:num)', 'Products::download/$1');
    
    // halaman product
    // creator
    $routes->get('/products', 'Products::index');
    $routes->get('/add-products', 'Products::add');
    $routes->post('/add-products/process', 'Products::addProduct');
    $routes->get('/edit-products/(:num)', 'Products::edit/$1');
    $routes->post('/update-products/process/(:num)', 'Products::update/$1');
    $routes->get('/delete-products/(:num)', 'Products::delete/$1');
});

