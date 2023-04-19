-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 02:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `everything`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(50) NOT NULL,
  `Item_name` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `item_details` varchar(255) NOT NULL,
  `terms` text NOT NULL,
  `item_img` varchar(255) NOT NULL,
  `item_type` varchar(50) DEFAULT NULL,
  `item` varchar(50) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `Item_name`, `item_description`, `item_details`, `terms`, `item_img`, `item_type`, `item`, `user_id`) VALUES
(1, 'Hundai Verna ', 'The price of Hyundai Verna starts at Rs. 10.90 Lakh and goes upto Rs. 17.38 Lakh. Hyundai Verna is offered in 14 variants - the base model of Verna is EX and the top variant Hyundai Verna SX Opt Turbo DCT DT which comes at a price tag of Rs. 17.38 Lakh.', 'ARAI Mileage : 20.6 kmpl, \nFuel Type : Petrol, \nEngine Displacement (cc)1482, \nNo. of cylinder : 4, \nMax Power (bhp@rpm) : 157.57bhp@5500rpm,  \nMax Torque (nm@rpm) : 253Nm@1500-3500rpm,\nSeating Capacity : 5,\nTransmissionType : Automatic,\nBody Type : Sedan', 'Rental Period:the rental period will be for 1 week.\r\nRental Price:the rental price for the week and the payment terms,will be 5000Rs and cards will be accepted.\r\nSecurity Deposit:the amount of security deposit required and the conditions under which it will be refunded.You have to pay 10,000Rs for that!.\r\nFuel: the car will be provided with a full tank of gas and the renter is responsible for refueling the car at the end of the rental period.\r\nReturn of the Car: the location and time for returning the car at the end of the rental period will be provided directly ,once you paid the expenses', 'verna.avif', 'Vehicles', 'Car', 72),
(3, 'Hundai Verna ', 'The price of Hyundai Verna starts at Rs. 10.90 Lakh and goes upto Rs. 17.38 Lakh. Hyundai Verna is offered in 14 variants - the base model of Verna is EX and the top variant Hyundai Verna SX Opt Turbo DCT DT which comes at a price tag of Rs. 17.38 Lakh.', 'ARAI Mileage : 20.6 kmpl, \r\nFuel Type : Petrol, \r\nEngine Displacement (cc)1482, \r\nNo. of cylinder : 4, \r\nMax Power (bhp@rpm) : 157.57bhp@5500rpm,  \r\nMax Torque (nm@rpm) : 253Nm@1500-3500rpm,\r\nSeating Capacity : 5,\r\nTransmissionType : Automatic,\r\nBody Type', 'The Hyundai Verna has always been a popular sedan. While it had its strengths, it also suffered from a few flaws which kept it from being an all-rounder. With this new generation Verna, Hyundai has worked hard to get rid of the flaws that plagued the car ', 'verna.avif', 'Vehicles', 'Car', 72),
(4, 'Hundai Verna ', 'The price of Hyundai Verna starts at Rs. 10.90 Lakh and goes upto Rs. 17.38 Lakh. Hyundai Verna is offered in 14 variants - the base model of Verna is EX and the top variant Hyundai Verna SX Opt Turbo DCT DT which comes at a price tag of Rs. 17.38 Lakh.', 'ARAI Mileage : 20.6 kmpl, \r\nFuel Type : Petrol, \r\nEngine Displacement (cc)1482, \r\nNo. of cylinder : 4, \r\nMax Power (bhp@rpm) : 157.57bhp@5500rpm,  \r\nMax Torque (nm@rpm) : 253Nm@1500-3500rpm,\r\nSeating Capacity : 5,\r\nTransmissionType : Automatic,\r\nBody Type', 'The Hyundai Verna has always been a popular sedan. While it had its strengths, it also suffered from a few flaws which kept it from being an all-rounder. With this new generation Verna, Hyundai has worked hard to get rid of the flaws that plagued the car ', 'verna.avif', 'Vehicles', 'Car', 72),
(5, 'Hundai Verna ', 'The price of Hyundai Verna starts at Rs. 10.90 Lakh and goes upto Rs. 17.38 Lakh. Hyundai Verna is offered in 14 variants - the base model of Verna is EX and the top variant Hyundai Verna SX Opt Turbo DCT DT which comes at a price tag of Rs. 17.38 Lakh.', 'ARAI Mileage : 20.6 kmpl, \r\nFuel Type : Petrol, \r\nEngine Displacement (cc)1482, \r\nNo. of cylinder : 4, \r\nMax Power (bhp@rpm) : 157.57bhp@5500rpm,  \r\nMax Torque (nm@rpm) : 253Nm@1500-3500rpm,\r\nSeating Capacity : 5,\r\nTransmissionType : Automatic,\r\nBody Type', 'The Hyundai Verna has always been a popular sedan. While it had its strengths, it also suffered from a few flaws which kept it from being an all-rounder. With this new generation Verna, Hyundai has worked hard to get rid of the flaws that plagued the car ', 'verna.avif', 'Vehicles', 'Car', 72),
(6, 'Hundai Verna ', 'The price of Hyundai Verna starts at Rs. 10.90 Lakh and goes upto Rs. 17.38 Lakh. Hyundai Verna is offered in 14 variants - the base model of Verna is EX and the top variant Hyundai Verna SX Opt Turbo DCT DT which comes at a price tag of Rs. 17.38 Lakh.', 'ARAI Mileage : 20.6 kmpl, \r\nFuel Type : Petrol, \r\nEngine Displacement (cc)1482, \r\nNo. of cylinder : 4, \r\nMax Power (bhp@rpm) : 157.57bhp@5500rpm,  \r\nMax Torque (nm@rpm) : 253Nm@1500-3500rpm,\r\nSeating Capacity : 5,\r\nTransmissionType : Automatic,\r\nBody Type', 'The Hyundai Verna has always been a popular sedan. While it had its strengths, it also suffered from a few flaws which kept it from being an all-rounder. With this new generation Verna, Hyundai has worked hard to get rid of the flaws that plagued the car ', 'verna.avif', 'Vehicles', 'Car', 72),
(7, 'Delux Sofa', 'Sofa puarana hai 2018 me liya tha usko oiling krana pdhega', '3 sofa hai jisme 2 single seater or 1 tripple seater hai\r\nbrown color ka hai pure leather', 'saaf sutra rkjhna\r\nthoda sa bhi fata to mje lelunga aapke', 'sofa8.jpg', 'Furniture', 'House', 75);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `doctype` varchar(20) DEFAULT NULL,
  `document` blob NOT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `name`, `email`, `phone_number`, `address`, `doctype`, `document`, `username`, `pwd`, `created_at`) VALUES
