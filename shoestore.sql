-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 06:27 PM
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
-- Database: `shoestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc`
--

CREATE TABLE `acc` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc`
--

INSERT INTO `acc` (`id`, `name`, `password`, `email`, `admin`) VALUES
(57, 'admin', '123', 'fahis', 1),
(77, 'fahis', 'code0', '', 1),
(79, 'harry@den.com', 'code0', 'harry@den.com', 1),
(80, '', 'code0', 'harry@den.com', 0),
(81, 'adil', '123', 'adil', 0),
(82, 'ghfjh', '123', 'admin', 0),
(83, 'ghfjh', '123', 'admin', 0),
(84, 'ghfjh', '123', 'admin', 0),
(85, 'dfdgf', '123', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `nos` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`, `nos`) VALUES
(79, 25, 1),
(79, 20, 1),
(79, 19, 4),
(79, 18, 4),
(79, 21, 1),
(57, 19, 1),
(57, 18, 1),
(57, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(7) NOT NULL,
  `user_id` int(6) NOT NULL,
  `status` varchar(100) NOT NULL COMMENT '0-order placed\r\n1-shipped\r\n2-delivered\r\n3-cancelled',
  `address` text NOT NULL,
  `order_time` datetime NOT NULL,
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`products`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `status`, `address`, `order_time`, `products`) VALUES
(11, 57, '11', 'address test', '2022-11-01 02:39:43', '{\"18\":\"1\",\"19\":\"2\"}'),
(12, 57, '0', 'address test', '2022-11-01 08:34:06', '{\"19\":\"3\",\"20\":\"1\",\"18\":\"1\"}'),
(13, 81, '0', 'address test', '2022-11-01 08:41:29', '{\"19\":\"2\",\"20\":\"2\"}');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `bname` varchar(30) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `pdesc` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `offer` int(3) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `bname`, `pname`, `pdesc`, `price`, `offer`, `image`, `image2`, `image3`) VALUES
(18, 'adidas', 'Nite ball', 'IMPOSSIBLE-TO-MISS TRAINERS INSPIRED BY STREETBALL. More than a game. More than a hobby. Basketball is a lifestyle. These adidas shoes capture its essence with bold style, big energy and major presence. Wear them away from the blacktop to up your game with the reflective and futuristic details. Lightstrike cushioning keeps you light on your feet.', '12000.00', 6, 'nite.jpg', '', ''),
(19, 'adidas', 'nizza prides', 'COMFORTABLE CANVAS TRAINERS MADE IN HONOUR OF PRIDE. The 2022 adidas X Kris Andrew Small Pride Collection was inspired by the Stonewall Activists of the Stonewall Uprising in 1969. Together adidas and Kris Andrew Small offer a collection in solidarity & celebration of the LGBTQIA+ community\'s past & present, honouring unique belonging – creating a colourful & diverse graphic message among this inclusive & optimistic collection. This partnership is also adjacent to adidas\' two key Global Purpose Partners, Athlete Ally & Stonewall UK.  You carry your Pride with you every moment of every day. Which is why these adidas shoes reflect it with colour accents and graphic prints. Every step you take in the retro-yet-edgy style is a celebration of love, unity and LGBTQ+ communities.', '7000.00', 0, 'bb6cd82b78974b4a83b1ae060099c074_9366.webp', '', ''),
(20, 'adidas', 'forum mids', 'LUXE MID-CUT TRAINERS WITH HOOPS DNA. Let\'s take a moment to honour an icon. Is it the gravity-defying B-ball legend from the \'80s? Or perhaps the status shoe that adorned the feet of rappers? Both, in fact. The adidas Forum shoes have dominated the hardwood and the streets, and they\'re back in a mid top version to take your moves to the next level. Slip into the unmistakable style, now in luxurious coated leather, and flaunt that pure class.', '9999.00', 5, 'formmid.jpg', '', ''),
(21, 'Adidas', 'Streetball 2.0 shoes', '\'BASKETBALL-INSPIRED TRAINERS WITH REFLECTIVE DETAILS. Fade into the background? No thanks. Front and centre is way more fun. B-ball style walks right off the hardwood with the adidas Streetball 2.0 Shoes\' high-volume, high-energy look. A techy outsole puts just the right kind of cushioning exactly where you need it. This pair has reflective details to keep you shining, even when the lights go down.\'', '11999.00', 0, 'streetball.jpg', '', ''),
(22, 'adidas', 'ZX 22 BOOST SHOES', 'COMFORTABLE RUNNING-INSPIRED SHOES MADE IN PART WITH RECYCLED CONTENT. Clean, simple, comfortable. These juniors\' adidas shoes transform a running-inspired icon into sleek, comfortable trainers you can wear on any occasion. JET BOOST drop-ins on the EVA midsole provide extra energy return.', '11999.00', 0, 'z2 boost.webp', '', ''),
(23, 'adidas', 'ADIDAS 4DFWD PULSE SHOES', 'RUNNING SHOES WITH PRECISELY CODED CUSHIONING. Harness the power of adidas 4D for a smoother run every time the rubber meets the road. These adidas 4DFWD Pulse Shoes have a 3D-printed heel cradle that\'s precisely angled to guide your foot forward on every step and absorb impact so every run feels easier.', '9599.00', 0, '4wd.webp', '', ''),
(25, 'adidas', 'ADIDAS SUPERSTAR X LEGO® SHOES', 'ADIDAS X LEGO® BRAND PARTNERSHIP SHOES MADE IN PART WITH RECYCLED MATERIALS Every day the sun rises is a chance to create and play. So if you\'re ready to get started — go ahead and step out in these adidas Superstar shoes. Made in collaboration with the LEGO Group, they celebrate big dreams, creative self-expression and of course, LEGO® bricks. Colourful lace jewels that look just like little flowers decorate the clean upper, while the shell toe and 3-Stripes look iconic like the \'70s original.  Made with a series of recycled materials, this upper features at least 50% recycled content. This product represents just one of our solutions to help end plastic waste.', '10999.00', 0, 'd8e08d09ac8740cba495ae3201481c82_9366.webp', '', ''),
(26, 'adidas', 'SUPERSTAR SHOES', 'THE AUTHENTIC LOW TOP WITH THE SHELL TOE. Originally made for basketball courts in the \'70s. Celebrated by hip hop royalty in the \'80s. The adidas Superstar shoe is now a lifestyle staple for streetwear enthusiasts. The world-famous shell toe feature remains, providing style and protection. Just like it did on the B-ball courts back in the day.  Now, whether at a festival or walking in the street you can enjoy yourself without the fear of being stepped on.  The serrated 3-Stripes detail and adidas Superstar box logo adds OG authenticity to your look.', '7999.00', 0, '7ed0855435194229a525aad6009a0497_9366.webp', '', ''),
(27, 'adidas', 'HU NMD SHOES', 'NMD SHOES CREATED WITH PHARRELL WILLIAMS. Pairing vibrant colours with words that serve as reminders, musician and designer Pharrell Williams champions our fight for and alongside the community. These shoes rework the iconic NMD silhouette with text that stands out on the adidas Primeknit upper. Boost cushioning provides endless energy return and comfort with every step.', '21999.00', 0, 'd8e171b187c24648918aac2c001bc85c_9366.webp', '', ''),
(28, 'adidas', 'FORUM 84 LOW 8K SHOES', 'A BASKETBALL CLASSIC MADE IN PART WITH RECYCLED CONTENT. adidas Forum shoes make a big impression wherever they go. It\'s not just the iconic X detail or the padded ankle strap. It\'s the confident swagger that\'s been part of their vibe since they debuted on the hardwood in the \'80s. This version has a dip-dye upper that\'s bold, bright and guaranteed to turn heads.  Made in part with recycled content generated from production waste, e.g. cutting scraps, and post-consumer household waste to avoid the larger environmental impact of producing virgin content.', '18999.00', 0, 'Forum_84_Low_8K_Shoes_Purple_GZ6480_01_standard.jpg', '', ''),
(38, 'asd', '23ed', '', '0.00', 0, 'retropy.jpg', '', ''),
(40, 'ewsf', 'fe', 'ewf', '0.00', 0, '1.jpg', '3.jpg', '2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc`
--
ALTER TABLE `acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc`
--
ALTER TABLE `acc`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
