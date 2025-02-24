<?php
loadModel('Login');
session_start();
$exception = null;

if (count($_POST) > 0) {
    $login = new Login($_POST);
    try {
        $user = $login->checkLogin();
        header("Location: day_records.php");
        $_SESSION['user'] = $user;
        #echo "Usuário {$user->name} logado com sucesso!";
    } catch (AppException $e) {
        $exception = $e;
    }
}

loadView('login', $_POST + ['exception' => $exception]);
