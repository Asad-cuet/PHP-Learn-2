-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2021 at 12:05 AM
-- Server version: 5.7.35
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookcell_book_cellar`
--

-- --------------------------------------------------------

--
-- Table structure for table `bin`
--

CREATE TABLE `bin` (
  `Serial` int(255) NOT NULL,
  `Order_id` int(255) NOT NULL,
  `Item` int(255) NOT NULL,
  `Book_id` text NOT NULL,
  `Quantity` text NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Customer_name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Cell` text NOT NULL,
  `Address` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bin`
--

INSERT INTO `bin` (`Serial`, `Order_id`, `Item`, `Book_id`, `Quantity`, `Price`, `Customer_name`, `Email`, `Cell`, `Address`, `Time`) VALUES
(3, 35, 1, '11', '1', '150', 'Not Free', 'Asad3', '', '...', '...');

-- --------------------------------------------------------

--
-- Table structure for table `Book_info`
--

CREATE TABLE `Book_info` (
  `Book_id` int(255) NOT NULL,
  `Book_picture` varchar(255) NOT NULL,
  `Book_title` varchar(255) NOT NULL,
  `Book_author` varchar(255) DEFAULT NULL,
  `Published` text NOT NULL,
  `Price` text NOT NULL,
  `Discount` text NOT NULL,
  `F_price` int(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Available` varchar(255) NOT NULL,
  `Ordered` int(255) NOT NULL,
  `Company_name` text,
  `Delivery_charge` text,
  `Rating` text,
  `Keyword` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Book_info`
--

INSERT INTO `Book_info` (`Book_id`, `Book_picture`, `Book_title`, `Book_author`, `Published`, `Price`, `Discount`, `F_price`, `Category`, `Available`, `Ordered`, `Company_name`, `Delivery_charge`, `Rating`, `Keyword`) VALUES
(5, '../default.jpg', 'à¦¤à¦¥à§à¦¯ à¦“ à¦¯à§‹à¦—à¦¾à¦¯à§‹à¦— à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿', 'à¦…à¦•à§à¦·à¦° à¦ªà¦¤à§à¦° ', '2021', '230', '5', 219, '26', 'Yes', 9, '', '1', '', 'à¦¤à¦¥à§à¦¯ à¦“ à¦¯à§‹à¦—à¦¾à¦¯à§‹à¦— à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿ à¦…à¦•à§à¦·à¦° à¦ªà¦¤à§à¦° 2021 230(-5%) 219 College Common Ict college book'),
(6, '../default.jpg', 'Physics 2nd paper', 'à¦¶à¦¾à¦¹à¦œà¦¾à¦¹à¦¾à¦¨ à¦¤à¦ªà¦¨', '2021', '350', '10', 315, '23', 'Yes', 8, '', '1', '5', 'Physics 2nd paper à¦¶à¦¾à¦¹à¦œà¦¾à¦¹à¦¾à¦¨ à¦¤à¦ªà¦¨ 2021 350(-10%) 315 College science shahjahan topon shahjahan tapan college book'),
(10, '../default.jpg', 'Chemistry 1st Paper', 'à¦¹à¦¾à¦œà§‡à¦°à¦¿ à¦¨à¦¾à¦—', '2021', '230', '10', 207, '23', 'Yes', 13, '', '2', '5', 'Chemistry 1st Paper à¦¹à¦¾à¦œà§‡à¦°à¦¿ à¦¨à¦¾à¦— 2021 230(-10%) 207 College science hajeri nag hazeri nag college book'),
(11, '60d8d763043d4g.jpg', 'Good to Great', 'Jim Collins', '2001', '200', '25', 150, '35', 'Yes', 13, '', '1', '', 'Good to great venture Good to Great	Jim Collins	2001	200(-25%)	150	English Non-Fiction'),
(12, '60d8db2188e43think like a monk.jpg', 'Think Like a Monk', 'Jay Shetty', '2020', '230', '30', 161, '35', 'Yes', 0, '', '2', '5', 'Jay shetty, Joy, Motivational book, New book,'),
(13, '../default.jpg', 'The Speed Reading Book', 'Tony Buzman', '2000', '200', '25', 150, '35', 'Yes', 0, '', '2', '', 'The Speed Reading Book	Tony Buzman	2000	200(-25%)	150	English Non-Fiction'),
(21, '../default.jpg', 'The Alchemist', 'Paulo Coelho', '1988', '150', '20', 120, '34', 'Yes', 0, '', '1', '3.9 Goodreads', 'The Alchemist Paulo Coelho 1988 150 20  '),
(22, '../default.jpg', 'Winner Stands Alone', 'Paulo Coelho', '2008', '150', '20', 120, '34', 'Yes', 0, '', '1', '3.4 (Goodreads)', 'Winner Stands Alone Paulo Coelho 2008 150 20  '),
(23, '../default.jpg', 'Eleven Minutes', 'Paulo Coelho', '2003', '200', '30', 140, '34', 'Yes', 0, '', '1', '3.7', 'Eleven Minutes Paulo Coelho 2003 200 30  '),
(24, '../default.jpg', 'The Zahir', 'Paulo Coelho', '2005', '400', '20', 320, '34', 'Yes', 0, '', '2', '', 'The Zahir Paulo Coelho 2005 400 20  '),
(25, '../default.jpg', 'The Devil and Miss Prym', 'Paylo Coelho', '2000', '600', '40', 360, '34', 'Yes', 0, '', '1', '3.6/5', 'The Devil and Miss Prym Paylo Coelho 2000 600 40  '),
(26, '../default.jpg', 'The Pilgrimage', 'Paulo Coelho', '1987', '245', '20', 196, '34', 'Yes', 0, '', '1', '3.6 (Goodreads)', 'The Pilgrimage Paulo Coelho 1987 245 20  '),
(27, '../default.jpg', 'The Witch of Portobello', 'Paulo Coelho', '2006', '360', '30', 252, '34', 'Yes', 0, '', '1', '', 'The Witch of Portobello Paulo Coelho 2006 360 30  '),
(28, '../default.jpg', 'Adultery', 'Paulo Coelho', '2014', '250', '30', 175, '34', 'Yes', 0, '', '1', '3.1', 'Adultery Paulo Coelho 2014 250 30  '),
(29, '../default.jpg', 'The Stranger', 'Albert Camus', '1942', '250', '30', 175, '34', 'Yes', 0, '', '1', '4', 'The Stranger Albert Camus 1942 250 30  '),
(30, '../default.jpg', 'To Kill a Mockingbird', 'Harper Lee', '1960', '250', '25', 188, '34', 'Yes', 0, '', '1', '4.3/5', 'To Kill a Mockingbird Harper Lee 1960 250 25  '),
(31, '../default.jpg', 'The Silent Widow', 'Sidney Sheldon', '2018', '250', '20', 200, '34', 'Yes', 0, '', '1', '', 'The Silent Widow Sidney Sheldon 2018 250 20  '),
(32, '../default.jpg', 'Who Moved My Cheese? (An Amazing Way to Deal with Change in Your Work and in Your Life)', 'Dr. Spencer Johnson', '1998', '200', '27', 146, '35', 'Yes', 0, '', '1', '3.8 (Goodreads)', 'Motivational books Who Moved My Cheese? (An Amazing Way to Deal with Change in Your Work and in Your Life)	Dr. Spencer Johnson	1998	200(-27%)	146	English Non-Fiction'),
(33, '../default.jpg', 'Train to Pakistan', 'Khushwant Singh', '1956', '250', '30', 175, '34', 'Yes', 0, '', '1', '', 'Train to Pakistan Khushwant Singh 1956 250 30  '),
(34, '../default.jpg', 'World\'s Greatest Short Stories', '', 'N/A', '400', '40', 240, '34', 'Yes', 0, '', '2', '', 'World\'s Greatest Short Stories		N/A	400(-40%)	240	English Novels'),
(35, '../default.jpg', 'White Mughals: Love and Betrayal in Eighteenth-Century India  ', 'William Dalrymple', '2002', '400', '25', 300, '35', 'Yes', 0, '', '1', '3.9', 'History White Mughals: Love and Betrayal in Eighteenth-Century India	William Dalrymple	2002	400(-25%)	300	English Non-Fiction'),
(36, '../default.jpg', 'The Tipping Point ', 'Malcolm Gladwell', '2000', '250', '35', 163, '35', 'Yes', 0, '', '1', '', 'Psychology The Tipping Point	Malcolm Gladwell	2000	250(-35%)	163	English Non-Fiction'),
(37, '../default.jpg', 'You Can Win: A step by step tool for top achievers ', 'Shiv Khera', '1998', '250', '42', 145, '35', 'Yes', 0, '', '1', '', 'Motivational You Can Win: A step by step tool for top achievers	Shiv Khera	1998	250(-42%)	145	English Non-Fiction'),
(38, '../default.jpg', 'Think and Grow Rich', 'Napoleon Hill', '1937', '250', '30', 175, '35', 'Yes', 0, '', '1', '', 'Self-development Think and Grow Rich	Napoleon Hill	1937	250(-30%)	175	English Non-Fiction'),
(39, '../default.jpg', 'The Shining ', 'Stephen King', '1977', '290', '25', 218, '34', 'Yes', 0, '', '1', '', 'The Shining  Stephen King 1977 290 25 '),
(40, '../default.jpg', 'The White Tiger: A Novel By Aravind Adiga', 'Aravind Adiga', '2008', '400', '40', 240, '34', 'Yes', 0, '', '1', '', 'The White Tiger: A Novel By Aravind Adiga Aravind Adiga 2008 400 40 '),
(41, '../default.jpg', 'One Indian Girl', 'Chetan Bhagat', '2016', '350', '25', 263, '34', 'Yes', 0, '', '1', '3.3', 'One Indian Girl Chetan Bhagat 2016 350 25 '),
(42, '../default.jpg', 'Half Girlfriend', 'Chetan Bhagat', '2014', '200', '25', 150, '34', 'Yes', 0, '', '1', '200', 'Half Girlfriend Chetan Bhagat 2014 200 25 '),
(43, '../default.jpg', 'Who Will Cry When You Die? ', ' Robin Sharma', '1999', '300', '30', 210, '35', 'Yes', 0, '', '1', '4 (Goodreads)', 'Who Will Cry When You Die?   Robin Sharma 1999 300 30 '),
(44, '../default.jpg', 'Five Point Someone ', ' Chetan Bhagat', '2004', '200', '27', 146, '34', 'Yes', 0, '', '1', '3.4/5', 'Five Point Someone   Chetan Bhagat 2004 200 27 '),
(45, '../default.jpg', 'One Arranged Murder ', 'Chetan Bhagat', '2018', '300', '35', 195, '34', 'Yes', 0, '', '1', '3.6/5', 'One Arranged Murder  Chetan Bhagat 2018 300 35 '),
(46, '../default.jpg', 'One Night @ The Call Center ', 'Chetan Bhagat', '2005', '200', '20', 160, '34', 'Yes', 0, '', '1', '', 'One Night @ The Call Center  Chetan Bhagat 2005 200 20 '),
(47, '../default.jpg', 'Revolution 2020', 'Chetan Bhagat', '2011', '200', '30', 140, '34', 'Yes', 0, '', '1', '', 'Revolution 2020 Chetan Bhagat 2011 200 30 '),
(48, '../default.jpg', 'The 3 Mistakes Of My Life ', 'Chetan Bhagat', '2005', '200', '30', 140, '34', 'Yes', 0, '', '1', '', 'The 3 Mistakes Of My Life  Chetan Bhagat 2005 200 30 '),
(49, '../default.jpg', 'The Girl In Room 105 ', 'Chetan Bhagat', '2018', '300', '30', 210, '34', 'Yes', 0, '', '1', '', 'The Girl In Room 105  Chetan Bhagat 2018 300 30 '),
(50, '../default.jpg', 'Inferno', 'Dan Brown', '2013', '250', '30', 175, '34', 'Yes', 0, '', '1', '', 'Thriller Inferno	Dan Brown	2013	250(-30%)	175	English Novels'),
(51, '../default.jpg', 'Origin', 'Dan Brown', '2017', '300', '35', 195, '34', 'Yes', 0, '', '1', '3.9', 'Origin Dan Brown 2017 300 35 '),
(52, '../default.jpg', 'Deception Point', 'Dan Brown', '2001', '250', '30', 175, '34', 'Yes', 0, '', '1', '', 'Deception Point Dan Brown 2001 250 30 '),
(53, '../default.jpg', 'Digital Fortress', 'Dan Brown', '1998', '250', '25', 188, '34', 'Yes', 0, '', '1', '', 'Digital Fortress Dan Brown 1998 250 25 '),
(54, '../default.jpg', 'A Warrior\'s Life', 'Paulo Coelho', '2008', '300', '30', 210, '35', 'Yes', 0, '', '1', '4.4', 'A Warrior\'s Life	Paulo Coelho	2008	300(-30%)	210	English Non-Fiction'),
(55, '../default.jpg', 'Aleph', 'Paulo Coelho', '2010', '250', '30', 175, '34', 'Yes', 0, '', '1', '', 'Aleph Paulo Coelho 2010 250 30 '),
(56, '../default.jpg', 'Brida', 'Paulo Coelho', '1990', '250', '25', 188, '34', 'Yes', 0, '', '1', '3.5/5', 'Brida Paulo Coelho 1990 250 25 '),
(57, '../default.jpg', 'Hippie', 'Paulo Coelho', '2018', '250', '30', 175, '34', 'Yes', 0, '', '1', '', 'Hippie Paulo Coelho 2018 250 30 '),
(58, '../default.jpg', 'Manuscript Found in Accra', 'Paulo Coelho', '2012', '250', '30', 175, '34', 'Yes', 0, '', '1', '3.8', 'Manuscript Found in Accra Paulo Coelho 2012 250 30 '),
(59, '../default.jpg', 'Becoming ', 'Michelle Obama', '2018', '400', '45', 220, '39', 'Yes', 0, '', '1', '', 'Becoming  Michelle Obama 2018 400 45 '),
(60, '../default.jpg', 'Calico Joe: A Novel  ', 'John Grisham', '2012', '250', '30', 175, '34', 'Yes', 0, '', '1', '3.8', 'Calico Joe: A Novel   John Grisham 2012 250 30 '),
(61, '../default.jpg', 'Call Me By Your Name By Andre Aciman', 'Andre Aciman', '2007', '250', '30', 175, '34', 'Yes', 0, '', '1', '', 'Call Me By Your Name By Andre Aciman Andre Aciman 2007 250 30 '),
(62, '../default.jpg', 'Einstein: His Life and Universe ', ' Walter Isaacson', '2007', '800', '40', 480, '39', 'Yes', 0, '', '1', '', 'Einstein: His Life and Universe   Walter Isaacson 2007 800 40 '),
(63, '../default.jpg', 'Fantastic Mr. Fox ', 'Roald Dahl', '1970', '200', '25', 150, '34', 'Yes', 0, '', '1', '', 'Fantastic Mr. Fox  Roald Dahl 1970 200 25 English Novels'),
(64, '../default.jpg', 'Great by Choice ', 'Jim Collins & Morten T. Hansen', '2011', '250', '35', 163, '35', 'Yes', 0, '', '1', '', 'Great by Choice  Jim Collins & Morten T. Hansen 2011 250 35 '),
(65, '../default.jpg', 'Harry Potter (1-8)', 'J.K Rowling', '1997', '1100', 'N/A', 1100, '41', 'Yes', 0, '', '1', '', 'Harry Potter (1-8) J.K Rowling 1997 1100 N/A '),
(66, '../default.jpg', 'Looking for Alaska ', ' John Green', '2005', '200', '20', 160, '34', 'Yes', 0, '', '1', '', 'Looking for Alaska   John Green 2005 200 20 '),
(67, '../default.jpg', 'Milk and Honey ', 'Rupi Kaur', '2014', '250', '20', 200, '34', 'Yes', 0, '', '1', '', 'Milk and Honey  Rupi Kaur 2014 250 20 '),
(68, '../default.jpg', 'Mindhunter: Inside the FBIâ€™s Elite Serial Crime Unit', 'John E. Douglas and Mark Olshaker', '1995', '650', '35', 423, '38', 'Yes', 0, '', '1', '', 'Mindhunter: Inside the FBIâ€™s Elite Serial Crime Unit John E. Douglas and Mark Olshaker 1995 650 35 '),
(69, '../default.jpg', 'Moby Dick ', 'Herman Melville', '1851', '350', '25', 263, '34', 'Yes', 0, '', '1', '', 'Moby Dick  Herman Melville 1851 350 25 '),
(70, '../default.jpg', 'Morning, Noon & Night ', 'Sidney Sheldon', '1995', '300', '25', 225, '38', 'Yes', 0, '', '1', '', 'Morning, Noon & Night  Sidney Sheldon 1995 300 25 '),
(71, '../default.jpg', 'Mr Mercedes ', 'Stephen King', '2014', '300', '30', 210, '38', 'Yes', 0, '', '1', '', 'Mr Mercedes  Stephen King 2014 300 30 '),
(72, '../default.jpg', 'Mrs Funnybones ', 'Twinkle Khanna', '2015', '300', '30', 210, '34', 'Yes', 0, '', '1', '', 'Mrs Funnybones  Twinkle Khanna 2015 300 30 '),
(73, '../default.jpg', 'How to Win Friends & Influence People ', 'Dale Carnegie', '1936', '200', '25', 150, '35', 'Yes', 0, '', '1', '', 'How to Win Friends & Influence People  Dale Carnegie 1936 200 25 '),
(74, '../default.jpg', 'Mindset: Changing The Way You think To Fulfil Your Potential', 'Carol Dweck', '2017', '300', '35', 195, '35', 'Yes', 0, '', '1', '', 'Mindset: Changing The Way You think To Fulfil Your Potential Carol Dweck 2017 300 35 '),
(75, '../default.jpg', 'My Name is Red ', 'Orhan Pamuk', '1998', '300', '25', 225, '34', 'Yes', 0, '', '1', '', 'My Name is Red  Orhan Pamuk 1998 300 25 '),
(76, '../default.jpg', 'Murder on The Orient Express ', 'Agatha Christie', '1934', '300', '25', 225, '38', 'Yes', 0, '', '1', '', 'Murder on The Orient Express  Agatha Christie 1934 300 25 '),
(77, '../default.jpg', 'My Sisterâ€™s Keeper ', 'Jodi Picoult', '2014', '270', '25', 203, '34', 'Yes', 0, '', '1', '', 'My Sisterâ€™s Keeper  Jodi Picoult 2014 270 25 '),
(78, '../default.jpg', 'Never Eat Alone ', 'Keith Ferrazzi & Tahl Raz', '2005', '200', '25', 150, '35', 'Yes', 0, '', '1', '', 'Never Eat Alone  Keith Ferrazzi & Tahl Raz 2005 200 25 '),
(79, '../default.jpg', 'Mythology ', 'Edith Hamilton', '1942', '300', '35', 195, '35', 'Yes', 0, '', '1', '', 'Mythology  Edith Hamilton 1942 300 35 '),
(80, '../default.jpg', 'Mystical Poems of Rumi ', 'A. J. Arberry', '1968', '600', '30', 420, '35', 'Yes', 0, '', '1', '', 'Mystical Poems of Rumi  A. J. Arberry 1968 600 30 '),
(81, '../default.jpg', 'Never Let Me Go ', 'Kazuo Ishiguro', '2005', '300', '35', 195, '34', 'Yes', 0, '', '1', '', 'Never Let Me Go  Kazuo Ishiguro 2005 300 35 '),
(82, '../default.jpg', 'Notes From Underground ', 'Fyodor Dostoyevsky', '1864', '300', '30', 210, '34', 'Yes', 0, '', '1', '', 'Notes From Underground  Fyodor Dostoyevsky 1864 300 30 '),
(83, '../default.jpg', 'On the Future: Prospects for Humanity ', 'Martin Rees', '2018', '300', '45', 165, '35', 'Yes', 0, '', '1', '', 'On the Future: Prospects for Humanity  Martin Rees 2018 300 45 '),
(84, '../default.jpg', 'On The Road ', 'Jack Kerouac', '1957', '300', '30', 210, '34', 'Yes', 0, '', '1', '', 'On The Road  Jack Kerouac 1957 300 30 '),
(85, '../default.jpg', 'On Writing ', 'Stephen King', '2000', '250', '25', 188, '38', 'Yes', 0, '', '1', '', 'On Writing  Stephen King 2000 250 25 '),
(86, '../default.jpg', 'One Day ', 'David Nicholls', '2010', '300', '30', 210, '34', 'Yes', 0, '', '1', '', 'One Day  David Nicholls 2010 300 30 '),
(87, '../default.jpg', 'One Hundred Years of Solitude ', 'Gabriel Garcia Marquez', '1967', '300', '35', 195, '34', 'Yes', 0, '', '1', '', 'One Hundred Years of Solitude  Gabriel Garcia Marquez 1967 300 35 '),
(88, '../default.jpg', 'Our Chemical Hearts ', 'Krystal Sutherland', '2016', '300', '30', 210, '34', 'Yes', 0, '', '1', '', 'Our Chemical Hearts  Krystal Sutherland 2016 300 30 '),
(89, '../default.jpg', 'Percy Jackson Full Series (6 Books) ', 'Rick Riordan', '2005', '950', 'N/A', 950, '41', 'Yes', 0, '', '1', '', 'Percy Jackson Full Series (6 Books)  Rick Riordan 2005 950 N/A '),
(90, '../default.jpg', 'Playing for Pizza: A Novel ', 'John Grisham', '2007', '300', '30', 210, '34', 'Yes', 0, '', '1', '', 'Playing for Pizza: A Novel  John Grisham 2007 300 30 '),
(91, '../default.jpg', 'Rage Of Angels ', 'Sidney Sheldon', '1983', '300', '35', 195, '38', 'Yes', 0, '', '1', '', 'Rage Of Angels  Sidney Sheldon 1983 300 35 '),
(92, '../default.jpg', 'Poverty And Famines ', 'Amartya Sen', '1981', '250', '30', 175, '40', 'Yes', 0, '', '1', '', 'Poverty And Famines  Amartya Sen 1981 250 30 '),
(93, '../default.jpg', 'River God ', 'Wilbur Smith', '1993', '400', '25', 300, '38', 'Yes', 0, '', '1', '', 'River God  Wilbur Smith 1993 400 25 '),
(94, '../default.jpg', 'Rumi: The Book of Love ', 'Coleman Barks', '2003', '250', '25', 188, '34', 'Yes', 0, '', '1', '', 'Rumi: The Book of Love  Coleman Barks 2003 250 25 '),
(95, '../default.jpg', 'Safe Heaven ', 'Nicholas Sparks', '2010', '250', '35', 163, '34', 'Yes', 0, '', '1', '', 'Safe Heaven  Nicholas Sparks 2010 250 35 '),
(96, '../default.jpg', 'Sacred Games ', 'Vikram Chandra', '2006', '550', '0', 550, '38', 'Yes', 0, '', '1', '', 'Sacred Games  Vikram Chandra 2006 550 0 '),
(97, '../default.jpg', 'Rogue Lawyer: A Novel By John Grisham', 'John Grisham', '2015', '400', '35', 260, '34', 'Yes', 0, '', '1', '', 'Rogue Lawyer: A Novel By John Grisham John Grisham 2015 400 35 '),
(98, '../default.jpg', 'Road To Success ', 'Napoleon Hill', '2005', '260', '30', 182, '35', 'Yes', 0, '', '1', '', 'Road To Success  Napoleon Hill 2005 260 30 '),
(99, '../default.jpg', 'Selected Short Stories By Franz Kafka', 'Franz Kafka', '2021', '300', '30', 210, '34', 'Yes', 0, '', '1', '', 'Selected Short Stories By Franz Kafka Franz Kafka 2021 300 30 '),
(100, '../default.jpg', 'Self-Help: With Illustrations of Conduct and Perseverance', 'Samuels Miles', '1859', '300', '30', 210, '35', 'Yes', 0, '', '1', '', 'Self-Help: With Illustrations of Conduct and Perseverance Samuels Miles 1859 300 30 '),
(101, '../default.jpg', 'She ', 'H. Rider Haggard', '1886', '350', '35', 228, '38', 'Yes', 0, '', '1', '', 'She  H. Rider Haggard 1886 350 35 '),
(102, '../default.jpg', 'Sherlock Holmes By Sir Arthur Conan Doyle', 'Sir Arthur Conan Doyle', '1880-1914', '700', '30', 490, '41', 'Yes', 0, '', '1', '', 'Sherlock Holmes By Sir Arthur Conan Doyle Sir Arthur Conan Doyle 1880-1914 700 30 '),
(103, '../default.jpg', 'Shoe Dog: A Memoir by the Creator of Nike', 'Phil Knight', '2016', '350', '30', 245, '39', 'Yes', 0, '', '1', '', 'Shoe Dog: A Memoir by the Creator of Nike Phil Knight 2016 350 30 '),
(104, '../default.jpg', 'Six Of Crows ', 'Leigh Bardugo', '2015', '400', '30', 280, '34', 'Yes', 0, '', '1', '', 'Six Of Crows  Leigh Bardugo 2015 400 30 '),
(105, '../default.jpg', 'Skipping Christmas: A Novel By John Grisham', 'John Grisham', '2001', '250', '30', 175, '34', 'Yes', 0, '', '1', '', 'Skipping Christmas: A Novel By John Grisham John Grisham 2001 250 30 '),
(106, '../default.jpg', 'Sophieâ€™s World ', 'Jostein Gaarder', '1991', '250', '30', 175, '34', 'Yes', 0, '', '1', '', 'Sophieâ€™s World  Jostein Gaarder 1991 250 30 '),
(107, '../default.jpg', 'South Of The Border, West Of The Sun By Murakami', 'Haruki Murakami', '1991', '240', '25', 180, '34', 'Yes', 0, '', '1', '', 'South Of The Border, West Of The Sun By Murakami Haruki Murakami 1991 240 25 '),
(108, '../default.jpg', 'Start With Why ', 'Simon Sinek', '2009', '230', '30', 161, '35', 'Yes', 0, '', '1', '', 'Start With Why  Simon Sinek 2009 230 30 '),
(109, '../default.jpg', 'Steve Jobs ', 'Walter Isaacson', '2011', '550', '20', 440, '39', 'Yes', 0, '', '1', '', 'Steve Jobs  Walter Isaacson 2011 550 20 '),
(110, '../default.jpg', 'Still Me: A Novel ', 'Jojo Moyes', '2018', '250', '20', 200, '34', 'Yes', 0, '', '1', '', 'Still Me: A Novel  Jojo Moyes 2018 250 20 '),
(111, '../default.jpg', 'Success Through A Positive Mental Attitude', 'Napoleon Hill and W. Clement Stone', '1959', '230', 'N/A', 230, '35', 'Yes', 0, '', '2', '', 'Success Through A Positive Mental Attitude Napoleon Hill and W. Clement Stone 1959 230 N/A '),
(112, '../default.jpg', 'SuperFreakOnomics ', 'Stephen J. Dubner & Steven D. Levitt', '2009', '300', '30', 210, '35', 'Yes', 0, '', '1', '', 'SuperFreakOnomics  Stephen J. Dubner & Steven D. Levitt 2009 300 30 '),
(113, '../default.jpg', 'Ted Talks ', 'Chris Anderson', '2016', '240', '25', 180, '35', 'Yes', 0, '', '2', '', 'Ted Talks  Chris Anderson 2016 240 25 '),
(114, '../default.jpg', 'Tell Me Your Dreams ', 'Sidney Sheldon', '2011', '400', '40', 240, '38', 'Yes', 0, '', '1', '', 'Tell Me Your Dreams  Sidney Sheldon 2011 400 40 '),
(115, '../default.jpg', 'Tell Me Your Dreams ', 'Sidney Sheldon', '2011', '400', '40', 240, '38', 'Yes', 0, '', '1', '', 'Tell Me Your Dreams  Sidney Sheldon 2011 400 40 '),
(116, '../default.jpg', 'The $100 Startup ', 'Chris Guillebeau', '2012', '280', '30', 196, '40', 'Yes', 0, '', '1', '', 'The $100 Startup  Chris Guillebeau 2012 280 30 '),
(117, '../default.jpg', 'The 4-Hour Work Week ', 'Timothy Ferriss', '2007', '240', '25', 180, '35', 'Yes', 0, '', '1', '', 'The 4-Hour Work Week  Timothy Ferriss 2007 240 25 '),
(118, '../default.jpg', 'The 5 Second Rule ', 'Mel Robbins', '2017', '240', '25', 180, '40', 'Yes', 0, '', '1', '', 'The 5 Second Rule  Mel Robbins 2017 240 25 '),
(119, '../default.jpg', 'The 7 Habits Of Highly Effective People ', 'Stephen R. Covey', '1989', '300', '30', 210, '35', 'Yes', 0, '', '1', '', 'The 7 Habits Of Highly Effective People  Stephen R. Covey 1989 300 30 '),
(120, '../default.jpg', 'The Appeal: A Novel ', 'John Grisham', '2008', '400', '40', 240, '34', 'Yes', 0, '', '1', '', 'The Appeal: A Novel  John Grisham 2008 400 40 '),
(121, '../default.jpg', 'The Architectâ€™s Apprentice', 'Elif Shafak', '2013', '490', '0', 490, '34', 'Yes', 0, '', '1', '', 'The Architectâ€™s Apprentice Elif Shafak 2013 490 0 '),
(122, '../default.jpg', 'The Art of Happiness By Dalai Lama', 'Dalai Lama', '1999', '250', '30', 175, '35', 'Yes', 0, '', '1', '', 'The Art of Happiness By Dalai Lama Dalai Lama 1999 250 30 '),
(123, '../default.jpg', 'The Art Of Seduction', 'Robert Greene', '2001', '550', '10', 495, '35', 'Yes', 0, '', '1', '', 'The Art Of Seduction Robert Greene 2001 550 10 '),
(124, '../default.jpg', 'The Art Of Thinking Clearly ', 'Rolf Dobelli', '2011', '250', '30', 175, '35', 'Yes', 0, '', '1', '', 'The Art Of Thinking Clearly  Rolf Dobelli 2011 250 30 '),
(125, '../default.jpg', 'The Art Of War ', 'Sun Tzu', '2019', '240', '30', 168, '35', 'Yes', 0, '', '1', '', 'The Art Of War  Sun Tzu 2019 240 30 '),
(126, '../default.jpg', 'The Bastard Of Istambul ', 'Elif Shafak', '2006', '250', '25', 188, '34', 'Yes', 0, '', '2', '', 'The Bastard Of Istambul  Elif Shafak 2006 250 25 '),
(127, '../default.jpg', 'The Bell Jar ', 'Sylvia Plath', '1963', '250', '25', 188, '34', 'Yes', 0, '', '1', '', 'The Bell Jar  Sylvia Plath 1963 250 25 '),
(128, '../default.jpg', 'The Book of Rumi (105 Stories and Fables that Illumine, Delight, and Inform) ', 'Maryam Mafi', '2000', '400', '40', 240, '35', 'Yes', 0, '', '1', '', 'The Book of Rumi (105 Stories and Fables that Illumine, Delight, and Inform)  Maryam Mafi 2000 400 40 '),
(129, '../default.jpg', 'The Black Swan ', 'Nassim Nicholas Taleb', '2010', '400', '30', 280, '35', 'Yes', 0, '', '1', '', 'The Black Swan  Nassim Nicholas Taleb 2010 400 30 '),
(130, '../default.jpg', 'The Book Thief ', 'Markus Zusak', '2005', '400', '30', 280, '34', 'Yes', 0, '', '1', '', 'The Book Thief  Markus Zusak 2005 400 30 '),
(131, '../default.jpg', 'The Boy with a Broken Heart ', 'Durjoy Datta', '2017', '500', '20', 400, '34', 'Yes', 0, '', '1', '', 'The Boy with a Broken Heart  Durjoy Datta 2017 500 20 '),
(132, '../default.jpg', 'The Broker ', 'John Grisham', '2005', '300', '25', 225, '37', 'Yes', 0, '', '1', '', 'The Broker  John Grisham 2005 300 25 '),
(133, '../default.jpg', 'The Case For God ', 'Karen Armstrong', '2009', '250', '20', 200, '35', 'Yes', 0, '', '1', '', 'The Case For God  Karen Armstrong 2009 250 20 '),
(134, '../default.jpg', 'The Catcher In The RYE ', ' J. D. Salinger', '1951', '250', '25', 188, '38', 'Yes', 0, '', '1', '', 'The Catcher In The RYE   J. D. Salinger 1951 250 25 '),
(135, '../default.jpg', 'The Chamber: A Novel By John Grisham', 'John Grisham', '1994', '500', '25', 375, '34', 'Yes', 0, '', '1', '', 'The Chamber: A Novel By John Grisham	John Grisham	1994	500(-25%)	375	English Novels'),
(136, '../default.jpg', 'The Complete Short Stories By Franz Kafka', 'Franz Kafka', 'N/A', '500', '45', 275, '34', 'Yes', 0, '', '1', '', 'The Complete Short Stories By Franz Kafka	Franz Kafka	N/A	500(-45%)	275	English Novels'),
(137, '../default.jpg', 'The Complete Short Stories of Ernest Hemingway ', 'Ernest Hemingway', 'Latest', '700', '20', 560, '34', 'Yes', 0, '', '1', '', 'The Complete Short Stories of Ernest Hemingway	Ernest Hemingway	Latest	700(-20%)	560	English Novels'),
(138, '../default.jpg', 'The Complete Stories By Edgar Allan Poe', 'Edgar Allan Poe', 'Latest', '1000', '20', 800, '34', 'Yes', 0, '', '2', '', 'The Complete Stories By Edgar Allan Poe	Edgar Allan Poe	Latest	1000(-20%)	800	English Novels'),
(139, '../default.jpg', 'The Compound Effect ', 'Darren Hardy', '2011', '250', '30', 175, '35', 'Yes', 0, '', '1', '', 'The Compound Effect	Darren Hardy	2011	250(-30%)	175	English Non-Fiction'),
(140, '../default.jpg', 'The Diary Of Young Girl By Anne Frank', ' Anne Frank', '1947', '300', '30', 210, '39', 'Yes', 0, '', '1', '', 'The Diary Of Young Girl By Anne Frank	Anne Frank	1947	300(-30%)	210	Biography'),
(141, '../default.jpg', 'The Dork Diaries Set (1-12 Books) ', 'Rachel Renee Russell', 'Latest', '1750', 'N/A', 1750, '41', 'Yes', 0, '', '2', '', 'The Dork Diaries Set (1-12 Books)	Rachel Renee Russell	Latest	1750(-N/A%)	1750	Book Set'),
(142, '../default.jpg', 'The Elephant Vanishes ', 'Haruki Murakami', '1993', '250', '25', 188, '34', 'Yes', 0, '', '1', '', 'The Elephant Vanishes	Haruki Murakami	1993	250(-25%)	188	English Novels'),
(143, '../default.jpg', 'The Eyes of Darkness', 'Dean Koontz', '1981', '400', '30', 280, '38', 'Yes', 0, '', '1', '', 'The Eyes of Darkness	Dean Koontz	1981	400(-30%)	280	Thriller'),
(144, '../default.jpg', 'The Famous Five (novel series) -21 Book set', 'Enid Blyton', 'Latest', '2600', '10', 2340, '41', 'Yes', 0, '', '1', '', 'The Famous Five (novel series) -21 Book set	Enid Blyton	Latest	2600(-10%)	2340	Book Set'),
(145, '../default.jpg', 'The Firm: A Novel ', 'John Grisham', '1991', '340', '25', 255, '38', 'Yes', 0, '', '1', '', 'The Firm: A Novel	John Grisham	1991	340(-25%)	255	Thriller'),
(146, '../default.jpg', 'The First Man ', 'Albert Camus', '1991', '240', '25', 180, '34', 'Yes', 0, '', '1', '', 'The First Man	Albert Camus	1991	240(-25%)	180	English Novels'),
(147, '../default.jpg', 'The Getaway (Diary of a Wimpy Kid Book 12) ', 'Jeff Kinney', '2017', '250', '35', 163, '34', 'Yes', 0, '', '1', '', 'The Getaway (Diary of a Wimpy Kid Book 12)	Jeff Kinney	2017	250(-35%)	163	English Novels'),
(148, '../default.jpg', 'The Girl In Room 105 ', 'Chetan Bhagat', '2018', '200', '30', 140, '34', 'Yes', 0, '', '1', '', 'The Girl In Room 105	Chetan Bhagat	2018	200(-30%)	140	English Novels'),
(149, '../default.jpg', 'The Girl You Left Behind ', 'Joyo Moyes', '2012', '300', '30', 210, '34', 'Yes', 2, '', '1', '', 'The Girl You Left Behind	Joyo Moyes	2012	300(-30%)	210	English Novels'),
(150, '../default.jpg', 'The Go â€“ Giver ', 'Bob Burg and John David Mann', '2001', '240', '30', 168, '40', 'Yes', 0, '', '1', '', 'The Go â€“ Giver	Bob Burg and John David Mann	2001	240(-30%)	168	Business Related'),
(151, '../default.jpg', 'The God Of Small Things ', 'Arundhati Roy', '1997', '250', '30', 175, '34', 'Yes', 1, '', '1', '', 'The God Of Small Things	Arundhati Roy	1997	250(-30%)	175	English Novels'),
(152, '../default.jpg', 'The Grand Design By Stephen Hawking', 'Stephen Hawking', '2010', '240', '25', 180, '35', 'Yes', 0, '', '1', '', 'The Grand Design By Stephen Hawking	Stephen Hawking	2010	240(-25%)	180	English Non-Fiction'),
(153, '../default.jpg', 'The Graveyeard Book', 'Neil Gaiman', '2008', '300', '30', 210, '34', 'Yes', 0, '', '1', '', 'The Graveyeard Book	Neil Gaiman	2008	300(-30%)	210	English Novels'),
(154, '60ec691e4b880book v2.jpg', 'The Guardians: A Novel By John Grisham', 'John Grisham', '2019', '300', '30', 210, '34', 'Yes', 0, '', '1', '', 'The Guardians: A Novel By John Grisham	John Grisham	2019	300\\(-30%\\) 210	English Novels'),
(155, '60e343178b88adefault.jpg', 'Hacked', 'Stephen King', '2005', '290', '25', 218, '38', 'Yes', 0, '', '1', '', 'Hacked	Stephen King	2005	290(-25%)	218	Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `button`
--

CREATE TABLE `button` (
  `Button_id` int(255) NOT NULL,
  `Button_name` text NOT NULL,
  `Button_link` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `button`
--

INSERT INTO `button` (`Button_id`, `Button_name`, `Button_link`) VALUES
(1, 'Link', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_id` int(255) NOT NULL,
  `Category_name` longtext NOT NULL,
  `No_of_book` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_id`, `Category_name`, `No_of_book`) VALUES
(11, 'Class 1', 0),
(12, 'Class 2', 0),
(13, 'Class 3', 0),
(14, 'Class 4', 0),
(15, 'Class 5', 0),
(16, 'Class 6', 0),
(17, 'Class 7', 0),
(18, 'Class 8', 0),
(19, 'Class 9 Science', 0),
(20, 'Class 9 Arts', 0),
(21, 'Class 9 Commerce', 0),
(22, 'Class 9 Common Subject', 0),
(23, 'College science', 2),
(24, 'College Arts', 0),
(25, 'College Commerce', 0),
(26, 'College Common', 1),
(27, 'Admission Arts', 0),
(28, 'Admission Commerce', 0),
(29, 'Admission Engineering', 0),
(30, 'Admission Medical', 0),
(31, 'Admission Science General', 0),
(32, 'Admission Agriculture', 0),
(33, 'Admission Science & Technology', 0),
(34, 'English Novels', 74),
(35, 'English Non-Fiction', 34),
(38, 'Thriller', 15),
(39, 'Biography', 5),
(40, 'Business Related', 4),
(41, 'Book Set', 5);

-- --------------------------------------------------------

--
-- Table structure for table `delivered`
--

CREATE TABLE `delivered` (
  `Serial` int(255) NOT NULL,
  `Order_id` text NOT NULL,
  `Item` int(255) NOT NULL,
  `Book_id` text NOT NULL,
  `Quantity` text NOT NULL,
  `Price` text NOT NULL,
  `Delivery_charge` text,
  `Customer_name` text NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Cell` text NOT NULL,
  `Adrress` text NOT NULL,
  `Time` text NOT NULL,
  `Delivered_time` text NOT NULL,
  `Item_real_price` text NOT NULL,
  `Item_price` text NOT NULL,
  `Item_discount` text NOT NULL,
  `D_charge` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivered`
--

INSERT INTO `delivered` (`Serial`, `Order_id`, `Item`, `Book_id`, `Quantity`, `Price`, `Delivery_charge`, `Customer_name`, `Email`, `Cell`, `Adrress`, `Time`, `Delivered_time`, `Item_real_price`, `Item_price`, `Item_discount`, `D_charge`) VALUES
(16, '39', 3, '11,10,6', '1,2,1', '879', 'Free', 'Asadul Islam', '', '01781856861', 'Savar', 'July 30, 2021, 2:55 am', 'July 30, 2021, 2:57 am', '200,230,350', '150,207,315', '25,10,10', ''),
(17, '40', 1, '11', '1', '150', 'Not Free', 'Test', '', '56789', 'Dhaka', 'July 30, 2021, 3:17 am', 'July 30, 2021, 3:17 am', '200', '150', '25', '40'),
(18, '41', 3, '11,10,6', '1,2,1', '879', 'Free', 'Final Test', '', '765432', 'Vbgrt', 'July 30, 2021, 4:02 am', 'July 30, 2021, 4:03 am', '200,230,350', '150,207,315', '25,10,10', '0');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `Notice_id` int(255) NOT NULL,
  `Notice_msg` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`Notice_id`, `Notice_msg`) VALUES
(7, 'Hey Book Lover! Welcome to our online library. If you purchase one book with free home delivery, your other books will also be delivered in free');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_info`
--

