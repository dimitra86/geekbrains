-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 23 2016 г., 14:29
-- Версия сервера: 10.1.9-MariaDB
-- Версия PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `photo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `photo1`
--

CREATE TABLE `photo1` (
  `id` int(11) NOT NULL,
  `name_image` varchar(32) NOT NULL,
  `name_small_image` varchar(32) NOT NULL,
  `views` varchar(32) NOT NULL,
  `title` text NOT NULL,
  `alt` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `photo1`
--

INSERT INTO `photo1` (`id`, `name_image`, `name_small_image`, `views`, `title`, `alt`) VALUES
(1, '56c6d8c37b5c1.jpg', '56c6d8c37b5c1.jpg', '17', '2', ''),
(2, '56c719d22225f.jpg', '56c719d22225f.jpg', '1', '', ''),
(3, '56cae2a10cb4c.jpg', '56cae2a10cb4c.jpg', '5', 'hockey\r\n', ''),
(4, '56cae3065086d.jpg', '56cae3065086d.jpg', '3', 'hockey4_update', 'hockey4_update'),
(5, '56cae7327896c.jpg', '56cae7327896c.jpg', '19', '565656', ''),
(6, '56cae857d8ba1.jpg', '56cae857d8ba1.jpg', '27', 'volna', 'Volna');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `photo1`
--
ALTER TABLE `photo1`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
