-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 22 2025 г., 14:23
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `travel_agency`
--

-- --------------------------------------------------------

--
-- Структура таблицы `booking`
--

CREATE TABLE `booking` (
  `TripID` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `BookingID` int(11) NOT NULL,
  `BookingDate` date DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `CancelInsuranceAmount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `booking`
--

INSERT INTO `booking` (`TripID`, `ClientID`, `BookingID`, `BookingDate`, `Status`, `CancelInsuranceAmount`) VALUES
(1, 1, 1, '2025-05-01', 'Активно', 0),
(3, 2, 2, '2025-05-10', 'Активно', 0),
(2, 3, 3, '2025-05-15', 'Завершено', 0),
(4, 4, 4, '2025-05-20', 'Отменено', 9000),
(5, 5, 5, '2025-05-25', 'Активно', 0),
(6, 1, 6, '2025-06-01', 'Активно', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `ClientID` int(11) NOT NULL,
  `FullName` varchar(140) DEFAULT NULL,
  `DomesticPassport` varchar(200) DEFAULT NULL,
  `InternationalPassport` varchar(200) DEFAULT NULL,
  `VisaInfo` varchar(200) DEFAULT NULL,
  `IsLoyal` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`ClientID`, `FullName`, `DomesticPassport`, `InternationalPassport`, `VisaInfo`, `IsLoyal`) VALUES
(1, 'Иванов Иван Иванович', '1234 567890', 'AB123456', '1Шенген, действует до 2026-01-01', 1),
(2, 'Петрова Анна Сергеевна', '0987 654321', 'CD789012', 'Шенген, действует до 2025-12-31', 0),
(3, 'Сидоров Олег Викторович', '5678 901234', 'EF345678', 'Открыта виза в Турцию', 1),
(4, 'Кузнецова Елена Дмитриевна', '3456 789012', 'GH567890', 'Нет визы', 0),
(5, 'Николаев Денис Петрович', '9012 345678', 'IJ678901', 'Виза в Египет оформлена', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE `payment` (
  `BookingID` int(11) NOT NULL,
  `PaymentID` int(11) NOT NULL,
  `Amount` int(11) DEFAULT NULL,
  `DiscountType` varchar(40) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL,
  `ReceiptDetails` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `payment`
--

INSERT INTO `payment` (`BookingID`, `PaymentID`, `Amount`, `DiscountType`, `PaymentDate`, `ReceiptDetails`) VALUES
(1, 1, 45000, 'Горящая путевка', '2025-05-02', 'Чек №123'),
(2, 2, 70000, 'Постоянный клиент', '2025-05-11', 'Чек №124'),
(3, 3, 50000, 'Комбинированная', '2025-05-16', 'Чек №125'),
(5, 4, 49500, 'Постоянный клиент', '2025-05-26', 'Чек №126'),
(6, 5, 55000, NULL, '2025-06-02', 'Чек №127');

-- --------------------------------------------------------

--
-- Структура таблицы `tour`
--

CREATE TABLE `tour` (
  `TourID` int(11) NOT NULL,
  `Countries` varchar(200) DEFAULT NULL,
  `Cities` varchar(200) DEFAULT NULL,
  `Purpose` varchar(200) DEFAULT NULL,
  `HotelCategory` varchar(50) DEFAULT NULL,
  `MealPlan` varchar(100) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Transport` varchar(100) DEFAULT NULL,
  `BaseCost` decimal(19,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `tour`
--

INSERT INTO `tour` (`TourID`, `Countries`, `Cities`, `Purpose`, `HotelCategory`, `MealPlan`, `StartDate`, `EndDate`, `Transport`, `BaseCost`) VALUES
(1, 'Италия', 'Рим', 'Экскурсионный', '4 звезды', 'Завтрак', '2025-07-01', '2025-07-08', 'Самолет', 50000.0000),
(2, 'Греция', 'Афины', 'Пляжный', '5 звезд', 'Все включено', '2025-08-15', '2025-08-22', 'Самолет', 75000.0000),
(3, 'Турция', 'Анталия', 'Отдых', '5 звезд', 'Все включено', '2025-06-20', '2025-06-27', 'Самолет', 45000.0000),
(4, 'Франция', 'Париж', 'Экскурсионный', '4 звезды', 'Полупансион', '2025-09-10', '2025-09-17', 'Поезд', 65000.0000),
(5, 'Египет', 'Хургада', 'Пляжный', '5 звезд', 'Все включено', '2025-10-05', '2025-10-12', 'Самолет', 55000.0000);

-- --------------------------------------------------------

--
-- Структура таблицы `trip`
--

CREATE TABLE `trip` (
  `TourID` int(11) NOT NULL,
  `TripID` int(11) NOT NULL,
  `DepartureDate` date DEFAULT NULL,
  `FlightNumber` int(11) DEFAULT NULL,
  `IsHot` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `trip`
--

INSERT INTO `trip` (`TourID`, `TripID`, `DepartureDate`, `FlightNumber`, `IsHot`) VALUES
(1, 1, '2025-07-01', 1234, NULL),
(1, 2, '2025-07-15', 5678, NULL),
(2, 3, '2025-08-15', 9012, NULL),
(3, 4, '2025-06-20', 3456, NULL),
(4, 5, '2025-09-10', 7890, NULL),
(5, 6, '2025-10-05', 2468, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `R_4` (`TripID`),
  ADD KEY `R_3` (`ClientID`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientID`);

--
-- Индексы таблицы `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `R_5` (`BookingID`);

--
-- Индексы таблицы `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`TourID`);

--
-- Индексы таблицы `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`TripID`),
  ADD KEY `R_1` (`TourID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tour`
--
ALTER TABLE `tour`
  MODIFY `TourID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `trip`
--
ALTER TABLE `trip`
  MODIFY `TripID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `R_3` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`),
  ADD CONSTRAINT `R_4` FOREIGN KEY (`TripID`) REFERENCES `trip` (`TripID`);

--
-- Ограничения внешнего ключа таблицы `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `R_5` FOREIGN KEY (`BookingID`) REFERENCES `booking` (`BookingID`);

--
-- Ограничения внешнего ключа таблицы `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `R_1` FOREIGN KEY (`TourID`) REFERENCES `tour` (`TourID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
