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
                <a href="login.php">
                    <li class="head-text3">Регистрация/Вход</li>
                </a>
            </ul>
        </div>
    </header>
    <section class="input">
        <div class="pole-2">
            <h2 class="text-section-2">Регистрация</h2>
            <div id="registration">
                <form action="setting/signup.php" method="post">
                    <input name="full_name" type="name" class="text-2" placeholder="Введите ФИО" required></p>
                    <input name="login" type="text" class="text-2" placeholder="Логин" required>
                    <input name="email" type="email" class="text-2" placeholder="E-mail" required>
                    <input name="password" type="text" class="text-2" placeholder="Пароль" required>
                    <input name="password_confirm" type="text" class="text" placeholder="Повторите пароль" required>
                    <button class="button" type="submit">Регистрация</button>
                </form>
            </div>
            <label class="label-checkbox">
                <input type="checkbox" class="checkbox">
                <span class="fake"></span>
                <div class="text-checkbox"><span class="text-check">Согласие на обработку данных</span></div>
            </label>
            <p class="message">
            <?php
            if(isset($_SESSION['msg']) && $_SESSION['msg']){
                echo'<p>'.$_SESSION['msg'].'</p>';
            }
            unset($_SESSION['msg']);
            ?>
        </p>
        </div>

    </section>
    <script src="z.js" type="modyle"></script>
</body>