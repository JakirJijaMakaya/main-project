<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Клиент-верверное приложение</title>
</head>
<body>
    <h1> профиль пользователя </h1>
    <?php
            if(isset($_GET["exit"])){
                unset($_SESSION["user-name"]);
                header("Location:./");
            }
            if(isset($_SESSION["user-name"])){
                echo $_SESSION["user-name"];
            }
        ?>
        <a href="?exit=true">Выйти</a>
</body>
</html>