<html> 
    <head> 
        <title>Калькулятор</title> 
    </head> 
    <body> 
        <?php 
        if(isset($_POST['a']) && isset($_POST['b']))
        {
            $a1=$_POST['a'];
            $b1=$_POST['b'];
        }
        else 
        {
            $a1="";
            $b1="";
        }
        ?>
        <form method="post"> 
        <input type="text" name="a" value= "<?=$a1 ?>"/>
        <?php
        if(isset($_POST['button']))
           {
            $c=$_POST['button'];
           }
           else $c="";
        echo "$c"; 
        //var_dump ("$c"); ?>
        <input type="text" name="b" value= "<?=$b1 ?>"/>
          =
            <?php  
             if(isset($_POST['a']) && isset($_POST['b'])) 
             {
                 if($c=="+")
                 { 
                     $result = $_POST['a'] + $_POST['b'];
                     echo $result;
                     
                 }
                elseif($c=="-")
                { 
                    $result = $_POST['a'] - $_POST['b'];
                    echo $result;
                   
                }
                elseif($c=="/")
                { 
                    if($_POST['b']=="0")
                    { 
                        echo "Делить на ноль нельзя";
                       
                    }
                    else  
                    {
                        $result = $_POST['a'] / $_POST['b'];
                        echo $result;
                        
                    }
                }
                else 
                {
                    $result = $_POST['a'] * $_POST['b'];
                    echo $result;
                    
                }
             }
        
         else 
         {
             $result = "";
             echo $result;
         }
            
         //     var_dump ("$c"); ?><br>
        <input type="submit" value="+" name="button" />
        <input type="submit" value="-" name="button"/>
        <input type="submit" value="*" name="button"/>
        <input type="submit" value="/" name="button"/>        
    </form> 
    </body> 
</html> 