-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2016 at 01:27 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_lab_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `item_details` text NOT NULL,
  `price` bigint(200) NOT NULL,
  `unit` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `item_details`, `price`, `unit`) VALUES
(1, 'Black', 15000, 'Pices'),
(2, 'silver', 60000, 'Pices'),
(3, 'samsung mobile', 45000, 'Pices');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `ref_id_invoice` int(11) NOT NULL,
  `ref_item` varchar(200) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `unit_price` text NOT NULL,
  `unit_total` text NOT NULL,
  `unit` varchar(150) NOT NULL,
  `grandtotal` varchar(200) NOT NULL,
  `tax_percent` int(11) NOT NULL,
  `tax` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `ref_id_invoice`, `ref_item`, `qty`, `unit_price`, `unit_total`, `unit`, `grandtotal`, `tax_percent`, `tax`, `total`) VALUES
(4, 0, '0', '0', '0', '0', '', '0', 0, '0', '0'),
(5, 18, '1,2', '1,2', '15000,60000', '15000.00,120000.00', 'Pices,Pices', '135000.00', 10, '13500.00', '148500.00'),
(6, 19, '1', '1', '15000', '15000.00', 'Pices', '15000.00', 10, '1500.00', '16500.00'),
(7, 19, '2,1', '1,2', '60000,15000', '60000.00,30000.00', 'Pices,Pices', '90000.00', 10, '9000.00', '99000.00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_sales`
--

CREATE TABLE `invoice_sales` (
  `id` int(11) NOT NULL,
  `sales_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_sales`
--

INSERT INTO `invoice_sales` (`id`, `sales_date`) VALUES
(18, '2016/11/01'),
(19, '2016/11/02');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_name`) VALUES
(1, 'Samsung s4 mini'),
(2, 'hp core i5'),
(3, 'Samsung s7');

-- --------------------------------------------------------

--
-- Table structure for table `vat`
--

CREATE TABLE `vat` (
  `id` int(11) NOT NULL,
  `vat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vat`
--

INSERT INTO `vat` (`id`, `vat`) VALUES
(1, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_sales`
--
ALTER TABLE `invoice_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vat`
--
ALTER TABLE `vat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_sales`
--
ALTER TABLE `invoice_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `vat`
--
ALTER TABLE `vat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
