<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'PrincipalController::index');
$routes->get('principal', 'PrincipalController::index');
$routes->get('mercado', 'MercadoController::index');
$routes->get('producto', 'ProductoController::feria');
$routes->post('producto', 'ProductoController::buscar');
$routes->get('categoria-producto', 'ProductoController::searchByCategoria');
$routes->get('mercado/(:num)', 'MercadoController::feria/$1');

$routes->post('mercado', 'MercadoController::buscar');
$routes->get('categoria', 'MercadoController::searchByCategoria');

include(APPPATH . 'Routes/web.php');
