<main class="content">
    <?php
    echo "Quantidade de Usuários: {$activeUsersCount}";
    echo "Horas Trabalhadas no mês: {$hoursInMonth}";
    print_r($absentUsers);
    ?>
</main>


<?php
// session_start();
// requireValidSession();

// loadTemplateView('manager_report', [
//     // 'report' => $report,
//     // 'sumOfWorkedTime' => getTimeStringFromSeconds($sumOfWorkedTime),
//     // 'balance' => "{$sign}$balance",
//     // 'selectedPeriod' => $selectedPeriod,
//     // 'periods' => $periods,
//     // 'selectedUserId' => $selectedUserId,
//     // 'users' => $users,

// ]);