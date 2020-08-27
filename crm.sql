-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2019 at 11:05 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`Complaint_number`, `Customer_name`, `Contact_number`, `Product_code`, `Complaint_details`, `Complaint_type`, `Complaint_date`, `Complaint_status`, `Status_date`) VALUES
(293622, 'BOT', 2147483647, 'ASUSROG', 'service center not being helpful to customers', 'Service not rendered in time', '2019-01-15', 'Registered', '2019-01-29'),
(574386, 'Eagalaivan Ramamurthy', 2147483647, 'ASUSROG', 'OVER HEATING', 'Equipment malfunction', '2019-01-15', 'Registered', '2019-01-29');

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`Outlet_number`, `Outlet_type`, `Address1`, `Address2`, `City`, `Pincode`, `Contact_Number`) VALUES
(2099, 'Service', 'Shop No. 1, Plot No. 229, New Common Wealth Build,', 'Opp Shoppers Stop, Linking Road, Bandra West.', 'Mumbai', 400050, 26765651),
(2345, 'Sales', ' Simlim Square, 106-109, 1st Floor,', 'D.B. Marg, Lamington Road, Grant Road East.', 'Mumbai', 400007, 26765755),
(4534, 'Sales', '69/70, Ground Floor, S.P Road,', 'Opp To Amar Radio Corp.', 'Bangalore', 530088, 24587158),
(4577, 'Sales', ' Shop No 05, 1st Flr, Main Market, Block O,', 'Lajpat Nagar II, New Delhi.', 'Delhi', 110024, 29833398),
(4899, 'Service', 'Shop No 42 Pillar No. 188,', ' South Patel Nagar.', 'Delhi', 110055, 23477566),
(6588, 'Service', '27, Dr Rajkumar Road, Beside Planet Honda Service,', ' 4th N Block, Rajaji Nagar,', 'Bangalore', 530068, 26765759),
(7158, 'Sales', 'Shop No. G-12, 17, Nakoda Plaza,', 'Narasingapuram St, Mount Road, Chintadripet.', 'Chennai', 600002, 28587158),
(7899, 'Service', '18, Majestic Plaza,', '  Mount Rd,,Chintadripet.', 'Chennai', 600119, 28545758);

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_Code`, `Product_Name`, `Base_Price`, `Warranty_months`, `Launch_date`, `Battery_price`, `Svc_at_Client_Place`, `Addl_warranty_peryear`) VALUES
('ASUSROG', 'Asus ROG Strix GL503', 38000, 24, '2018-12-13', 1000, 1, 3000),
('EMPTY', 'EMPTY', 0, 0, '2019-01-01', 0, 0, 0),
('GigaAero', 'Gigabyte Aero 15X v8', 38000, 24, '2018-12-12', 3000, 1, 2000),
('MSI_GS', 'MSI GS65 Stealth Thin', 29769, 24, '2019-01-01', 2500, 1, 2500),
('RAZERBLADE', 'Razer Blade 15', 32000, 12, '2018-11-06', 3000, 0, 2000);

--
-- Dumping data for table `product_feature`
--

INSERT INTO `product_feature` (`Product_Code`, `Feature_No`, `Feature_desc`, `description`) VALUES
('', 0, '', ''),
('ASUSROG', 7070, 'CPU: Intel Core i7-7700HQ | GPU: Nvidia GeForce GTX 1070 | RAM: 16GB DDR4-2400MHz | Screen: 15.6-inch FHD (1,920 x 1,080) wide-view 144Hz with G-Sync | Storage: 256GB NVMe SSD, 1TB FireCuda SSHD | Battery: 64 Whr | Dimensions: 10.3 x 15.2 x 1.0 inches', 'Bigger body, better performance'),
('GigaAero', 8080, 'CPU: Intel Core i7-8750H | GPU: Nvidia GeForce GTX 1070 Max-Q | RAM: 16GB DDR4-2666MHz | Screen: 15.6-inch FHD (1,920 x 1,080) IPS 144Hz | Storage: 512GB SSD | Battery: 94 Whr | Dimensions: 9.8 x 14.0 x 0.74 inches | Weight: 4.49 lbs', 'Productivity powerhouse with longer battery life'),
('MSI_GS', 5050, 'CPU: Intel Core i7-8750H | GPU: Nvidia GeForce GTX 1070 Max-Q | RAM: 16GB DDR4-2400MHz | Screen: 15.6-inch FHD (1,920 x 1,080) wide-view 144Hz | Storage: 512GB M.2 SSD | Battery: 82 Whr | Dimensions: 9.75 x 14.08 x 0.69 inches | Weight: 4.14 lbs', 'Elegant. Portable. Powerful. The best gaming laptop you can buy'),
('RAZERBLADE', 6060, 'CPU: Intel Core i7-8750H | GPU: Nvidia GeForce GTX 1070 Max-Q | RAM: 16GB DDR4-2666MHz | Screen: 15.6-inch FHD (1,920 x 1,080) IPS 144Hz | Storage: 512GB SSD | Battery: 80 Whr | Dimensions: 9.25 x 13.98 x 0.68 inches | Weight: 4.63 lbs', 'Solid construction, slim body, elegant design');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
