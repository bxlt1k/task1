<?php
require "libs/rb.php";

R::setup( 'mysql:host=localhost;dbname=task1','root','' );

session_start();

function showError($errors) {
    return array_shift($errors);
}


/*
Вопросы
Настройка OpenServer и PHPStorm
Проблемы с mysqli, а именно с работой с БД

*/

?>
