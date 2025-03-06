<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponto Eletrônico</title>
    <link rel="stylesheet" href="assets/css/color-personalize.css">
    <link rel="stylesheet" href="assets/css/manager-report.css">
</head>

<main class="content">
    <?php
    renderTitle(
        'Relatório Gerencial',
        'Resumo das horas trabalhadas dos funcionários',
        'icofont-chart-histogram'
    )
    ?>

    <div class="summary-boxes">
        <div class="summary-box bg-primary boder-manager-report">
            <i class="icon icofont-users text-white"> </i>
            <p class="title">Quantidade de funcionários</p>
            <h3 class="value"><?= $activeUsersCount ?></h3>
        </div>
        <div class="summary-box bg-danger boder-manager-report">
            <i class="icon icofont-patient-bed text-white"> </i>
            <p class="title">Faltas</p>
            <h3 class="value "><?= count($absentUsers) ?></h3>
        </div>
        <div class="summary-box bg-success boder-manager-report">
            <i class="icon icofont-sand-clock text-white"> </i>
            <p class="title">Horas no Mês</p>
            <h3 class="value"><?= $hoursInMonth ?></h3>
        </div>

    </div>

    <?php if (count($absentUsers) > 0): ?>
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="text-right">
                    <span class="border-date">
                        <?= $current_date = (new DateTime())->format('d-m-Y'); ?>
                    </span>
                </h4>
                <h4 class="card-title"> Faltosos de Dia </h4>
                <p class="card-category mb-0"> Relação dos funcionários que ainda não bateram o ponto hoje </p>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <th>Nome</th>
                    </thead>
                    <tbody>
                        <?php foreach ($absentUsers as $name): ?>
                            <tr>
                                <td>
                                    <?= $name ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>
</main>