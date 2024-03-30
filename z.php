<?php
include 'setting/config.php'
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

<body class="app-body">
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
    <section class="input" style="height: 800px;">
        <p class="application-text">Опишите свою проблему</p>
        <div class="problems">
            <form action="setting/application.php" method="post" enctype="multipart/form-data">
                <div class="problem">
                    <p class="text-problem-4">Фото</p>
                    <label class="input-file">
                        <input type="file" name="image" multiple accept="image/*">
                        <span>Выберите файл</span>
                    </label>
                </div>
                <div class="problem">
                    <p class="text-problem-1">Название</p>
                    <input type="text" class="input-problem" name="name" style="width: 620px;">
                </div>
                <div class="problem">
                    <p class="text-problem-2">Описание</p>
                    <input type="text" class="input-problem" name="description" style="width: 620px;">
                </div>
                <div class="problem">
                    <label class="text-problem-3" for="category">Категория</label>
                    <select id="category" name="category" class="input-problem-cat">
                        <?php
                        $sql = "SELECT * FROM `category`";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                    </select>
                </div>
                <button class="button-application">Отправить</button>
            </form>
        </div>
    </section>


</body>