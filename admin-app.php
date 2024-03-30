<?php
session_start();

include 'setting/config.php';

if (isset($_GET['del'])) { //проверяем, есть ли переменная
    //удаляем строку из таблицы
    $sql = mysqli_query($conn, "DELETE FROM `registration` WHERE `id` = {$_GET['del']}");
    if ($sql) {
        echo "<p>заявка удалена.</p>";
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($conn) . '</p>';
    }
}
if (isset($_POST["full_name"])) {
    //Если это запрос на обновление, то обновляем
    if (isset($_GET['red'])) {
        $sql = mysqli_query($conn, "UPDATE `registration` SET `full_name` = '{$_POST['full_name']}',`login` = '{$_POST['login']}', `password` = '{$_POST['password']}' WHERE `id`={$_GET['red']}");
    } else {
        //Иначе вставляем данные, подставляя их в запрос
        $sql = mysqli_query($conn, "INSERT INTO `registration` (`full_name`, `login`, `password`) VALUES ('{$_POST['full_name']}', '{$_POST['login']}', '{$_POST['password']}')");
    }
}
if (isset($_GET['red'])) {
    $sql = mysqli_query($conn, "SELECT `id`, `full_name`, `login`,`password` FROM `registration` WHERE `id`={$_GET['red']}");
    $product = mysqli_fetch_array($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="z.js">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2? family=Kadwa&display=swap" rel="stylesheet">
    <title>Городской портал</title>
    <style type="text/css">
        TABLE {
            background: #D9D9D9;
            /* Цвет фона таблицы */
            color: black;
            margin-left: 100px;
            width: 800px;

        }

        TD {
            font-family: 'Kadwa', sans-serif;
            size: 20px;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="logo">
            <div class="logo-fotos">
                <a href="index-user.php"><img src="img/image 1.png" alt="logo" class="logo-foto">
                    <h2 class="logo-text">Сделаем мир лучше!</h2>
                </a>
            </div>
            <ul class="hd">
                <li class="head-text"><a href="admin.php" class="a">Профиль</a></li>
                <li class="head-text1"><a href="login.php" class="a">Выход</a></li>
            </ul>
        </div>
    </header>
    <section class="input-2">
        <div class="admin-pole">
            <div class="left-pole">
            </div>
            <div class="center-pole">
                <div class="top-left-text">
                    <div class="top-menu">
                        <div class="control-admin"><a href="admin.php"><button class="add-user">Посмотреть заявки</button></a>
                            <a href="admin-category.php"><button class="add-user">Управление категориями</button></a>
                        </div>

                        <p class="list-user">Список ваших пользователей.</p>
                    </div>

                </div>
                <div class="information-user">
                    <table border='1'>
                        <tr>
                            <td class="info-user">Номер</td>
                            <td class="info-user">Пользователь</td>
                            <td class="info-user">Логин</td>
                            <td class="info-user">Пароль</td>
                        </tr>
                        <?php

                        $sql = mysqli_query($conn, 'SELECT `id`, `full_name`, `login`, `password` FROM `registration`');
                        while ($result = mysqli_fetch_array($sql)) {
                            echo '<tr>' .
                                "<td>{$result['id']}</td>" .
                                "<td>{$result['full_name']}</td>" .
                                "<td>{$result['login']}</td>" .
                                "<td>{$result['password']}</td>" .
                                "<td><a href='?del={$result['id']}'>Удалить</a></td>" .
                                "<td><a href='?red={$result['id']}'>Изменить</a></td>" .
                                '</tr>';
                        }
                        echo <<<HTML
                            <br>
                            HTML;
                        ?>
                    </table>
                </div>
                <form action="" method="post">
                    <table>
                        <tr>
                            <td style="font-family: Kadwa, sans-serif; size: 20px;">Имя:</td>
                            <td><input type="text" name="full_name" style="height: 25px; width: 200px; border-radius:  3px; margin-right: 150px;" value="<?= isset($_GET['red']) ? $product['full_name'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td>Логин:</td>
                            <td><input type="text" name="login" size="3" style="height: 25px; width: 200px; border-radius:  3px;" value="<?= isset($_GET['red']) ? $product['login'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td>Пароль:</td>
                            <td><input type="text" name="password" size="3" style="height: 25px; width: 200px; border-radius:  3px;" value="<?= isset($_GET['red']) ? $product['password'] : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="OK"></td>
                        </tr>
                    </table>
                </form>
            </div>


        </div>
    </section>