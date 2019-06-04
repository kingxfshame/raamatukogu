-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 04 2019 г., 13:28
-- Версия сервера: 10.1.16-MariaDB
-- Версия PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `raamatukogu`
--

-- --------------------------------------------------------

--
-- Структура таблицы `autor`
--

CREATE TABLE `autor` (
  `autor_id` int(11) NOT NULL,
  `nimi` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `perekonnanimi` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `autor`
--

INSERT INTO `autor` (`autor_id`, `nimi`, `perekonnanimi`) VALUES
(2, 'Стивен', 'Кинг'),
(3, 'Джейн', 'Остин'),
(5, 'Мартин', 'Джордж');

-- --------------------------------------------------------

--
-- Структура таблицы `raamatud`
--

CREATE TABLE `raamatud` (
  `raamatud_id` int(11) NOT NULL,
  `raamatu_nimi` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pilt` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `autor` int(11) NOT NULL,
  `kirjeldus` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `zanr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `raamatud`
--

INSERT INTO `raamatud` (`raamatud_id`, `raamatu_nimi`, `pilt`, `autor`, `kirjeldus`, `zanr`) VALUES
(4, 'Убийство Командора', 'haruki.jpg', 3, 'С мая того года и до начала следующего я жил в горах…» Живописное, тихое место, идеальное для творчества. Скромное одноэтажное строение в европейском стиле, достаточно просторное для холостяка, принадлежало известному в Японии художнику.', 5),
(5, 'Игра Престолов', '1011688601.jpg', 5, 'Королевская свита отправляется далеко на север, чтобы предложить место погибшего давнему другу короля. А в это время потомки свергнутой династии Таргариенов, скрывающиеся в вольных городах, планируют вернуть Железный Трон и стремятся для этого заручиться поддержкой могущественнейшего кхала великой степи. ', 3),
(6, 'Происхождение', '27624091-den-braun-proishozhdenie-27624091.jpg', 3, '«Происхождение» – пятая книга американского писателя Дэна Брауна о гарвардском профессоре, специалисте по религиозной символике Роберте Лэнгдоне. ', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `zanrid`
--

CREATE TABLE `zanrid` (
  `zanrid_id` int(11) NOT NULL,
  `zanr` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `zanrid`
--

INSERT INTO `zanrid` (`zanrid_id`, `zanr`) VALUES
(1, 'Фэнтези'),
(2, 'Фантастика'),
(3, 'Любовь'),
(4, 'Детские'),
(5, 'Бизнес'),
(6, 'Классика'),
(8, 'Юмор');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`autor_id`);

--
-- Индексы таблицы `raamatud`
--
ALTER TABLE `raamatud`
  ADD PRIMARY KEY (`raamatud_id`);

--
-- Индексы таблицы `zanrid`
--
ALTER TABLE `zanrid`
  ADD PRIMARY KEY (`zanrid_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `autor`
--
ALTER TABLE `autor`
  MODIFY `autor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `raamatud`
--
ALTER TABLE `raamatud`
  MODIFY `raamatud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `zanrid`
--
ALTER TABLE `zanrid`
  MODIFY `zanrid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
