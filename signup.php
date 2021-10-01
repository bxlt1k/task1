<?php
require "db.php";
$data = $_POST;
$showError = False;

if(isset($data['signup'])) {
    $errors = array();
    $showError = true;

    if(trim($data['firstname'])== '') {
        $errors[] = 'Укажите имя';
    }
    if(trim($data['lastname'])== '') {
        $errors[] = 'Укажите фамилию';
    }
    if(trim($data['email'])== '') {
        $errors[] = 'Укажите Email';
    }
    if(trim($data['pass'])== '') {
        $errors[] = 'Укажите пароль';
    }
    if(trim($data['pass']) != trim($data['pass_conf'])) {
        $errors[] = 'Не верный пароль';
    }

    if(R::count('users', 'email = ?', array($data['email'])) >0 ) {
        $errors[] = 'Пользователь с таким Email уже зарегистрирован';
    }

    if(empty($errors)) {
        $user = R::dispense('users');
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->email = $data['email'];
        $user->password = password_hash($data['pass'], PASSWORD_DEFAULT);
        R::store($user);
        header('Location: /signin.php');
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
       <form action="/signup.php" method="post">
           <p>РЕГИСТРАЦИЯ</p>
           <input type="text" name="firstname" placeholder="Имя"><br>
           <input type="text" name="lastname" placeholder="Фамилия"><br>
           <input type="email" name="email" placeholder="Email"><br>
           <input type="password" name="pass" placeholder="Пароль"><br>
           <input type="password" name="pass_conf" placeholder="Подтвердите пароль"><br>
           <button type="submit" name="signup">Регистрация</button>
       </form>
       <p><?php if($showError) { echo showError($errors);} ?></p>
</body>
</html>