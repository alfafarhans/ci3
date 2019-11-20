-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 06:35 PM
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
  `payment_id` int(15) NOT NULL,
  `bill_name` varchar(25) NOT NULL,
  `bill_bank_name` varchar(15) NOT NULL,
  `bill_number` varchar(25) NOT NULL,
  `user_paid` decimal(15,3) NOT NULL,
  `payment_created` date NOT NULL,
  `paid_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `bill_name`, `bill_bank_name`, `bill_number`, `user_paid`, `payment_created`, `paid_date`) VALUES
(2891733, 'Muhammad Irfan Nazmi', 'Mandiri', '44444666666', '35.000', '2019-11-19', '2019-11-19'),
(3658742, 'Muhammad Irfan Nazmi', 'Mandiri', '44444666666', '35.000', '2019-11-19', '2019-11-19'),
(4127382, 'Muhammad Irfan Nazmi', 'Mandiri', '11111111', '35.000', '2019-11-19', '2019-11-19'),
(6927382, 'Muhammad Irfan Nazmi', 'Mandiri', '44444666666', '40.000', '2019-11-19', '2019-11-19'),
(9168353, 'Muhammad Irfan Nazmi', 'BCA', '11111111', '25.000', '2019-11-19', '2019-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `seminar_id` int(11) NOT NULL,
  `seminar_name` varchar(50) NOT NULL,
  `seminar_date` datetime NOT NULL,
  `seminar_city` varchar(20) NOT NULL,
  `seminar_held` text NOT NULL,
  `seminar_seat` int(3) NOT NULL,
  `seminar_desc` text NOT NULL,
  `seminar_tag` text NOT NULL,
  `seminar_price` decimal(15,3) NOT NULL,
  `seminar_drcode` varchar(25) NOT NULL,
  `seminar_banner` text NOT NULL,
  `seminar_maps` text NOT NULL,
  `cert_coord_x` varchar(10) NOT NULL,
  `cert_coord_y` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`seminar_id`, `seminar_name`, `seminar_date`, `seminar_city`, `seminar_held`, `seminar_seat`, `seminar_desc`, `seminar_tag`, `seminar_price`, `seminar_drcode`, `seminar_banner`, `seminar_maps`, `cert_coord_x`, `cert_coord_y`) VALUES
(1, 'Indonesia Ves 2019', '2019-12-30 07:11:24', 'Jakarta Selatan', 'Jl. Pintu Satu Senayan, RT.1/RW.3, Gelora, Tanahabang, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 10270\r\n			', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Vitae et leo duis ut diam quam. Erat imperdiet sed euismod nisi porta. Adipiscing at in tellus integer feugiat scelerisque. Porttitor rhoncus dolor purus non. ', 'enterpreneur,business,wirausaha', '0.000', 'Casual', 'Indonesia_Ves_2019_2019_2019-09_12.png', 'https://maps.google.com/maps?q=istora%20senayan&t=&z=13&ie=UTF8&iwloc=&output=embed', '321,900', '267,463'),
(2, 'National Youth Summit', '2019-11-15 05:14:19', 'Bekasi', 'Ballroom Puri Agung, Hotel Grand Sahid Jakarta. Jl. Jend. Sudirman No.Kav. 86, RT.10/RW.11, Karet Tengsin, Jakarta Pusat, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10220', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'business', '0.000', 'Batik Kuning', 'National_Youth_Summit_2019_09_26.png', 'https://maps.google.com/maps?q=hotel%20grand%20sahid%20jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed', '321,900', '267,463'),
(3, 'Machine Learning dan IoT', '2019-12-07 07:00:00', 'New York', 'Auditorium Tower Lantai 7, Mercubuana Meruya. Jl. Meruya Selatan No.1, RT.4/RW.1, Meruya Sel., Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11650', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'sciencetech,business', '35.000', 'Kemeja Bebas', 'Machine_Learning_dan_IoT_2019_09_30.png', 'https://maps.google.com/maps?q=mercubuana%20meruya&t=&z=13&ie=UTF8&iwloc=&output=embed', '321,900', '267,463'),
(4, 'Ethical Hacking dan IT Security', '2019-12-12 10:11:00', 'Yogyakarta', 'Gg. Jemb. Merah No.84C, Soropadan, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'hobbies,business', '25.000', 'Kemeja Bebas', 'Ethical_Hacking_dan_IT_Security_2019_10_02.png', 'https://maps.google.com/maps?q=universitas%20mercubuana%20yogyakarta%20jembatan%20merah&t=&z=13&ie=UTF8&iwloc=&output=embed', '321,900', '267,463'),
(5, 'Halal Industry: Challenges and Oppotunities', '2019-11-29 10:00:00', 'Jakarta Selatan', 'Gunadarma Simatupang, Jl. TB Simatupang No.51B, RT.1/RW.8, Jati Padang, Kec. Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12520', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'fooddrink,spiritually,hobbies,business', '0.000', 'Batik Biru', 'Halal_Industry_Challenges_and_Opportunities_2019_10_11.png', 'https://maps.google.com/maps?q=gunadarma%20simatupang&t=&z=13&ie=UTF8&iwloc=&output=embed', '321,900', '267,463'),
(6, 'Kecerdasan Buatan Menyambut Industri 4.0', '2019-11-19 00:00:00', 'Bekasi', 'Mercubuana Jatisampurna, Jl. Raya Kranggan No.6, RT.006/RW.008, Jatiraden, Kec. Jatisampurna, Kota Bks, Jawa Barat 17433', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'hobbies,intelligence,business', '25.000', 'Bebas', 'Kecerdasan_Buatan_Industri_4.0_2019_10_03.png', 'https://maps.google.com/maps?q=mercubuana%20jatisampurna&t=&z=13&ie=UTF8&iwloc=&output=embed', '321,900', '267,463'),
(7, 'Seminar keprofesian & nutrisionist talk', '2019-12-23 07:20:00', 'Bogor', 'Auditorium Gmsk Ipb, Jl. Raya Cibungbulang - Bogor No.137a, RT.05/RW.02, Kp. Parung Jambu, Laladon, Tenjolaya, Kota Bogor, Jawa Barat 16117', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Vitae et leo duis ut diam quam. Erat imperdiet sed euismod nisi porta. Adipiscing at in tellus integer feugiat scelerisque. Porttitor rhoncus dolor purus non. ', 'health,homelifefstyle,fooddrink', '25.000', 'Kemeja Batik', 'Keprofesian_dan_Nutritionist_Talk_2019_10_06.png', 'https://maps.google.com/maps?q=Auditorium%20Gmsk%20Ipb%2C%20Jl.%20Raya%20Cibungbulang%20-%20Bogor%20No.137a%2C%20RT.05%2FRW.02%2C%20Kp.%20Parung%20Jambu%2C%20Laladon%2C%20Tenjolaya%2C%20Kota%20Bogor%2C%20Jawa%20Barat%2016117&t=&z=13&ie=UTF8&iwloc=&output=embed', '321,900', '267,463'),
(8, 'Manajemen Kesehatan Mental di Era Revolusi 4.0', '2019-12-17 08:15:00', 'Yogyakarta', 'Gadjah Mada University Club (UC) Hotel UGM, Hotel & Convention, Jl. Pancasila Bulaksumur No.2, Senolowo, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Vitae et leo duis ut diam quam. Erat imperdiet sed euismod nisi porta. Adipiscing at in tellus integer feugiat scelerisque. Porttitor rhoncus dolor purus non.', 'homelifefstyle,apoteker,health', '130.000', 'Kemeja Bebas', 'Management_Kesehatal_Mental_4.0_2019_10_10.png', 'https://maps.google.com/maps?q=Gadjah%20Mada%20University%20Club%20(UC)%20Hotel%20UGM%2C%20Hotel%20%26%20Convention%2C%20Jl.%20Pancasila%20Bulaksumur%20No.2%2C%20Senolowo%2C%20Sinduadi%2C%20Kec.%20Mlati%2C%20Kabupaten%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta%2055281&t=&z=13&ie=UTF8&iwloc=&output=embed', '321,900', '267,463'),
(9, 'Seminar Nasional Perlebahan', '2019-12-15 07:00:00', 'Bogor', 'Auditorium FMIPA IPB, Jalan Agatis, Kampus IPB Dramaga, Babakan, Kec. Dramaga, Bogor, Jawa Barat 16680', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Vitae et leo duis ut diam quam. Erat imperdiet sed euismod nisi porta. Adipiscing at in tellus integer feugiat scelerisque. Porttitor rhoncus dolor purus non.', 'family,health,fisiologi lebah', '250.000', 'Batik', 'Perlebahan_2019_10_05.png', 'https://maps.google.com/maps?q=Auditorium%20FMIPA%20IPB%2C%20Jalan%20Agatis%2C%20Kampus%20IPB%20Dramaga%2C%20Babakan%2C%20Kec.%20Dramaga%2C%20Bogor%2C%20Jawa%20Barat%2016680&t=&z=13&ie=UTF8&iwloc=&output=embed', '321,900', '267,463'),
(10, '12th Season', '2019-12-26 00:00:00', 'Bekasi', 'Jl. Komp. Ipb, Tanah Baru, Bogor Utara, Kota Bogor, Jawa Barat, Indonesia', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Vitae et leo duis ut diam quam. Erat imperdiet sed euismod nisi porta. Adipiscing at in tellus integer feugiat scelerisque. Porttitor rhoncus dolor purus non.', 'economy islamic,spiritually,fashion', '0.000', 'Kemeja', 'Sharia_Economics_Competition_2019_10_04.png', 'https://maps.google.com/maps?q=Jl.%20Komp.%20Ipb%2C%20Tanah%20Baru%2C%20Bogor%20Utara%2C%20Kota%20Bogor%2C%20Jawa%20Barat%2C%20Indonesia&t=&z=13&ie=UTF8&iwloc=&output=embed', '321,900', '267,463'),
(11, 'Smart Technologi Android', '2019-11-30 09:00:00', 'Bekasi', 'Jalan KH. Noer Ali, Jakasampurna, Bekasi Barat, RT.005/RW.006A, Jakasampurna, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17145', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Vitae et leo duis ut diam quam. Erat imperdiet sed euismod nisi porta. Adipiscing at in tellus integer feugiat scelerisque. Porttitor rhoncus dolor purus non.', 'hobbies,homelifefstyle,sciencetech', '30.000', 'Batik', 'Smart_Technology_Android_2019_10_08.png', 'https://maps.google.com/maps?q=Jalan%20KH.%20Noer%20Ali%2C%20Jakasampurna%2C%20Bekasi%20Barat%2C%20RT.005%2FRW.006A%2C%20Jakasampurna%2C%20Kec.%20Bekasi%20Bar.%2C%20Kota%20Bks%2C%20Jawa%20Barat%2017145&t=&z=13&ie=UTF8&iwloc=&output=embed', '321,900', '267,463'),
(12, 'StartUp With A Great Security System', '2019-12-09 10:00:00', 'Bekasi', 'Jalan KH. Noer Ali, Jakasampurna, Bekasi Barat, RT.005/RW.006A, Jakasampurna, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17145', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Vitae et leo duis ut diam quam. Erat imperdiet sed euismod nisi porta. Adipiscing at in tellus integer feugiat scelerisque. Porttitor rhoncus dolor purus non.', 'CEO & founder,cyber security,sciencetech', '35.000', 'Kemeja Bebas', 'Statup_With_AGreat_Security_System_2019_10_07.png', 'https://maps.google.com/maps?q=Jalan%20KH.%20Noer%20Ali%2C%20Jakasampurna%2C%20Bekasi%20Barat%2C%20RT.005%2FRW.006A%2C%20Jakasampurna%2C%20Kec.%20Bekasi%20Bar.%2C%20Kota%20Bks%2C%20Jawa%20Barat%2017145&t=&z=13&ie=UTF8&iwloc=&output=embed', '321,900', '267,463'),
(13, 'Teknologi Informasi di Era Industri 4.0', '2019-11-18 08:00:00', 'Bekasi', 'Mercubuana Jatisampurna, Jl. Raya Kranggan No.6, RT.006/RW.008, Jatiraden, Kec. Jatisampurna, Kota Bks, Jawa Barat 17433', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'goverment,teknologi informasi,sciencetech,business', '35.000', 'Kemeja Bebas', 'Teknologi_Informasi_Era_Industri_4.0_2019_10_01.png', 'https://maps.google.com/maps?q=mercubuana%20jatisampurna&t=&z=13&ie=UTF8&iwloc=&output=embed', '568,1000', '185,660'),
(14, 'Unikom Career Days 2019', '2019-12-23 08:30:00', 'Bandung', 'auditorium miracle lantai 4, gedung lama, unikom bandung', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'business,industri,homelifefstyle', '0.000', 'Kemeja', 'Unikom_Career_Days_2019_10_12.png', 'https://maps.google.com/maps?q=Universitas%20Komputer%20Indonesia%20(UNIKOM)&t=&z=13&ie=UTF8&iwloc=&output=embed', '321,900', '267,463'),
(15, 'Development Scholarship, Career, Entrepreneurship', '2019-11-28 08:30:00', 'Depok', 'Jl. Margonda Raya No.100, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'goverment,schoolactivies,business', '40.000', 'Kemeja Bebas', 'Youth_Develoopment_2019_10_09.png', 'https://maps.google.com/maps?q=Jl.%20Margonda%20Raya%20No.100%2C%20Pondok%20Cina%2C%20Kecamatan%20Beji%2C%20Kota%20Depok%2C%20Jawa%20Barat%2016424&t=&z=13&ie=UTF8&iwloc=&output=embed', '321,900', '267,463'),
(16, 'Engineer Cerdas Digital di Era Industri 4.0', '2019-11-18 08:00:00', 'Bekasi', 'Mercubuana Jatisampurna, Jl. Raya Kranggan No.6, RT.006/RW.008, Jatiraden, Kec. Jatisampurna, Kota Bks, Jawa Barat 17433', 100, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas sed enim ut sem viverra. Consectetur libero id faucibus nisl tincidunt eget. Pretium viverra suspendisse potenti nullam ac tortor vitae. A condimentum vitae sapien pellentesque habitant morbi tristique senectus. At risus viverra adipiscing at in tellus. Eu nisl nunc mi ipsum faucibus vitae. Adipiscing tristique risus nec feugiat in fermentum posuere urna nec. Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Et molestie ac feugiat sed lectus vestibulum mattis. Morbi tincidunt ornare massa eget', 'sciencetech,business,section', '35.000', 'Batik', 'Menjadi_Engineer_Cerdas_Digital_2019_11_30.png', 'https://maps.google.com/maps?q=mercubuana%20jatisampurna&t=&z=13&ie=UTF8&iwloc=&output=embed', '568,1000', '185,660');

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
  `user_gender` varchar(8) NOT NULL,
  `user_phone` char(13) NOT NULL,
  `user_address` text NOT NULL,
  `user_jobs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `email`, `first_name`, `last_name`, `date_born`, `user_gender`, `user_phone`, `user_address`, `user_jobs`) VALUES
(1, 'e77989ed21758e78331b20e477fc5582', 'mynameisnazmi41@gmail.com', 'admin', 'admin', '2019-11-01', '', '', '', ''),
(2, 'e77989ed21758e78331b20e477fc5582', 'alfafarhansyarief@yahoo.co.id', 'Alfa', 'Farhan', '0000-00-00', '', '', '', ''),
(3, 'e77989ed21758e78331b20e477fc5582', 'irfannz@outlook.com', 'Muhammad Irfan', 'Nazmi', '0000-00-00', '', '', '', '');

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
(289173, 3, 16, 2891733, 'Attend On Stage'),
(365874, 2, 5, 3658742, 'Booked'),
(412738, 2, 13, 4127382, 'Attend On Stage'),
(692738, 2, 15, 6927382, 'Booked'),
(916835, 3, 6, 9168353, 'Attend On Stage');

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
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_idfk` (`user_id`) USING BTREE,
  ADD KEY `seminar_idfk` (`seminar_id`) USING BTREE,
  ADD KEY `payment_idfk` (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `seminar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_trx`
--
ALTER TABLE `user_trx`
  ADD CONSTRAINT `payment_idfk` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
