<?php
session_start();

include 'setting/config.php';

if (isset($_GET['del'])) { //проверяем, есть ли переменная
    //удаляем строку из таблицы
    $sql = mysqli_query($conn, "DELETE FROM `category` WHERE `name` = '{$_GET['del']}'");
    if ($sql) {
        echo "<p>заявка удалена.</p>";
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($conn) . '</p>';
    }
}
if (isset($_POST["name"])) {
    //Если это запрос на обновление, то обновляем
    if (isset($_GET['red'])) {
        $sql = mysqli_query($conn, "UPDATE `category` SET `name` = '{$_POST['name']}'");
    } else {
        //Иначе вставляем данные, подставляя их в запрос
        $sql = mysqli_query($conn, "INSERT INTO `category` (`name`) VALUES ('{$_POST['name']}')");
    }
}
if (isset($_GET['red'])) {
    $sql = mysqli_query($conn, "SELECT `name` FROM `category` WHERE `name`={$_GET['red']}");
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
                            <a href="admin-app.php"><button class="add-user">Посмотреть пользователей</button></a>
                        </div>

                        <p class="list-user">Список категорий</p>
                    </div>

                </div>
                <div class="information-user">
                    <table border='1'>
                        <tr>
                            <td class="info-user">Категория</td>

                        </tr>
                        <?php

                        $sql = mysqli_query($conn, 'SELECT `name` FROM `category`');
                        while ($result = mysqli_fetch_array($sql)) {
                            echo '<tr>' .
                                "<td>{$result['name']}</td>" .
                                "<td><a href='?del={$result['name']}'>Удалить</a></td>" .
                                "<td><a href='?red={$result['name']}'>Изменить</a></td>" .
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
                            <td style="font-family: Kadwa, sans-serif; size: 20px;">Категория:</td>
                            <td><input type="text" name="name" style="height: 25px; width: 200px; border-radius:  3px; margin-right: 150px;" value="<?= isset($_GET['red']) ? $product['name'] : ''; ?>"></td>
                            </tr?>
                        <tr>
                            <td colspan="2"><input type="submit" value="OK"></td>
                        </tr>
                    </table>
                </form>
            </div>


        </div>
    </section>