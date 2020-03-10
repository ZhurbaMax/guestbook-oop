-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 10 2020 г., 20:49
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `userlistdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment`, `created_at`, `parent_id`) VALUES
(14, 5, 'rrrrrrrrrrrr', '2020-03-03 12:59:01', NULL),
(15, 5, '333333333', '2020-03-03 13:58:28', NULL),
(17, 1, 'rrrrrrrrrrrr', '2020-03-03 19:32:24', NULL),
(20, 1, 'узнать какой я пользователь', '2020-03-04 10:02:04', NULL),
(21, 1, 'текст какой-то текст какой-то текст какой-то текст какой-то текст какой-то текст какой-то текст какой-то текст какой-то текст какой-то ', '2020-03-04 10:04:08', NULL),
(22, 1, 'проверка ооп', '2020-03-09 14:06:42', NULL),
(23, 5, ' otvet', '2020-03-10 12:15:12', NULL),
(25, 1, ' eeeeeeeeeeeeeeeeeeeee', '2020-03-10 14:10:57', NULL),
(26, 1, ' rrrrrrrrrrr', '2020-03-10 14:24:24', NULL),
(27, 6, ' probniy\r\ntest', '2020-03-10 14:26:10', NULL),
(28, 10, 'erjehgef hgdvjsvhs hgvchc dhgcvdshvcsd ghdvchgsdvc hdvcdsc dchgdsvchgds c sdscvhdsgc hsgdvcs chgsdy', '2020-03-10 14:52:47', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `city`, `country`, `gender`, `created_at`) VALUES
(1, 'Max', 'max@gmail.com', 'd977decdebd78fb421647b843a6bdc01ec9f1b61', 'Maxim', 'Zhurba', 'Львов', 'Украина', 'Мужской', '2020-03-01 23:29:03'),
(3, 'Max', 'max@gmail.com', 'd977decdebd78fb421647b843a6bdc01ec9f1b61', 'Maxim', 'Zhurba', 'Киев', 'Украина', 'Мужской', '2020-03-01 23:30:26'),
(4, 'test1', 'test1@gmail.com', 'cf7c906bfbb48e72288fc016bac0e6ed58b0dc2a', 'test1', 'test1', 'Ливерпуль', 'Англия', 'Мужской', '2020-03-02 20:25:41'),
(5, 'test2', 'test2@gmail.com', 'd977decdebd78fb421647b843a6bdc01ec9f1b61', 'test2', 'test22', 'Манчестер', 'Англия', 'Женский', '2020-03-03 12:40:52'),
(6, 'user', 'user@user.com', 'd977decdebd78fb421647b843a6bdc01ec9f1b61', 'User', 'Userenko', 'Ливерпуль', 'Англия', 'Мужской', '2020-03-10 14:25:35'),
(10, 'User-1', 'us@user.us', 'd977decdebd78fb421647b843a6bdc01ec9f1b61', 'Userko', 'Userenko', 'Ливерпуль', 'Англия', 'Всякое бывает', '2020-03-10 14:51:53');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
