-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 07:43 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `museumsys`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectDepartment` (IN `checkID` VARCHAR(10))  NO SQL
SELECT * FROM department WHERE Did = checkID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectModel` (IN `checkID` VARCHAR(10))  NO SQL
SELECT * FROM model WHERE Did = checkID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectPainting` (IN `checkID` VARCHAR(10))  NO SQL
SELECT * FROM painting WHERE Did = checkID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectStatue` (IN `checkID` VARCHAR(10))  NO SQL
SELECT * FROM statue WHERE Did = checkID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showEmployees` ()  SELECT * FROM staff$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showObjects` ()  SELECT * FROM object$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showStoreItems` ()  SELECT * FROM store_items$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` varchar(10) NOT NULL,
  `ad_name` varchar(20) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `gender` varchar(2) DEFAULT NULL,
  `pass_word` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `email`, `phone`, `DOB`, `gender`, `pass_word`) VALUES
('ad101', 'Robert Frost', 'RobertFrost@gmail.com', '7782245678', '1992-10-24', 'M', 'frosty'),
('ad109', 'Michael', 'mic@gmail.com', '5557894440', '1956-08-07', 'M', 'mic'),
('ad345', 'Harish', 'tyler@gmail.com', '9886554321', '1992-07-05', 'm', 'potato'),
('super', 'admin', 'admins@gmail.com', '9754892310', '1992-10-20', 'M', 'forever');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Did` varchar(10) NOT NULL,
  `Dname` varchar(20) DEFAULT NULL,
  `Floor` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Did`, `Dname`, `Floor`) VALUES
('1', 'History', 'First'),
('2', 'Zoology', 'First'),
('3', 'Science and Space', 'Second'),
('4', 'Automobiles', 'Second'),
('5', 'Botany', 'Third'),
('6', 'Geography', 'Fourth');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` varchar(10) DEFAULT NULL,
  `Did` varchar(10) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `artist_name` varchar(30) NOT NULL,
  `year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `Did`, `size`, `type`, `title`, `artist_name`, `year`) VALUES
('nhaj', '1', 'large', 'model', 'Telescope', 'Galelio', '1342'),
('madf', '3', 'large', 'model', 'Tram', 'Bengal Assoc', '1922'),
('ion', '5', 'medium', 'model', 'Sunflower', 'Philips', '1890'),
('nome', '1', 'medium', 'model', 'Ferrari', 'Henry Ford', '1982'),
('je67', '2', 'small', 'model', 'Evolution', 'Rutherford', '1726'),
('klm90', '4', 'medium', 'model', 'Roadstar', 'Tesla', '1978'),
('ey67', '6', 'large', 'model', 'Formations', 'Giovanni', '1988'),
('ndji', '3', 'small', 'model', 'Spiritus', 'Darwing', '1788');

