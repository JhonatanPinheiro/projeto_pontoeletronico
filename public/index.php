<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(dirname(__FILE__, 2) . '/src/models/User.php');

#Criando um novo Usuário
$user = new User(['name' => 'Lucas', 'email' => 'lucas@study.com']);
echo $user->getSelect();