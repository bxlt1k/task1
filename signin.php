<?php
require 'db.php';
$data = $_POST;
$showError = False;

if(isset($data['signin'])) {
    $errors = array();
    $showError = true;

    if(trim($data['email'])== '') {
        $errors[] = 'Укажите Email';
    }
    if(trim($data['pass'])== '') {
        $errors[] = 'Укажите пароль';
    }

    $user = R::findOne('users', 'email = ?', array($data['email']));
    if($user){
        if(password_verify($data['pass'], $user->password)) {
            $_SESSION['user'] = $user;
            header('Location: /');
        } else {
            $errors[] = 'Неверный пароль';
        }
    } else {
        $errors[] = 'Пользователь не найден';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <form action="/signin.php" method="post">
            <p>АВТОРИЗАЦИЯ</p>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="pass" placeholder="Пароль"><br>
            <button type="submit" name="signin">Войти</button>
        </form>
        <p><?php if($showError) { echo showError($errors);} ?></p>
</body>
</html>
