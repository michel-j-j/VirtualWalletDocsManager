<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pantallaTesting', 'AdminController::index');

$routes->get('/login', 'LoginController::login');
$routes->post('/login/logear', 'LoginController::logear');
$routes->get('pantallaTesting', 'ControladorPrincipal::index');

$routes->get('/registrar', 'LoginController::registrar');
$routes->post('/registrar/registrarse', 'LoginController::registrarse');

































$routes->get('forms/formDocumentacion', 'DocumentacionController::formularioDocumentacion');
$routes->post('insertarDocumentacion', 'DocumentacionController::insertarDocumentacion');

$routes->get('forms/formUsuarios_admin', 'UserController::formularioUsuario_admin');
$routes->post('forms/formUsuarios_admin', 'UserController::formularioUsuario_admin');

$routes->get('forms/modificarUsuario/(:num)', 'UserController::modificarUsuario/$1'); 
$routes->post('forms/modificarUsuario', 'UserController::modificarUsuario/$1');

$routes->get('tables/listaUsuarios', 'UserController::userList');
$routes->post('forms/eliminarUsuario/', 'UserController::eliminarUsuario/'); 

$routes->get('seleccionarUsuarioDenuncia', 'DenunciaController::seleccionarUsuarioDenuncia');
$routes->post('administrarDenuncias', 'DenunciaController::administrarDenunciasActivas');