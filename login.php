<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2? family=Kadwa&display=swap" rel="stylesheet">
    <title>Городской портал</title>
</head>

<body>
    <header class="header">
        <div class="logo">
            <div class="logo-fotos">
                <img src="img/image 1.png" alt="logo" class="logo-foto">
                <h2 class="logo-text">Сделаем мир лучше!</h2>
            </div>
            <ul class="hd">
                <a href="index.html">
                    <li class="head-text2">Главная</li>
                </a>
                <a href="login.html">
                    <li class="head-text3">Регистрация/Вход</li>
                </a>
            </ul>
        </div>
    </header>
    <section class="input">
        <div class="pole">
            <h2 class="text-section">Вход</h2>
            <div>
                <form action="setting/signin.php" method="post">
                    <input type="text" name="login" class="text" placeholder="логин">
                    <input type="password" name="password" class="text" placeholder="пароль">
                    <input type="submit" value="вход" class="button">
                    <a href="./registration.php"><button class="button" type="button">Создать аккаунт</button></a>
                    <p class="message">
                        <?php
                        if (isset($_SESSION['message']) && $_SESSION['message']) {
                            echo '<p>' . $_SESSION['message'] . '</p>';
                        }
                        unset($_SESSION['message']);
                        ?>
                    </p>
                </form>
            </div>
        </div>

    </section>
</body>