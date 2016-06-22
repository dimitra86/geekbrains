<?php
//session_start();
include 'resize.php';
$server = 'localhost'; // Адрес сервера, на котором находится база 
$username = 'root';    // Имя пользователя 
$password = '';   // Пароль
$db_name='photo'; //База данных
$connection=mysql_connect($server, $username, $password) or die("MySQL сервер недоступен!".mysql_error());// Коннект с сервером
mysql_select_db ($db_name) or die("Нет соединения с БД".mysql_error()); //Коннект с БД
 
function upload_file($file) 
{   
    if ($file['name'] == '') 
    { 
  echo 'Файл не выбран!'; 
  return; 
    } 
    $maxsize=3000000;
    if(($_FILES['file']['size'])>$maxsize) //проверка размера файла
    {
         echo "Файл не загружен. Размер файла превышает 3 мегабайт.";
    }
    else
    {   
        $type=$_FILES['file']['type'];
        //echo $type;
        if (($type=="image/jpg") or ($type=='image/jpeg') or ($type=="image/gif")) //проверка типа файла
        {
            $name_image1=uniqid().".jpg"; //задается новое уникальное имя файла на сервере
            if(copy($file['tmp_name'], 'image/'.$name_image1))
            {
                $i=0;
                $a=0;
                $result = mysql_query('SELECT * FROM photo1'); //считываем таблицу id в БД
                while($row = mysql_fetch_assoc($result)) 
                {
                //echo $row["id"]."<br>";
                $i++;
                $a=$i;
                //echo $a;
                }
                $a++;
                //echo $a;
                
                //$extension = 'jpg';
                //$name_image1=$_FILES['file']['name'];
                //echo $name_image1;
                mysql_query ("INSERT INTO photo1 (id, name_image, name_small_image, views) VALUES ('".$a."', '".$name_image1."', '".$name_image1."', '0')");
                $a2=0;
                $result2 = mysql_query('SELECT * FROM photo1'); //считываем таблицу id в БД
                while($row2 = mysql_fetch_assoc($result2)) 
                {
                //echo $row1["name_small_image"]."<br>";
                $a2=$row2["name_small_image"];
                //echo $a;
                                               
                }
                imageresize("small_image/$a2","image/$a2",200,150,75);
                header ('Location:index.php#');
                echo 'Файл успешно загружен'."<br>";
               
            }
            
            else 
            echo 'Ошибка загрузки файла'; 
            
        }
        else 
        {
            //echo getimagesize ('file');            
           echo ("Некорректный тип файла");
        }
    }
} 
?> 
 
<!DOCTYPE html>  
<html>  
<head>  
    <meta charset="cp1251"/>  
    <title>Загрузка изображения на сервер</title>  
</head> 
<body>  
    <h1>Загрузка файлов (jpg, jpeg, gif) изображения на сервер</h1> 
    <?php 
  if (isset($_FILES['file'])) 
  { 
      upload_file($_FILES['file']); 
  } 
    ?>   
   
    <form method="post" action="#" enctype="multipart/form-data"> 
  <input type="file" name="file"> 
  <input type="submit" value="Загрузить файл!" />   
    </form><br>
    <?php 
    
    
                $res = mysql_query('SELECT * FROM photo1 ORDER by (views+0) DESC'); //считываем таблицу id в БД
                while($row3 = mysql_fetch_assoc($res)) 
                {
                //echo $row1["name_small_image"]."<br>";
                $a1=$row3["name_small_image"];
                //echo $a;
                $id=$row3["id"];
                $views=$row3["views"];
                echo "<a href=photo.php?id=".$id." target=_blank><img src=small_image/".$a1." height=150 width=200 border=1 hspace=10></a>"."$views<br>";
                
                }
               ?>
    
    <pre><?php var_dump($GLOBALS); ?></pre>
</body> 
</html> 