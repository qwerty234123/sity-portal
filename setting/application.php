<?php
session_start();
include 'config.php';

$name = $_POST['name'];
$description = $_POST['description'];
$category = $_POST['category'];
$path = 'image/' . time() . $_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'], '../' . $path);
$check_user =  "INSERT INTO `problem` (`id`, `name`, `desription`, `category`, `image`) VALUES (NULL, '$name', '$description', '$category', '$path')";

if ($conn->query($check_user)) {
    echo "Данные занесены";
    print_r($path);
    header('Location: ../priem.php');
    
} else {
    echo "ошибка";
}
?>
