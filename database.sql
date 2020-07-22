-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 02:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-cards`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id_contact` int(11) NOT NULL,
  `id_friend` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id_contact`, `id_friend`, `id_user`) VALUES
(4, 13, 12),
(9, 14, 12),
(10, 12, 12),
(15, 12, 13),
(16, 13, 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `contactno` varchar(250) NOT NULL,
  `hash` varchar(250) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `company` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT '5ee29eff55075.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `firstname`, `lastname`, `contactno`, `hash`, `active`, `company`, `position`, `fax`, `logo`) VALUES
(12, 'avvari@gmail.com', 'testtest', 'Praneeth', 'Avvari', '8559045346', 'a7dd62a4a23dd89ae07475dae21d96fa', 1, 'dcba', 'abcd', '205-520-364', '5ee29fca7322c.png'),
(13, 'test@test.com', 'testtest', 'test', 'test', '1234567890', 'e8dd977bca7ae0971fb9ca8e6b006d24', 1, 'E-Cards', 'owner', '123-123-123', '5f158b2926199.png'),
(14, 'vest@vest.com', 'vestvest', 'vest', 'vest', '8559045346', '4ef6b44831f43d17165bf0b23e1d9b74', 1, 'QWERTY', 'Tester', '85-962-265', '5ee3b3ed4d173.png'),
(16, '', '', '', '', '', 'ed3e0728f32ea533e3595486675bff32', 0, '', '', '', '5ee29eff55075.png'),
(17, 'sachdevamehak24@gmail.com', 'testtest', 'mehak', 'sachdeva', '7087728884', '323a839b8abddf96b62b3e864338ac65', 1, '', '', '', '5ee29eff55075.png'),
(18, 'praneeth.avvari@yahoo.com', 'testtest', 'e card', 'test', '8559045346', '66aa439eff1fa36226840c5f17198116', 1, '', '', '', '5ee29eff55075.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
