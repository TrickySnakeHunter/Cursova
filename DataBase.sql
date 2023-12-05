-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Гру 05 2023 р., 17:44
-- Версія сервера: 10.4.27-MariaDB
-- Версія PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `sold`
--

-- --------------------------------------------------------

--
-- Структура таблиці `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `balanse` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `balance`
--

INSERT INTO `balance` (`id`, `idUser`, `balanse`) VALUES
(59842, 152614, 1150),
(208618, 795517, 0),
(304900, 402124, 0);

-- --------------------------------------------------------

--
-- Структура таблиці `buisness`
--

CREATE TABLE `buisness` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `products` text DEFAULT NULL,
  `services` text DEFAULT NULL,
  `licenses` text DEFAULT NULL,
  `certifications` text DEFAULT NULL,
  `capital` double DEFAULT NULL,
  `debts` double DEFAULT NULL,
  `staff` double DEFAULT NULL,
  `assets` double DEFAULT NULL,
  `founded` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `img` varchar(500) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `buisness`
--

INSERT INTO `buisness` (`id`, `name`, `type`, `products`, `services`, `licenses`, `certifications`, `capital`, `debts`, `staff`, `assets`, `founded`, `description`, `img`, `id_user`) VALUES
(251149, '', '', '', 'tffyfy', '', '', 0, 0, 0, 0, '0000-00-00', '', 'https://interactive-examples.mdn.mozilla.net/media/cc0-images/grapefruit-slice-332-332.jpg', 152614);

-- --------------------------------------------------------

--
-- Структура таблиці `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `mark` varchar(200) NOT NULL,
  `material` varchar(400) NOT NULL,
  `type` int(11) NOT NULL,
  `createDay` date NOT NULL,
  `size` double NOT NULL,
  `description` text NOT NULL,
  `color` varchar(20) NOT NULL,
  `img` varchar(500) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `adress` text DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `storeys` int(11) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `built` date DEFAULT NULL,
  `area` double DEFAULT NULL,
  `rooms` int(11) DEFAULT NULL,
  `repair` datetime DEFAULT NULL,
  `communications` varchar(200) DEFAULT NULL,
  `structure` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `img` varchar(500) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `securities`
--

CREATE TABLE `securities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `issue` date NOT NULL,
  `img` varchar(500) NOT NULL,
  `value` double NOT NULL,
  `id_user` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `things`
--

CREATE TABLE `things` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `material` varchar(100) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `img` varchar(500) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `trading`
--

CREATE TABLE `trading` (
  `id` int(11) NOT NULL,
  `id_lot` int(11) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `winner` int(11) DEFAULT NULL,
  `starting_price` double DEFAULT NULL,
  `winn_price` double DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `trading`
--

INSERT INTO `trading` (`id`, `id_lot`, `owner`, `winner`, `starting_price`, `winn_price`, `start_time`, `end_time`, `date`) VALUES
(936293, 251149, 152614, 0, 0, 0, '00:00:00', '00:00:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблиці `transport`
--

CREATE TABLE `transport` (
  `id` int(11) NOT NULL,
  `img` varchar(500) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `weels` int(11) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `year` date DEFAULT NULL,
  `cleared` tinyint(1) DEFAULT NULL,
  `insurance` tinyint(1) DEFAULT NULL,
  `serviceable` tinyint(1) DEFAULT NULL,
  `num_regestration` varchar(20) DEFAULT NULL,
  `gas` varchar(10) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `lastName`, `gmail`, `pswd`, `phone`) VALUES
(0, 'no live', 'no live', 'null@null', 'null', 0),
(152614, 'Олег', 'Швидкий', 'shvydkiy551@gmail.com', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', 508076431),
(402124, 'Олег', 'Швидкий', 'shvydkiy55@gmail.com', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', 508076431),
(795517, 'andrue', 'andrue', 'shvydkiy5@gmail.com', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', 508076431);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_UserBalance` (`idUser`);

--
-- Індекси таблиці `buisness`
--
ALTER TABLE `buisness`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_BuisnesUser` (`id_user`);

--
-- Індекси таблиці `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_EquipmentUser` (`id_user`);

--
-- Індекси таблиці `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `securities`
--
ALTER TABLE `securities`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `things`
--
ALTER TABLE `things`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `trading`
--
ALTER TABLE `trading`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tradingUser` (`owner`),
  ADD KEY `FK_tradingUserW` (`winner`);

--
-- Індекси таблиці `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `balance`
--
ALTER TABLE `balance`
  ADD CONSTRAINT `FK_UserBalance` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `buisness`
--
ALTER TABLE `buisness`
  ADD CONSTRAINT `FK_BuisnesUser` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `FK_EquipmentUser` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `securities`
--
ALTER TABLE `securities`
  ADD CONSTRAINT `securities_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `things`
--
ALTER TABLE `things`
  ADD CONSTRAINT `things_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `trading`
--
ALTER TABLE `trading`
  ADD CONSTRAINT `FK_tradingUser` FOREIGN KEY (`owner`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_tradingUserW` FOREIGN KEY (`winner`) REFERENCES `users` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `transport`
--
ALTER TABLE `transport`
  ADD CONSTRAINT `transport_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
