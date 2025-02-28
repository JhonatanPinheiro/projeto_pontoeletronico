<?php
session_start();
requireValidSession();
loadModel('WorkingHours');
// $date = (new DateTime())->getTimestamp();
// $today = strftime('%d de %B de %Y', $date);
// $todayMasc = strftime('%d %m %y', $date);

$date = new DateTime();
$today = $date->format('d \d\e F \d\e Y'); // Formato equivalente a '%d de %B de %Y'
loadTemplateView('day_records', ['today' => $today]);
