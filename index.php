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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <header class="header">
        <div class="logo">
            <div class="logo-fotos">
                <img src="img/image 1.png" alt="logo" class="logo-foto">
                <h2 class="logo-text">Сделаем мир лучше!</h2>
            </div>
            <ul class="hd">
                <a href="index.php">
                    <li class="head-text2">Главная</li>
                </a>
                <a href="login.php">
                    <li class="head-text3">Регистрация/Вход</li>
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
                $sql = "SELECT COUNT(*) as total_problems FROM problem where status = 'решена'";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $total_problems = $row['total_problems'];
                }
                
                $conn->close();
                ?>
                
                    <h1>Количество решенных проблем: <?php echo $total_problems; ?></h1>
                    <audio id="audio" src="E:\OSPanel\domains\lab\городской портал\iphone.mp3"></audio>
                    <script>
                        var audio = document.getElementById("audio");
                
                        // Функция для воспроизведения мелодии при увеличении количества решенных проблем
                        function playMelody() {
                            var totalProblems = <?php echo $total_problems; ?>;
                            if (totalProblems % 1 == 0) {
                                audio.play();
                            }
                        }
                
                        // Вызов функции для проверки и воспроизведения мелодии
                        playMelody();
                    </script>
            </div>
</body>

</html>
</div>

</section>
</body>

</html>