CREATE TABLE `ordered_info` (
  `Order_id` int(255) NOT NULL,
  `Item` int(255) NOT NULL,
  `Book_id` varchar(255) NOT NULL,
  `Quantity` text NOT NULL,
  `Price` text NOT NULL,
  `Delivery_charge` text,
  `Customer_name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Cell` text NOT NULL,
  `Adrress` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_seen`
--

CREATE TABLE `order_seen` (
  `Serial_` int(255) NOT NULL,
  `Order_id` text NOT NULL,
  `Item` int(255) NOT NULL,
  `Book_id` text NOT NULL,
  `Quantity` text NOT NULL,
  `Price` text NOT NULL,
  `Delivery_charge` text,
  `Customer_name` varchar(255) NOT NULL,
  `Email` text NOT NULL,
  `Cell` text NOT NULL,
  `Adrress` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Post_id` int(255) NOT NULL,
  `Book_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Post_id`, `Book_id`) VALUES
(12, 6),
(13, 5),
(18, 10),
(21, 11);

-- --------------------------------------------------------

--
-- Table structure for table `trending`
--

CREATE TABLE `trending` (
  `Trend_id` int(255) NOT NULL,
  `Book_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trending`
--

INSERT INTO `trending` (`Trend_id`, `Book_id`) VALUES
(15, 5),
(16, 47),
(17, 32),
(18, 35),
(19, 111),
(20, 111);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `Username`, `Password`) VALUES
(1, 'book7733', 'b897a1b1c278225e1809dfd4bd6d3dfe'),
(2, 'asad7733', 'd8b99f0c4c7d4fc3e89540620bb02aac');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE `user_category` (
  `User_category_id` int(255) NOT NULL,
  `Name` text NOT NULL,
  `Button_name_list` longtext NOT NULL,
  `Button_list` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`User_category_id`, `Name`, `Button_name_list`, `Button_list`) VALUES
