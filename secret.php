<?php
require 'db.php';
$user = R::findOne('users', 'id = ?', array($_SESSION['user']->id));
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Приватный контент</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form >
        <?php if($user) : ?>
            <p>Welcome <?php echo $user->firstname;?></p>
            <p>Cюда могут войти только авторизованные пользователи</p>
            <a href="logout.php">Выход</a>
        <?php else :?>
            <?php header('Location: /signup.php'); ?>
        <?php endif; ?>
    </form>
</body>
</html>
