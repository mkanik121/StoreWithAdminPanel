-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 05:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `CatName` varchar(256) NOT NULL,
  `Description` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `CatName`, `Description`, `Date`) VALUES
(35, 'Women\'s & Girls\' Fashions', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia enim, optio sed rem nam, quis adipisci ab doloribus delectus quia ipsam velit deleniti quo facere expedita ut. Facere maxime ex voluptatem dolores aspernatur amet fugit repellendus mollitia. Accusamus incidunt amet velit perspiciatis quae reprehenderit, dolorum distinctio est officiis. Laboriosam, assumenda', '2023-11-23'),
(36, 'Health & Beauty', '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia enim, optio sed rem nam, quis adipisci ab doloribus delectus quia ipsam velit deleniti quo facere expedita ut. Facere maxime ex voluptatem dolores aspernatur amet fugit repellendus mollitia. Accusamus incidunt amet velit perspiciatis quae reprehenderit, dolorum distinctio est officiis. Laboriosam, assumenda?\r\n', '2023-11-24'),
(38, 'Electronic Accessories', '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia enim, optio sed rem nam, quis adipisci ab doloribus delectus quia ipsam velit deleniti quo facere expedita ut. Facere maxime ex voluptatem dolores aspernatur amet fugit repellendus mollitia. Accusamus incidunt amet velit perspiciatis quae reprehenderit, dolorum distinctio est officiis. Laboriosam, assumenda?\r\n', '2023-11-19'),
(39, 'Home & Lifestyle', '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia enim, optio sed rem nam, quis adipisci ab doloribus delectus quia ipsam velit deleniti quo facere expedita ut. Facere maxime ex voluptatem dolores aspernatur amet fugit repellendus mollitia. Accusamus incidunt amet velit perspiciatis quae reprehenderit, dolorum distinctio est officiis. Laboriosam, assumenda?\r\n', '2023-11-30'),
(40, 'Sports & Outdoors', '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia enim, optio sed rem nam, quis adipisci ab doloribus delectus quia ipsam velit deleniti quo facere expedita ut. Facere maxime ex voluptatem dolores aspernatur amet fugit repellendus mollitia. Accusamus incidunt amet velit perspiciatis quae reprehenderit, dolorum distinctio est officiis. Laboriosam, assumenda?\r\n', '2023-12-01'),
(41, 'Automotive & Motorbike', '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia enim, optio sed rem nam, quis adipisci ab doloribus delectus quia ipsam velit deleniti quo facere expedita ut. Facere maxime ex voluptatem dolores aspernatur amet fugit repellendus mollitia. Accusamus incidunt amet velit perspiciatis quae reprehenderit, dolorum distinctio est officiis. Laboriosam, assumenda?\r\n', '2023-11-16'),
(44, 'Camera', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium recusandae molestias adipisci hic, eligendi veritatis ut ullam? Officiis voluptatum aspernatur dolorum, provident magni nesciunt dolorem, nobis explicabo minima nulla architecto.\r\n', '2024-03-20'),
(45, 'Shoes', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium recusandae molestias adipisci hic, eligendi veritatis ut ullam? Officiis voluptatum aspernatur dolorum, provident magni nesciunt dolorem, nobis explicabo minima nulla architecto.\r\n', '2024-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `PostId` int(11) NOT NULL,
  `Title` varchar(256) NOT NULL,
  `Description` text NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `AuthorId` int(11) NOT NULL,
  `Tag` varchar(256) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 2,
  `Image` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PostId`, `Title`, `Description`, `CategoryId`, `AuthorId`, `Tag`, `Status`, `Image`, `Date`) VALUES
(25, 'POsts', 'knkjbs', 38, 30, 'lknklns', 1, '296440_237b3a12ad96aa935902d3ea85ed2dff.jpg_750x750.jpg_.webp', '2023-11-08'),
(26, 'ass', 'fsfsfs', 36, 7, 'fsfs', 2, '142450_3cb2b25c784adc6f28c50beb485edc0c.jpg_750x750.jpg_.webp', '2023-11-08'),
(30, 'mkmkm', 'dsfsdfsd', 40, 37, 'mkmkmk', 1, '167009_1b3a6d2a3ce4cea14214ebc469c4b4b0.jpg_750x750.jpg_.webp', '2023-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductId` int(11) NOT NULL,
  `Title` varchar(256) NOT NULL,
  `Description` text NOT NULL,
  `ShortDesc` varchar(256) NOT NULL,
  `Price` varchar(256) NOT NULL,
  `DiscountPrice` varchar(256) DEFAULT NULL,
  `CuponCode` varchar(256) DEFAULT NULL,
  `ProductCategory` int(11) NOT NULL,
  `ProductPosted` int(111) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 2,
  `Quantity` int(111) NOT NULL,
  `Thumbnail` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductId`, `Title`, `Description`, `ShortDesc`, `Price`, `DiscountPrice`, `CuponCode`, `ProductCategory`, `ProductPosted`, `Status`, `Quantity`, `Thumbnail`, `Date`) VALUES
(9, 'New Collection Pakistani Laser cut Shalwar Kameez for women', 'Pakistani Laser cut 2 piece Kameez:\r\nMain Material:Cotton\r\nMacotton Laser cut body and laser cut sleeve Salwar-cotton\r\ncotton with beautiful embroidary\r\nBranded Dress\r\nExclusive original product\r\nEasy to wash\r\nOffered in various colours.\r\n{Wash Note} : Machine Wash Cold Gentle Cycle/Hand Wash In Cold Water', 'Product details of New Collection Pakistani Laser cut Shalwar Kameez for women', '380', '350', 'Eid30', 35, 26, 2, 40, '249379_c7c63cfc16222cae2e7900b360ecd858.jpg_750x750.jpg_.webp', '2023-11-07'),
(10, 'New Elegent Rayon Cotton embroidery work nayra cut readymade shalwar kameez 3 pice dress for girls', 'Ready-made Nayra Cut Gown\r\nRayon Cotton - Body\r\nSemi pure boutic - Orna\r\nSoft butter - Selowar\r\n100% Color Guarantee\r\nBody - 42/40\r\nLong - 45\r\nEmbroidery work.', 'Product details of New Elegent Rayon Cotton embroidery work nayra cut readymade shalwar kameez 3 pice dress for girls', '720', '', '', 35, 102, 1, 20, '38916_20c0bdade8f25b3c9bff82e9a3c132cb.jpg_750x750.jpg_.webp', '2023-11-07'),
(11, 'Menow Extreme Curl Mascara Two in one', 'A kind of mascara with stable quality, fast formation and no lump.Bind up the eyelashes evenly and safely without any irritation.Waterproof and make-up proof.Maintain make-up effect for a long time.', 'Product details of Menow Extreme Curl Mascara Two in one', '199', '', '', 36, 37, 2, 35, '57978_c0e8a6249b8a6a77e6aa84635ed7e486.jpg_750x750.jpg_.webp', '2023-11-07'),
(12, 'Monja 5Pcs/set Nail Art Dual End Dotting Pen Rhinestone Gem Jewelry Beads Sequins Pick Up Acrylic Gel Polish Polka Dot DIY Painting', 'Product details of Monja 5Pcs/set Nail Art Dual End Dotting Pen Rhinestone Gem Jewelry Beads Sequins Pick Up Acrylic Gel Polish', 'Brand Name: Monja\r\nItem Type: Dotting Tool\r\nSize: approx 18X9.5X0.8cm\r\nMaterial: Acrylic\r\nModel Number: SKU000311\r\nColor: 5 Randomly Color Grids handle\r\nUse for: Acrylic Crystal UV Gel Polish Painting Dotting\r\nSuit for: Professional manicure pedicure salon', '179', '150', 'Eid29', 36, 102, 2, 40, '424163_237b3a12ad96aa935902d3ea85ed2dff.jpg_750x750.jpg_.webp', '2023-11-07'),
(13, 'Logitech G435 LIGHTSPEED and Bluetooth Wireless Gaming Headset', 'Versatile: Logitech G435 is the first headset with LIGHTSPEED wireless and low latency Bluetooth connectivity, providing more freedom of play on PC, smartphones, Playstation gaming devices\r\nLightweight: With a lightweight construction, this Logitech headset weighs only 165 g, making it comfortable to wear all day long\r\nSuperior voice quality: Be heard loud and clear thanks to the built-in dual beamforming microphones that eliminate the need for a mic arm and reduce background noise\r\nImmersive sound: This cool and colourful headset delivers carefully balanced, high-fidelity audio with 40 mm drivers; compatibility with Dolby Atmos, Windows Sonic for a true surround sound experience\r\nLong battery life: No need to stop the game to recharge thanks to the wireless headset\'s 18 hours of battery life, allowing you to keep playing, talking to friends, and listening to music all day\r\nTotal comfort: G435 gaming headset fits a wide range of people but is designed for younger players with memory foam ear cushions and sizing for smaller head sizes of kids and teens\r\nMore sustainable: The plastic parts are made from a minimum 22% post-consumer recycled plastic, paper packaging comes from FSC-certified forests, G435 is certified CarbonNeutral\r\nSafer: An optional max volume limiter at less than 85 decibel can be activated to protect eardrums during extended use\r\nSystem Requirements: LIGHTSPEED: USB 2.0 port (type A port). PC with Windows® 10 or later, macOS® X 10.14 or later, PlayStation® 5, or PlayStation® 4 Low Latency Bluetooth®: Devices with Bluetooth audio connectivity', 'Product details of Logitech G435 LIGHTSPEED and Bluetooth Wireless Gaming Headset', '7,010', '1010', 'Eid1010', 38, 37, 2, 10, '42005_1cc4bade589edf0d6430ce72f48e7858.png_750x750.jpg_.webp', '2023-11-07'),
(14, 'A.Tech 2.0 Multimedia Computer Speaker Sp 016 - Microlab Speaker', 'Brand : A.tech\r\nModel : SP 016\r\nSpeaker : Multimedia Computer / Mobile Speaker\r\nInput Power: DC 5V;\r\nOutput Power: 0.5W(RMS);\r\nSpeaker Unit: 8;\r\nFrequency Response\r\nPower : AC Power\r\nProduct details of A.Tech 2.0 Multimedia Computer Speaker SP 016\r\nসম্মানিত কাস্টমার স্বল্প মূল্যের A.Tech স্পিকারের সাউন্ড কম হবে সাউন্ড কট লাগালে ছির ছির শব্দ হবে', 'Product details of A.Tech 2.0 Multimedia Computer Speaker Sp 016 - Microlab Speaker', '240', '', '', 38, 26, 2, 18, '459219_061e22bf35c50a458cde5684a51e2d67.jpg_750x750.jpg_.webp', '2023-11-07'),
(15, 'F&D F550X Bluetooth 2: 1 Speaker', 'Brand F&D\r\nModel F&D F550X\r\nType Bluetooth Speaker\r\nChannel 2:1\r\nConnectivity.Bluetooth\r\nUSB Port Yes\r\nRemote Control Yes\r\nBluetooth Range 15 Meters\r\nBluetooth Version Bluetooth 4.0\r\nRMS/Channel (Watt) 14W x 2\r\nRMS/Subwoofer (Watt) 28W\r\nOutput Power 56W\r\nFrequency (Hz - KHz) 130Hz - 20kHz (Satellite), 30Hz - 110Hz (Subwoofer)\r\nDriver Unit Tweeter: 3 Inch x 2, Woofer: 6.5 Inch\r\nMemory Card Slot Yes\r\nMemory Card Type SD Card\r\nPower Supply 120V/60Hz 0.8A\r\nFeatur eStandby, Source and Bluetooth button, Play/Pause/FM auto scan button, Previous/CH-, Next/CH+, Volume+/- button, Bluetooth operation range up to 15 meters\r\nOthers Innovative automatic multi-color LED, Bluetooth 4.0 version and supporting NFC function, Product qualified by SIG certification, Plug & play USB/SD card reader, Uninterrupted digital FM working on PLL technology, FM storage up to 100 stations, Fluorescence full function remote control', 'Product details of F&D F550X Bluetooth 2: 1 Speaker\r\n', '7,300', '1300', 'Eid1300', 38, 102, 1, 8, '313427_f697716c53335b3743eaf9aebc3f0d47.jpg_750x750.jpg_.webp', '2023-11-07'),
(16, 'Double King Size Bedsheet Cotton Blend Fabric Multicolor Print with two Pillow Covers', 'Product Type: Bed Sheet with Pillow Covers\r\nColor: Multicolor\r\nMain Material: Cotton Blend\r\nBed Sheet Size: 7 x 7.8 Feet\r\nPillow Cover Size:18 x 24 Inch\r\nDouble Size Bed Sheet\r\nBed Sheet with Matching 2 Pillow Covers.\r\nProduct color may slightly vary due to photographic lighting sources or your monitor settings.', 'Product details of Double King Size Bedsheet Cotton Blend Fabric Multicolor Print with two Pillow Covers', '373', '', '', 39, 30, 2, 44, '322591_3cb2b25c784adc6f28c50beb485edc0c.jpg_750x750.jpg_.webp', '2023-11-07'),
(17, '2 seater Turkey Elastic Sofa Cover maroon colour', 'High-quality fabric:Made of 95 polyester fiber + 5 spandex fabric, environmentally friendly, durable and fashionable.\r\n3. Protection:This protective cover protects your furniture from spills, stains, abrasion and damage to prevent it from being destroyed. This is great for families with children and pets, or for anyone looking for an economical furniture protection solution.\r\ncolour:Photo Color\r\nMaterial:Polyester fiber + spandex\r\nSize:FreeNote: Light and different displays may cause the color of the item in the picture a little different from the real thin.\r\n1. High-quality fabric:Made of 95 polyester fiber + 5 spandex fabric, environmentally friendly, durable and fashionable.\r\n3. Protection:This protective cover protects your furniture from spills, stains, abrasion and damage to prevent it from being destroyed. This is great for families with children and pets, or for anyone looking for an economical furniture protection solution.\r\nHigh-quality fabric:Made of 95 polyester fiber + 5 spandex fabric, environmentally friendly, durable and fashionable.\r\n3. Protection:This protective cover protects your furniture from spills, stains, abrasion and damage to prevent it from being destroyed. This is great for families with children and pets, or for anyone looking for an economical furniture protection solution.\r\ncolour:Photo Color\r\nMaterial:Polyester fiber + spandex\r\nSize:FreeNote: Light and different displays may cause the color of the item in the picture a little different from the real thin.\r\n1. High-quality fabric:Made of 95 polyester fiber + 5 spandex fabric, environmentally friendly, durable and fashionable.\r\n3. Protection:This protective cover protects your furniture from spills, stains, abrasion and damage to prevent it from being destroyed. This is great for families with children and pets, or for anyone looking for an economical furniture protection solution.', 'Product details of 2 seater Turkey Elastic Sofa Cover maroon colour', '1,089', '289', 'Eid289', 39, 30, 2, 30, '309956_1b3a6d2a3ce4cea14214ebc469c4b4b0.jpg_750x750.jpg_.webp', '2023-11-07'),
(18, 'T Table cover Turkey Sits Furniture Protective Elastic', 'High-quality fabric:Made of 95 polyester fiber + 5 spandex fabric, environmentally friendly, durable and fashionable.\r\n3. Protection:This protective cover protects your furniture from spills, stains, abrasion and damage to prevent it from being destroyed. This is great for families with children and pets, or for anyone looking for an economical furniture protection solution.\r\ncolour:Photo Color\r\nMaterial:Polyester fiber + spandex\r\nSize:FreeNote: Light and different displays may cause the color of the item in the picture a little different from the real thin\r\n1. High-quality fabric:Made of 95 polyester fiber + 5 spandex fabric, environmentally friendly, durable and fashionable.\r\n3. Protection:This protective cover protects your furniture from spills, stains, abrasion and damage to prevent it from being destroyed. This is great for families with children and pets, or for anyone looking for an economical furniture protection solution.\r\ncolour:Photo Color\r\nMaterial:Polyester fiber + spandex\r\nSize:FreeNote: Light and different displays may cause the color of the item in the picture a little different from the real thin', 'Product details of T Table cover Turkey Sits Furniture Protective Elastic', '580', '', '', 39, 26, 2, 80, '354310_2b46d8cf8128a559dc7dd688bf240438.jpg_750x750.jpg_.webp', '2023-11-07'),
(19, 'Motorized T600C Black Treadmill with Body Massager, Dumbbell Set', 'Installation Fee and Service Charge 1000 Taka for Inside Dhaka Only\r\nWith Electric Body Massager\r\nModel:ADVANTEK T600C\r\nMotor peak power: 2.5HP\r\nSpeed range: 14 KM/H\r\nLCD Screen Display blue screen: Time,speed,distance\r\nProgram : P1-P12 With MP3,USB,Handle Key\r\nAllowable Weight: 120Kg', 'Product details of Motorized T600C Black Treadmill with Body Massager, Dumbbell Set', '42,000', '4000', 'Eid4000', 40, 37, 2, 10, '8068_7fc2005caef47608c15eaafb80dc96c3.jpg_750x750.jpg_.webp', '2023-11-07'),
(20, 'QATAR-2022 world cup AL-RIHLA Top Non Stitched Football and Trend - Upscaled Quality', 'এটিআল রিহলা অফিশিয়াল ফুটবল । কাতার বিশ্বকাপ2022 এই বল দ্বারা খেলাহয়েছিলো । এটি অফিসিয়ালফুটবল । কাতার ফুটবলবিশ্বকাপ 2022 ফুটবলটি আঞ্চলিক PU উপাদান দিয়ে তৈরি এটি সম্পূর্ণরূপে সেলাইবিহীন (সেলাই ছাড়া) ফুটবলটিখুবই নরম যার জন্য পায়ে ব্যাথা পাওয়ার ঝুঁকি নেই বললেই চলে। ফুটবলটিপ্রিমিয়াম মানের এবং অফিসিয়াল সাইজ অনুযায়ী। ফুটবলটিরওজন : ৪২০ গ্রাম (বাতাস সহ) ফুটবলটিরসাইজ : 5 বি:দ্র: ফুটবলটির সাথে একটি ফুটবল এর পিন ফ্রিআছে ।', 'Product details of QATAR-2022 world cup AL-RIHLA Top Non Stitched Football and Trend - Upscaled Quality', '723', '', '', 40, 30, 2, 200, '401113_2f10556139f742172378e4297edc03da.jpg_750x750.jpg_.webp', '2023-11-07'),
(21, '3 pair Sports Arm Sleeves Breathable Sunscreen Ice Silk Arm', '--Made of polyester and so on, which is moisture wicking and elastic\r\n--It can improve the cycle in your joint and muscle and reduce the strain, tension, or even pain\r\n--With this sunshade arm cover on, your arms are away from the harmful UV rays and can keep cool\r\n--The black dots fly and fade into the upper part, bringing a dynamic feeling when you are exercising.\r\n--Suitable for men, women or children who likes football, basketball, tennis, cycling, baseball such sports', 'Product details of 3 pair Sports Arm Sleeves Breathable Sunscreen Ice Silk Arm', '260', '', '', 40, 37, 2, 155, '398976_b5b781b22697b53140a397d97ffe4340.jpg_750x750.jpg_.webp', '2023-11-07'),
(22, 'Motorcycle Universal Handlebar End Cap Plug', 'অনুগ্রহ করা অর্ডার করবার আগে বা পরে অবশ্যই ইনবক্স করা জানাবেন না হয় আমরা আমাদের স্টক এ যে কালোর বাসায় আমরা ওই তাই পাঠাবো', 'Product details of Motorcycle Universal Handlebar End Cap Plug', '200', '20', 'Eid20', 41, 26, 2, 70, '374767_aa38e6fc42aafa4ccef71afebc6f4209.jpg_750x750.jpg_.webp', '2023-11-07'),
(23, 'Leather Key Ring For Bikes Very Stylish', 'Very Stylish\r\nComfortable\r\nColor: Same As Picture\r\nHigh Quality Metal\r\nMaterial: Leather\r\n1x Screwdriver.\r\nBrand: Honda, Suzuki, Yamaha, Hero, Apache, Bajaj\r\nQuantity: 1 Pis\r\nSize: One-Size\r\nType: Anti-Lost\r\nColor: Same As Picture\r\nVery Stylish\r\nComfortable\r\nEasy To Use\r\nHigh Quality Metal\r\nMaterial: Leather\r\n1x Screwdriver.', 'Product details of Leather Key Ring For Bikes Very Stylish', '148', '', '', 41, 30, 2, 88, '4193_933c2ffa1e78b5ecfc48a3f64cf238db.jpg_750x750.jpg_.webp', '2023-11-07'),
(24, '7758 Motor Metal kit V2 Pump kit V2 all set with 775 Motor Metal Kit V2 and DC 775 Motor', '775 Motor Metal kit V2 | Pump kit V2 all set with 775 Motor | Metal Kit V2 and DC 775 Motor3D Pump Metal kit version 2 1P5m Shaft 1P1hp water Seal 1PRing Seal 1P2m Nut volt 3P2m Spork 2PNominal Voltage: 12VOperating Range: 6-14No Load RPM: 18000No Load Current: 2.80ARated RPM: 18000Rated Torque: 1046 g-cm / 103mN-mStall Current: 143.7AStall Torque: 8225 g-cm / 806mN-mShaft Type: RoundSize: 42.4 x 66 mmWeight: 350gShaft Diameter: 5 mmShaft Length: 19 mm\r\n3D Pump Metal kit version 2 1P 5m Shaft 1P 1hp water Seal 1P Ring Seal 1P 2m Nut volt 3P 2m Spork 2P Nominal Voltage: 12V Operating Range: 6-14 No Load RPM: 18000 No Load Current: 2.80A Rated RPM: 18000 Rated Torque: 1046 g-cm / 103mN-m Stall Current: 143.7A Stall Torque: 8225 g-cm / 806mN-m Shaft Type: Round Size: 42.4 x 66 mm', 'Product details of 775 Motor Metal kit V2 Pump kit V2 all set with 775 Motor Metal Kit V2 and DC 775 Motor', '1550', '1250', 'Eid300', 41, 26, 2, 5, '437472_4692fd30030dccb46f13720028437993.jpg_750x750.jpg_.webp', '2023-11-07'),
(28, 'F&D F550X Bluetooth 2: 1 Speaker', 'Brand F&D\r\nModel F&D F550X\r\nType Bluetooth Speaker\r\nChannel 2:1\r\nConnectivity.Bluetooth\r\nUSB Port Yes\r\nRemote Control Yes\r\nBluetooth Range 15 Meters\r\nBluetooth Version Bluetooth 4.0\r\nRMS/Channel (Watt) 14W x 2\r\nRMS/Subwoofer (Watt) 28W\r\nOutput Power 56W\r\nFrequency (Hz - KHz) 130Hz - 20kHz (Satellite), 30Hz - 110Hz (Subwoofer)\r\nDriver Unit Tweeter: 3 Inch x 2, Woofer: 6.5 Inch\r\nMemory Card Slot Yes\r\nMemory Card Type SD Card\r\nPower Supply 120V/60Hz 0.8A\r\nFeatur eStandby, Source and Bluetooth button, Play/Pause/FM auto scan button, Previous/CH-, Next/CH+, Volume+/- button, Bluetooth operation range up to 15 meters\r\nOthers Innovative automatic multi-color LED, Bluetooth 4.0 version and supporting NFC function, Product qualified by SIG certification, Plug & play USB/SD card reader, Uninterrupted digital FM working on PLL technology, FM storage up to 100 stations, Fluorescence full function remote control', 'Product details of F&D F550X Bluetooth 2: 1 Speaker\r\n', '7,300', '1300', 'Eid1300', 38, 102, 1, 8, '313427_f697716c53335b3743eaf9aebc3f0d47.jpg_750x750.jpg_.webp', '2023-11-07'),
(29, 'Double King Size Bedsheet Cotton Blend Fabric Multicolor Print with two Pillow Covers', 'Product Type: Bed Sheet with Pillow Covers\r\nColor: Multicolor\r\nMain Material: Cotton Blend\r\nBed Sheet Size: 7 x 7.8 Feet\r\nPillow Cover Size:18 x 24 Inch\r\nDouble Size Bed Sheet\r\nBed Sheet with Matching 2 Pillow Covers.\r\nProduct color may slightly vary due to photographic lighting sources or your monitor settings.', 'Product details of Double King Size Bedsheet Cotton Blend Fabric Multicolor Print with two Pillow Covers', '373', '', '', 39, 30, 2, 44, '322591_3cb2b25c784adc6f28c50beb485edc0c.jpg_750x750.jpg_.webp', '2023-11-07'),
(30, '2 seater Turkey Elastic Sofa Cover maroon colour', 'High-quality fabric:Made of 95 polyester fiber + 5 spandex fabric, environmentally friendly, durable and fashionable.\r\n3. Protection:This protective cover protects your furniture from spills, stains, abrasion and damage to prevent it from being destroyed. This is great for families with children and pets, or for anyone looking for an economical furniture protection solution.\r\ncolour:Photo Color\r\nMaterial:Polyester fiber + spandex\r\nSize:FreeNote: Light and different displays may cause the color of the item in the picture a little different from the real thin.\r\n1. High-quality fabric:Made of 95 polyester fiber + 5 spandex fabric, environmentally friendly, durable and fashionable.\r\n3. Protection:This protective cover protects your furniture from spills, stains, abrasion and damage to prevent it from being destroyed. This is great for families with children and pets, or for anyone looking for an economical furniture protection solution.\r\nHigh-quality fabric:Made of 95 polyester fiber + 5 spandex fabric, environmentally friendly, durable and fashionable.\r\n3. Protection:This protective cover protects your furniture from spills, stains, abrasion and damage to prevent it from being destroyed. This is great for families with children and pets, or for anyone looking for an economical furniture protection solution.\r\ncolour:Photo Color\r\nMaterial:Polyester fiber + spandex\r\nSize:FreeNote: Light and different displays may cause the color of the item in the picture a little different from the real thin.\r\n1. High-quality fabric:Made of 95 polyester fiber + 5 spandex fabric, environmentally friendly, durable and fashionable.\r\n3. Protection:This protective cover protects your furniture from spills, stains, abrasion and damage to prevent it from being destroyed. This is great for families with children and pets, or for anyone looking for an economical furniture protection solution.', 'Product details of 2 seater Turkey Elastic Sofa Cover maroon colour', '1,089', '289', 'Eid289', 39, 30, 2, 30, '309956_1b3a6d2a3ce4cea14214ebc469c4b4b0.jpg_750x750.jpg_.webp', '2023-11-07'),
(31, 'T Table cover Turkey Sits Furniture Protective Elastic', 'High-quality fabric:Made of 95 polyester fiber + 5 spandex fabric, environmentally friendly, durable and fashionable.\r\n3. Protection:This protective cover protects your furniture from spills, stains, abrasion and damage to prevent it from being destroyed. This is great for families with children and pets, or for anyone looking for an economical furniture protection solution.\r\ncolour:Photo Color\r\nMaterial:Polyester fiber + spandex\r\nSize:FreeNote: Light and different displays may cause the color of the item in the picture a little different from the real thin\r\n1. High-quality fabric:Made of 95 polyester fiber + 5 spandex fabric, environmentally friendly, durable and fashionable.\r\n3. Protection:This protective cover protects your furniture from spills, stains, abrasion and damage to prevent it from being destroyed. This is great for families with children and pets, or for anyone looking for an economical furniture protection solution.\r\ncolour:Photo Color\r\nMaterial:Polyester fiber + spandex\r\nSize:FreeNote: Light and different displays may cause the color of the item in the picture a little different from the real thin', 'Product details of T Table cover Turkey Sits Furniture Protective Elastic', '580', '', '', 39, 26, 2, 80, '354310_2b46d8cf8128a559dc7dd688bf240438.jpg_750x750.jpg_.webp', '2023-11-07'),
(32, 'Motorized T600C Black Treadmill with Body Massager, Dumbbell Set', 'Installation Fee and Service Charge 1000 Taka for Inside Dhaka Only\r\nWith Electric Body Massager\r\nModel:ADVANTEK T600C\r\nMotor peak power: 2.5HP\r\nSpeed range: 14 KM/H\r\nLCD Screen Display blue screen: Time,speed,distance\r\nProgram : P1-P12 With MP3,USB,Handle Key\r\nAllowable Weight: 120Kg', 'Product details of Motorized T600C Black Treadmill with Body Massager, Dumbbell Set', '42,000', '4000', 'Eid4000', 40, 37, 2, 10, '8068_7fc2005caef47608c15eaafb80dc96c3.jpg_750x750.jpg_.webp', '2023-11-07'),
(33, 'QATAR-2022 world cup AL-RIHLA Top Non Stitched Football and Trend - Upscaled Quality', 'এটিআল রিহলা অফিশিয়াল ফুটবল । কাতার বিশ্বকাপ2022 এই বল দ্বারা খেলাহয়েছিলো । এটি অফিসিয়ালফুটবল । কাতার ফুটবলবিশ্বকাপ 2022 ফুটবলটি আঞ্চলিক PU উপাদান দিয়ে তৈরি এটি সম্পূর্ণরূপে সেলাইবিহীন (সেলাই ছাড়া) ফুটবলটিখুবই নরম যার জন্য পায়ে ব্যাথা পাওয়ার ঝুঁকি নেই বললেই চলে। ফুটবলটিপ্রিমিয়াম মানের এবং অফিসিয়াল সাইজ অনুযায়ী। ফুটবলটিরওজন : ৪২০ গ্রাম (বাতাস সহ) ফুটবলটিরসাইজ : 5 বি:দ্র: ফুটবলটির সাথে একটি ফুটবল এর পিন ফ্রিআছে ।', 'Product details of QATAR-2022 world cup AL-RIHLA Top Non Stitched Football and Trend - Upscaled Quality', '723', '', '', 40, 30, 2, 200, '401113_2f10556139f742172378e4297edc03da.jpg_750x750.jpg_.webp', '2023-11-07'),
(34, '3 pair Sports Arm Sleeves Breathable Sunscreen Ice Silk Arm', '--Made of polyester and so on, which is moisture wicking and elastic\r\n--It can improve the cycle in your joint and muscle and reduce the strain, tension, or even pain\r\n--With this sunshade arm cover on, your arms are away from the harmful UV rays and can keep cool\r\n--The black dots fly and fade into the upper part, bringing a dynamic feeling when you are exercising.\r\n--Suitable for men, women or children who likes football, basketball, tennis, cycling, baseball such sports', 'Product details of 3 pair Sports Arm Sleeves Breathable Sunscreen Ice Silk Arm', '260', '', '', 40, 37, 2, 155, '398976_b5b781b22697b53140a397d97ffe4340.jpg_750x750.jpg_.webp', '2023-11-07'),
(35, 'Motorcycle Universal Handlebar End Cap Plug', 'অনুগ্রহ করা অর্ডার করবার আগে বা পরে অবশ্যই ইনবক্স করা জানাবেন না হয় আমরা আমাদের স্টক এ যে কালোর বাসায় আমরা ওই তাই পাঠাবো', 'Product details of Motorcycle Universal Handlebar End Cap Plug', '200', '20', 'Eid20', 41, 26, 2, 70, '374767_aa38e6fc42aafa4ccef71afebc6f4209.jpg_750x750.jpg_.webp', '2023-11-07'),
(36, 'Leather Key Ring For Bikes Very Stylish', 'Very Stylish\r\nComfortable\r\nColor: Same As Picture\r\nHigh Quality Metal\r\nMaterial: Leather\r\n1x Screwdriver.\r\nBrand: Honda, Suzuki, Yamaha, Hero, Apache, Bajaj\r\nQuantity: 1 Pis\r\nSize: One-Size\r\nType: Anti-Lost\r\nColor: Same As Picture\r\nVery Stylish\r\nComfortable\r\nEasy To Use\r\nHigh Quality Metal\r\nMaterial: Leather\r\n1x Screwdriver.', 'Product details of Leather Key Ring For Bikes Very Stylish', '148', '', '', 41, 30, 2, 88, '4193_933c2ffa1e78b5ecfc48a3f64cf238db.jpg_750x750.jpg_.webp', '2023-11-07'),
(37, '7758 Motor Metal kit V2 Pump kit V2 all set with 775 Motor Metal Kit V2 and DC 775 Motor', '775 Motor Metal kit V2 | Pump kit V2 all set with 775 Motor | Metal Kit V2 and DC 775 Motor3D Pump Metal kit version 2 1P5m Shaft 1P1hp water Seal 1PRing Seal 1P2m Nut volt 3P2m Spork 2PNominal Voltage: 12VOperating Range: 6-14No Load RPM: 18000No Load Current: 2.80ARated RPM: 18000Rated Torque: 1046 g-cm / 103mN-mStall Current: 143.7AStall Torque: 8225 g-cm / 806mN-mShaft Type: RoundSize: 42.4 x 66 mmWeight: 350gShaft Diameter: 5 mmShaft Length: 19 mm\r\n3D Pump Metal kit version 2 1P 5m Shaft 1P 1hp water Seal 1P Ring Seal 1P 2m Nut volt 3P 2m Spork 2P Nominal Voltage: 12V Operating Range: 6-14 No Load RPM: 18000 No Load Current: 2.80A Rated RPM: 18000 Rated Torque: 1046 g-cm / 103mN-m Stall Current: 143.7A Stall Torque: 8225 g-cm / 806mN-m Shaft Type: Round Size: 42.4 x 66 mm', 'Product details of 775 Motor Metal kit V2 Pump kit V2 all set with 775 Motor Metal Kit V2 and DC 775 Motor', '1550', '1250', 'Eid300', 41, 26, 2, 5, '437472_4692fd30030dccb46f13720028437993.jpg_750x750.jpg_.webp', '2023-11-07'),
(38, 'Motorized T600C Black Treadmill with Body Massager, Dumbbell Set', 'Installation Fee and Service Charge 1000 Taka for Inside Dhaka Only\r\nWith Electric Body Massager\r\nModel:ADVANTEK T600C\r\nMotor peak power: 2.5HP\r\nSpeed range: 14 KM/H\r\nLCD Screen Display blue screen: Time,speed,distance\r\nProgram : P1-P12 With MP3,USB,Handle Key\r\nAllowable Weight: 120Kg', 'Product details of Motorized T600C Black Treadmill with Body Massager, Dumbbell Set', '42,000', '4000', 'Eid4000', 40, 37, 2, 10, '8068_7fc2005caef47608c15eaafb80dc96c3.jpg_750x750.jpg_.webp', '2023-11-07'),
(39, 'QATAR-2022 world cup AL-RIHLA Top Non Stitched Football and Trend - Upscaled Quality', 'এটিআল রিহলা অফিশিয়াল ফুটবল । কাতার বিশ্বকাপ2022 এই বল দ্বারা খেলাহয়েছিলো । এটি অফিসিয়ালফুটবল । কাতার ফুটবলবিশ্বকাপ 2022 ফুটবলটি আঞ্চলিক PU উপাদান দিয়ে তৈরি এটি সম্পূর্ণরূপে সেলাইবিহীন (সেলাই ছাড়া) ফুটবলটিখুবই নরম যার জন্য পায়ে ব্যাথা পাওয়ার ঝুঁকি নেই বললেই চলে। ফুটবলটিপ্রিমিয়াম মানের এবং অফিসিয়াল সাইজ অনুযায়ী। ফুটবলটিরওজন : ৪২০ গ্রাম (বাতাস সহ) ফুটবলটিরসাইজ : 5 বি:দ্র: ফুটবলটির সাথে একটি ফুটবল এর পিন ফ্রিআছে ।', 'Product details of QATAR-2022 world cup AL-RIHLA Top Non Stitched Football and Trend - Upscaled Quality', '723', '', '', 40, 30, 2, 200, '401113_2f10556139f742172378e4297edc03da.jpg_750x750.jpg_.webp', '2023-11-07'),
(40, '3 pair Sports Arm Sleeves Breathable Sunscreen Ice Silk Arm', '--Made of polyester and so on, which is moisture wicking and elastic\r\n--It can improve the cycle in your joint and muscle and reduce the strain, tension, or even pain\r\n--With this sunshade arm cover on, your arms are away from the harmful UV rays and can keep cool\r\n--The black dots fly and fade into the upper part, bringing a dynamic feeling when you are exercising.\r\n--Suitable for men, women or children who likes football, basketball, tennis, cycling, baseball such sports', 'Product details of 3 pair Sports Arm Sleeves Breathable Sunscreen Ice Silk Arm', '260', '', '', 40, 37, 2, 155, '398976_b5b781b22697b53140a397d97ffe4340.jpg_750x750.jpg_.webp', '2023-11-07'),
(41, 'Motorcycle Universal Handlebar End Cap Plug', 'অনুগ্রহ করা অর্ডার করবার আগে বা পরে অবশ্যই ইনবক্স করা জানাবেন না হয় আমরা আমাদের স্টক এ যে কালোর বাসায় আমরা ওই তাই পাঠাবো', 'Product details of Motorcycle Universal Handlebar End Cap Plug', '200', '20', 'Eid20', 41, 26, 2, 70, '374767_aa38e6fc42aafa4ccef71afebc6f4209.jpg_750x750.jpg_.webp', '2023-11-07'),
(42, 'Leather Key Ring For Bikes Very Stylish', 'Very Stylish\r\nComfortable\r\nColor: Same As Picture\r\nHigh Quality Metal\r\nMaterial: Leather\r\n1x Screwdriver.\r\nBrand: Honda, Suzuki, Yamaha, Hero, Apache, Bajaj\r\nQuantity: 1 Pis\r\nSize: One-Size\r\nType: Anti-Lost\r\nColor: Same As Picture\r\nVery Stylish\r\nComfortable\r\nEasy To Use\r\nHigh Quality Metal\r\nMaterial: Leather\r\n1x Screwdriver.', 'Product details of Leather Key Ring For Bikes Very Stylish', '148', '', '', 41, 30, 2, 88, '4193_933c2ffa1e78b5ecfc48a3f64cf238db.jpg_750x750.jpg_.webp', '2023-11-07'),
(43, 'New Collection Pakistani Laser cut Shalwar Kameez for women', 'Pakistani Laser cut 2 piece Kameez:\r\nMain Material:Cotton\r\nMacotton Laser cut body and laser cut sleeve Salwar-cotton\r\ncotton with beautiful embroidary\r\nBranded Dress\r\nExclusive original product\r\nEasy to wash\r\nOffered in various colours.\r\n{Wash Note} : Machine Wash Cold Gentle Cycle/Hand Wash In Cold Water', 'Product details of New Collection Pakistani Laser cut Shalwar Kameez for women', '380', '350', 'Eid30', 35, 26, 2, 40, '249379_c7c63cfc16222cae2e7900b360ecd858.jpg_750x750.jpg_.webp', '2023-11-07'),
(44, 'New Elegent Rayon Cotton embroidery work nayra cut readymade shalwar kameez 3 pice dress for girls', 'Ready-made Nayra Cut Gown\r\nRayon Cotton - Body\r\nSemi pure boutic - Orna\r\nSoft butter - Selowar\r\n100% Color Guarantee\r\nBody - 42/40\r\nLong - 45\r\nEmbroidery work.', 'Product details of New Elegent Rayon Cotton embroidery work nayra cut readymade shalwar kameez 3 pice dress for girls', '720', '', '', 35, 102, 1, 20, '38916_20c0bdade8f25b3c9bff82e9a3c132cb.jpg_750x750.jpg_.webp', '2023-11-07'),
(45, 'Menow Extreme Curl Mascara Two in one', 'A kind of mascara with stable quality, fast formation and no lump.Bind up the eyelashes evenly and safely without any irritation.Waterproof and make-up proof.Maintain make-up effect for a long time.', 'Product details of Menow Extreme Curl Mascara Two in one', '199', '', '', 36, 37, 2, 35, '57978_c0e8a6249b8a6a77e6aa84635ed7e486.jpg_750x750.jpg_.webp', '2023-11-07'),
(46, 'Monja 5Pcs/set Nail Art Dual End Dotting Pen Rhinestone Gem Jewelry Beads Sequins Pick Up Acrylic Gel Polish Polka Dot DIY Painting', 'Product details of Monja 5Pcs/set Nail Art Dual End Dotting Pen Rhinestone Gem Jewelry Beads Sequins Pick Up Acrylic Gel Polish', 'Brand Name: Monja\r\nItem Type: Dotting Tool\r\nSize: approx 18X9.5X0.8cm\r\nMaterial: Acrylic\r\nModel Number: SKU000311\r\nColor: 5 Randomly Color Grids handle\r\nUse for: Acrylic Crystal UV Gel Polish Painting Dotting\r\nSuit for: Professional manicure pedicure salon', '179', '150', 'Eid29', 36, 102, 2, 40, '424163_237b3a12ad96aa935902d3ea85ed2dff.jpg_750x750.jpg_.webp', '2023-11-07'),
(47, 'Logitech G435 LIGHTSPEED and Bluetooth Wireless Gaming Headset', 'Versatile: Logitech G435 is the first headset with LIGHTSPEED wireless and low latency Bluetooth connectivity, providing more freedom of play on PC, smartphones, Playstation gaming devices\r\nLightweight: With a lightweight construction, this Logitech headset weighs only 165 g, making it comfortable to wear all day long\r\nSuperior voice quality: Be heard loud and clear thanks to the built-in dual beamforming microphones that eliminate the need for a mic arm and reduce background noise\r\nImmersive sound: This cool and colourful headset delivers carefully balanced, high-fidelity audio with 40 mm drivers; compatibility with Dolby Atmos, Windows Sonic for a true surround sound experience\r\nLong battery life: No need to stop the game to recharge thanks to the wireless headset\'s 18 hours of battery life, allowing you to keep playing, talking to friends, and listening to music all day\r\nTotal comfort: G435 gaming headset fits a wide range of people but is designed for younger players with memory foam ear cushions and sizing for smaller head sizes of kids and teens\r\nMore sustainable: The plastic parts are made from a minimum 22% post-consumer recycled plastic, paper packaging comes from FSC-certified forests, G435 is certified CarbonNeutral\r\nSafer: An optional max volume limiter at less than 85 decibel can be activated to protect eardrums during extended use\r\nSystem Requirements: LIGHTSPEED: USB 2.0 port (type A port). PC with Windows® 10 or later, macOS® X 10.14 or later, PlayStation® 5, or PlayStation® 4 Low Latency Bluetooth®: Devices with Bluetooth audio connectivity', 'Product details of Logitech G435 LIGHTSPEED and Bluetooth Wireless Gaming Headset', '7,010', '1010', 'Eid1010', 38, 37, 2, 10, '42005_1cc4bade589edf0d6430ce72f48e7858.png_750x750.jpg_.webp', '2023-11-07'),
(48, 'A.Tech 2.0 Multimedia Computer Speaker Sp 016 - Microlab Speaker', 'Brand : A.tech\r\nModel : SP 016\r\nSpeaker : Multimedia Computer / Mobile Speaker\r\nInput Power: DC 5V;\r\nOutput Power: 0.5W(RMS);\r\nSpeaker Unit: 8;\r\nFrequency Response\r\nPower : AC Power\r\nProduct details of A.Tech 2.0 Multimedia Computer Speaker SP 016\r\nসম্মানিত কাস্টমার স্বল্প মূল্যের A.Tech স্পিকারের সাউন্ড কম হবে সাউন্ড কট লাগালে ছির ছির শব্দ হবে', 'Product details of A.Tech 2.0 Multimedia Computer Speaker Sp 016 - Microlab Speaker', '240', '', '', 38, 26, 2, 18, '459219_061e22bf35c50a458cde5684a51e2d67.jpg_750x750.jpg_.webp', '2023-11-07'),
(49, 'Canon Eos 4000D 18MP 2.7inch Display With 18-55mm Lens Dslr Camera', 'Tell distinctive stories with your photography. This beginnerâ€™s DSLR with EF-S 18-55mm f/3.5-5.6 III Lens intuitively creates stand-out photos and Full HD movies full of colour and detail â€“ offering partial and full manual photographic control. The 18 Megapixel APS-C sensor allows you to shoot in low light, expressing your creativity with interchangeable lenses. Point and shoot with Scene Intelligent Auto and share your stories using the EOS 4000Dâ€™s Wi-Fi with the and Camera Connect app.\r\n\r\nShoot detailed images into the night with a large 18 Megapixel sensor, with up to 19x more surface area than many smartphones\r\n\r\nExperience the power of interchangeable lenses and capture high-quality shots of people and places with the EF-S 18-55mm f/3.5-5.6 III Lens\r\nInstantly review results on the user-friendly, 6.8 cm (2.7â€�) LCD screen\r\nEnjoy fast Auto Focus and full resolution shooting at 3.0 fps â€“ just point and shoot for impressive results with Scene Intelligent Auto\r\nTake fun-filled selfies and unique images from unusual angles with the remote control, then easily share to social media and irista cloud back up with Wi-FiÂ¹ and Canon Camera Connect app\r\nLearn as you shoot with Creative Auto mode, in-camera feature guide and Photo Companion app (Android and iOS)\r\nExpand your shooting options with an extensive range of interchangeable lenses and accessories\r\n\r\n03 Years Service Warranty (No parts warranty)', 'The latest price of Canon Eos 4000D Camera With 18-55mm Lens in Bangladesh is 40,000৳. You can buy the Canon Eos 4000D Camera With 18-55mm Lens at best price from our website or visit any of our showrooms.', '123.00', '123.00', '', 44, 37, 1, 40, '167186_product-1.jpg', '2024-03-18'),
(50, 'China Shoes for boys. Dj case shoes for men high quality & comfortable use soft.', 'Product details of China Shoes for boys. Dj case shoes for men high quality & comfortable use soft.\r\nUpper Material: Synthetic\r\nFeature: Hard-Wearing, Massage, Breathable, Anti-Odor, Sweat-Absorbant\r\nClosure Type: Lace-Up\r\nOutsole Material: Rubber\r\nLining Material: Mesh\r\nSeason: Summer\r\nInsole Material: EVA\r\nPattern Type: Mixed Colors\r\nFit: Fits smaller than usual. Please check this store\'s sizing info\r\nShoe Type: Basic\r\nDepartment Name: Adult\r\nItem Type: casual shoes', 'Specifications of China Shoes for boys. Dj case shoes for men high quality & comfortable use soft.\r\nBrandNo BrandSKU318393099_BD-1451645012Main MaterialRubber', '500', '500', '', 45, 37, 2, 250, '499830_product-4.jpg', '2024-03-18'),
(51, 'Fashionable Genji - Half Sleeve Women\'s Blue Long T-Shirt - Elevate Your Style with this Trendy Ladies\' Piece', 'Brand-colour q\r\nTypes- ladies t-shirt\r\nSize -free\r\nFebric-cotton\r\nColour -multicolor\r\nDiscover our collection of ladies\' t-shirts in various vibrant colors. Made with high-quality cotton fabric, these t-shirts offer utmost comfort and durability. The free size ensures a perfect fit for everyone. Whether you prefer a casual or trendy look, our multicolor options allow you to express your unique style. Upgrade your wardrobe with these versatile and stylish t-shirts that are perfect for any occasion.', 'Specifications of Fashionable Genji - Half Sleeve Women\'s Long T-Shirt - Elevate Your Style with this Trendy Ladies\' Piece\r\nBrandNo BrandSKU191048032_BD-1138229393Main MaterialCotton\r\nWhat’s in the box	Fashionable Genji - Half Sleeve Women\'s Long T-Shirt -', '10', '10', '', 35, 37, 2, 400, '82984_product-2.jpg', '2024-03-18'),
(52, 'Improvhome Traditional Table Lamps Red Color Shade Table Lamp with Black Metal Base for Decor for Living Room Bedroom House Bedside Nightstand Home Office Entryway Family - Regency Hill', 'About this item\r\nEach lamp uses a maximum 60 watt standard-medium base bulb (not included). On-off switches on sockets.\r\nA traditional, candlestick style lamp set. From the Regency Hill brand.\r\nOnly high-quality materials are adopted to ensure safety and durability of these vintage table lamps.\r\nTo save your time in looking for compatible bulbs, we pair the table lamps with two LED bulbs that are kinder to your eye and efficient with low consumption.\r\nPACKAGE CONTENT: 1 Lamp', '\r\nStyle	vintage,modern,rustic\r\nBrand	Improvhome\r\nColour	Black\r\nProduct Dimensions	10D x 8W x 14H Centimeters\r\nSpecial Feature	Durability\r\nLight Source Type	LED\r\nFinish Type	Polished\r\nMaterial	Metal\r\nLamp Type	Table Lamp\r\nRoom Type	Living Room', '45', '40', '', 38, 37, 2, 89, '212843_product-3.jpg', '2024-03-18'),
(53, 'DJI Mini 2 SE, Lightweight Mini Drone with QHD Video, 10km Max Video Transmission, 31-Min Flight Time, Under 249 g, Auto Return to Home, 3-Axis Gimbal Drone with EIS, Drone with Camera for Beginners', 'About this item\r\n𝗟𝗶𝗴𝗵𝘁𝘄𝗲𝗶𝗴𝗵𝘁 𝗮𝗻𝗱 𝗣𝗼𝗿𝘁𝗮𝗯𝗹𝗲 - The drone is lightweight and compact, weighing 𝗹𝗲𝘀𝘀 𝘁𝗵𝗮𝗻 𝟮𝟰𝟵 𝗴𝗿𝗮𝗺𝘀. It\'s perfect for taking on hikes, road trips, and other adventures, allowing you to capture stunning aerial moments from above wherever you go.\r\n𝗡𝗼 𝗥𝗲𝗴𝗶𝘀𝘁𝗿𝗮𝘁𝗶𝗼𝗻 𝗡𝗲𝗲𝗱𝗲𝗱 - Under 249 g, FAA Registration and Remote ID are not required if you fly for recreational purposes. Visit the FAA\'s official website for requirements related to drone registration and Remote ID.\r\n𝗘𝘅𝘁𝗲𝗻𝗱𝗲𝗱 𝗙𝗹𝗶𝗴𝗵𝘁 𝗧𝗶𝗺𝗲 - Enjoy longer flights with DJI Mini 2 SE, which offers a 31-min max flight time. Combo offers two additional Intelligent Flight Batteries (three in total) for up to 93 minutes of total flight time. Explore and create more.\r\n𝗝𝘂𝘀𝘁 𝗮 𝗙𝗲𝘄 𝗧𝗮𝗽𝘀 𝗳𝗼𝗿 𝗘𝗽𝗶𝗰 𝗜𝗺𝗮𝗴𝗶𝗻𝗴 - The DJI Fly app has easy-to-use shooting templates that allow the drone to automatically fly, record, and generate professional-level videos that can be shared directly on social media.\r\n𝗔𝗱𝘃𝗮𝗻𝗰𝗲𝗱 𝗧𝗿𝗮𝗻𝘀𝗺𝗶𝘀𝘀𝗶𝗼𝗻 𝗥𝗮𝗻𝗴𝗲 - Get a 𝟭𝟬𝗸𝗺 𝗺𝗮𝘅 𝘁𝗿𝗮𝗻𝘀𝗺𝗶𝘀𝘀𝗶𝗼𝗻 𝗿𝗮𝗻𝗴𝗲 to reliably fly further and capture more. Compared to Wi-Fi, DJI OcuSync is significantly stronger, offering enhanced transmission and stronger anti-interference compatibilities.\r\n𝟯𝟴𝗸𝗽𝗵 (𝗟𝗲𝘃𝗲𝗹 𝟱) 𝗪𝗶𝗻𝗱 𝗥𝗲𝘀𝗶𝘀𝘁𝗮𝗻𝗰𝗲 - DJI Mini 2 SE flies with reliable stability even in winds up to 38kph, letting you fly and capture content more reliably in more places.\r\n𝗕𝗲𝗴𝗶𝗻𝗻𝗲𝗿-𝗙𝗿𝗶𝗲𝗻𝗱𝗹𝘆 - With simplified operations, the drone is easy to learn and master quickly, making it ideal for beginners. It has a 𝗥𝗲𝘁𝘂𝗿𝗻 𝘁𝗼 𝗛𝗼𝗺𝗲 𝗳𝘂𝗻𝗰𝘁𝗶𝗼𝗻 𝗳𝗼𝗿 𝗮𝗱𝗱𝗲𝗱 𝘀𝗮𝗳𝗲𝘁𝘆, ensuring a worry-free flying experience.\r\nDue to platform compatibility issue, the DJI Fly app has been removed from Google Play. To ensure a better product usage experience, please log in to the DJI official website to download the latest version of DJI Fly.', 'Brand	DJI\r\nModel Name	MT2SD\r\nSpecial Feature	Beginner-Friendly, 10km Transmission Range, Wind Resistant, Lightweight, Foldable, Compact, One Button ReturnBeginner-Friendly, 10km Transmission Range, Wind Resistant, Lightweight, Foldable, Compact, One Button', '1800.00', '1720.00', '', 38, 37, 2, 10, '410628_product-5.jpg', '2024-03-18'),
(54, 'OLEVS 5866 Luxury Women’s Watches', 'OLEVS 5866 Luxury Women’s Watches\r\nFeatures: \r\n\r\n100% original brand new and high quality, this watch is very popular,\r\nThis stylish casual business style watch is of good quality, high quality workmanship, high quality and strong design is perfect,\r\nIs a friend, superior, father’s day, mother’s day, valentine’s day, business is the first choice for women with elegant features, suitable for any occasion\r\nMulti-function watch, waterproof, ultra-thin case design, rose gold case, stainless steel ceramic bracelet, bracelet can be freely adjusted size\r\nHigh quality, high strength mirror, high quality, durable, durable, good water resistance', 'Specification:\r\n\r\nBrand : OLEVS\r\nMovement: QUARTZ\r\nClasp Type: Push Button Hidden Clasp\r\nOrigin: CN(Origin)\r\nCase Material: Alloy\r\nWater Resistance Depth: 3Bar\r\nStyle: Fashion & Casual\r\nBand Width: 14mm\r\nCase Shape: Round\r\nCase Thickness: 8mm\r\nFeature: Com', '300.00', '300.00', '', 35, 37, 2, 45, '76936_product-6.jpg', '2024-03-18'),
(55, 'Ladies Shirt Le Stitching Fashion Leisure Ladies Blouse', 'Description:\r\nThe single-row button plket design makes it very easy to put on and take off. And the le stitching design makes it look very elegant and tamental.\r\nIts solid color and simple design make it suile for various ocns. Exquisite and professional workmanship makes this shirt very comforle and soft for you to wear.\r\nMade of cotton blend material, it is very comforle for you to wear.\r\nThere are five sizes for you to choose from: M, L, XL, 2XL, 3XL.\r\nIt is suile for going out, daily life, outdoor, casual and so on.\r\n\r\nItem Name: Shirt\r\nMaterial: Cotton Blend\r\nGender: Women\r\nStyle: Casual\r\nSeason: Spring\r\nFit Type: Loose\r\nSleeve: Long Sleeve\r\nCollar Type: Turn-down Collar\r\nFeatures: Solid Color, A-line, Le Stitching\r\nSize Details:\r\nSize: M, chest circumference: 96cm/37.8\", Sleeve: 58cm/22.8\", Length: 68cm/26.8\" (Approx.)\r\nSize: L, chest circumference: 100cm/39.4\", Sleeve: 58cm/22.8\", Length: 69cm/27.2\" (Approx.)\r\nSize: XL, chest circumference: 104cm/40.9\", Sleeve: 58cm/22.8\", Length: 70cm/27.6\"(Approx.)\r\nSize: 2XL, chest circumference: 108cm/42.5\", Sleeve: 59cm/23.2\", Length: 71cm/28\" (Approx.)\r\nSize: 3XL, chest circumference: 112cm/44.1\", Sleeve: 59cm/23.2\", Length: 72cm/28.3\" (Approx.)\r\n\r\ns:\r\nPlease refer to our size chart and choose the right size.\r\nDue to the light and screen setting difference, the item\'s color may be slightly different from the pictures.\r\n\r\nPkage Includes:\r\n1 x Shirt', 'Product details of Ladies Shirt Le Stitching Fashion Leisure Ladies Blouse\r\nIts solid color and simple design make it suile for various ocns. Exquisite and professional workmanship makes this shirt very comforle and soft for you to wear.\r\nFeaturing the exq', '110.00', '100.00', '', 35, 37, 2, 257, '487856_product-7.jpg', '2024-03-18'),
(56, 'Nivea Fresh Kick Shaving Foam (Germany)', 'Refreshing foam prepares the skin ideally for shaving with an extra kick of freshness\r\nCooling shaving foam formula with Mint Extracts, ISO -Magnesium and Vitamin Care for an extra kick of freshness\r\nProtects against micro cuts and irritations.', 'Delivery & Return\r\nSKU: 13846\r\nCategories: Shaving, Shaving cream, Foam & Gel\r\nTag: FMCG\r\nBrand: Nivea', '80', '65', '', 36, 37, 2, 88, '390126_product-8.jpg', '2024-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `SiteTitle` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Notice` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Facebook` varchar(255) DEFAULT NULL,
  `Google` varchar(255) DEFAULT NULL,
  `Youtube` varchar(255) DEFAULT NULL,
  `Linkedin` varchar(255) DEFAULT NULL,
  `Twitter` varchar(255) DEFAULT NULL,
  `Whatsapp` varchar(255) DEFAULT NULL,
  `HeaderLogo` varchar(255) DEFAULT NULL,
  `FooterLogo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `SiteTitle`, `Description`, `Phone`, `Email`, `Notice`, `Address`, `Facebook`, `Google`, `Youtube`, `Linkedin`, `Twitter`, `Whatsapp`, `HeaderLogo`, `FooterLogo`, `created_at`, `updated_at`) VALUES
(1, 'mk', 'No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor. Rebum tempor no vero est magna amet no', 123456789, 'info@example.com', 'All Rights Reserved. Designed by', '123 Street, New York, USA', 'sdfsf', 'sdfsdfsdf', 'sdfsdfsdfsdf', 'asd', 'asd', 'sd', '184607_Screenshot 2024-03-11 202055.png', '314450_Screenshot 2024-03-14 111134.png', '2024-02-21 14:32:03', '2024-02-04 10:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `FullName` varchar(256) NOT NULL,
  `UserName` varchar(256) NOT NULL,
  `About` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Mobile` int(15) NOT NULL,
  `Gender` int(11) DEFAULT 2,
  `Address` text NOT NULL,
  `Roll` int(11) NOT NULL DEFAULT 2,
  `Status` int(11) NOT NULL DEFAULT 2,
  `Image` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `FullName`, `UserName`, `About`, `Email`, `Password`, `Mobile`, `Gender`, `Address`, `Roll`, `Status`, `Image`, `Date`) VALUES
(7, 'Hasan Mia', 'Hasan', 'Web Design', 'hasan@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 2140000, 1, 'Nilokhi', 2, 1, '341750_G0KkMTNtzPokagZmqASkkfvtnvP.jpg', '2023-12-05'),
(26, 'Mahima', 'Surobi', 'digital marketer', 'mahima@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 16466, 2, 'Kombolpur', 2, 1, '99688_8CQKjtRqOVJNACXglliwONKSZWV.jpg', '2023-11-30'),
(30, 'Tania Akter', '', 'graphic designer', 'Tania@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 147826623, 2, 'Dhaka, Jatrabari', 2, 1, '112690_8ACxIYRthbITftOjMLdpEXFGrnI.jpg', '2023-10-25'),
(32, 'Rohan', 'rayhan', 'Web Design', 'Rohan@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 174906954, 1, 'Dhaka, sonirakrha', 1, 1, '385348_GCDRBuPkFsgjwbYoZcnrkbrqJiR.jpg', '2023-11-27'),
(33, 'Tarmin', 'modu', 'graphic designer', 'Modu@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 1369842014, 2, 'NoyaGaw', 2, 2, '229391_262905_GQygOIszgbTANqSImunsnNRRKIL.jpg', '2023-11-29'),
(34, 'Sinha Ahktar', 'Sinha', 'seo expert', 'sinha@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 1489632147, 2, 'NallaDokkin', 2, 2, '282583_G7yoNSElaUjkOSHDCvXtjfNANHO.jpg', '2023-11-30'),
(35, 'Yamin Alom', 'Yamin', 'digital marketer', 'yamin@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 147963201, 1, 'Noyagaw', 2, 1, '28020_G9UEdAXQreRvnbWTEEuTZFlVKDY.jpg', '2023-11-22'),
(37, 'Mk MANIK', 'MK', 'Web Developer', 'mkmanik@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 1949069546, 1, 'Dhaka, Jatrabari', 1, 1, '475015_80625_PicsArt_01-24-07.53.42.jpg', '2023-11-15'),
(102, 'Byzid Mia', 'Byzid', 'Web Design', 'byzid@gmail.com', '12345', 1620214785, 1, 'NoyaGaw', 2, 1, '484626_DSC_0183.JPG', '2023-10-30'),
(114, 'sfds', 'dsfdsf', 'dfdf', 'kk@gmail.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 666262, 2, 'sf', 2, 2, '233397_2b46d8cf8128a559dc7dd688bf240438.jpg_750x750.jpg_.webp', '2023-11-29'),
(115, 'salim', '', '', 'salim@gmail.com', 'fba9f1c9ae2a8afe7815c9cdd492512622a66302', 147856222, 2, '', 1, 1, '', '2023-11-09'),
(116, 'srfdsf', 'sdfsdf', '', 'd@gmail.com', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 151451, 2, '', 2, 1, '', '2023-11-09'),
(117, 'anik', 'Anik', '', 'anik@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 17896222, 1, '', 2, 2, '', '2023-11-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductId`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `PostId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
