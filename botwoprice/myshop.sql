-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2024 年 06 月 14 日 18:31
-- 伺服器版本： 8.0.36-0ubuntu0.22.04.1
-- PHP 版本： 8.1.2-1ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `myshop`
--

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `memberName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `transactionTime` datetime NOT NULL,
  `totalAmount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `memberName`, `email`, `phone`, `remarks`, `transactionTime`, `totalAmount`, `created_at`) VALUES
(3, 'peko', 'peko@mail', '030', '好油哦', '2024-06-12 00:25:00', '600.00', '2024-06-11 16:25:36'),
(26, '3', '3@3', '33', '', '2024-06-12 16:35:00', '200.00', '2024-06-12 08:35:02'),
(29, 'peko', '3@3', '33', '', '2024-06-12 17:05:00', '500.00', '2024-06-12 09:05:03'),
(42, 'peko', '3@3', '33', '', '2024-06-12 18:06:00', '100.00', '2024-06-12 10:06:18'),
(44, 'wen ren', 'wenren000@gmail.com', '0912345678', 'drfgyhjk', '2024-06-13 09:11:00', '80.00', '2024-06-13 01:11:05'),
(45, 'wen ren', 'wenren000@gmail.com', '0912345678', 'sdfghjk', '2024-06-13 09:11:00', '1200.00', '2024-06-13 01:11:36'),
(46, 'peko123', 'peko@bhgvbh.com', '0956423384', 'xdfvgbhm', '2024-06-13 09:12:00', '12000.00', '2024-06-13 01:12:20'),
(47, 'peko', 'peko@mail', '030', '', '2024-06-13 09:15:00', '120.00', '2024-06-13 01:15:55'),
(48, '123', '123@gmail.com', '09125478956', 'sfh', '2024-06-14 10:42:00', '100.00', '2024-06-13 02:42:37');

-- --------------------------------------------------------

--
-- 資料表結構 `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `orderId` int NOT NULL,
  `productName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `productPrice` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `order_items`
--

INSERT INTO `order_items` (`id`, `orderId`, `productName`, `productPrice`, `quantity`, `total`) VALUES
(77, 42, ' 觀光客最愛-三色戰神', '100.00', 1, '100.00'),
(80, 44, ' 我是真的不能控制我隻雞', '80.00', 1, '80.00'),
(81, 45, ' 草料(韓國空運)', '120.00', 10, '1200.00'),
(82, 46, ' 月底的我', '600.00', 20, '12000.00'),
(83, 47, ' 草料(韓國空運)', '120.00', 1, '120.00'),
(84, 48, ' 觀光客最愛-三色戰神', '100.00', 1, '100.00');

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `No` int NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` int NOT NULL,
  `number` int NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`No`, `Name`, `price`, `number`, `image`) VALUES
(1, '早餐界不敗神話', 100, 100, 'eat_1.png'),
(2, '觀光客最愛-三色戰神', 100, 100, 'eat_2.png'),
(3, '草料(韓國空運)', 120, 30, 'eat_3.png'),
(4, '卡拉雞腿吃飽堡', 200, 20, 'eat_4.png'),
(5, '喜歡半熟還是全熟?', 100, 1000, 'eat_5.png'),
(6, '我是真的不能控制我隻雞', 80, 10, 'eat_6.png'),
(7, '蛤?', 10, 70, 'eat_7.png'),
(8, '月底的我', 600, 1, 'eat_8.png'),
(9, 'MYSTERY BOX', 666, 1, 'eat_9.png');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`orderId`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`No`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `No` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
