<?php
session_start();
requireValidSession();
loadModel('WorkingHours');

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

// $currentTime = strftime('%H:%M:%S', time());   -- strftime() foi descontinuada a partir do PHP 8.1. A alternativa recomendada é usar DateTime para formatar a data e hora
$currentTime = (new DateTime())->format('H:i:s');

$records->innout($currentTime);

header('Location: day_records.php');