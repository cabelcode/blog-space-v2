<?php

include __DIR__ . '/../inc/autoloader.php';;

$routes = New router;

$routes->get('/', 'HomeController::index');
$routes->get('/home', 'HomeController::index');
$routes->get('/index.php', 'HomeController::index');


$routes->get('/search', 'PostsController::search');

$routes->get('/post', 'PostsController::index');

$routes->run();

error_reporting(0);

?>