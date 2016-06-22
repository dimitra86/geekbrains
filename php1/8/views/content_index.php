 <form method="post" action="#" enctype="multipart/form-data"> 
  <input type="file" name="file"> 
  <input type="submit" value="Загрузить файл!" /> 
</form><br>

<?php   
    
    while($row3 = mysql_fetch_assoc($res)) 
    {
        //echo $row1["name_small_image"]."<br>";
        $a1=$row3["name_small_image"];
        //echo $a;
        $id=$row3["id"];
        $views=$row3["views"];
        $alt3=$row3["alt"];
        $title3=$row3["title"];
        echo "<a href=photo.php?id=".$id." target=_blank><img src=small_image/".$a1." height=150 width=200 border=1 hspace=10 alt=".$alt3." title=".$title3."></a>"."$views";
    }
?>
<br/><br/>


<pre><?php var_dump($GLOBALS); ?></pre>