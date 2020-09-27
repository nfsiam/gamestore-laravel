-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2020 at 10:39 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartitems`
--

CREATE TABLE `cartitems` (
  `id` int(11) NOT NULL,
  `gameid` int(11) NOT NULL,
  `purchaserusername` varchar(100) NOT NULL,
  `addedat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `actionat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `sender`, `receiver`, `status`, `actionat`) VALUES
(22, 'koushiq2', 'koushiq', 'accepted', '2020-09-25 13:56:13'),
(23, 'koushiq', 'koushiq3', 'accepted', '2020-09-26 05:18:18'),
(25, 'ksq', 'koushiq', 'accepted', '2020-09-26 13:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `propic` varchar(100) NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `publishdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `offerid` int(11) DEFAULT NULL,
  `parentgameid` int(11) DEFAULT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `propic`, `filepath`, `publisher`, `publishdate`, `offerid`, `parentgameid`, `price`) VALUES
(16, 'Call of duty', 'upload/dc3b02c3-c7b6-4b20-989a-95ce92067705.jpg', 'upload/dc3b02c3-c7b6-4b20-989a-95ce92067705.py', 'EA', '2020-09-25 18:00:00', NULL, NULL, 22),
(17, 'Contra', 'upload/737ce763-dcf6-4d86-ab88-914042fea06a.jpg', 'upload/737ce763-dcf6-4d86-ab88-914042fea06a.txt', 'EA', '2020-09-25 18:00:00', NULL, NULL, 22),
(18, 'rdr2', 'upload/2b0a22ed-cd64-431f-9582-f1be524327bd.jpg', 'upload/2b0a22ed-cd64-431f-9582-f1be524327bd.txt', 'EA', '2020-09-25 18:00:00', NULL, NULL, 55),
(19, 'AABCX', 'upload/be060ea3-313e-4764-853f-d7ea2b501bf9.jpg', 'upload/be060ea3-313e-4764-853f-d7ea2b501bf9.pdf', 'EA', '2020-09-25 18:00:00', NULL, NULL, 24);

-- --------------------------------------------------------

--
-- Table structure for table `giftapproval`
--

CREATE TABLE `giftapproval` (
  `username` varchar(100) NOT NULL,
  `permission` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `giftapproval`
--

INSERT INTO `giftapproval` (`username`, `permission`) VALUES
('abc123', 'allowed'),
('koushiq', 'allowed'),
('koushiq2', 'denied'),
('koushiq3', 'denied'),
('ksq', 'allowed');

-- --------------------------------------------------------

--
-- Table structure for table `libraryentries`
--

CREATE TABLE `libraryentries` (
  `id` int(11) NOT NULL,
  `gameid` int(11) DEFAULT NULL,
  `ratting` double NOT NULL,
  `username` varchar(100) NOT NULL,
  `addedat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `libraryentries`
--

INSERT INTO `libraryentries` (`id`, `gameid`, `ratting`, `username`, `addedat`) VALUES
(21, 16, 4, 'ksq', '2020-09-26 05:17:31'),
(22, 18, 3, 'ksq', '2020-09-26 13:48:38'),
(23, 16, 0, 'koushiq2', '2020-09-26 06:09:24'),
(24, 16, 0, 'koushiq', '2020-09-25 19:09:24'),
(25, 17, 0, 'koushiq', '2020-09-25 19:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `rechargerequests`
--

CREATE TABLE `rechargerequests` (
  `id` int(11) NOT NULL,
  `requester` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `status` varchar(100) NOT NULL,
  `actionby` varchar(100) NOT NULL,
  `actionat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `gameid` int(11) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `purchaseprice` double NOT NULL,
  `transactiontype` varchar(100) NOT NULL,
  `transactionat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `gameid`, `username`, `purchaseprice`, `transactiontype`, `transactionat`) VALUES
(21, 16, 'ksq', 0, 'gift', '2020-09-26 05:17:31'),
(22, 18, 'ksq', 0, 'gift', '2020-09-26 13:48:38'),
(23, 16, 'koushiq2', 22, 'regular', '2020-09-26 06:09:24'),
(24, 16, 'koushiq', 22, 'regular', '2020-09-25 19:09:24'),
(25, 17, 'koushiq', 22, 'regular', '2020-09-25 19:09:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giftapproval`
--
ALTER TABLE `giftapproval`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `libraryentries`
--
ALTER TABLE `libraryentries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rechargerequests`
--
ALTER TABLE `rechargerequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartitems`
--
ALTER TABLE `cartitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `libraryentries`
--
ALTER TABLE `libraryentries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `rechargerequests`
--
ALTER TABLE `rechargerequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
