<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/nuevaEntidad', 'EntidadController::formularioEntidad');
$routes->get('/listaEntidades', 'EntidadController::entidadesList');
$routes->get('/modificarEntidad/(:num)', 'EntidadController::modificarEntidad/$1');
$routes->post('/modificarEntidad/(:num)', 'EntidadController::modificarEntidad/$1');
$routes->post('/nuevaEntidad', 'EntidadController::formularioEntidad');
