<?php
//session_start();
$server = 'localhost'; // Адрес сервера, на котором находится база 
$username = 'root';    // Имя пользователя 
$password = '';   // Пароль
$db_name='photo'; //База данных
$connection=mysql_connect($server, $username, $password) or die("MySQL сервер недоступен!".mysql_error());// Коннект с сервером
mysql_select_db ($db_name) or die("Нет соединения с БД".mysql_error()); //Коннект с БД

$id = $_GET['id']; // Считываем передаваемый параметр

$sql1 = "SELECT * FROM photo1 Where id=$id";//вывод количества просмотров
            $result1 = mysql_query($sql1);
            $row1 = mysql_fetch_assoc($result1);
            $col_name1 = $row1 ['name_image'];

echo "<img src=image/". "$col_name1" ." border=1 hspace=10></a><br>";//вывод изображения

//вывод количества просмотров
//$id=3;



    
?> 
<html> 
    <head> 
        <title>Просмотр картинки № <?php echo $id;?></title> 
    </head> 
    <body> 
       
        <h2><?php $sql = "SELECT * FROM photo1 Where id=$id";//вывод количества просмотров
            $result = mysql_query($sql);
            $row = mysql_fetch_assoc($result);
            $col_name = $row ['views'];
            $col_name++;
            mysql_query("UPDATE photo1 SET views=$col_name WHERE id=$id"); // обновление количества просмотров
            echo "Изображение просмотренно - ". "$col_name" ." раз";?></h2>
        <?php
        
          
         //echo "$col_name"."<br>";
       // echo "$id"."<br>";
        
    ?>
    <pre><?php var_dump($GLOBALS); 
   // echo $_POST['id1']; ?></pre>
        </body> 
</html>