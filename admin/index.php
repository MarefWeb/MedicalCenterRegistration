<?php
    require_once './includes/db.php';
    require_once './includes/functions.php';
    session_start();

    if(is_account_exists($_SESSION['login'], $_SESSION['password'], $db)) {
        header('Location: /admin/content.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Вхід в адмін панель</title>
        <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png" />
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png" />
        <link rel="icon" type="image/png" sizes="192x192" href="img/favicon/android-icon-192x192.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png" />
        <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png" />
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <header class="header">
            <div class="logo">
                <img src="img/logo.svg" alt="logo" />
                <p>Елвейс</p>
            </div>
            <p class="title"><span>Адмін</span> панель</p>
            <a href="/" class="leave">Повернутися на сайт</a>
        </header>
        <main class="main">
            <form action="includes/login.php" method="POST" class="form active" id="form">
                <p class="title">Вхід</p>
                <?php
                    if($_GET['exists']) {
                        echo '<p class="doesnt-exist">Такого аккаунта не існує</p>';
                    }
                ?>
                <input type="text" name="login" placeholder="Логін" class="form__field" required />
                <input type="password" name="password" placeholder="Пароль" class="form__field" required />
                <button class="form__btn">Ввійти</button>
            </form>
        </main>
    </body>
</html>
