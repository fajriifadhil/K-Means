-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 12:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kmeans_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `centroid`
--

CREATE TABLE `centroid` (
  `no_centroid` int(11) NOT NULL,
  `c1` double NOT NULL,
  `c2` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `centroid`
--

INSERT INTO `centroid` (`no_centroid`, `c1`, `c2`) VALUES
(1, 278760138.8888889, 252912916.66666666),
(2, 917204545.4545455, 874127272.7272727),
(3, 2283333333.3333335, 2116666666.6666667);

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `data_cluster`
--

CREATE TABLE `data_cluster` (
  `id_cluster` int(11) NOT NULL,
  `nama_cluster` varchar(100) NOT NULL,
  `c1` double NOT NULL,
  `c2` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_cluster`
--

INSERT INTO `data_cluster` (`id_cluster`, `nama_cluster`, `c1`, `c2`) VALUES
(1, 'Premium', 121000000, 103000000),
(2, 'Standart', 539492300, 501405300),
(3, 'Luxury', 3000000000, 2800000000);

-- --------------------------------------------------------

--
-- Table structure for table `data_hasil`
--

CREATE TABLE `data_hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `Cluster` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_hasil`
--

INSERT INTO `data_hasil` (`id_hasil`, `id_mobil`, `Cluster`) VALUES
(1, 1, 'Cluster-1'),
(2, 2, 'Cluster-1'),
(3, 3, 'Cluster-1'),
(4, 4, 'Cluster-1'),
(5, 5, 'Cluster-2'),
(6, 6, 'Cluster-2'),
(7, 7, 'Cluster-2'),
(8, 8, 'Cluster-1'),
(9, 9, 'Cluster-2'),
(10, 10, 'Cluster-1'),
(11, 11, 'Cluster-1'),
(12, 12, 'Cluster-2'),
(13, 13, 'Cluster-2'),
(14, 14, 'Cluster-2'),
(15, 15, 'Cluster-1'),
(16, 16, 'Cluster-2'),
(17, 17, 'Cluster-1'),
(18, 18, 'Cluster-2'),
(19, 19, 'Cluster-1'),
(20, 20, 'Cluster-1'),
(21, 21, 'Cluster-1'),
(22, 22, 'Cluster-1'),
(23, 23, 'Cluster-1'),
(24, 24, 'Cluster-1'),
(25, 25, 'Cluster-1'),
(26, 26, 'Cluster-1'),
(27, 27, 'Cluster-1'),
(28, 28, 'Cluster-1'),
(29, 29, 'Cluster-1'),
(30, 30, 'Cluster-1'),
(31, 31, 'Cluster-1'),
(32, 32, 'Cluster-1'),
(33, 33, 'Cluster-1'),
(34, 34, 'Cluster-2'),
(35, 35, 'Cluster-1'),
(36, 36, 'Cluster-1'),
(37, 37, 'Cluster-1'),
(38, 38, 'Cluster-1'),
(39, 39, 'Cluster-1'),
(40, 40, 'Cluster-1'),
(41, 41, 'Cluster-1'),
(42, 42, 'Cluster-1'),
(43, 43, 'Cluster-1'),
(44, 44, 'Cluster-1'),
(45, 45, 'Cluster-2'),
(46, 46, 'Cluster-2'),
(47, 47, 'Cluster-1'),
(48, 48, 'Cluster-3'),
(49, 49, 'Cluster-2'),
(50, 50, 'Cluster-1'),
(51, 51, 'Cluster-1'),
(52, 52, 'Cluster-1'),
(53, 53, 'Cluster-1'),
(54, 54, 'Cluster-2'),
(55, 55, 'Cluster-1'),
(56, 56, 'Cluster-1'),
(57, 57, 'Cluster-2'),
(58, 58, 'Cluster-1'),
(59, 59, 'Cluster-1'),
(60, 60, 'Cluster-1'),
(61, 61, 'Cluster-1'),
(62, 62, 'Cluster-1'),
(63, 63, 'Cluster-1'),
(64, 64, 'Cluster-1'),
(65, 65, 'Cluster-1'),
(66, 66, 'Cluster-1'),
(67, 67, 'Cluster-1'),
(68, 68, 'Cluster-1'),
(69, 69, 'Cluster-2'),
(70, 70, 'Cluster-1'),
(71, 71, 'Cluster-1'),
(72, 72, 'Cluster-3'),
(73, 73, 'Cluster-1'),
(74, 74, 'Cluster-2'),
(75, 75, 'Cluster-1'),
(76, 76, 'Cluster-1'),
(77, 77, 'Cluster-2'),
(78, 78, 'Cluster-1'),
(79, 79, 'Cluster-2'),
(80, 80, 'Cluster-1'),
(81, 81, 'Cluster-1'),
(82, 82, 'Cluster-1'),
(83, 83, 'Cluster-1'),
(84, 84, 'Cluster-1'),
(85, 85, 'Cluster-1'),
(86, 86, 'Cluster-1'),
(87, 87, 'Cluster-1'),
(88, 88, 'Cluster-3'),
(89, 89, 'Cluster-3'),
(90, 90, 'Cluster-1'),
(91, 91, 'Cluster-2'),
(92, 92, 'Cluster-1'),
(93, 93, 'Cluster-1'),
(94, 94, 'Cluster-2'),
(95, 95, 'Cluster-1'),
(96, 96, 'Cluster-1'),
(97, 97, 'Cluster-3'),
(98, 98, 'Cluster-1'),
(99, 99, 'Cluster-3'),
(100, 100, 'Cluster-2');

-- --------------------------------------------------------

--
-- Table structure for table `data_mobil`
--

CREATE TABLE `data_mobil` (
  `id_mobil` int(11) NOT NULL,
  `jenis_mobil` varchar(100) NOT NULL,
  `c1` double NOT NULL,
  `c2` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_mobil`
--

INSERT INTO `data_mobil` (`id_mobil`, `jenis_mobil`, `c1`, `c2`) VALUES
(1, 'Hyundai Stargazer', 272000000, 252000000),
(2, 'Hyundai Creta', 382000000, 362000000),
(3, 'Wuling Almaz', 285000000, 275000000),
(4, 'Toyota Fortuner', 475000000, 470000000),
(5, 'Toyota Alphard', 1075000000, 1055000000),
(6, 'Mazda CX-5', 607700000, 600000000),
(7, 'BMW 330i M Sport', 882000000, 862000000),
(8, 'Kijang Innova', 367000000, 350000000),
(9, 'Hyundai Santa', 706000000, 686000000),
(10, 'Toyota Avanza', 254800000, 225800000),
(11, 'Mitsubishi Colt', 259000000, 239000000),
(12, 'Mercedes-Benz C 300', 805000000, 785000000),
(13, 'Mitsubishi Fuso', 625000000, 600000000),
(14, 'Mini Cooper', 1165000000, 1135000000),
(15, 'Honda HR-V', 410100000, 390100000),
(16, 'Toyota GR-86', 915000000, 900000000),
(17, 'Toyota All New Hi Ace', 541200000, 511200000),
(18, 'Toyota Camry', 739300000, 719300000),
(19, 'Toyota Corolla Altis', 506900000, 486900000),
(20, 'Mistubishi Xpander', 261000000, 231000000),
(21, 'Toyota Yariz', 177000000, 147000000),
(22, 'Suzuki XL-7', 234000000, 204000000),
(23, 'Toyota Rush', 206000000, 186000000),
(24, 'Toyota Sienta', 177000000, 137000000),
(25, 'Toyota Raise', 247300000, 217300000),
(26, 'Toyota Agya', 155000000, 125000000),
(27, 'Honda Brio', 151000000, 121000000),
(28, 'Toyota Veloz', 280100000, 250100000),
(29, 'wuling Cortez', 190000000, 160000000),
(30, 'Honda BR-V', 169900000, 149900000),
(31, 'BMW 320I', 513000000, 483000000),
(32, 'Honda Accord', 355000000, 325000000),
(33, 'BMW X1', 469000000, 439000000),
(34, 'Mercedes-BenzGLA 200 AMG 1.6', 628000000, 608000000),
(35, 'Mazda Hatback', 435000000, 415000000),
(36, 'CIVIC Turbo', 366000000, 336000000),
(37, 'Honda CR-V', 251000000, 221000000),
(38, 'Mazda CX_3', 265000000, 245000000),
(39, 'Honda Jazz', 250000000, 220000000),
(40, 'Suzuki SX-4', 162000000, 142000000),
(41, 'Daihatsu Terios', 152000000, 122000000),
(42, 'MG 1.5 ZS Ignite', 200000000, 180000000),
(43, 'Chevrolet Trax', 187000000, 157000000),
(44, 'Daihatsu Xenia', 191000000, 171000000),
(45, 'Lexus RX-300', 1350000000, 1300000000),
(46, 'Daihatsu Traft', 625000000, 605000000),
(47, 'Toyota Hilux', 535880000, 515880000),
(48, 'Mercedes-Benz S450 L 3.0', 1650000000, 1550000000),
(49, 'Hyundai IONIQ', 960000000, 930000000),
(50, 'Suzuki Jimny', 400000000, 370000000),
(51, 'Volkswagen Polo', 184000000, 164000000),
(52, 'KIA Seltos 1.4 GT', 406000000, 376000000),
(53, 'Land Rover Range Rover', 525000000, 475000000),
(54, 'Mini Cabrio', 1100000000, 1000000000),
(55, 'Honda Mobilio', 168000000, 148000000),
(56, 'Mazda 3 2.0 SKYACTIV-G', 387000000, 367000000),
(57, 'Toyota Vellfire', 1225000000, 1185000000),
(58, 'Mazda 2 1.5', 338800000, 318800000),
(59, 'Audi Q3 2.0 2.0 TFSI SUV', 325000000, 305000000),
(60, 'Toyota Vios', 194000000, 164000000),
(61, 'Kicks Epower', 515000000, 485000000),
(62, 'Nissan March', 123000000, 103000000),
(63, 'Suzuki Baleno', 172750000, 152750000),
(64, 'Nissan Teana 2.5 XV', 305000000, 265000000),
(65, 'Mazda 2 R AT', 220000000, 200000000),
(66, 'Daihatsu Sirion', 121000000, 111000000),
(67, 'Nissan Serena', 159000000, 149000000),
(68, 'Mercedes C 250', 540000000, 520000000),
(69, 'BMW X53', 740000000, 710000000),
(70, 'Daihatsu Ayla', 128000000, 118000000),
(71, 'Toyota Voxy', 410000000, 380000000),
(72, 'Jeep Gladiator 3.6 Rubicon Pick-up ', 2125000000, 2025000000),
(73, 'Mercedes Cla 200', 380000000, 340000000),
(74, 'Mercedes-Benz C200 1.5 Avantgarde', 995000000, 915000000),
(75, 'Suzuki Ertiga', 179000000, 149000000),
(76, 'Honda New JAZZ RS', 270000000, 210000000),
(77, 'Hyundai Palisade', 855500000, 815500000),
(78, 'Hyundai H1 ELEGANCE ', 350000000, 300000000),
(79, ' Audi TT 2,5 RS Coupe', 1225000000, 1025000000),
(80, 'Mitsubishi Outlander', 180000000, 150000000),
(81, 'Honda Freed', 137000000, 117000000),
(82, 'Lexus RX270', 289000000, 249000000),
(83, 'BMW X1 2.0', 318000000, 288000000),
(84, 'Mazda Biante', 188000000, 158000000),
(85, 'Nissan Grand LIVINA', 128000000, 108000000),
(86, 'Honda New CR-Z', 345000000, 305000000),
(87, 'Honda New CR-V', 230000000, 200000000),
(88, 'Mercedes-Benz GLS450 3.0', 2200000000, 2000000000),
(89, 'BMW M4 3.0', 2900000000, 2700000000),
(90, 'Hyundai Tucson ', 220000000, 200000000),
(91, 'Porsche Cayman', 1380000000, 1280000000),
(92, 'Suzuki Ignis', 135000000, 105000000),
(93, 'Toyota Harrier', 219000000, 189000000),
(94, 'Mitsubishi Lancer Evolution', 900000000, 860000000),
(95, 'Nissan X-Trail 2.0 SUV', 205000000, 185000000),
(96, 'Toyota Calya', 158000000, 138000000),
(97, 'Lexus LX-570', 3000000000, 2800000000),
(98, 'Toyota Nav1 V A/T', 185000000, 185000000),
(99, 'Toyota Fj Cruiser', 1825000000, 1625000000),
(100, 'Jeep Wrangler ', 675000000, 655000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `centroid`
--
ALTER TABLE `centroid`
  ADD PRIMARY KEY (`no_centroid`);

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_cluster`
--
ALTER TABLE `data_cluster`
  ADD PRIMARY KEY (`id_cluster`);

--
-- Indexes for table `data_hasil`
--
ALTER TABLE `data_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `data_mobil`
--
ALTER TABLE `data_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `centroid`
--
ALTER TABLE `centroid`
  MODIFY `no_centroid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_cluster`
--
ALTER TABLE `data_cluster`
  MODIFY `id_cluster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_hasil`
--
ALTER TABLE `data_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `data_mobil`
--
ALTER TABLE `data_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
