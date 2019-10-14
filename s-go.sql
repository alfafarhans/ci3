-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Okt 2019 pada 14.53
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `s-go`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(15) NOT NULL,
  `user_paid` decimal(15,3) NOT NULL,
  `seminar_price` decimal(15,3) NOT NULL,
  `payment_created` date NOT NULL,
  `paid_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`payment_id`, `user_paid`, `seminar_price`, `payment_created`, `paid_date`) VALUES
(13248633, '0.000', '60.000', '2019-10-13', '0000-00-00'),
(51237933, '0.000', '5.000', '2019-10-13', '0000-00-00'),
(52764133, '0.000', '35.000', '2019-10-13', '0000-00-00'),
(54139233, '0.000', '150.500', '2019-10-13', '0000-00-00'),
(87413533, '0.000', '0.000', '2019-10-13', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminar`
--

CREATE TABLE IF NOT EXISTS `seminar` (
`seminar_id` int(11) NOT NULL,
  `seminar_name` varchar(50) NOT NULL,
  `seminar_date` datetime NOT NULL,
  `seminar_city` varchar(20) NOT NULL,
  `seminar_held` text NOT NULL,
  `seminar_desc` text NOT NULL,
  `seminar_tag` text NOT NULL,
  `seminar_price` decimal(15,3) NOT NULL,
  `seminar_drcode` varchar(25) NOT NULL,
  `seminar_banner` text NOT NULL,
  `seminar_maps` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `seminar`
--

INSERT INTO `seminar` (`seminar_id`, `seminar_name`, `seminar_date`, `seminar_city`, `seminar_held`, `seminar_desc`, `seminar_tag`, `seminar_price`, `seminar_drcode`, `seminar_banner`, `seminar_maps`) VALUES
(1, 'Indonesia Ves 2019', '2019-10-30 07:11:24', 'Jakarta Selatan', 'Jl. Pintu Satu Senayan, RT.1/RW.3, Gelora, Tanahabang, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 10270\r\n			', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Vitae et leo duis ut diam quam. Erat imperdiet sed euismod nisi porta. Adipiscing at in tellus integer feugiat scelerisque. Porttitor rhoncus dolor purus non. ', 'enterpreneur,business,wirausaha', '35.000', 'Casual', 'Indonesia_Ves_2019_2019_2019-09_12.png', 'https://maps.google.com/maps?q=istora%20senayan&t=&z=13&ie=UTF8&iwloc=&output=embed'),
(2, 'National Youth Summit', '2019-10-18 05:14:19', 'Jakarta Pusat', 'Ballroom Puri Agung, Hotel Grand Sahid Jakarta. Jl. Jend. Sudirman No.Kav. 86, RT.10/RW.11, Karet Tengsin, Jakarta Pusat, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10220', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'enterpreneur,business,wirausaha', '35.000', 'Batik Kuning', 'National_Youth_Summit_2019_09_26.png', 'https://maps.google.com/maps?q=hotel%20grand%20sahid%20jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed'),
(3, 'Machine Learning dan IoT', '2019-11-13 22:14:19', 'Jakarta Barat', 'Auditorium Tower Lantai 7, Mercubuana Meruya. Jl. Meruya Selatan No.1, RT.4/RW.1, Meruya Sel., Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11650', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'IoT,Science & Tech,Industry 4.0', '35.000', 'Kemeja Bebas', 'Machine_Learning_dan_IoT_2019_09_30.png', 'https://maps.google.com/maps?q=mercubuana%20meruya&t=&z=13&ie=UTF8&iwloc=&output=embed'),
(4, 'Ethical Hacking dan IT Security', '2019-11-01 10:00:00', 'yogyakarta', 'Gg. Jemb. Merah No.84C, Soropadan, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'hacking,science & tech,security', '25.000', 'Kemeja Bebas', 'Ethical_Hacking_dan_IT_Security_2019_10_02.png', 'https://maps.google.com/maps?q=universitas%20mercubuana%20yogyakarta%20jembatan%20merah&t=&z=13&ie=UTF8&iwloc=&output=embed'),
(5, 'Halal Industry: Challenges and Oppotunities', '2019-11-02 10:00:00', 'Jakarta Selatan', 'Gunadarma Simatupang, Jl. TB Simatupang No.51B, RT.1/RW.8, Jati Padang, Kec. Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12520', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'food & drink,industry,halal', '25.000', 'Batik Biru', 'Halal_Industry_Challenges_and_Opportunities_2019_10_11.png', 'https://maps.google.com/maps?q=gunadarma%20simatupang&t=&z=13&ie=UTF8&iwloc=&output=embed'),
(6, 'Kecerdasan Buatan Menyambut Industri 4.0', '2019-11-03 00:00:00', 'Bekasi', 'Mercubuana Jatisampurna, Jl. Raya Kranggan No.6, RT.006/RW.008, Jatiraden, Kec. Jatisampurna, Kota Bks, Jawa Barat 17433', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'industy 4.0,science & tech,artificial intelligence', '25.000', 'Bebas', 'Kecerdasan_Buatan_Industri_4.0_2019_10_03.png', 'https://maps.google.com/maps?q=mercubuana%20jatisampurna&t=&z=13&ie=UTF8&iwloc=&output=embed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `password` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `date_born` date NOT NULL,
  `user_gender` tinyint(1) NOT NULL,
  `user_phone` char(13) NOT NULL,
  `user_address` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=39 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `password`, `email`, `first_name`, `last_name`, `date_born`, `user_gender`, `user_phone`, `user_address`) VALUES
(33, 'e77989ed21758e78331b20e477fc5582', 'mynameisnazmi41@gmail.com', 'Muhammad irfan', 'Nazmi', '1999-06-27', 1, '089638056837', 'JL.H Nawawi Rt04/02 No 92 kel.cirimekar kec.cibinong kab.bogor'),
(35, 'e77989ed21758e78331b20e477fc5582', 'fajarbarokah98@yahoo.co.id', 'fajar', 'barokah', '0000-00-00', 0, '0', ''),
(36, '7815696ecbf1c96e6894b779456d330e', 'irfaasdnnz@outlook.com', 'asd', 'asd', '0000-00-00', 0, '0', ''),
(37, '7815696ecbf1c96e6894b779456d330e', 'sds@asdasd', 'Muhammad', 'Nazmi', '0000-00-00', 0, '0', ''),
(38, '202cb962ac59075b964b07152d234b70', 'irfa2nnz@outlook.com', 'Muhammad', 'Nazmi', '1999-06-27', 1, '0', 'JL.H Nawawi Rt04/02 No 92 kel.cirimekar kec.cibinong kab.bogor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_trx`
--

CREATE TABLE IF NOT EXISTS `user_trx` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seminar_id` int(11) NOT NULL,
  `payment_id` int(15) NOT NULL,
  `atten_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_trx`
--

INSERT INTO `user_trx` (`booking_id`, `user_id`, `seminar_id`, `payment_id`, `atten_status`) VALUES
(132486, 33, 5, 13248633, 'Waiting for payment'),
(512379, 33, 2, 51237933, 'Waiting for payment'),
(527641, 33, 4, 52764133, 'Waiting for payment'),
(541392, 33, 3, 54139233, 'Waiting for payment'),
(874135, 33, 1, 87413533, 'Waiting for payment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`payment_id`);

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
 ADD PRIMARY KEY (`booking_id`), ADD KEY `user_idfk` (`user_id`) USING BTREE, ADD KEY `seminar_idfk` (`seminar_id`) USING BTREE, ADD KEY `payment_idfk` (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
MODIFY `seminar_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user_trx`
--
ALTER TABLE `user_trx`
ADD CONSTRAINT `payment_idfk` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
