<?php

//Controller temporário
loadModel('WorkingHours');

$wh = WorkingHours::loadFromUserAndDate(1, date('Y-m-d'));
echo '<hr>';
$workedInterval = $wh->getWorkedInterval()->format('%H:%I:%S');
print_r($workedInterval);