(2, 'Islamic', 'Link,Link', '0,0'),
(3, 'School', 'class1,class2,class3,class4,class5,class6,class7,class8', '11,12,13,14,15,16,17,18'),
(4, 'Class 9 & 10', 'Science,Arts,Commerce,Common Subject', '19,20,21,22'),
(5, 'College', 'Science,Arts,Commerce,Common Subject', '23,24,25,26'),
(6, 'Admission Science', 'Engineering,Medical,General,Agriculture,Science & Technology', '29,30,31,32,33'),
(7, 'Admission Arts', 'Link', '0'),
(8, 'Admission Business Studies', 'Link', '0'),
(9, 'BCS & Job', 'Link', '0'),
(10, 'English', 'Novels,Non-fiction,Thriller,Biography,Business,Book Cellection,Comics', '34,35,38,39,40,41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bin`
--
ALTER TABLE `bin`
  ADD PRIMARY KEY (`Serial`);

--
-- Indexes for table `Book_info`
--
ALTER TABLE `Book_info`
  ADD PRIMARY KEY (`Book_id`);

--
-- Indexes for table `button`
--
ALTER TABLE `button`
  ADD PRIMARY KEY (`Button_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `delivered`
--
ALTER TABLE `delivered`
  ADD PRIMARY KEY (`Serial`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`Notice_id`);

--
-- Indexes for table `ordered_info`
--
ALTER TABLE `ordered_info`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `order_seen`
--
ALTER TABLE `order_seen`
  ADD PRIMARY KEY (`Serial_`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Post_id`);

--
-- Indexes for table `trending`
--
ALTER TABLE `trending`
  ADD PRIMARY KEY (`Trend_id`);

--
-- Indexes for table `user_category`
--
ALTER TABLE `user_category`
  ADD PRIMARY KEY (`User_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bin`
--
ALTER TABLE `bin`
  MODIFY `Serial` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Book_info`
--
ALTER TABLE `Book_info`
  MODIFY `Book_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `button`
--
ALTER TABLE `button`
  MODIFY `Button_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `delivered`
--
ALTER TABLE `delivered`
  MODIFY `Serial` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `Notice_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ordered_info`
--
ALTER TABLE `ordered_info`
  MODIFY `Order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `order_seen`
--
ALTER TABLE `order_seen`
  MODIFY `Serial_` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `trending`
--
ALTER TABLE `trending`
  MODIFY `Trend_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_category`
--
ALTER TABLE `user_category`
  MODIFY `User_category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
