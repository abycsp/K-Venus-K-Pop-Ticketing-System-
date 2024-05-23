
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `K-VENUS`
--
-- --------------------------------------------------------
--
-- Table structure for table `accomodation`
--
CREATE TABLE `accomodation` (
  `acc_id` int(11) NOT NULL,
  `acc_type` varchar(35) NOT NULL,
  `acc_price` double NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`acc_id`, `acc_type`, `acc_price`) VALUES
(1, 'VIP1', 350, 30),
(2, 'VIP2 STANDING', 18850, 30),
(3, 'LOWER BOX A', 13250, 30),
(4, 'LOWER BOX B', 8480, 30),
(5, 'UPPER BOX', 4770, 30),
(6, 'GEN AD', 2650, 30);

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `book_id` int(11) NOT NULL,
  `book_by` varchar(50) NOT NULL,
  `book_contact` varchar(15) NOT NULL,
  `book_address` varchar(100) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_age` int(11) NOT NULL,
  `book_gender` varchar(15) NOT NULL,
  `book_departure` date NOT NULL,
  `dest_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `book_tracker` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `dest_id` int(11) NOT NULL,
  `dest_destination` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`dest_id`, `dest_destination`) VALUES
(1, 'Araneta Coliseum');
INSERT INTO `destination` (`dest_id`, `dest_destination`) VALUES
(2, 'Mall of Asia Arena');
INSERT INTO `destination` (`dest_id`, `dest_destination`) VALUES
(3, 'Philippine Arena');

-- --------------------------------------------------------

--
-- Table structure for table `kgroup`
--

CREATE TABLE `kgroup` (
  `group_id` int(11) NOT NULL,
  `group_desc` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kgroup`
--

INSERT INTO `kgroup` (`group_id`, `group_desc`) VALUES
(1, 'bigbang');
INSERT INTO `kgroup` (`group_id`, `group_desc`) VALUES 
('2', 'Blackpink')
INSERT INTO `kgroup` (`group_id`, `group_desc`) VALUES 
('3', 'iKon')

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `stat_id` int(11) NOT NULL,
  `stat_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`stat_id`, `stat_desc`) VALUES
(1, 'Paid'),
(2, 'Refunded');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_account` varchar(50) NOT NULL,
  `user_password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_account`, `user_password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin2', 'c84258e9c39059a89ab77d846ddab909');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodation`
--
ALTER TABLE `accomodation`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `dest_id` (`dest_id`,`acc_id`),
  ADD KEY `acc_id` (`acc_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`dest_id`);

--
-- Indexes for table `kgroup`
--
ALTER TABLE `kgroup`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`stat_id`);

--
--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomodation`
--
ALTER TABLE `accomodation`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `dest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kgroup`
--
ALTER TABLE `kgroup`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked`
--
ALTER TABLE `booked`
  ADD CONSTRAINT `booked_ibfk_1` FOREIGN KEY (`dest_id`) REFERENCES `destination` (`dest_id`),
  ADD CONSTRAINT `booked_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `accomodation` (`acc_id`),
  ADD CONSTRAINT `booked_ibfk_3` FOREIGN KEY (`group_id`) REFERENCES `kgroup` (`group_id`);

--

--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
