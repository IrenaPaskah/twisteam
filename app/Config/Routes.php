<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/spin', 'Home::spin');
$routes->get('/gacha', 'Home::gacha');
