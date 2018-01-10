-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2017 at 12:44 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hajj`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_head`
--

CREATE TABLE `account_head` (
  `h_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_head`
--

INSERT INTO `account_head` (`h_id`, `name`, `description`) VALUES
(1, 'Office expenses', 'Expenses for office'),
(2, 'Visa', 'Expenses for visa'),
(3, 'Ticket', 'Expenses for flight ticket'),
(4, 'Package', 'Expenses for package'),
(5, 'ID Card', 'Expenses for ID Cards'),
(6, 'Hajj training fee', 'Expenses for hajj training'),
(7, 'Emergency Fund', 'Expenses for emergency fund'),
(8, 'Hajj Service Charge', 'Expenses for office hajj service'),
(9, 'Guide', 'Expenses for hajj guide'),
(10, 'Hrent', 'Expenses for hrent');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'administrator', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'umar', '92deb3f274aaee236194c05729bfa443');

-- --------------------------------------------------------

--
-- Table structure for table `agency_info`
--

CREATE TABLE `agency_info` (
  `a_name` varchar(100) DEFAULT NULL,
  `a_license_no` int(15) DEFAULT NULL,
  `a_tel_no` varchar(22) DEFAULT NULL,
  `a_mob_no` varchar(16) DEFAULT NULL,
  `a_mail` varchar(34) DEFAULT NULL,
  `a_add` varchar(200) DEFAULT NULL,
  `a_contact_person` varchar(200) DEFAULT NULL,
  `a_contact_person_mob` varchar(20) DEFAULT NULL,
  `a_contact_person_tel` varchar(22) DEFAULT NULL,
  `a_contact_person_mail` varchar(44) DEFAULT NULL,
  `a_contact_person_add` varchar(200) DEFAULT NULL,
  `a_contact_person_ksa` varchar(55) DEFAULT NULL,
  `a_contact_person_ksa_mob` varchar(22) DEFAULT NULL,
  `a_contact_person_ksa_tel` varchar(22) DEFAULT NULL,
  `a_contact_person_ksa_mail` varchar(55) DEFAULT NULL,
  `a_contact_person_ksa_add` varchar(200) DEFAULT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agency_info`
--

INSERT INTO `agency_info` (`a_name`, `a_license_no`, `a_tel_no`, `a_mob_no`, `a_mail`, `a_add`, `a_contact_person`, `a_contact_person_mob`, `a_contact_person_tel`, `a_contact_person_mail`, `a_contact_person_add`, `a_contact_person_ksa`, `a_contact_person_ksa_mob`, `a_contact_person_ksa_tel`, `a_contact_person_ksa_mail`, `a_contact_person_ksa_add`, `a_id`) VALUES
('Easy Travel', 897665, '062934764', '08098769876', 'easytravel@gmail.com', 'NO 123 travel estate', 'Musa Isah', '08087656576', '0621546', 'musayunus@gmail.com', 'NO 123 johndoe estate', 'Yaseer Yazid', '232435', '0886756878', 'musayunus@gmail.com', 'No 123 Hajj road', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `pilgrim_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `pilgrim_id`, `h_id`, `date`, `amount`) VALUES
(1, 1, 3, '2017-11-01', 3500),
(2, 1, 5, '2017-11-01', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `group_leader`
--

CREATE TABLE `group_leader` (
  `gl_slno` int(122) NOT NULL,
  `gl_id` int(12) DEFAULT NULL,
  `gl_name` varchar(100) DEFAULT NULL,
  `gl_mob` varchar(22) DEFAULT NULL,
  `gl_mob_ksa` varchar(22) DEFAULT NULL,
  `gl_add` varchar(200) DEFAULT NULL,
  `gl_journey_date` varchar(50) DEFAULT NULL,
  `gl_return_date` varchar(50) DEFAULT NULL,
  `img` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_leader`
--

INSERT INTO `group_leader` (`gl_slno`, `gl_id`, `gl_name`, `gl_mob`, `gl_mob_ksa`, `gl_add`, `gl_journey_date`, `gl_return_date`, `img`) VALUES
(1, 143567, 'Umar Farooq', '08095759293', '76897654', 'No 123 market road', '2017-11-15', '2017-12-23', 'IMG_0035.JPG'),
(2, 143568, 'Suleiman Musa', '08095765432', '76876532', 'No 123 market road', '2017-11-15', '2017-12-23', 'IMG_0045.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `medical_info`
--

CREATE TABLE `medical_info` (
  `medi_slno` int(12) NOT NULL,
  `pilgrim_id` int(12) NOT NULL,
  `medi_vacci_place` varchar(100) NOT NULL,
  `medi_vacci_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_info`
--

INSERT INTO `medical_info` (`medi_slno`, `pilgrim_id`, `medi_vacci_place`, `medi_vacci_status`) VALUES
(1, 1, 'General hospital Kaduna', 'Good Health'),
(2, 2, 'General Hospital', 'Good Health');

-- --------------------------------------------------------

--
-- Table structure for table `package_info`
--

CREATE TABLE `package_info` (
  `pk_slno` int(12) NOT NULL,
  `pilgrim_id` int(12) NOT NULL,
  `pk_name` varchar(66) NOT NULL,
  `pk_rate` varchar(22) NOT NULL,
  `pk_cat` varchar(20) NOT NULL,
  `pk_option` varchar(22) NOT NULL,
  `fdate` date NOT NULL,
  `rdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_info`
--

INSERT INTO `package_info` (`pk_slno`, `pilgrim_id`, `pk_name`, `pk_rate`, `pk_cat`, `pk_option`, `fdate`, `rdate`) VALUES
(1, 1, 'Hajj', '230000', 'Hajj package', 'best', '2017-11-15', '2017-12-23'),
(2, 2, 'Hajj', '380000', 'hajj', 'best', '2017-11-15', '2017-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `passport_info`
--

CREATE TABLE `passport_info` (
  `pp_slno` int(11) NOT NULL,
  `pilgrim_id` int(12) NOT NULL,
  `pp_num` varchar(22) NOT NULL,
  `pp_valid_date` date NOT NULL,
  `pp_issue_date` date NOT NULL,
  `pp_office_name` varchar(22) NOT NULL,
  `pp_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passport_info`
--

INSERT INTO `passport_info` (`pp_slno`, `pilgrim_id`, `pp_num`, `pp_valid_date`, `pp_issue_date`, `pp_office_name`, `pp_status`) VALUES
(1, 1, 'A123456789', '2020-01-01', '2016-11-05', 'Nigerian HQ', 'Valid'),
(2, 2, 'AS12348765', '2022-02-05', '2017-02-05', 'Kaduna Hq', 'Applied'),
(3, 3, 'A123456756', '2020-01-01', '2017-01-01', 'Kaduna HQ', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pilgrim_info`
--

CREATE TABLE `pilgrim_info` (
  `pilgrim_id` int(14) NOT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `p_mobile` varchar(22) DEFAULT NULL,
  `p_mail` varchar(40) DEFAULT NULL,
  `p_address` varchar(200) DEFAULT NULL,
  `p_mstatus` varchar(22) DEFAULT NULL,
  `p_occupation` varchar(22) DEFAULT NULL,
  `p_age` varchar(22) DEFAULT NULL,
  `p_sex` varchar(22) DEFAULT NULL,
  `p_dob` date DEFAULT NULL,
  `p_police_station` varchar(33) DEFAULT NULL,
  `p_district` varchar(33) DEFAULT NULL,
  `p_fathers_name` varchar(100) DEFAULT NULL,
  `p_mother_name` varchar(100) DEFAULT NULL,
  `p_spouse_name` varchar(100) DEFAULT NULL,
  `p_mahrims_name` varchar(100) DEFAULT NULL,
  `p_nid_no` varchar(22) DEFAULT NULL,
  `p_img` text,
  `p_nationality` varchar(33) DEFAULT NULL,
  `gl_id` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilgrim_info`
--

INSERT INTO `pilgrim_info` (`pilgrim_id`, `p_name`, `p_mobile`, `p_mail`, `p_address`, `p_mstatus`, `p_occupation`, `p_age`, `p_sex`, `p_dob`, `p_police_station`, `p_district`, `p_fathers_name`, `p_mother_name`, `p_spouse_name`, `p_mahrims_name`, `p_nid_no`, `p_img`, `p_nationality`, `gl_id`, `username`, `password`) VALUES
(1, 'Abubakar Muhammad', '08098767896', 'abubakarm@gmail.com', 'No 123 main hajj road barnawa kaduna nigeria', 'Single', 'Programmer', '22', 'Male', '1995-01-03', 'Barnawa police station', 'Barnawa', 'muhammad Musa', 'khadija Abdullah', 'Aisha Sadiq', 'Aisha Sadiq', '14354312', 'sundar-pichai.jpg', 'Nigerian', 143567, 'abubakar', '34d302424ba0733ebaa8327fb13f12e8'),
(2, 'Musa Abdullahi', '0809875454', 'abubakarm@gmail.com', 'No 123 main umrah road barnawa kaduna nigeria', 'Single', 'Bussiness', '20', 'Male', '1997-04-05', 'Barnawa police station', 'Barnawa', 'Abdullahi Usman', 'Maryam Abdullah', 'Zainab Musa', 'Zainab Musa', '14543245', 'IMG_0036.JPG', 'nationality', 143567, 'musa', 'eb7f9542101c6a94f27404fafc3efd53'),
(3, 'Umar Yusuf', '08066249884', 'umar@site.com', 'NO 123 MAIN PILGRIM STREET BARNWA KADUNA NIGERIA.', 'Single', 'Software Developer', '21', 'Male', '1996-07-17', 'Barnawa police station', 'Barnawa', 'Yusuf Abubakar', 'Fatima Ibrahim', 'Aisha Musa', 'Rabi Yusuf', '23432112', 'IMG_20171016_115334_150.jpg', 'Nigerian', 143567, 'umarfarooq', 'cdfaa26ed5411ee929c7585816091b73');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_flight`
--

CREATE TABLE `ticket_flight` (
  `t_slno` int(12) NOT NULL,
  `pilgrim_id` int(12) NOT NULL,
  `t_status` varchar(12) NOT NULL,
  `t_confirm_date` date DEFAULT NULL,
  `flight_no` varchar(20) DEFAULT NULL,
  `flight_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `t_num` varchar(24) DEFAULT NULL,
  `t_agency_name` varchar(55) DEFAULT NULL,
  `flight_dest` varchar(33) DEFAULT NULL,
  `airline` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_flight`
--

INSERT INTO `ticket_flight` (`t_slno`, `pilgrim_id`, `t_status`, `t_confirm_date`, `flight_no`, `flight_date`, `return_date`, `t_num`, `t_agency_name`, `flight_dest`, `airline`) VALUES
(1, 1, 'Active', '2017-07-03', '2134A', '2017-11-15', '2017-12-23', 'A45321', 'Villaria', 'Saudi Arabia', 'Arik'),
(2, 2, 'Active', '2017-07-17', '2134B', '2017-11-15', '2017-12-23', 'A45632\r\n				', 'Villaria', 'Saudi Arabia', 'Arik');

-- --------------------------------------------------------

--
-- Table structure for table `visa_info`
--

CREATE TABLE `visa_info` (
  `visa_slno` int(16) NOT NULL,
  `pilgrim_id` int(12) NOT NULL,
  `visa_status` varchar(22) NOT NULL,
  `visa_apply_date` date NOT NULL,
  `visa_date` date NOT NULL,
  `visa_validity` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visa_info`
--

INSERT INTO `visa_info` (`visa_slno`, `pilgrim_id`, `visa_status`, `visa_apply_date`, `visa_date`, `visa_validity`) VALUES
(1, 1, 'Accepted', '2017-11-10', '2018-01-20', '40 days'),
(2, 2, 'Processing', '2017-10-01', '2017-12-15', '45 days');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_head`
--
ALTER TABLE `account_head`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agency_info`
--
ALTER TABLE `agency_info`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_leader`
--
ALTER TABLE `group_leader`
  ADD PRIMARY KEY (`gl_slno`);

--
-- Indexes for table `medical_info`
--
ALTER TABLE `medical_info`
  ADD PRIMARY KEY (`medi_slno`);

--
-- Indexes for table `package_info`
--
ALTER TABLE `package_info`
  ADD PRIMARY KEY (`pk_slno`);

--
-- Indexes for table `passport_info`
--
ALTER TABLE `passport_info`
  ADD PRIMARY KEY (`pp_slno`);

--
-- Indexes for table `pilgrim_info`
--
ALTER TABLE `pilgrim_info`
  ADD PRIMARY KEY (`pilgrim_id`);

--
-- Indexes for table `ticket_flight`
--
ALTER TABLE `ticket_flight`
  ADD PRIMARY KEY (`t_slno`);

--
-- Indexes for table `visa_info`
--
ALTER TABLE `visa_info`
  ADD PRIMARY KEY (`visa_slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_head`
--
ALTER TABLE `account_head`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `agency_info`
--
ALTER TABLE `agency_info`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `group_leader`
--
ALTER TABLE `group_leader`
  MODIFY `gl_slno` int(122) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `medical_info`
--
ALTER TABLE `medical_info`
  MODIFY `medi_slno` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `package_info`
--
ALTER TABLE `package_info`
  MODIFY `pk_slno` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `passport_info`
--
ALTER TABLE `passport_info`
  MODIFY `pp_slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pilgrim_info`
--
ALTER TABLE `pilgrim_info`
  MODIFY `pilgrim_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ticket_flight`
--
ALTER TABLE `ticket_flight`
  MODIFY `t_slno` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `visa_info`
--
ALTER TABLE `visa_info`
  MODIFY `visa_slno` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
