-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 01:25 PM
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
--database creation.
CREATE DATABASE everything;

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@1234', 'admin@1234');

-- --------------------------------------------------------

--
-- Table structure for table `admin_category_add`
--

CREATE TABLE `admin_category_add` (
  `category_id` int(50) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_category_add`
--

INSERT INTO `admin_category_add` (`category_id`, `category_name`) VALUES
(1, 'Furniture'),
(4, 'House'),
(5, 'Electronic');

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `id` int(11) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `name` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `company` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`id`, `profile_pic`, `name`, `phone`, `email`, `company`) VALUES
(1, 'bahubali.jpg', 'Bahubali', '3456789', 'what@gmail.com', 'Everything');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(50) NOT NULL,
  `permission` int(3) NOT NULL,
  `Item_name` varchar(50) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `item_details` varchar(255) NOT NULL,
  `terms` text NOT NULL,
  `item_img` varchar(255) NOT NULL,
  `item_type` varchar(50) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `permission`, `Item_name`, `item_description`, `item_details`, `terms`, `item_img`, `item_type`, `user_id`) VALUES
(1, 1, 'Hyundai Vernaaaa2222', 'The price of Hyundai Verna starts at Rs. 10.90 Lakh and goes upto Rs. 17.38 Lakh. Hyundai Verna is offered in 14 variants - the base model of Verna is EX and the top variant Hyundai Verna SX Opt Turbo DCT DT which comes at a price tag of Rs. 17.38 Lakh.', 'ARAI Mileage : 20.6 kmpl,  Fuel Type : Petrol,  Engine Displacement (cc)1482,  No. of cylinder : 4,  Max Power (bhp@rpm) : 157.57bhp@5500rpm,   Max Torque (nm@rpm) : 253Nm@1500-3500rpm, Seating Capacity : 5, TransmissionType : Automatic, Body Type', 'The Hyundai Verna has always been a popular sedan. While it had its strengths, it also suffered from a few flaws which kept it from being an all-rounder. With this new generation Verna, Hyundai has worked hard to get rid of the flaws that plagued the car ', 'verna.avif', 'Vehicles', 72),
(4, 0, 'Hundai Verna ', 'The price of Hyundai Verna starts at Rs. 10.90 Lakh and goes upto Rs. 17.38 Lakh. Hyundai Verna is offered in 14 variants - the base model of Verna is EX and the top variant Hyundai Verna SX Opt Turbo DCT DT which comes at a price tag of Rs. 17.38 Lakh.', 'ARAI Mileage : 20.6 kmpl, \r\nFuel Type : Petrol, \r\nEngine Displacement (cc)1482, \r\nNo. of cylinder : 4, \r\nMax Power (bhp@rpm) : 157.57bhp@5500rpm,  \r\nMax Torque (nm@rpm) : 253Nm@1500-3500rpm,\r\nSeating Capacity : 5,\r\nTransmissionType : Automatic,\r\nBody Type', 'The Hyundai Verna has always been a popular sedan. While it had its strengths, it also suffered from a few flaws which kept it from being an all-rounder. With this new generation Verna, Hyundai has worked hard to get rid of the flaws that plagued the car ', 'verna.avif', 'Vehicles', 72),
(5, 1, 'Hundai Verna ', 'The price of Hyundai Verna starts at Rs. 10.90 Lakh and goes upto Rs. 17.38 Lakh. Hyundai Verna is offered in 14 variants - the base model of Verna is EX and the top variant Hyundai Verna SX Opt Turbo DCT DT which comes at a price tag of Rs. 17.38 Lakh.', 'ARAI Mileage : 20.6 kmpl, \r\nFuel Type : Petrol, \r\nEngine Displacement (cc)1482, \r\nNo. of cylinder : 4, \r\nMax Power (bhp@rpm) : 157.57bhp@5500rpm,  \r\nMax Torque (nm@rpm) : 253Nm@1500-3500rpm,\r\nSeating Capacity : 5,\r\nTransmissionType : Automatic,\r\nBody Type', 'The Hyundai Verna has always been a popular sedan. While it had its strengths, it also suffered from a few flaws which kept it from being an all-rounder. With this new generation Verna, Hyundai has worked hard to get rid of the flaws that plagued the car ', 'verna.avif', 'Vehicles', 72),
(6, 0, 'Hundai Verna ', 'The price of Hyundai Verna starts at Rs. 10.90 Lakh and goes upto Rs. 17.38 Lakh. Hyundai Verna is offered in 14 variants - the base model of Verna is EX and the top variant Hyundai Verna SX Opt Turbo DCT DT which comes at a price tag of Rs. 17.38 Lakh.', 'ARAI Mileage : 20.6 kmpl, \r\nFuel Type : Petrol, \r\nEngine Displacement (cc)1482, \r\nNo. of cylinder : 4, \r\nMax Power (bhp@rpm) : 157.57bhp@5500rpm,  \r\nMax Torque (nm@rpm) : 253Nm@1500-3500rpm,\r\nSeating Capacity : 5,\r\nTransmissionType : Automatic,\r\nBody Type', 'The Hyundai Verna has always been a popular sedan. While it had its strengths, it also suffered from a few flaws which kept it from being an all-rounder. With this new generation Verna, Hyundai has worked hard to get rid of the flaws that plagued the car ', 'verna.avif', 'Vehicles', 72),
(7, 1, 'Delux Sofaa', 'Sofa puarana hai 2018 me liya tha usko oiling krana pdhega,\r\n\r\nye dusri line hai jisme mene kuch nhi likhna hai', '3 sofa hai jisme 2 single seater or 1 tripple seater hai\r\nbrown color ka hai pure leather', 'saaf sutra rkjhna\r\nthoda sa bhi fata to mje lelunga aapke\r\nbaaki sab badhiya hai', 'sofa8.jpg', 'Furniture', 75),
(8, 1, 'Furniture', 'qwertyuioplkjhgfdsazxcvbnm', 'nbdshbcjweahdb,fwefefcwdecced\r\newdacds.cedfcewcdscsdv,sdcwsaedc', 'bvertyui.ertyuio.njiuhuvgcytdhy.ijbyugf6rtfiyug.', 'backiee-40854.jpg', 'Vehicles', 72),
(10, 1, 'Honda CT', 'Bike hai  bhot mst, kabhi bhi kahi bhi chala skte ho', '100cc, black color', 'abhi to nhi de skte pr baad me lelena.\r\njnwienfinijd.\r\nfvg', 'honda.jpg', 'Vehicles', 72),
(12, 0, 'Honda CT', 'qweffdwml', 'vbnm,.werfgv.efv,dswerfv,csw.efvcsw,', 'edffde.fswedfgvfds,wdfvbcdswertg.fdewasxcvhytr,ew.a', 'honda.jpg', 'Vehicles', 72),
(13, 0, 'Hundai Vernaaa', 'qwerthjk', 'wertyuisdfg', 'dfghjk', 'backiee-40854.jpg', 'Vehicles', 72),
(17, 0, 'Hyundai Vernaaaa2222', 'The price of Hyundai Verna starts at Rs. 10.90 Lakh and goes upto Rs. 17.38 Lakh. Hyundai Verna is offered in 14 variants - the base model of Verna is EX and the top variant Hyundai Verna SX Opt Turbo DCT DT which comes at a price tag of Rs. 17.38 Lakh.', 'ARAI Mileage : 20.6 kmpl,  Fuel Type : Petrol,  Engine Displacement (cc)1482,  No. of cylinder : 4,  Max Power (bhp@rpm) : 157.57bhp@5500rpm,   Max Torque (nm@rpm) : 253Nm@1500-3500rpm, Seating Capacity : 5, TransmissionType : Automatic, Body Type', 'The Hyundai Verna has always been a popular sedan. While it had its strengths, it also suffered from a few flaws which kept it from being an all-rounder. With this new generation Verna, Hyundai has worked hard to get rid of the flaws that plagued the car ', 'verna.avif', 'Vehicles', 72),
(18, 0, 'Hundai Verna ', 'The price of Hyundai Verna starts at Rs. 10.90 Lakh and goes upto Rs. 17.38 Lakh. Hyundai Verna is offered in 14 variants - the base model of Verna is EX and the top variant Hyundai Verna SX Opt Turbo DCT DT which comes at a price tag of Rs. 17.38 Lakh.', 'ARAI Mileage : 20.6 kmpl, \nFuel Type : Petrol, \nEngine Displacement (cc)1482, \nNo. of cylinder : 4, \nMax Power (bhp@rpm) : 157.57bhp@5500rpm,  \nMax Torque (nm@rpm) : 253Nm@1500-3500rpm,\nSeating Capacity : 5,\nTransmissionType : Automatic,\nBody Type', 'The Hyundai Verna has always been a popular sedan. While it had its strengths, it also suffered from a few flaws which kept it from being an all-rounder. With this new generation Verna, Hyundai has worked hard to get rid of the flaws that plagued the car ', 'verna.avif', 'Vehicles', 72),
(19, 0, 'Hundai Verna ', 'The price of Hyundai Verna starts at Rs. 10.90 Lakh and goes upto Rs. 17.38 Lakh. Hyundai Verna is offered in 14 variants - the base model of Verna is EX and the top variant Hyundai Verna SX Opt Turbo DCT DT which comes at a price tag of Rs. 17.38 Lakh.', 'ARAI Mileage : 20.6 kmpl, \r\nFuel Type : Petrol, \r\nEngine Displacement (cc)1482, \r\nNo. of cylinder : 4, \r\nMax Power (bhp@rpm) : 157.57bhp@5500rpm,  \r\nMax Torque (nm@rpm) : 253Nm@1500-3500rpm,\r\nSeating Capacity : 5,\r\nTransmissionType : Automatic,\r\nBody Type', 'The Hyundai Verna has always been a popular sedan. While it had its strengths, it also suffered from a few flaws which kept it from being an all-rounder. With this new generation Verna, Hyundai has worked hard to get rid of the flaws that plagued the car ', 'verna.avif', 'Vehicles', 72),
(20, 1, 'Hundai Verna ', 'The price of Hyundai Verna starts at Rs. 10.90 Lakh and goes upto Rs. 17.38 Lakh. Hyundai Verna is offered in 14 variants - the base model of Verna is EX and the top variant Hyundai Verna SX Opt Turbo DCT DT which comes at a price tag of Rs. 17.38 Lakh.', 'ARAI Mileage : 20.6 kmpl, \r\nFuel Type : Petrol, \r\nEngine Displacement (cc)1482, \r\nNo. of cylinder : 4, \r\nMax Power (bhp@rpm) : 157.57bhp@5500rpm,  \r\nMax Torque (nm@rpm) : 253Nm@1500-3500rpm,\r\nSeating Capacity : 5,\r\nTransmissionType : Automatic,\r\nBody Type', 'The Hyundai Verna has always been a popular sedan. While it had its strengths, it also suffered from a few flaws which kept it from being an all-rounder. With this new generation Verna, Hyundai has worked hard to get rid of the flaws that plagued the car ', 'verna.avif', 'Vehicles', 72),
(21, 0, 'Hundai Verna ', 'The price of Hyundai Verna starts at Rs. 10.90 Lakh and goes upto Rs. 17.38 Lakh. Hyundai Verna is offered in 14 variants - the base model of Verna is EX and the top variant Hyundai Verna SX Opt Turbo DCT DT which comes at a price tag of Rs. 17.38 Lakh.', 'ARAI Mileage : 20.6 kmpl, \r\nFuel Type : Petrol, \r\nEngine Displacement (cc)1482, \r\nNo. of cylinder : 4, \r\nMax Power (bhp@rpm) : 157.57bhp@5500rpm,  \r\nMax Torque (nm@rpm) : 253Nm@1500-3500rpm,\r\nSeating Capacity : 5,\r\nTransmissionType : Automatic,\r\nBody Type', 'The Hyundai Verna has always been a popular sedan. While it had its strengths, it also suffered from a few flaws which kept it from being an all-rounder. With this new generation Verna, Hyundai has worked hard to get rid of the flaws that plagued the car ', 'verna.avif', 'Vehicles', 72),
(22, 1, 'Delux Sofaa', 'Sofa puarana hai 2018 me liya tha usko oiling krana pdhega,\r\n\r\nye dusri line hai jisme mene kuch nhi likhna hai', '3 sofa hai jisme 2 single seater or 1 tripple seater hai\r\nbrown color ka hai pure leather', 'saaf sutra rkjhna\r\nthoda sa bhi fata to mje lelunga aapke\r\nbaaki sab badhiya hai', 'sofa8.jpg', 'Furniture', 75),
(23, 1, 'Furniture', 'qwertyuioplkjhgfdsazxcvbnm', 'nbdshbcjweahdb,fwefefcwdecced\r\newdacds.cedfcewcdscsdv,sdcwsaedc', 'bvertyui.ertyuio.njiuhuvgcytdhy.ijbyugf6rtfiyug.', 'backiee-40854.jpg', 'Vehicles', 72),
(24, 1, 'Honda CT', 'Bike hai  bhot mst, kabhi bhi kahi bhi chala skte ho', '100cc, black color', 'abhi to nhi de skte pr baad me lelena.\r\njnwienfinijd.\r\nfvg', 'honda.jpg', 'Vehicles', 72),
(25, 0, 'Honda CT', 'Bike hai  bhot mst, kabhi bhi kahi bhi chala skte ho', '100cc, black color', 'abhi to nhi de skte pr baad me lelena.\r\njnwienfinijd.\r\nfvg', 'honda.jpg', 'Vehicles', 72),
(26, 0, 'Honda CT', 'ertyui.gfds.gfds,htgfds.hgtfdsx,', 'wedfgbvc.wertghgfds.rgbvcxs,rtgfd.sertfghbv,cxswerfgv.c,xsfgbvcx', 'efgfds.gfrew,rtyh.nbvcx,swertg.hbvcx', 'honda.jpg', 'Vehicles', 72),
(27, 0, 'Honda CT', 'qweffdwml', 'vbnm,.werfgv.efv,dswerfv,csw.efvcsw,', 'edffde.fswedfgvfds,wdfvbcdswertg.fdewasxcvhytr,ew.a', 'honda.jpg', 'Vehicles', 72),
(28, 0, 'Hundai Vernaaa', 'qwerthjk', 'wertyuisdfg', 'dfghjk', 'backiee-40854.jpg', 'Vehicles', 72),
(29, 0, 'iwjnfeian', 'sdfghjk', 'dfghjkl', 'sdfghjkl', 'backiee-81564.jpg', 'House', 72),
(30, 0, 'Furniture', 'xfgchvjbkl', 'cfygvhbjkl;', 'cfghvjbknlm', 'backiee-81564.jpg', 'House', 72),
(31, 0, 'Furniture', 'nbvcxcfghj', 'kxcghjkl', 'cfghjkl', 'backiee-81564.jpg', 'House', 72),
(32, 0, 'fgvhb', 'hnm', 'nbm,', 'bnm,', '3d-rendering-loft-luxury-living-room-with-bookshelf-near-bookshelf.jpg', 'Furniture', 72),
(33, 1, 'House ', 'The base model of the house is perfect for a small family, with spacious rooms, modern amenities and a cozy atmosphere. The top variant, on the other hand, offers ample space for a large family, with enough bedrooms and bathrooms for everyone to have thei', 'Bedrooms: 4\r\nBathrooms: 3.5\r\nSquare footage: 3,000 sq ft\r\nLot size: 10,000 sq ft\r\nYear built: 2020\r\nArchitectural style: Modern contemporary', 'Renting a house comes with certain terms and conditions that both the landlord and the tenant must abide by. As a tenant, you will be required to pay rent on time, maintain the property, and follow the rules set forth by the landlord. ', '3d-rendering-loft-luxury-living-room-with-bookshelf-near-bookshelf.jpg', 'House', 72),
(34, 1, 'IPhone', 'The latest models, such as the iPhone 13, come with powerful A15 Bionic chipsets, up to 1TB of storage, and stunning OLED displays. The iPhone also boasts exceptional camera capabilities, with advanced features such as Night mode, Deep Fusion, and ProRAW ', 'Manufacturer: Apple Inc.\r\nModel: iPhone\r\nOperating System: iOS\r\nDisplay: OLED\r\nChipset: A15 Bionic\r\nStorage: Up to 1TB\r\nCamera: Dual-lens or triple-lens system with advanced features such as Night mode, Deep Fusion, and ProRAW\r\nFace ID: Facial recognition', ' The renter is required to pay the rent on or before the due date specified in the lease agreement. Failure to do so may result in late fees or other penalties. The renter is responsible for maintaining the property in a clean and tidy condition. Any repairs or maintenance issues should be reported to the landlord immediately. By following these terms and conditions, renters can ensure a positive and stress-free rental experience.', '3966823.jpg', 'Electronics', 72),
(35, 1, 'Yamaha mt 15', 'The Yamaha MT 15 V2 is a motorcycle that comes with a price tag ranging between Rs.1.65 to Rs. 1.69 Lakh.It is available in 2 variants and 6 colours.MT 15 V2 is powered by a 155 cc bs6 engine. It has Disc front brakes and Disc rear brakes.MT 15 V2 weigths', 'Mileage (City): 56.87 kmpl,\r\nDisplacement: 155 cc,\r\nEngine Type: Liquid cooled, 4-stroke, SOHC, 4-valve,\r\nNo. of Cylinders: 1,\r\nMax Power: 18.4 PS @ 10000 rpm,\r\nMax Torque: 14.1 Nm @ 7500 rpm,\r\nFront Brake: Disc,\r\nRear Brake: Disc,\r\nFuel Capacity: 10 L,\r\n', 'The renter is responsible for using the bike in a safe and responsible manner, and must comply with all traffic laws and regulations.The renter is required to pay the rental fee and any other fees or deposits specified in the rental agreement.', 'red-motor-biking-road.jpg', 'Electronics', 72),
(36, 1, 'HP MFP136W All-in-One Monochrome Laser Printer wit', 'The HP MFP136W All-in-One Laser Printer is perfect for small businesses and home users who need a high-quality printer that is both affordable and easy to use. This printer is powered by a 136-watt power supply and is equipped with a USB connection so you', 'Brand:HP,\r\nConnectivity:USB,\r\nConnectivity Features:\r\nUSB, Wireless, WIFI-Direct, Print with mobile, Ethernet.\r\n', 'Pay rents on time of products', 'woman-using-printer-office-work.jpg', 'Equipments', 72),
(37, 1, 'VJ Interior Office Sofa, VJ-1082', 'VJ Interior Office Sofa, VJ-1082 is a premium quality product from VJ Interior. Moglix is a well-known ecommerce platform for qualitative range of Office Furniture. All VJ Interior Office Sofa, VJ-1082 are manufactured by using quality assured material an', 'Brand:\r\nVJ Interior,\r\nAdjustable Height:\r\nYes,\r\nstructure\r\nPush Back', 'Rents shoulbe be paid at time', 'green-sofa-white-living-room-with-free-space.jpg', 'Furniture', 72);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `subject`, `message`, `user_id`) VALUES
(1, 'fghjk', 'fdsfsdf', 77),
(2, 'Abhi ', 'abhishek jaiswal', 77),
(3, 'Ammu', 'Ammu ka msg', 72),
(4, 'Amerendra bhaubali', 'qwertyuikjhgfds\r\nwdefv\r\nfrgfewq\r\n3rgfewq', 73);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `req_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `item_id` int(50) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `msg` varchar(255) NOT NULL,
  `status` int(3) NOT NULL,
  `request_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`req_id`, `user_id`, `item_id`, `startDate`, `endDate`, `msg`, `status`, `request_created_at`) VALUES
(2, 73, 1, '2023-04-21', '2023-05-21', '', 1, '0000-00-00 00:00:00'),
(3, 73, 1, '2023-04-21', '2023-05-21', 'Cjbsyatcdytaesgbf,.', 0, '2023-04-21 09:57:02'),
(4, 73, 7, '2023-04-21', '2023-06-21', '', 0, '2023-04-21 11:24:12'),
(7, 77, 5, '2023-04-28', '2023-05-28', '', 0, '2023-04-28 10:49:58'),
(8, 77, 7, '2023-04-29', '2023-06-28', '', 0, '2023-04-28 10:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_verif` int(3) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `doctype` varchar(20) DEFAULT NULL,
  `document` blob NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_verif`, `user_type`, `name`, `email`, `phone_number`, `address`, `doctype`, `document`, `state`, `city`, `zip_code`, `profile_pic`, `username`, `pwd`, `created_at`) VALUES
(70, 1, 'renter', 'Abhishek Jaiswal', 'abishjai03321@gmail.com', '8719831084', 'Indore', 'passport', 0x6261636b6965652d34303835342e6a7067, '', '', '', '', 'Abhay@123', 'd41d8cd98f00b204e9800998ecf8427e', '2023-04-03 10:17:53'),
(71, 0, 'provider', 'Abhishek Jaiswal', 'abishjai03321@gmail.com', '8719831084', 'bhawar kua', 'passport', 0x6261636b6965652d34313632382e6a7067, '', 'Indore', '   ', 'backiee-40854.jpg', 'Abhishek@123', '8371f69bdcc49cb926f09c9f4a061082', '2023-04-03 11:08:54'),
(72, 0, 'provider', 'Amarendra bahubali', 'admin0023@gmail.com', '+918749831084', '325, Satellite Colony', 'driver_license', '', 'MadhyaPradesh', 'Mahishmati', '452009', 'backiee-70359 (2).jpg', 'Ammu@123', '00da226cdceec5573791a8927244efc0', '2023-04-04 06:59:22'),
(73, 1, 'renter', 'Abhay Shekhar', 'abhay@gmail.com', '9876543214', 'qwerty palace', 'driver-license', 0x666f726d2e6a7067, 'MadhyaPradesh', 'Indore', '452009', 'KRISHAN.jpg', 'Abhay@321', '8250903c79ed92b8bdd0cead4d469313', '2023-04-10 09:50:09'),
(75, 0, 'provider', 'Abhay Bhayal', 'Abhay11@gmail.com', '9876543218', 'indore', 'driver-license', 0x6261636b6965652d3730333539202832292e6a7067, 'MadhyaPradesh', 'Jabalpur', '482001', 'a.jpg', 'Abhay@3321', 'b0ec2a8c52523b9bfda69e1435640226', '2023-04-10 12:03:27'),
(77, 1, 'renter', 'Abhishek Jaiswal', 'ab@gmail.com', '+91 8719831084', '425, Satellite Colony, Bijalpur', 'passport', 0x6261636b6965652d38313536342e6a7067, 'MP', 'Hyderabad', '452009', 'KRISHAN.jpg', 'Abhi@123', '8371f69bdcc49cb926f09c9f4a061082', '2023-04-15 12:22:16'),
(78, 0, 'provider', 'Salman Khan', 'Sallu@gmail.com', '987654523', 'Mumbai', 'driver_license', 0x7175697a2e706466, NULL, NULL, NULL, NULL, 'Sallu@123', 'dc59b3d3805022264d13669a80b7b8e5', '2023-04-28 02:29:18'),
(79, 1, 'renter', 'Shahrukh Khan', 'shah@gmail.com', '9876557898', 'Mumbai', 'passport', 0x6261636b6965652d34303835342e6a7067, NULL, NULL, NULL, NULL, 'Shah@123', '97c65772c3a6b4d2d66ce1292ae7f8a1', '2023-04-28 02:30:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_category_add`
--
ALTER TABLE `admin_category_add`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

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
-- AUTO_INCREMENT for table `admin_category_add`
--
ALTER TABLE `admin_category_add`
  MODIFY `category_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_profile`
--
ALTER TABLE `admin_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `req_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
