<?php
session_start();
if (isset ($_POST['style']))
{
   if ($_POST['style']==='style1')
   {
       setcookie("page", "1", time() + 3600 * 24 * 7); 
   }
    elseif ($_POST['style']==='style2')
   {
       setcookie("page", "2", time() + 3600 * 24 * 7); 
   }
    else 
   {
       setcookie("page", "3", time() + 3600 * 24 * 7); 
   }
}
else echo "Ничего не выбрали";
//var_dump ($GLOBALS);
?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Настройка</title>
  <link rel="stylesheet" type="text/css" href="2.css">
  </head>
 <body>
     Выбирите стиль оформления сайта.
     <form method="post">
        <input type="radio" name="style" value="style1"/>Стиль 1<br>
        <input type="radio" name="style" value="style2"/>Стиль 2<br>
        <input type="radio" name="style" value="style3"/>Стиль 3<br>
        <input type="submit" name="button" value="Применить"><br>
     </form>
     <a href="a.php">Страница А</a><br>
    <a href="b.php">Страница B</a><br>
     <pre><?php var_dump ($GLOBALS); ?></pre>
</body>
</html>
