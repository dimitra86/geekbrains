
<a href="index.php">Назад</a> | 
<?php   
    echo " <a href=edit.php?id=".$id_photo.">Редактировать Title и Alt</a>";    
?>
<br/><br/>

<img src=image/<?php echo $photo; ?> border=1 hspace=10 alt=<?php echo $alt; ?> title=<?php echo $title1; ?>><br>
Количество просмотров - <?php echo $views; ?>
<?php //echo $photo; ?>
<pre><?php //var_dump($GLOBALS); ?></pre>
