<?php
require 'db.php';
$user = R::findOne('users', 'id = ?', array($_SESSION['user']->id));
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация и авторизация</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div>
        <?php if($user) : ?>
            <p>Welcome <?php echo $user->firstname;?></p>
            <a href="logout.php">Выход</a>
            <a href="secret.php">Секрет рум</a>
        <?php else :?>
            <a href="signin.php">Авторизация</a>
            <a href="signup.php">Регистрация</a>
            <a href="secret.php">Секрет рум</a>
        <?php endif; ?>
    </div>
</body>
</html>
