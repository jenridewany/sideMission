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
$routes->get('/products', 'Products::index');
$routes->get('/add-products', 'Products::add');
$routes->post('/add-products/process', 'Products::addProduct');
$routes->get('/add-products', 'Products::add');
$routes->get('/edit-products', 'Products::edit');
$routes->get('/products', 'Products::index');
$routes->get('/dashboard', 'Users::index');
