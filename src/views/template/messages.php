<?php

$errors = [];

if(isset($exception)){
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];

    if(get_class($exception) === 'ValidationException'){
        $errors = $exception->getErrors();
    }
}

$alertType = '';

if(isset($message['type']) == 'error'){
    $alertType = 'danger';
} else{
    $alertType = 'primary';
}


?>

<?php if(isset($message)): ?>

<div role="alert"
    class="my-2 py-2 alert alert-<?= $alertType ?>">
    <?= $message['message'] ?>
</div>

<?php endif ?>