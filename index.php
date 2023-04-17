<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Клиент-серверное приложение</title>
    <script defer src="script.js"></script>
</head>
<body>
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
<?php

require_once("config.php");

//соединение с БД
$connect = new mysqli(HOST, USER, PASSWORD, DB);
if($connect->connect_error){
    exit("Ошибка подключения к БД: ".$connect->connect_error);
}
//установить кодировку
$connect->set_charset("utf8");

//код запроса
$sql = "SELECT * FROM `students`";

//выполнить запрос
$result = $connect->query($sql);

//вести результаты запроса на страницу
while ($row = $result->fetch_assoc()){
    echo "<div>
            $row[lname], $row[fname], $row[gender], $row[age]
        </div>";
}





?>
    
</body>
</html>