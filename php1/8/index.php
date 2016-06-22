<?php
// Подключение библиотек.
include_once('model/gallery.php');


// Загружаем фотографию, если пользователь отправил файл.
if (isset($_FILES['file']))
{
	upload_file($_FILES['file']);
	//header('Location: index.php');
	//exit();
}

// Подготовка данных.
//list  ($a5, $id5, $views5) = list_image();
//$alt = read_alt($_GET['id']);
//$title1 = read_title($_GET['id']);


// Заголовок страницы.
$title = 'Галерея фотографий';

// Выбор шаблона содержимого.
$content = 'views/content_index.php';

// Вывод HTML.
include 'views/main.php';

?>
