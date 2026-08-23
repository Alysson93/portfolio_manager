<?php
    session_start();

    require_once '../core/consts.php';
    require_once '../core/libraries/SessionManager.php';
    require_once '../core/libraries/Controller.php';
    require_once '../core/libraries/Redirect.php';
    require_once '../core/libraries/Request.php';
    require_once '../core/libraries/Router.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=WEB_URL?>/css/style.css">
    <title>Meu portfólio</title>
</head>
<body>
    <?php require_once '../core/views/partials/header.php'; ?>
    <main>
        <?php $router = new Router(); ?>
    </main>
</body>
</html>