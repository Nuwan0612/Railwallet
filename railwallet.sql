-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 02:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railwallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `avlbleseats`
--

CREATE TABLE `avlbleseats` (
  `id` int(11) NOT NULL,
  `trainID` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `way` int(11) NOT NULL,
  `firstClassBooked` int(11) NOT NULL,
  `secondClassBooked` int(11) NOT NULL,
  `thirdClassBooked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `passenger_id` int(11) DEFAULT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `balance` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `passenger_id`, `transaction_id`, `date`, `balance`) VALUES
(20, 12, 26, '2024-04-28 15:09:25', 1000),
(21, 12, 27, '2024-04-28 15:15:11', 980),
(22, 12, 28, '2024-04-28 15:25:30', 480);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingId` int(11) NOT NULL,
  `bookingTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sheduleId` varchar(255) NOT NULL,
  `ticketPriceID` varchar(20) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `paymentId` varchar(255) NOT NULL,
  `qrId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `Q_ID` int(11) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`Q_ID`, `Question`, `Answer`) VALUES
(1, '\r\nHow do I create an account on RailWallet?', 'Creating an account on RailWallet is simple! Just click on the \"Sign Up\" button and follow the instructions to set up your account with your email address and password.'),
(2, '\r\nCan I top up my RailWallet using cash?', 'Currently, RailWallet supports online top-ups through various payment methods. We do not support cash top-ups at this time for security reasons.'),
(3, '\r\nHow do I reserve a seat using RailWallet?', 'Once you\'ve logged into your RailWallet account, navigate to the \"Seat Reservation\" section, select your desired train and seat, and follow the prompts to complete your reservation.'),
(4, 'How do I contact RailWallet support for assistance?', 'Just click \"Contact Us\" on our homepage. You can reach us via email or phone, and chat live by clicking the live chat button. We\'re here to help with any questions or concerns you may have!');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedbackID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedbackID`, `userID`, `feedback`, `rating`, `date_time`) VALUES
(6, 12, 'This is a great app', 3, '2024-04-28 15:02:34'),
(7, 12, 'I love a lot this app', 5, '2024-04-28 15:03:13'),
(8, 12, 'Great app! The user interface is intuitive and easy to navigate, making it a pleasure to use.', 5, '2024-04-28 15:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `fine_id` int(11) NOT NULL,
  `passenger_id` int(11) DEFAULT NULL,
  `checker_id` int(11) DEFAULT NULL,
  `journey_id` int(11) DEFAULT NULL,
  `tr_id` int(11) DEFAULT NULL,
  `fine_amount` decimal(10,2) DEFAULT NULL,
  `fine_reason` varchar(255) DEFAULT NULL,
  `fine_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_status` int(11) DEFAULT 0,
  `payment_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fines`
--

INSERT INTO `fines` (`fine_id`, `passenger_id`, `checker_id`, `journey_id`, `tr_id`, `fine_amount`, `fine_reason`, `fine_date`, `payment_status`, `payment_date`) VALUES
(46, 12, 10, 30, 28, 500.00, 'Wrang Class', '2024-04-29 13:39:21', 1, '2024-04-29 13:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `journey`
--

CREATE TABLE `journey` (
  `id` int(11) NOT NULL,
  `passenger_id` int(11) DEFAULT NULL,
  `ticket_id` varchar(11) DEFAULT NULL,
  `tr_id` int(11) DEFAULT NULL,
  `depStation` int(11) NOT NULL,
  `arrStation` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_time` timestamp NULL DEFAULT current_timestamp(),
  `qr_code` varchar(255) DEFAULT NULL,
  `completed` int(11) DEFAULT 0,
  `canceled` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journey`
--

INSERT INTO `journey` (`id`, `passenger_id`, `ticket_id`, `tr_id`, `depStation`, `arrStation`, `start_time`, `end_time`, `qr_code`, `completed`, `canceled`) VALUES
(30, 12, 'T001', 27, 1, 2, '2024-04-28 15:15:11', NULL, '662e68009c118.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `seen` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `message`, `seen`) VALUES
(7, 12, 'Wallet successfully topped up by Rs. 1000 on 2024-04-28 at 17:09:25', 1),
(8, 12, 'Thank you for purchasing a train ticket with us! The journey is from Negombo to Kurana, with a ticket price of 20.00 rupees. Travel date is 2024-04-28 at 17:15:12.', 1),
(9, 12, 'You do not have enough balance to pay the fine.', 1),
(10, 12, 'Your fine has been settled. Thank you. on 2024-04-29 at 12:15:25', 1),
(11, 12, 'Your fine has been settled. Thank you. on 2024-04-29 at 12:18:55', 1),
(12, 12, 'Your fine has been settled. Thank you. on 2024-04-29 at 15:37:05', 1),
(13, 12, 'Your fine has been settled. Thank you. on 2024-04-29 at 15:39:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questionregardingproblems`
--

CREATE TABLE `questionregardingproblems` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shedules`
--

CREATE TABLE `shedules` (
  `sheduleID` varchar(255) NOT NULL,
  `trainID` varchar(255) DEFAULT NULL,
  `departureStationID` varchar(255) DEFAULT NULL,
  `departureDate` date DEFAULT NULL,
  `departureTime` time DEFAULT NULL,
  `arrivalStationID` varchar(255) DEFAULT NULL,
  `arrivalDate` date DEFAULT NULL,
  `arrivalTime` time DEFAULT NULL,
  `sheduleValidity` int(11) NOT NULL DEFAULT 1,
  `way` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shedules`
--

INSERT INTO `shedules` (`sheduleID`, `trainID`, `departureStationID`, `departureDate`, `departureTime`, `arrivalStationID`, `arrivalDate`, `arrivalTime`, `sheduleValidity`, `way`) VALUES
('S001', 'T001', '1', '2024-04-28', '19:47:00', '2', '2024-04-28', '19:57:00', 1, 0),
('S002', 'T001', '1', '2024-04-28', '19:51:00', '3', '2024-04-28', '20:08:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `stationID` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `qr` varchar(255) NOT NULL,
  `latitude` decimal(18,16) DEFAULT NULL,
  `longitude` decimal(18,16) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`stationID`, `name`, `qr`, `latitude`, `longitude`, `status`) VALUES
('1', 'Negombo', '662e58b885c46.png', 7.2103146808180760, 79.8418831863656000, 1),
('2', 'Kurana', '662e5910ed627.png', 7.1910610811043680, 79.8621223120336300, 1),
('3', 'Katunayaka', '662e599b8e2f8.png', 7.1669262269688030, 79.8720504828365600, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supprot_agents`
--

CREATE TABLE `supprot_agents` (
  `supporter_id` int(11) NOT NULL,
  `active` int(11) DEFAULT 0,
  `busy` int(11) DEFAULT 0,
  `number_of_chats` int(11) DEFAULT 0,
  `passenger_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supprot_agents`
--

INSERT INTO `supprot_agents` (`supporter_id`, `active`, `busy`, `number_of_chats`, `passenger_id`) VALUES
(11, 0, 0, 0, NULL),
(13, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticketprices`
--

CREATE TABLE `ticketprices` (
  `ticketPriceID` varchar(11) NOT NULL,
  `Station_1_ID` varchar(255) DEFAULT NULL,
  `Station_2_ID` varchar(255) DEFAULT NULL,
  `Station_3_ID` varchar(255) NOT NULL,
  `classID` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `qrCode` varchar(255) NOT NULL,
  `valid` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticketprices`
--

INSERT INTO `ticketprices` (`ticketPriceID`, `Station_1_ID`, `Station_2_ID`, `Station_3_ID`, `classID`, `price`, `qrCode`, `valid`) VALUES
('T0009', '2', '1', '3', 2, 56.00, '66307e08dfcc6.png', 0),
('T001', '1', '2', '', 3, 20.00, '662e59e5c11c0.png', 0),
('T002', '1', '3', '', 3, 40.00, '662e59fb38e34.png', 1),
('T003', '2', '3', '', 3, 20.00, '662e5a192f36f.png', 1),
('T005', '1', '2', '3', 2, 5.00, '663078a85a153.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `topupdetails`
--

CREATE TABLE `topupdetails` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainclasses`
--

CREATE TABLE `trainclasses` (
  `classID` int(11) NOT NULL,
  `className` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainclasses`
--

INSERT INTO `trainclasses` (`classID`, `className`) VALUES
(1, 'First'),
(2, 'Second'),
(3, 'Third');

-- --------------------------------------------------------

--
-- Table structure for table `trainroutes`
--

CREATE TABLE `trainroutes` (
  `routeID` int(11) NOT NULL,
  `trainID` varchar(255) DEFAULT NULL,
  `stationID` varchar(255) DEFAULT NULL,
  `stopOrder` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `trainID` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `firstCapacity` int(11) NOT NULL,
  `secondCapacity` int(11) NOT NULL,
  `thirdCapacity` int(11) NOT NULL,
  `service` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`trainID`, `name`, `type`, `firstCapacity`, `secondCapacity`, `thirdCapacity`, `service`) VALUES
('T001', 'Podi Menike', 'Slow', 20, 20, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trainways`
--

CREATE TABLE `trainways` (
  `id` int(11) NOT NULL,
  `trainId` varchar(25) NOT NULL,
  `way` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `tr_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reason` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`tr_id`, `user_id`, `date`, `reason`, `amount`) VALUES
(26, 12, '2024-04-28 15:09:25', 'Recharge', 1000.00),
(27, 12, '2024-04-28 15:15:11', 'Journey', 20.00),
(28, 12, '2024-05-28 15:25:30', 'Fine', 500.00),
(29, 12, '2024-04-29 10:15:25', 'Settled the fine', 500.00),
(30, 12, '2024-04-29 10:18:55', 'Settled the fine', 500.00),
(31, 12, '2024-04-29 13:37:05', 'Settled the fine', 500.00),
(32, 12, '2024-04-29 13:39:21', 'Settled the fine', 500.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `nic` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `userImage` varchar(255) NOT NULL DEFAULT 'man.png',
  `date` date NOT NULL DEFAULT current_timestamp(),
  `type` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `nic`, `phone`, `email`, `password`, `userImage`, `date`, `type`, `status`) VALUES
(1, 'Nuwan', 'Kaushalya', '200016404330', 775006920, 'nuwan@gmail.com', '$2y$10$6JhG3HITCIwu15.PTHfjGugd1E27.K58w5YUFUYDHM3mCaCLTQGXS', '1/662335cb3d4e41.15805965.jpg', '2024-04-28', 'admin', 1),
(2, 'cvbfvb', 'Fernando', '200016404337', 775006945, 'nuwanfernando17@gmail.com', '$2y$10$a0ZRxOnfJirXAmuvpgPnnO/bzgqnlMUGPpmVCOKVvFDPduuQRKcVe', '2/662c86aa6d9125.52373607.jpg', '2024-05-28', 'user', 0),
(3, 'Saman', 'Kumara', '200016404332', 775078920, 'saman@gmail.com', '$2y$10$5n4/8nKinM/Nv9F05pmasO8vsoKg5ap2bEG5SPlI//VWdCHB4pxtm', 'man.png', '2024-04-28', 'checker', 0),
(4, 'Kavinda', 'Perera', '200216404337', 775006998, 'kavinda@gmail.com', '$2y$10$f.0kwn2WyuMKakVj1U9A1u0LCwSaX/SCLVLD.vH5.kbcNJ86lggcy', 'man.png', '2024-04-28', 'user', 0),
(5, 'Minal', 'Perera', '789456123078', 775006789, 'minal@gmail.com', '$2y$10$a0ZRxOnfJirXAmuvpgPnnO/bzgqnlMUGPpmVCOKVvFDPduuQRKcVe', 'man.png', '2024-04-28', 'user', 0),
(6, 'Somapala', 'Subsinha', '123456789X', 779085632, 's@gmail.com', '$2y$10$4AAFHgtLmekhJR5JHQI.wOqPTKONJGkk9Wv127owo6msoIfLXon8C', 'man.png', '2024-04-28', 'checker', 0),
(7, 'kusmasana', 'Deviya', '123456789V', 724563217, 'kusu@gmail.com', '$2y$10$8aMoo3hpjEIL/IfxY.keL.LvA1lE2IwgcWxxMsuxD.xSffI2pN5dq', '7/663031edae9e40.84555875.png', '2024-04-28', 'supporter', 1),
(9, 'Ashan', 'Kavinda', '123456799X', 775006789, 'ashan@gmail.com', '$2y$10$mkEw.83SHmMD8wYTZIBteOEzVzf5xhXtbMHucP9MKr2BgQ/8SBKz6', 'man.png', '2024-04-28', 'supporter', 0),
(10, 'Test', 'Checker_1', '100012345678', 2147483647, 'check1@gmail.com', '$2y$10$P1Z7QdqNWD3TJCPhBqXXF.EsU4MQS4rYMpOzYtz3IIKjLXBGc2AP6', 'man.png', '2024-04-28', 'checker', 1),
(11, 'Test', 'Supp1', '789456123012', 2147483647, 'supp1@gmail.com', '$2y$10$fdxxfdufXxoTjT.id71GCeCov7GHMYFfA6Rsi9zVBsV2wLOkU0udG', 'man.png', '2024-04-28', 'supporter', 1),
(12, 'Nuwan', 'Fernando', '200016694330', 775006920, 'nuwanfernando22@gmail.com', '$2y$10$kDHD2sILvJKaZS7CAt2wfemUKfGf0UIyG6Q4RUs3TCa8wiDnTJrvi', 'man.png', '2024-04-28', 'user', 1),
(13, 'Minal', 'Perera', '789456123321', 775669898, 'm@gmail.com', '$2y$10$Za7kIIZwDuqJNE.AzdTAlOCgYlF0TPaXHvk85DMWyhIpO5JI9dRju', 'man.png', '2024-04-29', 'supporter', 1);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `add_to_wallet_trigger` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    DECLARE user_type VARCHAR(50);
    SELECT type INTO user_type FROM users WHERE id = NEW.id;
    
    IF user_type = 'user' THEN
        INSERT INTO wallet (passenger_id) VALUES (NEW.id);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `waiting_que`
--

CREATE TABLE `waiting_que` (
  `waiting_id` int(11) NOT NULL,
  `passenger_id` int(11) DEFAULT NULL,
  `assigned` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `passenger_id` int(11) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `passenger_id`, `balance`) VALUES
(4, 12, 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avlbleseats`
--
ALTER TABLE `avlbleseats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `passenger_id` (`passenger_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingId`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`Q_ID`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `fk_feedbcak` (`userID`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`fine_id`),
  ADD KEY `fk_passenger` (`passenger_id`),
  ADD KEY `fk_checker` (`checker_id`),
  ADD KEY `fk_journey` (`journey_id`),
  ADD KEY `fk_to_transaction_table` (`tr_id`);

--
-- Indexes for table `journey`
--
ALTER TABLE `journey`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_journey_user` (`passenger_id`),
  ADD KEY `fk_journey_ticket` (`ticket_id`),
  ADD KEY `fk_to_transaction` (`tr_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `questionregardingproblems`
--
ALTER TABLE `questionregardingproblems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shedules`
--
ALTER TABLE `shedules`
  ADD PRIMARY KEY (`sheduleID`),
  ADD KEY `trainID` (`trainID`),
  ADD KEY `departureStationID` (`departureStationID`),
  ADD KEY `arrivalStationID` (`arrivalStationID`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`stationID`);

--
-- Indexes for table `supprot_agents`
--
ALTER TABLE `supprot_agents`
  ADD PRIMARY KEY (`supporter_id`);

--
-- Indexes for table `ticketprices`
--
ALTER TABLE `ticketprices`
  ADD PRIMARY KEY (`ticketPriceID`),
  ADD KEY `departureStationID` (`Station_1_ID`),
  ADD KEY `arrivalStationID` (`Station_2_ID`),
  ADD KEY `classID` (`classID`);

--
-- Indexes for table `topupdetails`
--
ALTER TABLE `topupdetails`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `trainclasses`
--
ALTER TABLE `trainclasses`
  ADD PRIMARY KEY (`classID`);

--
-- Indexes for table `trainroutes`
--
ALTER TABLE `trainroutes`
  ADD PRIMARY KEY (`routeID`),
  ADD KEY `trainID` (`trainID`),
  ADD KEY `stationID` (`stationID`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`trainID`);

--
-- Indexes for table `trainways`
--
ALTER TABLE `trainways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waiting_que`
--
ALTER TABLE `waiting_que`
  ADD PRIMARY KEY (`waiting_id`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users` (`passenger_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avlbleseats`
--
ALTER TABLE `avlbleseats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=392;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `Q_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
  MODIFY `fine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `journey`
--
ALTER TABLE `journey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `questionregardingproblems`
--
ALTER TABLE `questionregardingproblems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topupdetails`
--
ALTER TABLE `topupdetails`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainroutes`
--
ALTER TABLE `trainroutes`
  MODIFY `routeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trainways`
--
ALTER TABLE `trainways`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `waiting_que`
--
ALTER TABLE `waiting_que`
  MODIFY `waiting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `fk_feedbcak` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `fines`
--
ALTER TABLE `fines`
  ADD CONSTRAINT `fk_checker` FOREIGN KEY (`checker_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_journey` FOREIGN KEY (`journey_id`) REFERENCES `journey` (`id`),
  ADD CONSTRAINT `fk_passenger` FOREIGN KEY (`passenger_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_to_transaction_table` FOREIGN KEY (`tr_id`) REFERENCES `transactions` (`tr_id`);

--
-- Constraints for table `journey`
--
ALTER TABLE `journey`
  ADD CONSTRAINT `fk_journey_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `ticketprices` (`ticketPriceID`),
  ADD CONSTRAINT `fk_journey_user` FOREIGN KEY (`passenger_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_to_transaction` FOREIGN KEY (`tr_id`) REFERENCES `transactions` (`tr_id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `shedules`
--
ALTER TABLE `shedules`
  ADD CONSTRAINT `shedules_ibfk_1` FOREIGN KEY (`trainID`) REFERENCES `trains` (`trainID`),
  ADD CONSTRAINT `shedules_ibfk_2` FOREIGN KEY (`departureStationID`) REFERENCES `stations` (`stationID`),
  ADD CONSTRAINT `shedules_ibfk_3` FOREIGN KEY (`arrivalStationID`) REFERENCES `stations` (`stationID`);

--
-- Constraints for table `supprot_agents`
--
ALTER TABLE `supprot_agents`
  ADD CONSTRAINT `supprot_agents_ibfk_1` FOREIGN KEY (`supporter_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ticketprices`
--
ALTER TABLE `ticketprices`
  ADD CONSTRAINT `ticketprices_ibfk_1` FOREIGN KEY (`Station_1_ID`) REFERENCES `stations` (`stationID`),
  ADD CONSTRAINT `ticketprices_ibfk_2` FOREIGN KEY (`Station_2_ID`) REFERENCES `stations` (`stationID`),
  ADD CONSTRAINT `ticketprices_ibfk_3` FOREIGN KEY (`classID`) REFERENCES `trainclasses` (`classID`);

--
-- Constraints for table `trainroutes`
--
ALTER TABLE `trainroutes`
  ADD CONSTRAINT `trainroutes_ibfk_1` FOREIGN KEY (`trainID`) REFERENCES `trains` (`trainID`),
  ADD CONSTRAINT `trainroutes_ibfk_2` FOREIGN KEY (`stationID`) REFERENCES `stations` (`stationID`);

--
-- Constraints for table `waiting_que`
--
ALTER TABLE `waiting_que`
  ADD CONSTRAINT `waiting_que_ibfk_1` FOREIGN KEY (`passenger_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`passenger_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
