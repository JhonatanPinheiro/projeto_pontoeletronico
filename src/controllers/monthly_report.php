<?php
session_start();
requireValidSession();

$currentDate = new DateTime();

$user = $_SESSION['user'];
$selectedUserId = $user->id;
$users = null;
if ($user->is_admin) {
    $users = User::get();
    // $selectedUserId = $_POST['user'] ? $_POST['user'] : $user->id;
    $selectedUserId = $_POST['user'] ?? $user->id;
}

// $selectedPeriod = $_POST['period'] ? $_POST['period'] : $currentDate->format('Y-m');
// $periods = [];
// for ($yearDiff = 2; $yearDiff >= 0; $yearDiff--) {
//     $year = date('Y') - $yearDiff;
//     for ($month = 1; $month <= 12; $month++) {
//         $date = new DateTime("{$year}-{$month}-1");
//         $periods[$date->format('Y-m')] = strftime('%b/%Y', $date->getTimestamp());
//     }
// }

// $selectedPeriod = $_POST['period'] ? $_POST['period'] : $currentDate->format('Y-m');

$selectedPeriod = $_POST['period'] ?? $currentDate->format('Y-m');
$periods = [];

for ($yearDiff = 0; $yearDiff <= 3; $yearDiff++) {
    $year = date('Y') - $yearDiff;
    for ($month = 12; $month >= 1; $month--) {
        $date = new DateTime("{$year}-{$month}-1");
        $periods[$date->format('Y-m')] = $date->format('M/Y'); // Substituído strftime por format
    }
}

$registries = WorkingHours::getMonthlyReport($selectedUserId, $selectedPeriod, new DateTime());

$report = [];
$workDay = 0;
$sumOfWorkedTime = 0;
// $lastDay = getLastDayOfMonth($currentDate)->format('d');
$lastDay = getLastDayOfMonth($selectedPeriod)->format('d');

// for ($day = 1; $day <= $lastDay; $day++) {
//     $date = $currentDate->format('Y-m') . '-' . sprintf('%02d', $day);
//     // $registry = $registries[$date];
for ($day = 1; $day <= $lastDay; $day++) {
    $date = $selectedPeriod . '-' . sprintf('%02d', $day);
    // $registry = $registries[$date];
    $registry = isset($registries[$date]) ? $registries[$date] : null;

    if (isPastWorkday($date)) $workDay++;

    if ($registry) {
        $sumOfWorkedTime += $registry->worked_time;
        array_push($report, $registry);
    } else {
        array_push($report, new WorkingHours([
            'work_date' => $date,
            'worked_time' => 0
        ]));
    }
}

$expectedTime = $workDay * DAILY_TIME;
$balance = getTimeStringFromSeconds(abs($sumOfWorkedTime - $expectedTime));

$sign = ($sumOfWorkedTime >= $expectedTime) ? '+' : '-';

loadTemplateView('monthly_report', [
    'report' => $report,
    'sumOfWorkedTime' => getTimeStringFromSeconds($sumOfWorkedTime),
    'balance' => "{$sign}$balance",
    'selectedPeriod' => $selectedPeriod,
    'periods' => $periods,
    'selectedUserId' => $selectedUserId,
    'users' => $users,

]);
