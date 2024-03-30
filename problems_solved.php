<?php
// Подключение к базе данных (пример использует PDO)
$db = new PDO('mysql:host=localhost;dbname=`city portal`', 'root', '');


// Получение количества решенных задач
$stmt = $db->query('SELECT COUNT(*) FROM problem WHERE status = `решена`');
$count = $stmt->fetchColumn();

echo json_encode(['count' => $count]);