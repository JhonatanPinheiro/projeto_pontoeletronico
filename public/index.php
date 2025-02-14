<?php
#ini_set('display_errors', 1);
#error_reporting(E_ALL);

#Rotas de Páginas
require_once(dirname(__FILE__, 2) . '/src/config/config.php');

$uri = urldecode($_SERVER['REQUEST_URI']);

if($uri === '/' || $uri ==='' || $uri==='/index.php'){
    $uri = '/login.php';
}

require_once(CONTROLLER_PATH . "/{$uri}");