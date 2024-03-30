<?php

include 'config.php';

$category = $_POST['category'];

$sql = "INSERT INTO category (name) VALUES ('$category')";

if ($conn->query($sql) === TRUE) {
    header('Location: ../admin-category.php');
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>