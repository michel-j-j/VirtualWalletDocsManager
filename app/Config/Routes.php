<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */











//Get request ENTIDAD
$routes->get('/', 'Home::index');
//Creacion de entidades
$routes->get('/nuevaEntidad', 'EntidadController::formularioEntidad'); //Muestra el formulario para una nueva entidad
$routes->post('/nuevaEntidad', 'EntidadController::formularioEntidad'); //Manda el formulario y vuelve a cargar la pagina
//Listar entidades
$routes->get('/listaEntidades', 'EntidadController::entidadesList'); //Lista las entidades
//Modificar entidades
$routes->get('/modificarEntidad/(:num)', 'EntidadController::modificarEntidad/$1'); //Muestra el formulario para editar entidades
$routes->post('/modificarEntidad/(:num)', 'EntidadController::modificarEntidad/$1'); // Hace el update de una entidad

//Eliminar entidades
//$routes->get('/eliminarEntidad/(:num)', 'EntidadController::eliminarEntidad/$1');
$routes->post('/eliminarEntidad', 'EntidadController::eliminarEntidad');
//Rutas, usuarios

$routes->get('forms/formUsuarios_admin', 'UserController::formularioUsuario_admin');
$routes->post('forms/formUsuarios_admin', 'UserController::formularioUsuario_admin');

$routes->get('forms/modificarUsuario/(:num)', 'UserController::modificarUsuario/$1');
$routes->post('forms/modificarUsuario', 'UserController::modificarUsuario/$1');

$routes->get('tables/listaUsuarios', 'UserController::userList');
$routes->post('forms/eliminarUsuario/', 'UserController::eliminarUsuario/');
