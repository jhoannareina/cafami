<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'PrincipalController::index');
$routes->get('principal', 'PrincipalController::index');
$routes->get('mercado', 'MercadoController::index');

$routes->get('mercado/(:num)', 'MercadoController::feria/$1');



