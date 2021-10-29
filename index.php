<?php
session_start();
date_default_timezone_set('Europe/Brussels');
ini_set('display_errors', true);
error_reporting(E_ALL);

$routes = array(
  'home' => array(
    'controller' => 'Users',
    'action' => 'index'
  ),
  'roddels' => array(
    'controller' => 'Users',
    'action' => 'roddels'
  ),
  'admin' => array(
    'controller' => 'Admin',
    'action' => 'index'
  )
);

if(empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if(empty($routes[$_GET['page']])) {
  header('Location: index.php');
  exit();
}

$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once __DIR__ . '/controller/' . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();
