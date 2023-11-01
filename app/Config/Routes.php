<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pantallaTesting', 'AdminController::index');

$routes->get('/login', 'LoginController::login');
$routes->post('/login/logear', 'LoginController::logear');

$routes->get('/registrar', 'LoginController::registrar');
$routes->post('/registrar/registrarse', 'LoginController::registrarse');