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

// Получаем id статьи
$id = filter_input (INPUT_GET, 'id');

// Вывод статьи по id
$sql = "SELECT * FROM article Where id=$id";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$content = $row ['content'];
$title=$row["title"];
echo "<h1>$title</h1>";
echo  "<a href=index1.php>Назад</a> /";
echo  "<a href=edit.php?id=".$id.">Редактировать </a> /";
echo  "<a href=delete.php?id=".$id.">Удалить</a><br>";
echo " $content";