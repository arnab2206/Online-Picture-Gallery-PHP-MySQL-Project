-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2018 at 10:29 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `albumdetails`
--

DROP TABLE IF EXISTS `albumdetails`;
CREATE TABLE `albumdetails` (
  `album_id` int(11) NOT NULL,
  `albumName` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albumdetails`
--

INSERT INTO `albumdetails` (`album_id`, `albumName`) VALUES
(1, 'animals'),
(2, 'travel'),
(3, 'cars'),
(4, 'nature'),
(5, 'electronics'),
(7, 'music'),
(8, 'random');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `pic_id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `pic_id`, `comment`, `username`, `comment_date`) VALUES
(1, 6, 'nice tiger!', 'arnab2206', '2018-07-07'),
(2, 6, 'bagh oooooooo', 'arnab2206', '2018-07-07'),
(3, 6, 'this tiger better than Tiger shroff', 'arnab2206', '2018-07-07'),
(4, 6, 'ajeeb image hai bhaiya!', 'arnab2206', '2018-07-07'),
(5, 2, 'motion blur!', 'arnab2206', '2018-07-07'),
(6, 7, 'sooooo cute!!!', 'avik', '2018-07-07'),
(7, 6, 'wow', 'arnab2206', '2018-07-07'),
(8, 8, 'wow!!!', 'babi', '2018-07-09'),
(9, 8, 'malya patha', 'babi', '2018-07-09'),
(10, 102, 'Juventus is my Drug, Cristiano is my dealer!', 'iamsmk', '2018-07-11'),
(11, 93, 'old instrument', 'arnab2206', '2018-07-11'),
(12, 57, 'futuristic car!', 'arnab2206', '2018-07-11'),
(13, 111, 'Best player for India Currently!', 'sir', '2018-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `picdetails`
--

DROP TABLE IF EXISTS `picdetails`;
CREATE TABLE `picdetails` (
  `pic_id` int(11) NOT NULL,
  `pic_name` varchar(1000) NOT NULL,
  `pic_des` varchar(1000) NOT NULL,
  `pic_cat` varchar(255) NOT NULL,
  `username` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picdetails`
--

INSERT INTO `picdetails` (`pic_id`, `pic_name`, `pic_des`, `pic_cat`, `username`) VALUES
(2, 'a2ce55ab7bc177ba255ab570fc05ca7e.jpg', 'car image2', 'cars', 'arnab2206'),
(3, '060a47ff4cdc79760d9c271258852fab.jpg', 'flying aeroplane', 'travel', 'arnab2206'),
(4, '390b4d1a9024395a61028210f16e4189.jpg', 'taj mahal and camels', 'travel', 'arnab2206'),
(5, '00b2a24fd8d381bcae92dfeda89fb57d.jpg', 'titanic ship', 'travel', 'arnab2206'),
(6, '1e4483e833025ac10e6184e75cb2d19d.jpg', 'neon tiger', 'animals', 'arnab2206'),
(7, '2367ffd0c6e7bcf686dcd838d05c044f.jpg', 'cute cat kitten', 'animals', 'arnab2206'),
(9, '74a62f4a4e0327e26e91e02f4422069f.jpg', 'bridge', 'travel', 'madhu'),
(10, 'ed30e3acbf1980c0b0345d88469f9104.jpg', 'bridge at night hong kong', 'travel', 'arnab2206'),
(11, '0ba223514932b1bda71d573abcc7296c.jpg', 'lamborghini gollorado', 'cars', 'arnab2206'),
(12, '74e515471f4779275fd94f8311ee8d30.jpg', 'lamborghini extreme', 'cars', 'arnab2206'),
(13, '96f66c08de81de97040678f89374fecd.jpg', 'dirt road cars', 'cars', 'arnab2206'),
(14, '79b29141ce71daeaf65c3e858e201a17.jpg', 'jaguar hungry', 'animals', 'arnab2206'),
(15, 'd4db182c7a10e5005b033a58fba478de.jpg', 'tiger the national animal of India', 'animals', 'arnab2206'),
(16, '12f6cf8c41b836cafe7ec3a6998f24aa.jpg', 'king of jungle lion', 'animals', 'arnab2206'),
(17, '60b02f18da6e2b90bb96ed14abeb2410.jpg', 'cheetah mother and kids', 'animals', 'arnab2206'),
(18, '8745b75aa51a3b5ff72eac95274bc5ca.jpg', 'zebra mother and kid', 'animals', 'arnab2206'),
(19, '00902db04f2949e4e82e97f7b1daa902.jpg', 'cow-calf', 'animals', 'arnab2206'),
(20, '144cb8381aea8b7eb240d8c884e65495.jpg', 'cowhorn', 'animals', 'arnab2206'),
(21, '038b857f401d483ef27b115d9cd5c9bd.jpg', 'gangs of cow', 'animals', 'arnab2206'),
(22, 'ca4007ff171791335ae683cdc011b53f.jpg', 'sacred cow', 'animals', 'arnab2206'),
(23, '59b514174bffe4ae402b3d63aad79fe0.jpg', 'white cow', 'animals', 'arnab2206'),
(24, 'e5e633f8bd2b3ce37d24fe84a60c03bb.jpg', 'lion and his wife', 'animals', 'arnab2206'),
(25, 'd7bdf611b76c18d68c14f5dff9793191.jpg', 'sitting lion', 'animals', 'arnab2206'),
(26, 'dda3d541eaf84484218be79bfabdd8dd.jpg', 'lion standing', 'animals', 'arnab2206'),
(27, 'fd456406745d816a45cae554c788e754.jpg', 'lion romancing', 'animals', 'arnab2206'),
(28, '6bc02fa85d586444d8c5e374e6008fb6.jpg', 'dog', 'animals', 'arnab2206'),
(29, '91449b9b82b0b5bc25ec89e3c697e46c.jpg', 'doggie', 'animals', 'arnab2206'),
(30, 'a478c0d0659e6ad2de9cc44992fb1b87.jpg', 'white dog', 'animals', 'arnab2206'),
(31, 'e962f83a5cc3dedb252a249ae4795aaf.jpg', 'dog sitting', 'animals', 'arnab2206'),
(32, '888bd51390919686a38ec8daa65e62d8.jpg', 'cute dog', 'animals', 'arnab2206'),
(33, '125fa507972b03b9bd9d3c261dc9612e.jpg', 'cool dog', 'animals', 'arnab2206'),
(34, '22d60c4f0b0b0e1b62c33b3161c4cf6b.jpg', 'lovely dog', 'animals', 'arnab2206'),
(35, '20d9962a07bdd3fed81f7712da102f7b.jpg', 'black dog', 'animals', 'arnab2206'),
(36, '8b31bfbfd22ef523378f0a86e92fb752.jpg', 'dog dots', 'animals', 'arnab2206'),
(37, '7a2041ffcb85600187fd70f8085edcf2.jpg', 'indian dog', 'animals', 'arnab2206'),
(38, '0b76dc6382c769d3e337c76f46ee044a.jpeg', 'colosseum', 'travel', 'arnab2206'),
(39, '64fa1f3a046a827daf6dfb68700abf30.jpg', 'Christ de Redeemer', 'travel', 'arnab2206'),
(40, 'ca2936f6cc5e48a2e0a207fbce0d4e97.jpg', 'Taj Mahal', 'travel', 'arnab2206'),
(41, '487ebc787aeba9b73f6229598c88245a.jpg', 'machu pichu', 'travel', 'arnab2206'),
(42, '44778d0bfa89c82a1075e36140f5603b.jpg', 'howrah bridge', 'travel', 'arnab2206'),
(43, '002f936661e5de6aae157f5b5db48bdf.jpg', 'mumbai worli sea link', 'travel', 'arnab2206'),
(44, '53461b86b454f21b37d712b58b2a0715.jpg', 'red fort', 'travel', 'arnab2206'),
(45, '760d964748edfa99ab77bc29060cefa4.jpg', 'sydney opera house', 'travel', 'arnab2206'),
(46, '55cbb44a6659298ff3e02ea9da2dbd4e.jpg', 'leaning tower of pisa', 'travel', 'arnab2206'),
(47, 'bbc38cb4fd9c092195b08983094bf5b2.jpg', 'egyptian pyramid', 'travel', 'arnab2206'),
(48, 'bab580c2113dc63e8522cb5251f4b530.jpg', 'blue car', 'cars', 'arnab2206'),
(49, 'f5992df68349ad333fd44d78affcbc34.jpg', 'new car', 'cars', 'arnab2206'),
(50, '53619cb870098ff797adf0abb6bd6383.jpg', 'black car', 'travel', 'arnab2206'),
(51, 'ebbf2d47810e6189fedf0afcb12a516e.jpg', 'red car', 'cars', 'arnab2206'),
(52, '9696a6b9aa6c88bfc7b52f3935411d78.jpg', 'expensive car', 'cars', 'arnab2206'),
(53, '27bf75dc05c10bdd2c89dedda862a953.jpg', 'rich car', 'cars', 'arnab2206'),
(54, '22469736a33e95be88a535dc2d38c603.jpg', 'new cars', 'cars', 'arnab2206'),
(55, 'fb3dc28c5f61c025a14c536b7bd40431.jpg', 'yellow car', 'travel', 'arnab2206'),
(56, '26faa645528a38c5368a65331c9af244.jpg', 'game car', 'cars', 'arnab2206'),
(57, 'd9a2bcea5f8fff2bf7ec58e7a76db7dc.jpg', 'google car', 'travel', 'arnab2206'),
(58, '3b336a6e695b68bdfd237a1f9fb1e16b.jpg', 'next car', 'cars', 'arnab2206'),
(59, 'c92c732f6afa9a77ce5602ef7ec868e1.jpg', 'falls', 'nature', 'arnab2206'),
(60, '4cffbeb67d56d87c6ba2ca03a88b20e3.jpg', 'forest', 'nature', 'arnab2206'),
(61, 'c2e2ff155b88e7d0665a20780e9cba46.jpg', 'rainforest', 'nature', 'arnab2206'),
(62, '6be60d95bb4a3013a27e329e2bb849d6.jpg', 'mountains', 'nature', 'arnab2206'),
(63, 'f4a841e27ffa21a1153c073667a8a5b5.jpg', 'falls2', 'nature', 'arnab2206'),
(64, 'a9d1370c3660f51557d321b2bd00948c.jpg', 'falls3', 'nature', 'arnab2206'),
(65, '4cb27b360ede6d4ade56c906619cf64d.jpg', 'forest2', 'nature', 'arnab2206'),
(66, '384121b3f3483c55952a8da4a24d290c.jpg', 'forest3', 'nature', 'arnab2206'),
(67, 'c1ab052ee62d8e2282edac56fff3d4f6.jpg', 'sunset', 'nature', 'arnab2206'),
(68, 'ac0ffb1fc8a6f55e3a31fd011a6162d9.jpg', 'plantseed', 'nature', 'arnab2206'),
(69, '08e24c6efc2d29dc8ce0ab49d53e97ad.jpg', 'forest track', 'nature', 'arnab2206'),
(70, 'a577e40c6939f189a63e46952fe340a6.jpg', 'river', 'nature', 'arnab2206'),
(71, '6cb374624ffa56f70a8d246217005350.jpg', 'sunset2', 'nature', 'arnab2206'),
(77, '2f2ec1296695a9fb3251bbc94a2e0cef.jpg', 'chip', 'electronics', 'arnab2206'),
(79, '1ffdd70089f67f8e0ea1e7d7bd20ebee.jpg', 'washing machine', 'electronics', 'arnab2206'),
(80, '04e7bee23588e4bf9e566d0249b595b0.jpg', 'expensive mobile', 'electronics', 'arnab2206'),
(81, '1bdcd8492185bffa1e935cc1b249b487.jpg', 'television', 'electronics', 'arnab2206'),
(82, 'b2f658e07287a14a3ac59adbacf7fbee.jpg', 'Microwave', 'electronics', 'arnab2206'),
(83, '6516527bb416f124bf5a8eb77be81005.jpg', 'Refrigerator', 'electronics', 'arnab2206'),
(84, 'f7a42fe7211f98ac7a60a285ac3a9e87.jpg', 'mobile', 'electronics', 'arnab2206'),
(86, 'b232e36d3ca2a6a7e4c23f70393f1966.jpg', 'chip structure', 'electronics', 'arnab2206'),
(87, 'b4f2398141344be25cbece3651a70dba.jpg', 'glorified image of chip', 'electronics', 'arnab2206'),
(88, 'cd8016ac5951a6e47a1a0f9c0da75e42.jpg', 'motherboard', 'electronics', 'arnab2206'),
(89, '8638aead412278be55af111a4318a031.jpg', 'chip sturcture2', 'electronics', 'arnab2206'),
(90, '0cc175b9c0f1b6a831c399e269772661.jpg', 'Tabla', 'music', 'arnab2206'),
(91, '92eb5ffee6ae2fec3ad71c777531578f.jpg', 'Violin', 'music', 'arnab2206'),
(92, '4a8a08f09d37b73795649038408b5f33.jpg', 'Trumpet', 'music', 'arnab2206'),
(94, 'e1671797c52e15f763380b45e841ec32.jpg', 'Sitar', 'music', 'arnab2206'),
(95, '8fa14cdd754f91cc6554c9e71929cce7.jpg', 'electronic guitar', 'music', 'arnab2206'),
(96, 'b2f5ff47436671b6e533d8dc3614845d.jpg', 'Saxophone', 'music', 'arnab2206'),
(97, '2510c39011c5be704182423e3a695e91.jpg', 'guitar', 'music', 'arnab2206'),
(98, '865c0c0b4ab0e063e5caa3387c1a8741.jpg', 'guitar playing', 'music', 'arnab2206'),
(99, '363b122c528f54df4a0446b6bab05515.jpg', 'guitar playing2', 'music', 'arnab2206'),
(100, '2767cc3ede7592a47bd6657e3799565c.jpg', 'guitar playing4', 'music', 'arnab2206'),
(101, '8ce4b16b22b58894aa86c421e8759df3.jpg', 'neymar drawing', 'random', 'arnab2206'),
(102, '2db95e8e1a9267b7a1188556b2013b33.jpg', 'ronaldo cr7 drawing', 'random', 'arnab2206'),
(103, '6f8f57715090da2632453988d9a1501b.jpg', 'messi lm10 drawing', 'random', 'arnab2206'),
(104, '7b8b965ad4bca0e41ab51de7b31363a1.jpg', 'sergio ramos drawing', 'random', 'arnab2206'),
(106, '83878c91171338902e0fe0fb97a8c47a.jpg', 'shahrukh khan srk drawing', 'random', 'arnab2206'),
(107, '7694f4a66316e53c8cdd9d9954bd611d.jpg', 'kolkata sketch drawing', 'random', 'arnab2206'),
(108, '4b43b0aee35624cd95b910189b3dc231.jpg', 'kolkata sketch drawing2', 'random', 'arnab2206'),
(109, '03c7c0ace395d80182db07ae2c30f034.jpg', 'indian cricket legends', 'random', 'arnab2206'),
(110, 'e358efa489f58062f10dd7316b65649e.jpg', 'sourav ganguly drawing', 'random', 'arnab2206'),
(111, '7b774effe4a349c6dd82ad4f4f21d34c.jpg', 'virat kohli drawing', 'random', 'arnab2206'),
(112, '9e3669d19b675bd57058fd4664205d2a.jpg', 'harry potter drawing', 'random', 'arnab2206'),
(113, 'f1290186a5d0b1ceab27f4e77c0c5d68.jpg', 'the deathly hallows drawing', 'random', 'arnab2206'),
(114, '9dd4e461268c8034f5c8564e155c67a6.jpg', 'the avengers drawing', 'random', 'arnab2206'),
(115, '415290769594460e2e485922904f345d.jpg', 'avengers drawing', 'random', 'arnab2206'),
(116, 'fbade9e36a3f36d3d676c1b808451dd7.jpg', 'avengers sketch drawing', 'random', 'arnab2206');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `pic_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `uploadedBy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `pic_id`, `user_id`, `reason`, `uploadedBy`) VALUES
(9, 6, 'arnab2206', 'unnatural tiger', 'arnab2206'),
(10, 9, 'arnab2206', 'who are these guys?', 'madhu');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(1000) NOT NULL,
  `lname` varchar(1000) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_pwd` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `username`, `user_pwd`, `status`, `type`) VALUES
(1, 'Arnab', 'Ray', 'arnab2206', 'bf9ea75bd1d06d64c834e63a7e1ef0cf', 1, 1),
(2, 'Avik', 'Bose', 'avik', '6fc6139d9e9341148b8d2a24f4be1362', 1, 1),
(3, 'Ashish', 'Choudhary', 'ashish', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1),
(4, 'Swarnendu', 'Ghosh', 'babi', '5b307381861d9a4c51b0e881eef973d3', 0, 1),
(5, 'Madhurima', 'Chatterjee', 'madhu', '84811fed582a9c7b8cb41f68f0ed6147', 0, 1),
(6, 'Admin', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 0),
(7, 'Soumik', 'Chatterjee', 'iamsmk', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1),
(8, 'Abhishek', 'Kundu', 'sir', 'dcff57c9a964f83fbf81cc75ec2e413a', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albumdetails`
--
ALTER TABLE `albumdetails`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `picdetails`
--
ALTER TABLE `picdetails`
  ADD PRIMARY KEY (`pic_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albumdetails`
--
ALTER TABLE `albumdetails`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `picdetails`
--
ALTER TABLE `picdetails`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
