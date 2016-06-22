<?php
session_name('CUSTOM_SESSION_ID');
session_set_cookie_params (0);
session_start();
//Пытаемся понять, как был вызван этот сценарий?
//1) Был выполнен выход?
if(isset($_POST['logout'])){ //если была нажата кнопка Exit
	session_destroy(); // забыть всё содержимое $_SESSION
	header( 'Location: #', true, 301); //выполнить редирект
	exit();
}
//2) Был выполнен вход?
if(isset($_POST['name']) and isset($_POST['pwd'])){ //если были переданы имя и пароль
	$_SESSION['name'] = $_POST['name']; //запомнить, как зовут
	if ($_POST['name'] === 'Admin' and  $_POST['pwd'] === '123'){
		//пароль правильный
		$_SESSION['authorized'] = 1;
	}else{
		$_SESSION['authorized'] = 0;
		
	}
	header( 'Location: #', true, 301); //выполнить редирект
	exit();
}
//или это был обычный GET? 
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<!-- Если сессия авторизована, вставляем одну форму -->
		<?php if (@$_SESSION['authorized'] === 1) { ?>
			<form action="#" method="post">
				<input type="submit" value="exit" name="logout">
			</form>
		<!-- Если сессия не авторизована, вставляем другую форму -->
		<?php } else { ?>
			<form action="#" method="post">
				<!-- Если сессия от прошлой попытки входа кое-что осталось, то значит была ошибка -->
				<?php if(@$_SESSION['authorized'] === 0) { ?>
					<p style="color:red;">Имя или пароль введены неверно</p>
				<?php } ?>
				<input type="text" name="name" placeholder="Имя пользователя (правильное Admin)" <?php echo 'value="',@$_SESSION['name'],'"';?>><br>
				<input type="password" name="pwd" placeholder="Пароль (правильный 123)"><br>
				<input type="submit" value="login">
			</form>
		<?php } ?>
		<pre><?php var_dump($GLOBALS); ?></pre>
	</body>
</html>
