-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Час створення: Квт 19 2017 р., 13:13
-- Версія сервера: 10.1.19-MariaDB
-- Версія PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `comment`
--

-- --------------------------------------------------------

--
-- Структура таблиці `comments`
--

CREATE TABLE `comments` (
  `id` int(6) NOT NULL,
  `comment_text` text CHARACTER SET utf8 NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `reply_to_comment` int(6) NOT NULL,
  `reply_to_user` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `comments`
--

INSERT INTO `comments` (`id`, `comment_text`, `comment_date`, `user_id`, `product_id`, `reply_to_comment`, `reply_to_user`) VALUES
(1, 'In in culpa nulla elit esse. Ex cillum enim aliquip sit sit ullamco ex eiusmod fugiat. Cupidatat ad minim officia mollit laborum magna dolor tempor cupidatat mollit. Est velit sit ad aliqua ullamco laborum excepteur dolore proident incididunt in labore elit.', '2017-04-13 15:45:28', 7, 2, 0, 1),
(3, 'Est velit sit ad aliqua ullamco laborum excepteur dolore proident incididunt in labore elit.', '2017-04-13 18:18:46', 6, 2, 0, 1),
(4, 'Fusce eu tempor erat. Praesent pharetra accumsan consectetur.', '2017-04-13 18:22:24', 6, 2, 0, 1),
(6, 'Sed vel orci ipsum. Integer at aliquam erat. Mauris at enim venenatis, tincidunt lorem eu, ornare metus.', '2017-04-13 18:28:25', 6, 1, 0, 1),
(15, 'Reply on fusce.', '2017-04-14 07:24:02', 6, 2, 4, 6),
(17, 'Reply on est velit sit ad aliqua.', '2017-04-14 07:45:45', 6, 2, 3, 6),
(19, 'Answer to In in culpa nulla elit esse.', '2017-04-14 10:01:23', 7, 2, 1, 7),
(20, 'Second reply on fusce.', '2017-04-14 12:25:49', 7, 2, 4, 0),
(21, 'Second reply on fusce.', '2017-04-14 12:29:45', 7, 2, 4, 0),
(22, 'Second reply on fusce.', '2017-04-14 12:34:50', 7, 2, 4, 0),
(23, 'Second reply on fusce.', '2017-04-14 12:37:13', 7, 2, 4, 0),
(24, 'Second reply on fusce.', '2017-04-14 12:38:52', 7, 2, 4, 0),
(25, 'qwertyuiop[qwertyuiop[qwertyuiop[qwertyuiop[', '2017-04-14 12:39:03', 7, 2, 0, 1),
(26, 'zdfvbxdbxzdfvbxdbxzdfvbxdbx', '2017-04-14 12:39:29', 7, 2, 25, 7),
(27, 'Praesent pharetra accumsan consectetur.', '2017-04-14 12:41:24', 7, 2, 4, 6),
(28, 'Mauris ne Mauris', '2017-04-14 12:51:30', 8, 1, 6, 6),
(30, 'comment test', '2017-04-18 15:17:23', 9, 1, 0, 1),
(31, 'comment test', '2017-04-18 15:25:59', 9, 1, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `images`
--

CREATE TABLE `images` (
  `id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `images`
--

INSERT INTO `images` (`id`, `product_id`, `image`) VALUES
(1, 1, 'images/php2/01.jpg'),
(2, 1, 'images/php2/02.jpg'),
(8, 2, 'images/php1/01.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `products`
--

CREATE TABLE `products` (
  `id` int(6) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `duration` decimal(10,0) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `products`
--

INSERT INTO `products` (`id`, `name`, `duration`, `description`, `image`) VALUES
(1, 'PHP lesson 2', '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'images/php2/01.jpg'),
(2, 'PHP lesson 1', '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'images/php1/01.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, '', '', '', ''),
(6, 'admin', 'admin@mail.com', '111111', ''),
(7, ' Sergey', 'sergey@mail.com', '222222', ''),
(8, 'Dima', 'dima@mail.com', '333333', ''),
(9, 'GeTini', 'radican6@gmail.com', 'qwe130913', '');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT для таблиці `images`
--
ALTER TABLE `images`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблиці `products`
--
ALTER TABLE `products`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
