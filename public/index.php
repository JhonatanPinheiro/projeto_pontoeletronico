<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

#Rotas de Páginas
require_once(dirname(__FILE__, 2) . '/src/config/config.php');
// require_once(VIEW_PATH . '/login.php');

require_once(MODEL_PATH . '/Login.php');

$login = new Login([
    'email' => 'admin@study.com.br',
    'password' => 'a'
]);

try {
    $login->checkLogin();
    echo 'Deu certo :)';
} catch (Exception $e) {
    echo 'Problema no login :P';
}
