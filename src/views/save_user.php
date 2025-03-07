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
        'Crie e Atualize o usuário',
        'icofont-users'
    );

    include(TEMPLATE_PATH . "/messages.php");

    $is_admin = '';

    $errors = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'start_date' => '',
        'end_date' => '',
        'is_admin' => ''
    ];
    ?>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $id ?? "" ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nome</label>
                <input class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>" type="text" name="name" id="name" value="<?= $name ?? "" ?>" placeholder="Informe o nome">
                <div class="invalid-feedback">
                    <? $errors['name'] ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>" type="email" name="email" id="email" value="<?= $email ?? "" ?>" placeholder="Informe o email">
                <div class="invalid-feedback">
                    <? $errors['email'] ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="password">Senha</label>
                <input class="form-control <?= $errors['password'] ? 'is-invalid' : '' ?>" type="password" name="password" id="password" placeholder="Informe a senha">
                <div class="invalid-feedback">
                    <? $errors['password'] ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="confirm_password">Confirme a senha</label>
                <input class="form-control <?= $errors['confirm_password'] ? 'is-invalid' : '' ?>" type="password" name="confirm_password" id="confirm_password" placeholder="Informe a mesma senha para confirmação">
                <div class="invalid-feedback">
                    <? $errors['confirm_password'] ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="start_date">Data de Admisão</label>
                <input class="form-control <?= $errors['start_date'] ? 'is-invalid' : '' ?>" type="date" name="start_date" id="start_date" value="<?= $start_date ?>" placeholder="Data de admissão">
                <div class="invalid-feedback">
                    <? $errors['start_date'] ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="end_date">Data de Desligamento </label>
                <input class="form-control <?= $errors['end_date'] ? 'is-invalid' : '' ?>" type="date" name="end_date" id="end_date" value="<?= $end_date ?>" placeholder="Data de desligamento">
                <div class="invalid-feedback">
                    <? $errors['end_date'] ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group text-center col-md-6">
                <label for="is_admin">Perfil de Administrador? </label>
                <input type="checkbox" id="is_admin" name="is_admin" placeholder=" Permissão de Administrador" class="form-control <?= $errors['is_admin'] ? 'is-invalid' : '' ?>" <?= $is_admin ? 'checked' : '' ?>>
                <div class="invalid-feedback">
                    <? $errors['is_admin'] ?>
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-primary btn-lg">Salvar</button>
            <a href="/users.php" class="btn btn-secondary btn-lg"> Cancelar </a>
        </div>
    </form>
</main>