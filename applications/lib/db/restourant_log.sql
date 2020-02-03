-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 03 2020 г., 10:24
-- Версия сервера: 10.4.6-MariaDB
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `restourant`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `id` varchar(256) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `mass` int(11) DEFAULT NULL,
  `url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`id`, `name`, `cost`, `mass`, `url`) VALUES
('apples', 'Запеченные яблочки', 55, 200, 'images/apples.jpg'),
('banana', 'Банановый чизкейк', 65, 200, 'images/bananas.jpg'),
('cherry', 'Шоколадно-вишневый торт', 65, 200, 'images/chocolade_cake.jpg'),
('cookies', 'Печенье с шоколадом', 30, 150, 'images/cookie.jpg'),
('pancakes', 'Блины', 25, 200, 'images/blinchiki.jpg'),
('souffle', 'Птичье молоко', 60, 150, 'images/ptiche_milk.jpg'),
('waffles', 'Бельгийские вафли', 45, 150, 'images/vaffles.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `drinks`
--

CREATE TABLE `drinks` (
  `id` varchar(256) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `mass` int(11) DEFAULT NULL,
  `url` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `drinks`
--

INSERT INTO `drinks` (`id`, `name`, `cost`, `mass`, `url`) VALUES
('appleJuice', 'Яблочный сок', 30, 300, 'images/jablochnyj-sok.jpg'),
('blackTea', 'Чёрный чай', 10, 300, 'images/blacktea.jpg'),
('coffee', 'Кофе', 25, 300, 'images/coffee.jpg'),
('greenTea', 'Зеленый чай', 10, 300, 'images/greentea.jpg'),
('orangeJuice', 'Апельсиновый сок', 30, 300, 'images/orangejuice.jpg'),
('water', 'Вода', 5, 300, 'images/water.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `jams`
--

CREATE TABLE `jams` (
  `id` varchar(256) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `mass` int(11) DEFAULT NULL,
  `url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `jams`
--

INSERT INTO `jams` (`id`, `name`, `cost`, `mass`, `url`) VALUES
('appleJam', 'Яблочное повидло', 5, 10, 'images/jablochnoe-povidlo.jpg'),
('apricotJam', 'Абрикосовое повидло', 5, 10, 'images/apricote.jpg'),
('cherryJam', 'Вишнёвое повидло', 5, 10, 'images/cherry.jpg'),
('chocolate', 'Шоколад', 10, 10, 'images/shokolad.jpg'),
('honey', 'Мёд', 5, 10, 'images/miod.jpg'),
('plumJam', 'Сливовое повидло', 5, 10, 'images/plum.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `jams`
--
ALTER TABLE `jams`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
