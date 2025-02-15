<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponto Eletrônico</title>
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<?php
$email = '';
$errors = [
    'email' => '',
    'password' => ''
];
?>

<body>
    <form class="form-login border-main" action="#" method="post">
        <div class="login-card card">
            <div class="card-header danger">
                <span class="font-weight-light"> Ponto Eletrônico &nbsp;</span>
                <i class="icofont-runner-alt-1"></i>
            </div>
            <div class="card-body">
                <?php include(TEMPLATE_PATH . '/messages.php'); ?>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control <?= !empty($errors['email']) ? 'is-invalid' : '' ?>" value="<?= htmlspecialchars($email) ?>" placeholder="Informe o e-mail" autofocus>
                    <div class="invalid-feedback">
                        <?= htmlspecialchars($errors['email']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" class="form-control <?= !empty($errors['password']) ? 'is-invalid' : '' ?>" placeholder="Informe a senha">
                    <div class="invalid-feedback">
                        <?= htmlspecialchars($errors['password']) ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-lg btn-primary" type="submit">Entrar</button>
            </div>
        </div>
    </form>
</body>

</html>