--
-- Triggers `model`
--
DELIMITER $$
CREATE TRIGGER `after_model_delete` AFTER DELETE ON `model` FOR EACH ROW BEGIN
DELETE FROM object WHERE id = OLD.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_model_insert` AFTER INSERT ON `model` FOR EACH ROW BEGIN
INSERT INTO object values(NEW.id, NEW.Did, NEW.artist_name, NEW.year, NEW.title, NEW.type);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `museum_events`
--

CREATE TABLE `museum_events` (
  `event_name` varchar(30) NOT NULL,
  `Did` varchar(10) DEFAULT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `people_involved` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `museum_events`
--

INSERT INTO `museum_events` (`event_name`, `Did`, `date_start`, `date_end`, `people_involved`) VALUES
('Christmas', '3', '2019-12-25', '2019-12-28', 'Public'),
('Diwali', '3', '2019-12-15', '2019-12-18', 'Public'),
('Historic Convention', '1', '2019-06-11', '2019-06-27', 'Students'),
('Holi', '5', '2019-03-31', '2019-04-04', 'Public'),
('Research', '4', '2019-07-24', '2019-07-31', 'NGOs');

-- --------------------------------------------------------

--
-- Table structure for table `object`
--

CREATE TABLE `object` (
  `id` varchar(10) NOT NULL,
  `Did` varchar(10) DEFAULT NULL,
  `artist_name` varchar(30) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `object`
--

INSERT INTO `object` (`id`, `Did`, `artist_name`, `year`, `title`, `type`) VALUES
('ey67', '6', 'Giovanni', 1988, 'Formations', 'model'),
('fu78', '2', 'Jacod Seed', 1998, 'Stegosaurus', 'statue'),
('harp', '4', 'Ford', 1982, 'Mustang', 'statue'),
('hsy6', '5', 'Darwin', 1645, 'Journey', 'painting'),
('inb8', '4', 'Elon Musk', 2015, 'Electric Car', 'statue'),
('ion', '5', 'Philips', 1890, 'Sunflower', 'model'),
('je67', '2', 'Rutherford', 1726, 'Evolution', 'model'),
('jhnd', '1', 'Petunia', 2015, 'Carnalia', 'statue'),
('klm90', '4', 'Tesla', 1978, 'Roadstar', 'model'),
('madf', '3', 'Bengal Assoc', 1922, 'Tram', 'model'),
('namo', '2', 'Vincent van Gogh', 1447, 'The Starry Night', 'painting'),
('ndji', '3', 'Darwing', 1788, 'Spiritus', 'model'),
('nhaj', '1', 'Galelio', 1342, 'Telescope', 'model'),
('nome', '1', 'Henry Ford', 1982, 'Ferrari', 'model'),
('omn', '6', 'Rutherford', 2000, 'Formations', 'painting'),
('ps13', '3', 'Leonardo', 1567, 'Monalisa', 'painting'),
('sm76', '4', 'Jeffery', 1978, 'Speeder', 'painting'),
('tagm', '6', 'Potter', 1280, 'Botanist', 'statue'),
('uns5', '3', 'Stephen Hawking', 1996, 'Black Hole', 'statue'),
('zun', '1', 'Florence', 1745, 'Lady with the lamp', 'painting');

-- --------------------------------------------------------

--
-- Table structure for table `painting`
--

CREATE TABLE `painting` (
  `id` varchar(10) DEFAULT NULL,
  `Did` varchar(10) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `style` varchar(20) DEFAULT NULL,
  `material_type` varchar(20) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `artist_name` varchar(30) NOT NULL,
  `year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `painting`
--

INSERT INTO `painting` (`id`, `Did`, `type`, `style`, `material_type`, `title`, `artist_name`, `year`) VALUES
('namo', '2', 'painting', 'arbitrary', 'pastel', 'The Starry Night', 'Vincent van Gogh', '1447'),
('zun', '1', 'painting', 'cascade', 'Water', 'Lady with the lamp', 'Florence', '1745'),
('ps13', '3', 'painting', 'Freehand', 'Paint', 'Monalisa', 'Leonardo', '1567'),
('sm76', '4', 'painting', 'Exotic', 'oil', 'Speeder', 'Jeffery', '1978'),
('hsy6', '5', 'painting', 'sketch', 'pencil', 'Journey', 'Darwin', '1645'),
('omn', '6', 'painting', 'sketch', 'pencil', 'Formations', 'Rutherford', '2000');

