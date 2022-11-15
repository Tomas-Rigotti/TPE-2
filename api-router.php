<?php
require_once './libs/Router.php';
require_once './app/controllers/libros-api.controller.php';


$router = new Router();

$router->addRoute('libros', 'GET', 'LibrosApiController', 'obtenerLibros');
$router->addRoute('libros/:ID', 'GET', 'LibrosApiController', 'obtenerLibro');
$router->addRoute('libros/:ID', 'DELETE', 'LibrosApiController', 'borrarLibro');
$router->addRoute('libros', 'POST', 'LibrosApiController', 'agregarLibro');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
