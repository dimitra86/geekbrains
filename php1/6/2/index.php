<?php
include 'resize.php';
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
            if(copy($file['tmp_name'], 'image/'.$file['name']))
            {
                echo 'Файл успешно загружен';                 
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
    <?php $papka=scandir('image'); 
    //printf ($papka); 
    foreach ($papka as $name_image)
    {
        if (($name_image==".") or ($name_image==".."))
        {
            echo "";
        }
        else
        {
            imageresize("small_image/$name_image","image/$name_image",200,150,75);
            echo("<a href=image/".$name_image." target=_blank><img src=small_image/".$name_image." height=150 width=200 border=1 hspace=10></a>");
        //echo $name_image;
        }
    } ?>
    <pre><?php var_dump($GLOBALS) ?></pre>
</body> 
</html> 