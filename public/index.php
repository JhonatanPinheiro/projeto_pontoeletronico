<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

#Rotas de Páginas
require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(dirname(__FILE__, 2) . '/src/views/login.php');
#require_once(dirname(__FILE__, 2) . '/src/models/User.php');

#Criando um novo Usuário
#$user = new User(['name' => 'Lucas', 'email' => 'lucas@study.com']);


#print_r(User::get(['id' => 1], 'id, name, email'));
#print_r(User::get());

// foreach(User::get() as $user){
//     echo $user->name;
//     echo '<br>';
// }


#echo '<br><hr>';
#print_r(gettype($user));
#echo '<br>';
#var_dump(gettype($user));

#echo $user->getSelect();
#echo User::getSelect(['id' => 1], 'name,email');
#echo '<br>';
#echo User::getSelect(['name' => 'Chaves', 'email' => 'chaves@testenet.com']);
#echo '<br>';
#echo User::getSelect(['name' => 'teste', 'email' => 'teste@testenet.com', 'is_admin' => '1', 'estado'=>'sp']);