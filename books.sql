-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 09 2023 г., 11:56
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `bid` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET koi8r NOT NULL,
  `authors` varchar(100) CHARACTER SET koi8r NOT NULL,
  `edition` varchar(100) CHARACTER SET koi8r NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`bid`, `name`, `authors`, `edition`) VALUES
(1, 'Python. К вершинам мастерства. Лаконичное и эффективное программирование', 'Рамальо Лусиану', 'ДМК-Пресс, 2022 г'),
(2, 'Чистый код. Создание, анализ и рефакторинг', 'Роберт Мартин', 'Питер, 2018 г.'),
(3, 'Java. Эффективное программирование', 'Джошуа Блох', 'Вильямс, 2019 г.'),
(4, 'Философия Java', 'Брюс Эккель', 'Питер, 2022 г.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
