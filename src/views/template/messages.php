<?php
$errors = [];
$message = [];

if ($exception) {
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];

    if(get_class($exception)=== 'ValidationException'){
        $errors = $exception->getErrors();
    }
}

$alertType = '';

if (isset($message['type']) && $message['type'] === 'error') {
    $alertType = 'danger';
} else {
    $alertType = 'success';
}

?>

<?php if ($message): ?>
    <div class="my-3 alert alert-<?= $alertType ?>" role="alert">
        <?= $message['message'] ?>
    </div>
<?php endif ?>