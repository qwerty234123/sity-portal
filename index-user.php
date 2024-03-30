<?php
include 'setting/config.php';
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <title>Городской портал</title>
</head>

<body>
    <header class="header">
        <div class="logo">
            <div class="logo-fotos">
                <a href="index-user.php">
                <img src="img/image 1.png" alt="logo" class="logo-foto">
                <h2 class="logo-text">Сделаем мир лучше!</h2></a>
            </div>
            <ul class="hd">
                <a href="user.php">
                    <li class="head-text2">Профиль</li>
                </a>
                <a href="login.php">
                    <li class="head-text3">Выход</li>
                </a>
            </ul>
        </div>
    </header>
    <section class="section">
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM `problem` where id = 1001");
        while ($result = mysqli_fetch_array($sql)) {
        ?>
            <div class="problem">
                <div class="problem-1">
                    <img src="<? echo $result['image'] ?>" alt="problem" class="problem-foto">
                    <div class="pc">
                        <div class="ploblem-cat">
                            <div class="problem-cat11">
                                <img src="img/Frame 2.png" alt="problem" class="problem-1-foto">
                                <div class="problem-text"><? echo $result['name'] ?></div>
                            </div>
                        </div>
                        <div class="ploblem-cat">
                            <div class="problem-cat2">
                                <img src="img/vremya.png" alt="time" class="problem-1-foto">
                                <div class="problem-text1">Пол года</div>
                            </div>
                        </div>
                        <div class="ploblem-cat">
                            <div class="problem-cat3">
                                <img src="img/категории 1.png" alt="problem" class="problem-1-foto">
                                <div class=" problem-text"><? echo $result['category'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            <? } ?>
            <div class="problem-2">
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM `problem` where id = 1002");
                while ($result = mysqli_fetch_array($sql)) {
                ?>
                    <img src="img/снег после 1.png" alt="problem" class="problem-foto">
                    <div class="problem-bottom">
                        <div class="ploblem-cat">
                            <div class="problem-cat12">
                                <img src="img/Frame 2.png" alt="problem" class="problem-1-foto">
                                <div class="problem-text"><? echo $result['name'] ?></div>
                            </div>
                        </div>
                        <div class="ploblem-cat">
                            <div class="problem-cat2">
                                <img src="img/vremya.png" alt="time" class="problem-1-foto">
                                <div class="problem-text1">Неделя</div>
                            </div>
                        </div>
                        <div class="ploblem-cat">
                            <div class="problem-cat3">
                                <img src="img/категории 1.png" alt="problem" class="problem-3-foto">
                                <div class="problem-text"><? echo $result['category'] ?></div>
                            </div>
                        </div>
                    </div>
            </div>
        <? } ?>
            </div>
            <div>
                <?
                $query = "SELECT COUNT(*) FROM problem WHERE status = 'решена'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $oldResult = mysqli_query($conn, $query);
                $oldCount = mysqli_fetch_assoc($oldResult)['COUNT(*)'];
                // Запрос к базе данных для получения обновленного числа решенных проблем
                $newResult = mysqli_query($conn, $query);
                $newCount = mysqli_fetch_assoc($newResult)['COUNT(*)'];

                // Проверка на увеличение числа решенных проблем
                if ($newCount > $oldCount) {
                    // Воспроизведение мелодии
                    echo '<audio autoplay><source src="iphone.mp3" type="audio/mpeg"></audio>';
                }

                // Проверка на увеличение количества решенных проблем
                echo "Количество решенных проблем: " . $newCount;
                ?>
</body>

</html>
</div>

</section>
</body>

</html>