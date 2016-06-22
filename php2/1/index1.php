<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>	
	
</head>
<body>
<?php

// Настройки подключения к БД.
$hostname = 'localhost';	
$username = 'root'; 
$password = '';
$dbName   = 'php21';

// Настройка дат
date_default_timezone_set('Europe/Moscow');

// Языковая настройка.
setlocale(LC_ALL, 'ru_RU.UTF-8'); // Устанавливаем нужную локаль (для дат, денег, запятых и пр.)
mb_internal_encoding('UTF-8'); // Устанавливаем кодировку строк

// Подключение к БД.
$connection=mysqli_connect($hostname, $username, $password) or die('No connect with data base'); 
mysqli_query($connection, 'SET NAMES utf8'); // Устанавливаем нужную кодировку для БД
mysqli_select_db($connection, $dbName) or die('No DB');

  echo "<a href=add.php>Добавить статью</a><br>";

// Вывод всех статей
$result = mysqli_query($connection, 'SELECT * FROM article');
 while($row = mysqli_fetch_assoc($result)) 
    {
        //echo $row["name_small_image"]."<br>";
        $content=$row["content"];
        //echo $a;
        $id=$row["id"];
        $title=$row["title"];
       echo "<a href=article.php?id=".$id."><h1>$title</h1></a>$content<br>";
    }
    ?>
    </body>
</html>