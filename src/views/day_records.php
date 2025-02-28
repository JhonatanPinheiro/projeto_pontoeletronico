<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponto Eletrônico</title>
    <link rel="stylesheet" href="assets/css/color-personalize.css">
    <link rel="stylesheet" href="assets/css/day-records.css">


</head>
<main class="content">
    <?php
    renderTitle(
        'Registrar Ponto',
        'Mantenha seu ponto consistente!',
        'icofont-check-alt'
    );
    include(TEMPLATE_PATH . '/messages.php');
    ?>
    <div class="card">
        <div class="card-header">
            <h3><?= $today ?></h3>
            <p class="mb-0">Os batimentos efetuados hoje</p>
        </div>
        <div class="card-body">
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Entrada 1: <span class="point-green"> <?= $records->time1 ?? '--' ?> </span> </span>
                <span class="record">Saída: <span class="point-orange"> <?= $records->time2 ?? '--' ?> </span> </span>
            </div>
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Entrada 2: <span class="point-orange"> <?= $records->time3 ?? '--' ?> </span> </span>
                <span class="record">Saída 2: <span class="point-green"> <?= $records->time4 ?? '--' ?> </span> </span>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <a href="innout.php" class="btn btn-success btn-lg">
                <i class="icofont-check mr-1">
                    Bater Ponto
                </i>
            </a>
        </div>
    </div>

    <form class="m-5 p-4 border boder-primary" action="innout.php" method="post">
        <div class="d-flex justify-content-center">
            <span class="p-1">Área de Teste para o Desenvolvedor testar os cenários</span>
        </div>
        <div class="input-group no-border">
            <input type="text" name='forcedTime' class="form-control" placeholder="Informe a hora para simular o batimento!" name="forcedTime">
            <button class="btn btn-danger ml-3">Simular Ponto</button>
            </input>
        </div>
    </form>
</main>