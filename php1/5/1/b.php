<?php
session_start();
if(isset($_SESSION['auth']))
{
 if (($_SESSION['auth'])==='1') 
 {
setcookie("page", "b", time() + 3600 * 24 * 7); 
?>
<html>
   <body bgcolor="#00ffff">
        <a href="index1.php">Главная</a><br>
        <a href="a.php">Первая страница</a><br>
        <a href="b.php">Вторая страница</a><br>
        <a href="aut.php">Авторизация</a><br>
        <pre><?php var_dump ($GLOBALS); ?></pre>
    </body>
</html>
<?php }
    else 
{
    header( 'Location: aut.php', true, 301);
    $_SESSION['auth']='0';
}
}
else 
{
    header( 'Location: aut.php', true, 301);
    $_SESSION['auth']='0';
}
?>