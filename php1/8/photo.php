<?php
// Подключение библиотек.
require_once('model/gallery.php');

// Подготовка данных.
$photo = gallery_item($_GET['id']);
$views = gallery_views($_GET['id']);
$alt = read_alt($_GET['id']);
$title1 = read_title($_GET['id']);

// Заголовок страницы.
$title = 'Просмотр фотографии';

// Выбор шаблона содержимого.
$content = 'views/content_photo.php';

// Вывод HTML.
include 'views/main.php';
?>