--
-- Triggers `painting`
--
DELIMITER $$
CREATE TRIGGER `after_painting_delete` AFTER DELETE ON `painting` FOR EACH ROW BEGIN
DELETE FROM object WHERE id=OLD.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_painting_insert` AFTER INSERT ON `painting` FOR EACH ROW BEGIN
INSERT INTO object VALUES(NEW.id, NEW.Did, NEW.artist_name, NEW.year, NEW.title, NEW.type);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` varchar(10) NOT NULL,
  `Did` varchar(10) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `pass_word` varchar(50) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `job` varchar(20) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  `exit_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `Did`, `name`, `email`, `country`, `pass_word`, `phone`, `DOB`, `gender`, `job`, `entry_time`, `exit_time`) VALUES
('12334', '2', 'akshay', 'akshay@gmail.com', 'India', 'akshay', '8618101495', '2000-04-27', 'm', 'admin', '2019-11-03 23:04:29', '2019-11-03 23:04:35'),
('1234', '1', 'Mayank Kumar Shaw', 'mayank141shaw@gmail.com', 'France', 'dram', '8617798212', '1999-03-09', 'm', 'admin', '2019-11-11 14:22:13', '2019-11-11 14:22:18'),
('567', '4', 'Rachel', 'rachel@gmail.com', 'Somalia', 'instant', '9877867754', '1998-12-18', 'F', 'Navigator', '2019-12-05 18:53:50', '2019-12-05 18:57:33'),
('678', '5', 'Lucy', 'lucy@gmail.com', 'Soctland', 'lucy', '8278900156', '1997-05-07', 'f', 'Guide', '2019-12-05 19:20:47', '2019-12-05 19:20:50'),
('747', '1', 'Harry', 'harry@gmail.com', 'Rome', 'simple', '7896754321', '2004-06-18', 'M', 'Janitor', '2019-11-08 23:33:20', '2019-11-08 23:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `statue`
--

CREATE TABLE `statue` (
  `id` varchar(10) DEFAULT NULL,
  `Did` varchar(10) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `material` varchar(20) DEFAULT NULL,
  `style` varchar(20) DEFAULT NULL,
  `height_in_m` int(11) DEFAULT NULL,
  `weight_in_kg` int(11) DEFAULT NULL,
  `artist_name` varchar(30) NOT NULL,
  `year` varchar(4) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statue`
--

INSERT INTO `statue` (`id`, `Did`, `title`, `material`, `style`, `height_in_m`, `weight_in_kg`, `artist_name`, `year`, `type`) VALUES
('bs1', '5', 'Stranded', 'marble', 'cascade', 4, 400, 'Ptolemy', '1472', 'statue'),
('harp', '4', 'Mustang', 'alluminium', 'exotic', 2, 200, 'Ford', '1982', 'statue'),
('tagm', '6', 'Botanist', 'Tarmic', 'classico', 5, 300, 'Potter', '1280', 'statue'),
('jhnd', '1', 'Carnalia', 'Glass', 'Smooth', 3, 250, 'Petunia', '2015', 'statue'),
('fu78', '2', 'Stegosaurus', 'Ceramic', 'Handmade', 6, 450, 'Jacod Seed', '1998', 'statue'),
('uns5', '3', 'Black Hole', 'Metal', 'HardRock', 3, 390, 'Stephen Hawking', '1996', 'statue'),
('inb8', '4', 'Electric Car', 'Carbon Fibre', 'Muscle', 2, 500, 'Elon Musk', '2015', 'statue');

--
-- Triggers `statue`
--
DELIMITER $$
CREATE TRIGGER `after_statue_delete` AFTER DELETE ON `statue` FOR EACH ROW BEGIN
DELETE FROM object WHERE id=OLD.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_statue_insert` AFTER INSERT ON `statue` FOR EACH ROW BEGIN
INSERT INTO object VALUES(NEW.id, NEW.Did, NEW.artist_name, NEW.year, NEW.title, NEW.type);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `store_items`
--

CREATE TABLE `store_items` (
  `item_name` varchar(20) DEFAULT NULL,
  `item_id` varchar(10) NOT NULL,
  `item_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`item_name`, `item_id`, `item_price`) VALUES
('Buzzer', 'bns', 180),
('Cups', 'cnm', 100),
('Jacket', 'hy876', 200),
('Hats', 'hyn7', 150),
('Jersey', 'man68', 300),
('Jacket', 'snu', 800),
('tshirt', 'ts67', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Did`);

--
-- Indexes for table `museum_events`
--
ALTER TABLE `museum_events`
  ADD PRIMARY KEY (`event_name`);

--
-- Indexes for table `object`
--
ALTER TABLE `object`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `store_items`
--
ALTER TABLE `store_items`
  ADD PRIMARY KEY (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
