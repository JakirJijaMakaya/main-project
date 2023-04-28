<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Клиент-серверное приложение</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
    <script defer src="fetch.js"></script>
</head>
<body>
    <header>
        <p class="profile">
            <a href="#form-auth">Авторизоваться</a>
        </p>
    </header>
<form id="form-insert-student">
    <input type="text" name="fname" id="fname" placeholder="введите имя" require><br>
    <input type="text" name="lname" id="lname" placeholder="введите фамилию" require><br>
    <input type="number" name="age" id="age" placeholder="введите имя" require><br>
    <input type="radio" name="gender" id="m" value="m" checked>
    <label for="m">мужской</label>
    <input type="radio" name="gender" id="f" value="f">
    <label for="m">женский</label>
    <input type="submit" value="добавить">
</form>
<div class="content">


<?php

require_once("api/config.php");

//соединение с БД
$connect = new mysqli(HOST, USER, PASSWORD, DB);
if($connect->connect_error){
    exit("Ошибка подключения к БД: ".$connect->connect_error);
}
//установить кодировку
$connect->set_charset("utf8");

//код запроса
$sql = "SELECT * FROM `students`";
$sqlg = "SELECT * FROM `groups`";
//выполнить запрос
$result = $connect->query($sql);
$resultg = $connect->query($sqlg);

//вести результаты запроса на страницу
while ($row = $result->fetch_assoc()){
    echo "<div class='student' data-id='$row[student_id]'>
            $row[lname], $row[fname], $row[gender], $row[age]
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-twitter like' viewBox='0 0 16 16'>
  <path d='M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z'/>
</svg>
<span class='num-like'>$row[num_like]</span>
        </div>";
}
while ($row = $resultg->fetch_assoc()){
    echo "<div>$row[title]</div>";
}





?>
</div>
 <div class="block"></div>   

 <div class="message">
    scas
 </div>

 <form id="form-auth" method="POST" action="api/auth.php">
    <input type="text" name="login" id="login" placeholder="Введите логин" require><br>
    <input type="password" name="password" id="password" placeholder="Введите пароль" require><br>
    <input type="submit" value="войти">

 </form>
</body>
</html>