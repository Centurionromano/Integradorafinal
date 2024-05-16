<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(true);
$routes->get('/', 'Home::index');

/*De aquí en adelante son de prueba. */
$routes->POST('user', 'User::login');
$routes->POST('/', 'User::login');
$routes->get('/', 'Home::add');
$routes->get('/', 'Home::login');
$routes->get('all', 'Home::all');
$routes->get('/', 'Publication::index');

$routes->get('index', 'Publication::index');
/*De aquí en adelante son de prueba del proyecto final. */
$routes->get('edit/(:num)', 'Publication::edit/$1'); //esto viene en el video guia
$routes->get('logout', 'User::logout');//esta ruta combinada con la ruta absoluta <a class="nav-link" href="<?=base_url('logout')> fue la salvación para cerrar sesión desde cualquier lado.
$routes->get('edit', 'Publication::index');//esta ruta combinada con una ruta absoluta me ayudo a regresar al método index que a su vez muestra la vista all.php
/*De aquí en adelante es para los formularios de a dministrador*/
$routes->get('admin', 'Ad::index');//Esta ruta te manda al formulario para autentificar al administrador.
$routes->get('newad', 'Ad::newad');//Esta ruta te manda del formulario para añadir nuevo usuario.
/*De aquí en adelante son las rutas que añadí para la parte de los formularios que añaden usuarios*/
//$routes->get('edituser', 'Ad::edit');
