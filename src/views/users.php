<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponto Eletrônico</title>
    <link rel="stylesheet" href="assets/css/color-personalize.css">
</head>

<main class="content">
    <?php
    renderTitle(
        'Cadastro de Usuário',
        'Mantenha os dados dos usuários atualizados',
        'icofont-users'
    );

    include(TEMPLATE_PATH . "/messages.php");

    ?>

    <a class="btn btn-lg btn-primary mb-3" href="save_user.php"> Novo Usuário </a>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>Nome</th>
            <!-- <tr>RG</tr>
            <tr>CPF</tr>
            <tr>Doc. Estrangeiro</tr>
            <tr>Telefone</tr>
            <tr>Telefone</tr>
            <tr>Cidade</tr>
            <tr>Bairro</tr>
            <tr>Endereco</tr>
            <tr>Número</tr> -->
            <th>Email</th>
            <th>Data de Admisão</th>
            <th>Data de Desligamento</th>
            <!-- <tr>Setor</tr>
            <tr>Cargo</tr>
            <tr>Horário de Entrada</tr>
            <tr>Horário de Sáida</tr> -->
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->start_date ?></td>
                    <td><?= $user->end_date ?></td>
                    <td>
                        <a href="save_user.php?update=<?= $user->id ?>" class="btn btn-warning rounded-circle mr-2">
                            <i class="icofont-edit"></i>
                        </a>
                        <a href="?delete=<?= $user->id ?>" class="btn btn-danger rounded-circle">
                            <i class="icofont-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>