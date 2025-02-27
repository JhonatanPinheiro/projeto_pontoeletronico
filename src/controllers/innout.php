<?php
session_start();
requireValidSession();
loadModel('WorkingHours');

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

try {
    // $currentTime = strftime('%H:%M:%S', time());   -- strftime() foi descontinuada a partir do PHP 8.1. A alternativa recomendada é usar DateTime para formatar a data e hora
    $currentTime = (new DateTime())->format('H:i:s');

    if ($_POST['forcedTime']) {
        $currentTime = $_POST['forcedTime'];
    }

    $records->innout($currentTime);
    addSuccessMsg('Ponto inserido com Sucesso!');
} catch (AppException $e) {
    addErrorMsg($e->getMessage());
}

header('Location: day_records.php');
