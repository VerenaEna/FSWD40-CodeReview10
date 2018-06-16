-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2018 at 04:47 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr10_verena_carpella_biglibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `first_name` varchar(22) DEFAULT NULL,
  `last_name` varchar(22) DEFAULT NULL,
  `media` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `name`, `first_name`, `last_name`, `media`) VALUES
(1, 'Sergio Corbucci', 'Sergio', 'Corbucci', 'movies'),
(2, 'Alan Parker', 'Alan', 'Parker', 'movies'),
(3, 'Quentin Tarantino', 'Quentin', 'Tarantino', 'movies'),
(4, 'Karl Markovics', 'Karl', 'Markovics', 'movies'),
(5, 'Josef Joffe', 'Josef', 'Joffe', 'book'),
(6, 'Stefan Loose', 'Stefan', 'Loose', 'travelbook'),
(7, 'Terry Pratchett', 'Terry', 'Pratchett', 'book'),
(8, 'Guns \'n Roses', 'Guns', ' n Roses', 'cd'),
(9, 'Loung Ung', 'Loung', 'Ung', 'book');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `ISBN` bigint(22) NOT NULL,
  `img_src` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_descr` varchar(255) DEFAULT NULL,
  `pub_date` date DEFAULT NULL,
  `media_type` varchar(55) DEFAULT NULL,
  `availibility` tinyint(1) DEFAULT NULL,
  `fk_author_id` int(11) DEFAULT NULL,
  `fk_pub_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`ISBN`, `img_src`, `title`, `short_descr`, `pub_date`, `media_type`, `availibility`, `fk_author_id`, `fk_pub_id`) VALUES
(2064244152, 'https://images.eil.com/large_image/GUNS_N_ROSES_USE%2BYOUR%2BILLUSION%2BI%2B-%2BWITH%2BWARNING%2BSTICKER-477525.jpg', 'Use your illusion', 'Hard Rock Band with Axel Rose as Frontman from 90s', '1991-01-01', 'cd', 1, 8, 2),
(4006680068022, 'https://images-na.ssl-images-amazon.com/images/I/71VveKcloPL._SL1200_.jpg', 'Franco Nero ist Django', 'Im Grenzstreifen zwischen Mexiko und den noch jungen USA führen zwei rivalisierende Verbrecherarmeen einen unerbittlichen Kampf - die roten Kapuzenmänner von Major Jackson und die Rebellen von General Rodríguez. Eines Tages erscheint ein wortkarger, zerlu', '2016-05-16', 'Blue Ray DVD', 1, 1, 3),
(5099705019894, 'https://images-na.ssl-images-amazon.com/images/I/615UT6Qm9lL.jpg', 'The Wall', 'The story of THE WALL is told simply with the music of Pink Floyd, images and natural effects. There is no conventional dialogue to progress the narrative.', '2000-03-15', 'Blue Ray DVD', 1, 2, 2),
(9120043850545, 'https://images-na.ssl-images-amazon.com/images/I/51GOEztSRTL.jpg', 'Atmen - Ein Film von Karl Markovics', 'Roman Kogler (Thomas Schubert) ist 19 Jahre alt und sitzt im Gefängnis. Seine Mutter hat ihn als Kind weggegeben und seitdem ist nichts so gelaufen, wie man es sich wünschen würde. Roman will seine Haftentlassung aus der Jugendstrafanstalt beantragen, doc', '2013-10-01', 'Blue Ray DVD', 0, 4, 4),
(9783442468096, 'http://t2.gstatic.com/images?q=tbn:ANd9GcRTp_cBbwNBF4ltlLS8qczky1aLDFvHuP8TaA5HpJN9xYNq934v', 'Schöne Scheine', 'Die Banken in Ankh-Morpork, der größten Stadt der Scheibenwelt, verfallen immer mehr. Die meisten Bürger haben das Vertrauen in das Bankwesen verloren. Und das zu Recht! Um das Königliche Münzamt steht es besonders schlimm. Der Patrizier, Lord Havelock Ve', '2007-01-01', 'Fantasy Book', 1, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `pub_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(55) DEFAULT NULL,
  `pub_size` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`pub_id`, `name`, `address`, `country`, `pub_size`) VALUES
(1, 'Bertelsman Music Group', 'Gütersloh', 'Deutschland', 'small'),
(2, 'Sony Music', 'New York City, New York', 'US', 'big'),
(3, 'StudioCanal', 'Neue Promenade 4, 10178 Berlin', 'Deutschland', 'middle'),
(4, 'Austrian Film', ' Czerninplatz 4,1020 Wien', 'Österreich', 'small'),
(5, 'Goldmann Verlag', 'Leipzig', 'Leipzig, Deutschland', 'big'),
(6, 'Fischer Verlag', 'Hedderichstraße 114, 60596 Frankfurt am Main', 'Deutschland', 'big'),
(7, 'Stefan Loose Verlag', 'around the world', 'world wide', 'big'),
(8, 'Piper Verlag', 'München', 'Deutschland', 'big');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'Verena Carpella', 'verenaparaluxe@gmail.com', '37268335dd6931045bdcdf92623ff819a64244b53d0e746d438797349d4da578'),
(2, 'test testinger', 'test@mail.com', '37268335dd6931045bdcdf92623ff819a64244b53d0e746d438797349d4da578'),
(3, 'testinger', 'mail@test.at', '37268335dd6931045bdcdf92623ff819a64244b53d0e746d438797349d4da578'),
(4, 'Verena Carpella', 'testing@mail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `fk_author_id` (`fk_author_id`),
  ADD KEY `fk_pub_id` (`fk_pub_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`pub_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `ISBN` bigint(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`fk_author_id`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`fk_pub_id`) REFERENCES `publisher` (`pub_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
