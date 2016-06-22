<?php
// Подключение библиотек.
require_once('model/gallery.php');

// Подготовка данных.
if (isset($_POST['update']))
{
    write_title ($_GET['id']);
    write_alt ($_GET['id']);
}
     else '';
if (isset($_GET['id']))
{
    $title1 = read_title($_GET['id']);
    $alt = read_alt($_GET['id']);
}
   else '';
//write_title ($_GET['id']);

// Заголовок страницы.
$title = 'Редактировать Title и Alt';

// Выбор шаблона содержимого.
$content = 'views/content_edit.php';

// Вывод HTML.
include 'views/main.php';
?>
