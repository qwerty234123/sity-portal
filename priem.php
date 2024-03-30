<?php
session_start();
include 'setting/config.php';

if (isset($_GET['del'])) { //проверяем, есть ли переменная
    //удаляем строку из таблицы
    $sql = mysqli_query($conn, "DELETE FROM `problem` WHERE `id` = {$_GET['del']}");
}
if (isset($_POST["name"])) {
    //Если это запрос на обновление, то обновляем
    if (isset($_GET['red'])) {
        $sql = mysqli_query($conn, "UPDATE `problem` SET `category` = '{$_POST['category']}',`name` = '{$_POST['name']}',`desription` = '{$_POST['desription']}' WHERE `id`={$_GET['red']}");
    } else {
        //Иначе вставляем данные, подставляя их в запрос
        $sql = mysqli_query($conn, "INSERT INTO `problem` (`name`,`desription`,`category`) VALUES ('{$_POST['name']}', '{$_POST['desription']}', '{$_POST['category']}')");
    }

    //Если вставка прошла успешно
    if ($sql) {
        echo '<p>Успешно!</p>';
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($conn) . '</p>';
    }
}
if (isset($_GET['red'])) {
    $sql = mysqli_query($conn, "SELECT * FROM `problem` WHERE `id`={$_GET['red']}");
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
                <li class="head-text"><a href="user.php" class="a">Профиль</a></li>
                <li class="head-text1"><a href="login.php" class="a">Выход</a></li>
            </ul>
        </div>
    </header>
    <?php
    $check_user = mysqli_query($conn, "SELECT * FROM `registration`");
    $user_info = $check_user->fetch_object();
    if (mysqli_num_rows($check_user) > 0) {
        $_SESSION['id'] = $user_info->id;
    }
    $id_user = $_SESSION['id'];
    $sql = mysqli_query($conn, "SELECT * FROM `problem` ");
    while ($result = mysqli_fetch_array($sql)) { ?>
        <section class="input">
            <div class="input-pole">
                <div class="application">
                    <img src="<? echo $result['image'] ?>" class="image-application">
                    <div class="form-application">

                        <div class="application-1">
                            <p class="text-application"><? echo $result['name'] ?></p>
                        </div>
                        <div class="application-2">
                            <p class="text-application"><? echo $result['category'] ?></p>
                        </div>
                        <div class="application-3">
                            <p class="text-application"><? echo $result['desription'] ?></p>
                        </div>
                        <div class="application-2">
                            <p class="text-application"><? echo $result['status'] ?></p>
                        </div>
                    </div>

                </div>
                <div class="apllication-editor">
                    <?php
                    echo '<tr>' .
                        "<a type='submit' class='edition-button' href='?del={$result['id']}' style='color: black; text-decoration: none; padding-top: 10px;padding-bottom: 10px;padding-right: 20px;padding-left: 20px;margin-left:550px; border: none;'>Удалить</a>" .
                        '</tr>';
                    ?>
                <?php } ?>
                </div>
            </div>

        </section>