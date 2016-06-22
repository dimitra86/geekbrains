 <?php 
    session_start();
    if (isset($_POST['Exit'])) //нажата кнопка Exit
    {
        unset ($_SESSION['auth']);
        //session_destroy(); 
        echo 'Выход успешен';
        $_SESSION['auth'] = '0';
    }
    if (isset($_POST['Enter']))//Нажата кнопка Enter
    {
        //echo 'Нажата кнопка Enter';
        if (isset($_POST['login']) && isset($_POST['password']) )//передаем значение строк в переменные
        {
            $login=$_POST['login'];
            $password=$_POST['password'];
            if($login==="admin" && $password==="111")//проверка логина и пароля
            {
                $_SESSION['auth'] = '1';
                if (isset($_SESSION['auth'])) //проверка прошла
                {
                    if(($_COOKIE['page'])==='a')
               {
                   header( 'Location: a.php', true, 301);
               }
                else header( 'Location: b.php', true, 301);
                }
            }
            else //проверка не прошла
            {
                $_SESSION['auth'] = '0';
                echo "Имя или пароль введены неверно";
            }
        }
    }
    
    /* else
        {
            //echo "";
            if (($_SESSION['auth'])==='1')   
            {
                $_SESSION['auth'] = '1';
                echo 'Вы авторизованы';
            }
            else 
            {
                $_SESSION['auth'] = '0';
                echo "Имя или пароль введены неверно";
            }
        }*/
    ?>    
<html>
    <head><meta charset="utf-8">
    </head>
    <body>
    <H3>Авторизация</H3>
        <?php if (($_SESSION['auth'])==='1') { ?>
                <form method="post">
                <input type="submit" name="Exit" value="Exit"> 
                </form>
            <?php } else { ?>
                <form method="post">
                <input type="text" name="login" placeholder="Логин admin"> - Login<br>
                <input type="password" name="password" placeholder="Пароль 111"> - Password<br>
                <input type="submit" name="Enter" value="Enter">
                </form>
            <?php } ?>        
            <br>
    <a href="index1.php">Главная</a><br>
    <a href="a.php">Первая страница</a><br>
    <a href="b.php">Вторая страница</a><br>
    <a href="aut.php">Авторизация</a><br>
        <pre><?php var_dump ($GLOBALS); ?></pre>
    </body>
</html>