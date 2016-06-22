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

// Удаление статьи по id и авторедирект на главную страницу
mysqli_query($connection, "DELETE FROM article  WHERE id = '$id' ");
echo "Статья успешна удалена и через 5 секунд вы будете перенаправлены на главную страницу<br>";
header('Refresh: 5; URL=index1.php');