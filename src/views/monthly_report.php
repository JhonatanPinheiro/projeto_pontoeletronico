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
            <div class="input-group">
                <?php if ($user->is_admin): ?>
                    <select name="user" class="form-contro mr-1" placeholder="Selecione o usuário...">
                        <option value="">Selecione o Usuário </option>
                        <?php
                        foreach ($users as $user) {
                            $selected = ($user->id === $selectedUserId) ? 'selected' : '';
                            echo "<option value='{$user->id}' {$selected}> {$user->name} </option>";
                        }
                        ?>
                    </select>
                <?php endif ?>
                <select name="period" class="form-control" placeholder="Selecione o perído...">
                    <?php
                    foreach ($periods as $key => $month) {
                        $selected = ($key === $selectedPeriod) ? 'selected' : '';
                        echo "<option value='{$key}' {$selected}>{$month}</option>";
                    }
                    ?>
                </select>
                <button class="btn btn-primary ml-1">
                    <i class="icofont-search"></i>
                </button>
            </div>
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