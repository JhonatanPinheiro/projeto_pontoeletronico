<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="loader-container">
        <div class="loader"></div>
    </div>
</body>

</html>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html,
    body {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
    }

    .loader-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .loader {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1.5s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<?php
loadModel('WorkingHours');

Database::executeSQL('DELETE FROM working_hours');
Database::executeSQL('DELETE FROM users WHERE id > 5');

function getDayTemplateByOdds($regularRate, $extraRate, $lazyRate)
{
    $regularDayTemplate = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '17:00:00',
        'worked_time' => DAILY_TIME,
        'class' => 'A',
        'description' => 'Jornada de trabalho com Horário Padrão'
    ];

    $extraHourDayTemplate = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '18:00:00',
        'worked_time' => DAILY_TIME + 3600,
        'class' => 'B',
        'description' => 'Jorndade de trabalho com Hora Extra'
    ];

    $lazyDayTemplate = [
        'time1' => '08:30:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '17:00:00',
        'worked_time' => DAILY_TIME - 1800,
        'class' => 'C',
        'description' => 'Jornada de trabalho menor'
    ];

    $value = rand(0, 100);
    if ($value <= $regularRate) {
        return $regularDayTemplate;
    } else if ($value <= ($regularRate + $extraRate)) {
        return $extraHourDayTemplate;
    } else {
        return $regularDayTemplate;
    }
}

function populateWorkingHours($userId, $initialDate, $regularRate, $extraRate, $lazyRate)
{
    $currentDate = $initialDate;
    $yesterday = new DateTime();
    $yesterday->modify('-1 day');
    $columns = ['user_id' => $userId, 'work_date' => $currentDate];

    while (isBefore($currentDate, $yesterday)) {
        if (!isWeekend($currentDate)) {
            $template = getDayTemplateByOdds($regularRate, $extraRate, $lazyRate);
            $columns = array_merge($columns, $template);
            $workingHours = new WorkingHours($columns);
            $workingHours->insert();
        }
        $currentDate = getNextDay($currentDate)->format('Y-m-d');
        $columns['work_date'] = $currentDate;
    }
}
$lastMonth = strtotime('first day of last month');
populateWorkingHours(1, date('Y-m-1'), 70, 20, 10);
populateWorkingHours(3, date('Y-m-d', $lastMonth), 20, 75, 5);
populateWorkingHours(4, date('Y-m-d', $lastMonth), 20, 10, 70);

#print_r(getDayTemplateByOdds(20, 80, 10));
#echo 'Cheguei!';

// header('Location: day_records.php');
