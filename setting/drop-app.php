<?php
include 'config.php';



if(isset($_POST['deleteButton'])) {
    // Добавьте код для удаления заявок из базы данных
    $query = "DELETE FROM problems WHERE `id` = {$_GET['del']}";
    mysqli_query($conn, $query);
    
    // Выводим уведомление об успешном удалении
    echo '<script>alert("Заявки удалены");</script>';
}
?>