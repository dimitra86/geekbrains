<?php
    session_start(); 
 
    if(isset($_SESSION['auth'])) 
        {
            if (($_SESSION['auth'])==='1')
            {
               if(($_COOKIE['page'])==='a')
               {
                   header( 'Location: a.php', true, 301);
               }
                else header( 'Location: b.php', true, 301);
            }
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
    var_dump ($GLOBALS);
    ?>
    