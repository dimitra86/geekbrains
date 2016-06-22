<html>
    <head>
        <title>ДЗ-2</title>
    </head>
    <body>
<hr>1.<?php
$a=-1;
$b=-3;
if ($a>0 and $b>0)
{
    
    echo ($a-$b);    
}
elseif ($a<0 and $b<0)
{
    echo ($a*$b);
}
elseif ($a>0 and $b<0)
{
    echo ($a+$b);
}
elseif ($a<0 and $b>0)
{
    echo ($a+$b);
}
else
{
    echo "Другое";
}
?><br><hr>
        
2.<br><?php

        $count=9;
        switch ($count)
        {
        case '0';
        echo "0" . '<br>';
        case '1';
        echo "1" . '<br>';
        case '2';
        echo "2" . '<br>';
        case '3';
        echo "3" . '<br>';
        case '4';
        echo "4" . '<br>';
        case '5';
        echo "5" . '<br>';
        case '6';
        echo "6" . '<br>';
        case '7';
        echo "7" . '<br>'; 
        case '8';
        echo "8" . '<br>';
        case '9';
        echo "9" . '<br>';
        case '10';
        echo "10" . '<br>';
        case '11';
        echo "11" . '<br>';
        case '12';
        echo "12" . '<br>';
        case '13';
        echo "13" . '<br>';
        case '14';
        echo "14" . '<br>';
        case '15';
        echo "15" . '<br>';        
        break;
        }
?><br><hr>
        
3.<br><?php
        function sum ($x,$y)
        {
            return ($x+$y) ;
        }
        $sum=sum(1,2);
        echo "$sum" . "<br>";
        
        function roz ($x,$y)
        {
            return ($x-$y) ;
        }
        $roz=roz(1,2);
        echo "$roz" . "<br>";
        
        function umn ($x,$y)
        {
            return ($x*$y) ;
        }
        $umn=umn(1,2);
        echo "$umn" . "<br>";
        
        function del ($x,$y)
        {
            return ($x/$y) ;
        }
        $del=del(1,2);
        echo "$del" . "<br>";
        ?><br><hr>
4.<br><?php
        function mathOperation($arg1, $arg2, $operation)
        
        
        
        ?><br><hr>
    </body>
</html>