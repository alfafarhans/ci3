-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2019 at 06:50 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s-go`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(6) NOT NULL,
  `user_paid` int(6) NOT NULL,
  `seminar_price` int(6) NOT NULL,
  `payment_created` date NOT NULL,
  `paid_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `seminar_id` int(11) NOT NULL,
  `seminar_name` varchar(50) NOT NULL,
  `seminar_date` datetime NOT NULL,
  `seminar_city` varchar(20) NOT NULL,
  `seminar_held` varchar(50) NOT NULL,
  `seminar_desc` text NOT NULL,
  `seminar_tag` text NOT NULL,
  `seminar_price` decimal(15,3) NOT NULL,
  `seminar_drcode` varchar(25) NOT NULL,
  `seminar_banner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`seminar_id`, `seminar_name`, `seminar_date`, `seminar_city`, `seminar_held`, `seminar_desc`, `seminar_tag`, `seminar_price`, `seminar_drcode`, `seminar_banner`) VALUES
(1, 'Indonesia Ves 2019', '2019-10-30 07:11:24', 'Konohagakure', 'Konoha, Konohagakure', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Vitae et leo duis ut diam quam. Erat imperdiet sed euismod nisi porta. Adipiscing at in tellus integer feugiat scelerisque. Porttitor rhoncus dolor purus non. ', 'Saber,business,SASUKEEE!!!!', '0.000', 'Batik SASUKEEE!!', 'Indonesia_Ves_2019_2019_2019-09_12.png'),
(2, 'National TEST', '2019-10-18 05:14:19', 'Bogorugakure', 'Senayan, Otogakure', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'Saber,fooddrink,SASUKEEE!!!!', '5.000', 'Batik Kuning', 'National_Youth_Summit_2019_09_26.png'),
(3, 'National Youth Summit', '2019-10-11 00:00:00', 'Sunagakure', 'Senayan, Sunagakure', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'Saber,health,SASUKEEE!!!!', '150.500', 'Batik oren', 'National_Youth_Summit_2019_09_27.png'),
(4, 'Machine Learning dan IoT', '2019-11-13 22:14:19', 'Chibinokakure', 'Senayan, Takumi no Sato', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'Saber,health,SASUKEEE!!!!', '35.000', 'Batik Kuning', 'Machine_Learning_dan_IoT_2019_09_30.png'),
(5, 'Indonesia E-FEST 2060', '2019-11-26 00:00:00', 'Kirigakure', 'Senayan,  Kirigakure', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Vitae et leo duis ut diam quam. Erat imperdiet sed euismod nisi porta. Adipiscing at in tellus integer feugiat scelerisque. Porttitor rhoncus dolor purus non. ', 'business,health,SASUKEEE!!!!', '60.000', 'Batik Hitam', 'Indonesia_Ves_2019_2019_2019-09_12.png'),
(6, 'Indonesia Ves 2019', '2019-10-12 08:00:00', 'Jakartagakure', 'Senayan, Kumogakure', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Vitae et leo duis ut diam quam. Erat imperdiet sed euismod nisi porta. Adipiscing at in tellus integer feugiat scelerisque. Porttitor rhoncus dolor purus non. ', 'Saber,health,SASUKEEE!!!!', '500.000', 'Batik Hitam', 'Indonesia_Ves_2019_2019_2019-09_12.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `password` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `date_born` date NOT NULL,
  `user_gender` tinyint(1) NOT NULL,
  `user_phone` int(15) NOT NULL,
  `user_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `email`, `first_name`, `last_name`, `date_born`, `user_gender`, `user_phone`, `user_address`) VALUES
(33, 'e77989ed21758e78331b20e477fc5582', 'mynameisnazmi41@gmail.com', 'Muhammad irfan', 'Nazmi', '0000-00-00', 0, 0, ''),
(35, 'e77989ed21758e78331b20e477fc5582', 'fajarbarokah98@yahoo.co.id', 'fajar', 'barokah', '0000-00-00', 0, 0, ''),
(36, '7815696ecbf1c96e6894b779456d330e', 'irfaasdnnz@outlook.com', 'asd', 'asd', '0000-00-00', 0, 0, ''),
(37, '7815696ecbf1c96e6894b779456d330e', 'sds@asdasd', 'Muhammad', 'Nazmi', '0000-00-00', 0, 0, ''),
(38, '202cb962ac59075b964b07152d234b70', 'irfa2nnz@outlook.com', 'Muhammad', 'Nazmi', '0000-00-00', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_trx`
--

CREATE TABLE `user_trx` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seminar_id` int(11) NOT NULL,
  `payment_id` int(15) NOT NULL,
  `atten_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_trx`
--

INSERT INTO `user_trx` (`booking_id`, `user_id`, `seminar_id`, `payment_id`, `atten_status`) VALUES
(294136, 33, 4, 29413633, 'Waiting for payment'),
(294786, 33, 3, 29478633, 'Waiting for payment'),
(386751, 33, 3, 38675133, 'Waiting for payment'),
(741983, 33, 5, 74198333, 'Waiting for payment'),
(974381, 33, 3, 97438133, 'Waiting for payment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`seminar_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_trx`
--
ALTER TABLE `user_trx`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_idfk` (`user_id`) USING BTREE,
  ADD KEY `seminar_idfk` (`seminar_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `seminar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
