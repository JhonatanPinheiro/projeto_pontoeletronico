<main class="content">
    <?php
    renderTitle(
        'Relatório Mensal',
        'Acompanhe seu saldo de horas',
        'icofont-ui-calendar'
    );
    ?>
    <div>
        <form class="md-4" action="#" method="post">
            <select name="period" class="form-control" placeholder="Selecione o perído...">
                <?php
                foreach ($periods as $key => $month) {
                    echo "<option value='{$key}'>{$month}</option>";
                }
                ?>
            </select>
        </form>
    </div>
    <div>
        <table class="table table-bordered table-striped table-hover table-primary">
            <thead class="bg-primary text-white">
                <th class="">Dia</th>
                <th class="">Entrada 1</th>
                <th class="">Saída 1</th>
                <th class="">Entrada 2</th>
                <th class="">Saída 2</th>
                <th class="">Saldo</th>
            </thead>
            <tbody>
                <?php foreach ($report as $registry): ?>
                    <tr class="">
                        <td class="">
                            <?= formatDateWithLocale($registry->work_date, '%A, %d de %B de %Y') ?>
                        </td>

                        <td class="">
                            <?= $registry->time1  ?>
                        </td>

                        <td class="">
                            <?= $registry->time2  ?>
                        </td>
                        <td class="">
                            <?= $registry->time3  ?>
                        </td>
                        <td class="">
                            <?= $registry->time4  ?>
                        </td>
                        <td class="">
                            <?= $registry->getBalance() ?>
                        </td>
                    </tr>
                <?php endforeach ?>
                <tr class='bg-primary text-white font-weight-bold'>
                    <td colspan="5" class='text-center'> Horas Trabalhadas: <span><?= $sumOfWorkedTime ?></span> </td>
                    <td colspan="1"> Saldo Mensal: <span><?= $balance ?></span> </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>