<?php

//Controller temporário
loadModel('WorkingHours');

$wh = WorkingHours::loadFromUserAndDate(1, date('Y-m-d'));


echo '<hr>';
$workedIntervalString = $wh->getWorkedInterval()->format('%H:%I:%S');
print_r($workedIntervalString);


echo '<br>';
echo '<br>';
echo '<br>';

$lunchIntervalString = $wh->getLunchInterval()->format(('%H:%I:%S'));
echo '<hr>';
print_r($lunchIntervalString);


echo '<br>';
echo '<br>';
echo '<br>';

echo '<hr>';
print_r($wh->getExitTime());

