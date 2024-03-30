<?php
include 'config.php';

$login = $_POST['login'];
$password = ($_POST['password']);

$check_user = mysqli_query($conn, "SELECT * FROM `registration` WHERE `login` = '$login' AND `password` = '$password'");
$user_info = $check_user->fetch_object();
if ($login == 'admin' && $password == 'admin') {
    header('Location: ../admin.php');
} else {
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "email" => $user['email']
        ];
        $_SESSION['id']=$user_info->id;
        header('Location: ../user.php');
    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: ../login.php');
    }
}
?>
<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>