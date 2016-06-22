<?php

// Настройки подключения к БД.
$hostname = 'localhost';	
$username = 'root'; 
$password = '';
$dbName   = 'php21';

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

// Добавление статьи
if (isset($_POST['add']))
      //  (isset(filter_input (INPUT_POST, 'update')))
{
    //$new_title = $_POST['title'];
    $new_title =filter_input (INPUT_POST, 'title');
    //$new_content = $_POST['content'];
    $new_content =filter_input (INPUT_POST, 'content');
    mysqli_query($connection, "INSERT INTO article (title, content) VALUES ('$new_title', '$new_content')");
    echo "Статья успешна добавлена и через 5 секунд вы будете перенаправлены на главную страницу<br>";
    header('Refresh: 5; URL=index1.php');
}
else
{
    // Вывод формы для добавления статьи
echo "<h1>Добавить статью</h1>";
echo  "<a href=index1.php>Назад</a> /";
echo "<form method='post' action='#'>"; 
echo "<input type='text' size='66' name='title'><br><br>";
echo "<textarea rows='30' cols='50' name='content'></textarea><br>";
echo "<input type='submit' value='Добавить' name='add' />"; 
}
//echo "$content, $title";