(70, 'renter', 'Abhishek Jaiswal', 'abishjai03321@gmail.com', '8719831084', 'Indore', 'passport', 0x6261636b6965652d34303835342e6a7067, 'Abhay@123', 'd41d8cd98f00b204e9800998ecf8427e', '2023-04-03 10:17:53'),
(71, 'provider', 'Abhishek Jaiswal', 'abishjai03321@gmail.com', '8719831084', 'indore', 'passport', 0x6261636b6965652d34313632382e6a7067, 'Abhishek@123', '8371f69bdcc49cb926f09c9f4a061082', '2023-04-03 11:08:54'),
(72, 'provider', 'Abhishek Jaiswal', 'admin0023@gmail.com', '+918749831084', '', '', '', 'Ammu@123', '00da226cdceec5573791a8927244efc0', '2023-04-04 06:59:22'),
(73, 'renter', 'Abhay Shekhar', 'abhay@gmail.com', '9876543214', 'qwertyuioplkjhgfdsazxcvbnm', 'driver-license', 0x666f726d2e6a7067, 'Abhay@321', '8250903c79ed92b8bdd0cead4d469313', '2023-04-10 09:50:09'),
(75, 'provider', 'Abhay Bhau', 'Abhay11@gmail.com', '9876543218', 'indore', 'driver-license', 0x6261636b6965652d3730333539202832292e6a7067, 'Abhay@3321', 'b0ec2a8c52523b9bfda69e1435640226', '2023-04-10 12:03:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
