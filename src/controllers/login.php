<?php
loadModel('Login');

if(count($_POST) > 0) {
    $login = new Login($_POST);
    try{
        $user = $login->checkLogin();
        echo "Usuário {$user->name} logado com sucesso!";
    } catch(Exception $e){
        echo 'Falha no Login. Usuário ou senha Inválido';
    }
}
loadView('login', $_POST);
