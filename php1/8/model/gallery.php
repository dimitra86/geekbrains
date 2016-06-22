<?php
//session_start();
//Функция подключает базу данных

$server = 'localhost'; // Адрес сервера, на котором находится база 
$username = 'root';    // Имя пользователя 
$password = '';   // Пароль
$db_name='photo'; //База данных
$connection=mysql_connect($server, $username, $password) or die("MySQL сервер недоступен!".mysql_error());// Коннект с сервером
mysql_select_db ($db_name) or die("Нет соединения с БД".mysql_error()); //Коннект с БД
$res = mysql_query('SELECT * FROM photo1 ORDER by (views+0) DESC'); //считываем таблицу id в БД

if(isset($_GET['id']))
{
    $id_photo=$_GET['id']; //получение id фото при редактировании
}
else '';


// Функция считывает title определенного id.
function read_title($id)
{
	// реализация пропущена
	// тип результата - array
    $sql2 = "SELECT * FROM photo1 Where id=$id";
    $result2 = mysql_query($sql2);
    $row2 = mysql_fetch_assoc($result2);
    $title1 = $row2 ['title'];
    //mysql_query("UPDATE photo1 SET title=$title1 WHERE id=$id");
    return $title1;
}

function write_title($id)
{
	// реализация пропущена
	// тип результата - array
    //$sql2 = "SELECT * FROM photo1 Where id=$id";
    //$result2 = mysql_query($sql2);
    //$row2 = mysql_fetch_assoc($result2);
    //$title2 = $row2 ['title'];
    //$title2=NULL;
    $title2=$_POST['title'];
    //echo $title2;
    mysql_query("UPDATE photo1 SET title='$title2' WHERE id=$id");
    //header('Location: index.php');
}

function write_alt($id)
{
	// реализация пропущена
	// тип результата - array
    //$sql2 = "SELECT * FROM photo1 Where id=$id";
    //$result2 = mysql_query($sql2);
    //$row2 = mysql_fetch_assoc($result2);
    //$title2 = $row2 ['title'];
    //$title2=NULL;
    $alt2=$_POST['alt'];
    //echo $title2;
    mysql_query("UPDATE photo1 SET alt='$alt2' WHERE id=$id");
    header('Location: index.php');
}

// Функция считывает alt определенного id.
function read_alt($id)
{
	// реализация пропущена
	// тип результата - array
    $sql1 = "SELECT * FROM photo1 Where id=$id";
    $result1 = mysql_query($sql1);
    $row1 = mysql_fetch_assoc($result1);
    $alt = $row1 ['alt'];
    return $alt;
}

// Функция возвращает объект фотографии (ассоциативный массив).
function gallery_item($id)
{
	// реализация пропущена
	// тип результата - array
    $sql1 = "SELECT * FROM photo1 Where id=$id";//вывод количества просмотров
    $result1 = mysql_query($sql1);
    $row1 = mysql_fetch_assoc($result1);
    $col_name1 = $row1 ['name_image'];
    return $col_name1;
}

function gallery_views($id)
{
    //количество просмотров картинки
    $sql = "SELECT * FROM photo1 Where id=$id";//вывод количества просмотров
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    $col_name = $row ['views'];
    $col_name++;
    mysql_query("UPDATE photo1 SET views=$col_name WHERE id=$id");
    return $col_name;
}

//Создают миниатюру при загрузке фото
function imageresize($outfile,$infile,$neww,$newh,$quality) 
{
    $im=imagecreatefromjpeg($infile);
    $k1=$neww/imagesx($im);
    $k2=$newh/imagesy($im);
    $k=$k1>$k2?$k2:$k1;

    $w=intval(imagesx($im)*$k);
    $h=intval(imagesy($im)*$k);

    $im1=imagecreatetruecolor($w,$h);
    imagecopyresampled($im1,$im,0,0,0,0,$w,$h,imagesx($im),imagesy($im));

    imagejpeg($im1,$outfile,$quality);
    imagedestroy($im);
    imagedestroy($im1);
}

// Функция добавляет в галерею новую фотографию.
function upload_file($file) 
{   
    if ($file['name'] == '') 
    { 
        
        return (printf ('Файл не выбран')); 
    }
  
    else 
    {
        
    
    $maxsize=3000000;
    if(($file['size'])>$maxsize) //проверка размера файла
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
}
?>
