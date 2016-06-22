<?php

function startup() {
	// Настройки подключения к БД.
	$hostname = 'localhost'; 
	$username = 'root'; 
	$password = '';
	$dbName = 'php22';
	
	// Языковая настройка.
	setlocale(LC_ALL, 'ru_RU.UTF-8'); // Устанавливаем нужную локаль (для дат, денег, запятых и пр.)
	mb_internal_encoding('UTF-8'); // Устанавливаем кодировку строк
	
	// Подключение к БД.
	$conn=mysqli_connect($hostname, $username, $password) or die('No connect with data base'); 
                  mysqli_query($conn, 'SET NAMES utf8');
	mysqli_select_db($conn, $dbName) or die('No data base');

	// Открытие сессии.
	session_start();
        
                 
}
