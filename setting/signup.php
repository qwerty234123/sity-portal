<?php

include 'config.php';

$full_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
if ($password === $password_confirm) {
    $password=($password);
    mysqli_query($conn, "INSERT INTO `registration` (`id`, `full_name`, `email`, `login`, `password`) VALUES (NULL, '$full_name', '$email', '$login', '$password')");
    $_SESSION['msg'] = 'Регистрация прошла успешно';
    header('Location: ../login.php');
} else {
    $_SESSION['msg'] = 'Пароли не совпадают';
    header('Location: ../registration.php');
}
