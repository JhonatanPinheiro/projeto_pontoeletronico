<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(dirname(__FILE__, 2) . '/src/models/User.php');

#Criando um novo Usuário
$user = new User(['name' => 'Lucas', 'email' => 'lucas@study.com']);
print_r($user);
echo '<br>';
$user->email = 'lucas@teste.com';
print_r($user->email);

/*#Database::getConnection();

$sql = 'SELECT * FROM users';
$result = Database::getResultFromQuery($sql);

while ($row = $result->fetch_assoc()) {
    print_r($row);
    echo '<br>';
}*/
