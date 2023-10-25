<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pantallaTesting', 'AdminController::index');
$routes->get('/login', 'LoginController::index');


$routes->post('/login/logear', 'LoginController::logear');
$routes->post('/registrar', 'LoginController::registrar');
