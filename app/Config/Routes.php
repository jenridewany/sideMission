<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/sign-up', 'SignUp::index');
$routes->get('/sign-in', 'SignIn::index');
