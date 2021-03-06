-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2021 at 12:50 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `role`) VALUES
(2, 'admin', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `ordr` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `name`, `ordr`, `created_at`) VALUES
(1, 'Chapter 10', 1, '2021-02-17 14:43:03'),
(2, 'Chapter 11', 2, '2021-02-17 14:43:03'),
(3, 'Chapter 12', 3, '2021-02-17 14:43:38'),
(4, 'Chapter 13', 4, '2021-02-17 14:43:38'),
(5, 'Chapter 14', 5, '2021-02-17 14:55:16'),
(11, 'Chapter 15', 6, '2021-02-17 14:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `ordr` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `ordr`, `created_at`) VALUES
(1, 'Pre 9th', 1, '2021-02-17 14:43:03'),
(2, '9th Red', 3, '2021-02-17 14:43:03'),
(3, '10th Red', 0, '2021-02-17 14:43:38'),
(4, '9th Green', 2, '2021-02-17 14:43:38'),
(5, '10th Blue', 5, '2021-02-17 14:55:16'),
(7, '8th Pink', 6, '2021-03-09 07:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sitename` text,
  `logo` text,
  `phone` text,
  `email` text,
  `address` text,
  `gmaps` text,
  `cover` text,
  `post` text,
  `fpost` text,
  `facebook` text,
  `twitter` text,
  `insta` text,
  `youtube` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `sitename`, `logo`, `phone`, `email`, `address`, `gmaps`, `cover`, `post`, `fpost`, `facebook`, `twitter`, `insta`, `youtube`) VALUES
(1, 'Demo Academy ', 'ebd8374f8e3327086e13b733caf8632f1.png', '+92 123 456789', 'company@email.com', 'Company, Lahore. (Pakistan).                                 ', 'Map Code            ', 'b83d69d563a0d0469c59dbfe1cec621f1.png', '<p>test</p>\r\n', 'From the catalytic converter to the alternator, your car is filled with a host of parts that come together to power your vehicle down the road. While it may feel like a foreign language, having a working understanding of the parts of your vehicle will make you an educated consumer that will be able to converse with your mechanic when the time comes. ', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.instagram.com', 'http://www.youtube.com');

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

DROP TABLE IF EXISTS `editor`;
CREATE TABLE IF NOT EXISTS `editor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(31) NOT NULL,
  `password` varchar(21) NOT NULL,
  `img` text,
  `phone` text,
  `block` int(11) DEFAULT '0',
  `blockres` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`id`, `name`, `email`, `password`, `img`, `phone`, `block`, `blockres`, `created_at`) VALUES
(1, 'Demo Editor', 'editor@123.com', 'editor', 'eb526642d00a3c6023513d3bde0b7ef51.png', '2423423', 0, '', '2021-02-17 13:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `lques`
--

DROP TABLE IF EXISTS `lques`;
CREATE TABLE IF NOT EXISTS `lques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) DEFAULT NULL,
  `subjectid` int(11) DEFAULT NULL,
  `chapterid` int(11) DEFAULT NULL,
  `typeid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lques`
--

INSERT INTO `lques` (`id`, `classid`, `subjectid`, `chapterid`, `typeid`, `ques`, `ans`, `created_at`) VALUES
(4, 3, 8, 1, 1, 'What is simple pendulum? Diagrammatically show the forces acting on simple pendulum. Also show that simple pendulum executes SHM. ', ' Simple Pendulum:\r\nA simple pendulum is an idealized model consisting of a point mass suspended by a\r\nweightless, in-extendable string supported from a fixed frictionless support\r\nExplanation:\r\nA simple pendulum is driven by the force of gravity due to a\r\nweight of suspended mass â€œmâ€ (W=mg). A real pendulum\r\napproximates a simple pendulum if\r\nâ€¢ The bob is small compared with the length â„“\r\nâ€¢ Mass of the string is much less than the bobâ€™s mass\r\nâ€¢ The cord or string remain straight and does not stretch\r\nPull the pendulum bob aside and let it go, the pendulum then\r\nswings back and forth. Neglecting air drag and friction at the\r\npendulumâ€™s pivot, these oscillations are periodic. We shall show\r\nthat, provide the angle is small; the motion is that of a simple\r\nharmonic oscillator. As show in figure for âˆ†QRS we resolve the\r\nweight (W=mg) in two components â€œmg sinÎ¸â€ and â€œmg cosÎ¸â€.\r\nThe component â€œmg cosÎ¸â€ is balanced by the tension â€œTâ€ in the string. The restoring forces\r\nonly provided by component â€œmg sinÎ¸â€. Therefore\r\nð¹ð¹ð‘Ÿð‘Ÿð‘Ÿð‘Ÿð‘Ÿð‘Ÿ = âˆ’ð‘šð‘šð‘šð‘š sin ðœƒðœƒ ----------- (1)\r\nAlso only for small angles the arc length â€œsâ€ is nearly the same length as displacement â€œxâ€.\r\nTherefore, from âˆ†OPQ\r\nsin ðœƒðœƒ = ð‘¥ð‘¥\r\nâ„“\r\n-------------(2)\r\nPutting eq (2) in eq (1)\r\nð¹ð¹ð‘Ÿð‘Ÿð‘Ÿð‘Ÿð‘Ÿð‘Ÿ = âˆ’ð‘šð‘šð‘šð‘š ð‘¥ð‘¥\r\nâ„“\r\n------------(3)\r\nSince mass â€œmâ€, acceleration due to gravity â€œgâ€ and length â€œâ„“â€ are constant for simple\r\npendulum oscillating with small angle, therefore\r\nð¹ð¹ð‘Ÿð‘Ÿð‘Ÿð‘Ÿð‘Ÿð‘Ÿ âˆ âˆ’ð‘¥ð‘¥\r\nWhich is the condition for simple harmonic motion. Thus motion of simple pendulum can\r\nbe approximated as is simple harmonic motion.', '2021-02-26 03:49:52'),
(5, 3, 8, 1, 1, 'What is wave motion? How waves can be categorized?', ' Waves Motion: The transmission of energy in a medium due to the oscillatory motion of the\r\nparticles of the medium about their mean positions is called the wave motion.\r\nOR\r\nA mechanism by which energy transferred from one place to another is known as wave motion.\r\nOR\r\nIt is the energy transfer by propagation of periodic disturbance called wave motion.\r\nTypes of waves:\r\nThere are two main kinds of waves.\r\ni. Mechanical waves\r\nii. Electromagnetic waves\r\ni. Mechanical waves\r\nThe waves produced by the oscillation of material particles called mechanical\r\nwaves.\r\nFor example:\r\nWater waves, sound waves, seismic waves etc. These waves can exist only within\r\na material medium.\r\nii. Electromagnetic waves\r\nThe waves that propagate by oscillation of electric and magnetic fields are called\r\nelectromagnetic waves, they donâ€™t require material medium for their propagation.\r\nThe wave is a combination of traveling electric and magnetic fields. The fields vary\r\nin value and are directed at right angles to each other and to the direction of travel\r\nof the wave.\r\nFor example:\r\nThe common examples of electromagnetic waves are visible and ultraviolet light,\r\nradio waves, microwaves, x-rays etc.\r\nWaves can also be classified as transverse and longitudinal in terms of directions of disturbance\r\nor displacement in the medium and that of the propagation of waves.\r\na. Transverse waves:\r\nA transverse wave is one in which the disturbance occurs perpendicular to the direction of\r\nmotion of wave.\r\nExplanation:\r\nThe transverse waves consist of crests and troughs which are produced one after the other\r\nin a certain order. The crest represents the part of the wave above the equilibrium position while\r\nthe trough represents the part of the wave below the equilibrium position.', '2021-02-26 03:50:21'),
(6, 3, 8, 1, 1, 'How waves transport energy without carrying the material medium? Also describe the connection between oscillatory motion and waves.', ' A wave is a disturbance that moves outward from its point of origin, transferring energy by\r\nmeans of vibrations with little or no transport of medium.\r\nA wave is a disturbance which carries energy from one place to another without carrying\r\nthe material medium\r\nThere are two common features to all waves:\r\n1. A wave is a traveling disturbance.\r\n2. A wave carries energy from place to place.\r\nThis can be explaining with the help of following example:\r\nExample:\r\nTake a tub full of water, move a pencil up and down at one edge of the tub.\r\nWaves are produced on the water surface which moves away from the point\r\nof impact of the pencil. The particles of water begin to oscillate about their\r\nmean position. The disturbance spread out in the form of waves on the\r\nsurface of water.\r\nFor example, if we placed a cork in the middle of the tub. As the waves\r\npasses through the cork it will move up and down about its place. The energy\r\nwhich is spent in moving the pencil up and down reaches the cork by means\r\nof water waves due to which it is also move up and down.\r\nDuring this process the cork does not move with waves, it only move up and\r\ndown which shows that particles of matter does not move forward with\r\nwaves instead they oscillate about their mean position.\r\nThis shows that during propagation of waves, the particle of the medium\r\ndoes not change its position permanently and perform oscillatory motion only', '2021-02-26 03:50:51'),
(7, 3, 8, 1, 1, 'Prove the relation between wave speed, wavelength and frequency of wave.', ' We know that the speed is given as\r\nð‘£ð‘£ = ð‘ ð‘ \r\nð‘¡ð‘¡ âˆ’ âˆ’ âˆ’ âˆ’ âˆ’ âˆ’ âˆ’ (1)\r\nIn case of wave distance cover by a wave in one time period â€Tâ€ is equal to wave length â€œðœ†ðœ†\". so\r\nwe put s= ðœ†ðœ† and t=T in equation(1) so we get\r\nð‘£ð‘£ = ðœ†ðœ†\r\nð‘‡ð‘‡\r\nð‘£ð‘£ = 1\r\nð‘‡ð‘‡\r\nÃ— ðœ†ðœ† âˆ’ âˆ’ âˆ’ âˆ’ âˆ’ âˆ’(2)\r\nWe know that\r\nð‘“ð‘“ = 1\r\nð‘‡ð‘‡ âˆ’ âˆ’ âˆ’ âˆ’ âˆ’ (3)\r\nPutting eq (3) in eq (2) we get\r\nð‘£ð‘£ = ð‘“ð‘“ðœ†ðœ† âˆ’ âˆ’ âˆ’ âˆ’ âˆ’ (4)\r\nEq (4) represents the relation between wave speed, frequency and wavelength of a wave.\r\n', '2021-02-26 03:51:19'),
(8, 3, 8, 1, 1, 'Using ripple tank explain reflection, refraction and diffraction of waves.', ' Ripple Tank:\r\nRipple tank is an experimental setup to study the two dimensional features or\r\ncharacteristics of wave mechanics such as reflection, refraction and diffraction.\r\nReflection:\r\nReflection is the change in direction of a wave-front at an interface between two different\r\nmedia or rigged barriers so that the wave-front returns into the medium from which is originated.\r\nWhen wave runs into a straight barrier they are reflected along their original path. However,\r\nif a wave hits a straight barrier obliquely, the wave-front is reflected at an angle to the barrier.\r\nIn ripple tank reflection can be demonstrated by placing an upright barrier in tray and the\r\nreflection of water can be seen.\r\nRefraction:\r\nWhen wave travel from one medium into another, their speed changes this phenomenon is\r\ncalled refraction.\r\nWe can observe refraction occurring in a ripple tank if we placed a thick sheet of plastic in\r\nthe tray. When the waves travel from shallow to deep water, we can observe that its wavelength,\r\nhence its speed, changes. If the wave crosses the boundary between the two depths straight on, no\r\nchange in the direction occur. On the other hand, if a wave crosses a boundary at an angle, the\r\ndirection of travel does change, again by equation.\r\nð‘£ð‘£ = ð‘“ð‘“ï¿½', '2021-02-26 03:51:52'),
(9, 3, 8, 1, 2, 'A mass hang from a spring vibrates 15 times in 12sec. calculate (a) the frequency and (b) the period of the vibration.', ' Given data:\r\nNo. of vibrations=N=15\r\nTime for 15 vibrations=t=12sec\r\nRequired:\r\n(a) Frequency=f=?\r\n(b) Time period=t=?\r\nSolution:\r\na. Frequency =f=ð‘ð‘\r\nð‘¡ð‘¡\r\nPutting the values in eq, we get\r\nf=15\r\n12\r\nf=1.25Hz\r\nb. We know that\r\nT=1\r\nð‘“ð‘“\r\nPutting values\r\n= 1\r\n1.25\r\nT=0.8 sec', '2021-02-26 03:52:43'),
(10, 3, 8, 1, 2, 'A spring requires a force of 100.0N to compress it to a displacement of 4cm.what is its spring constant?', ' Given data:\r\nForce=F=100.0N\r\nDisplacement=x=4cm=4/100m=0.04m\r\nRequired:\r\nSpring constant=k=?\r\nSolution:\r\nWe know\r\nF=kx\r\nð‘˜ð‘˜ = ð¹ð¹\r\nð‘¥ð‘¥\r\n= 100\r\n0.04\r\n=2500N/m\r\nk=2.5Ã—10^3 N/m', '2021-02-26 03:53:44'),
(11, 3, 8, 1, 2, 'Calculate the period and frequency of a propeller on a plane if it completes 250 cycles in 5.0 sec.', ' Given data:\r\nNo. of cycles=N=250\r\nTime for 250 cycles=t=5.0sec\r\nRequired:\r\ni. Time period=T=?\r\nii. Frequency=f=?\r\nSolution:\r\ni. We know that\r\nð‘‡ð‘‡ = ð‘¡ð‘¡\r\nð‘ð‘\r\nPutting values\r\nð‘‡ð‘‡ = 5.0\r\n250\r\nð‘‡ð‘‡ = 0.02 ð‘ ð‘ ð‘ ð‘ ð‘ ð‘ \r\nii. We know that\r\nð‘“ð‘“ = 1\r\nð‘‡ð‘‡\r\nPutting values\r\nð‘“ð‘“ = 1\r\n0.02\r\nð‘“ð‘“ = 50ð»z', '2021-02-26 03:54:56'),
(12, 3, 8, 1, 2, 'Water waves with wavelength 2.8m, produced in a ripple tank, travel with a speed of 3.80m/s. What is the frequency of the straight vibrator that produced them?', 'Given data:\r\nWave length =ðœ†ðœ† = 2.8ð‘šð‘š\r\nSpeed of waves= ð‘£ð‘£ = 3.80ð‘šð‘š/ð‘ ð‘ \r\nRequired:\r\nFrequency=f=?\r\nSolution:\r\nWe know that\r\nð‘£ð‘£ = ð‘“ð‘“ð‘“ð‘“\r\nð‘“ð‘“ = ð‘£ð‘£\r\nðœ†ðœ†\r\nPutting values\r\nð‘“ð‘“ = 3.80\r\n2.8\r\nð‘“ð‘“ = 1.357ð»z\r\nð‘“ð‘“ = 1.4ð»z ', '2021-02-26 03:56:04'),
(13, 3, 8, 1, 1, 'The distance between successive crests in a series of water waves is 4.0m and the crests travels 9.0m in 4.5 sec. What is the frequency of the waves?', ' Given data:\r\nDistance=s=9.0m\r\nWavelength= ðœ†ðœ† = 4.0ð‘šð‘š\r\nRequired:\r\nFrequency=f=?\r\nSolution:\r\nWe know that\r\nð‘£ð‘£ = ð‘ ð‘ \r\nð‘¡ð‘¡\r\nPutting values\r\nð‘£ð‘£ = 9.0\r\n4.5\r\nð‘£ð‘£ = 2ð‘šð‘š/ð‘ ð‘  âˆ’ âˆ’ âˆ’ âˆ’ âˆ’ âˆ’ð‘–ð‘–)\r\nAs we know that\r\nð‘£ð‘£ = ð‘“ð‘“ð‘“ð‘“\r\nð‘“ð‘“ = ð‘£ð‘£\r\nðœ†ðœ†\r\nPutting values\r\nð‘“ð‘“ = 2\r\n4.0\r\nð‘“ð‘“ = 0.5ð»z', '2021-02-26 03:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `mcqs`
--

DROP TABLE IF EXISTS `mcqs`;
CREATE TABLE IF NOT EXISTS `mcqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) DEFAULT NULL,
  `subjectid` int(11) DEFAULT NULL,
  `chapterid` int(11) DEFAULT NULL,
  `ques` text,
  `opt1` text,
  `opt2` text,
  `opt3` text,
  `opt4` text,
  `ans` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcqs`
--

INSERT INTO `mcqs` (`id`, `classid`, `subjectid`, `chapterid`, `ques`, `opt1`, `opt2`, `opt3`, `opt4`, `ans`, `created_at`) VALUES
(7, 3, 8, 1, 'Diffraction of wave can be observed clearly only when the size of slit or obstacle is nearly__________ to the wavelength of the wave:', 'Equal', 'Two times', 'Four times', 'None of these', 'Equal', '2021-02-26 04:05:22'),
(8, 3, 8, 1, 'The water waves after striking the hurdle will:', 'Reflect', 'Diffract', 'Refract', 'All a , b, c', 'Reflect', '2021-02-26 04:06:02'),
(9, 3, 8, 1, 'If mass of bob o a simple pendulum is doubled, its time period.', 'become four times', 'remains same', 'is doubled', 'none of the above', 'remains same', '2021-02-26 04:06:39'),
(10, 3, 8, 1, 'Shock absorbers in automobiles are one practical application of:', 'SHM', 'Random motion', 'Damped motion', 'None of these', 'Damped motion', '2021-02-26 04:07:15'),
(11, 3, 8, 1, 'Formula for time period of spring mass system is represented by:', 'T = 1/2âˆšm/k', 'T = 2âˆšk/m', 'T = 2âˆšm/k', 'T = 1/2âˆšk/m', 'T = 2âˆšm/k', '2021-02-26 04:08:47'),
(12, 3, 8, 1, 'In CD presence of pits is indicated by:', '0', '1', '2', '3', '1', '2021-02-26 04:09:23'),
(13, 3, 8, 1, 'The relation between v,f and Î» of a wave is:', 'fÎ» = v', 'v=Î»/f', 'vf=Î»', 'vÎ»=f', 'fÎ» = v', '2021-02-26 04:12:02'),
(14, 3, 8, 1, 'At extreme position potential energy of the pendulum is', 'zero', 'Maximum', 'Minimum', 'None of these', 'Maximum', '2021-02-26 04:13:21'),
(15, 3, 8, 1, 'Mathematical formula of spring constant is:', 'F/x', 'F/m', 'F/t', 'X/F', 'F/x', '2021-02-26 04:14:04'),
(16, 3, 8, 1, 'Which of the following is an example of simple harmonic motion ?', 'Motion of the simple pendulum', 'The spining of the Earth on its axis', 'A bouncing ball on a floor', 'The motion of ceiling fan', 'Motion of the simple pendulum', '2021-02-26 04:14:48'),
(17, 3, 8, 1, 'A large ripple tank with a vibrator working at a frequency of 30 Hz produces 25 complete wae in distance of 50 cm. The velocity of the wave is:', '60 cm/s', '750 cms', '54 cms', '1500 cms', '60 cm/s', '2021-02-26 04:15:58'),
(18, 3, 8, 1, 'Which of the following is a method of energy transfer:', 'Radiation', 'Conduction', 'Wave motion', 'All of these', 'All of these', '2021-02-26 04:16:31'),
(19, 3, 8, 1, 'The maximum displacement from mean position is called:', 'Maximum height', 'Intervel', 'Time period', 'Amplitude', 'Amplitude', '2021-02-26 04:17:15'),
(20, 3, 8, 1, 'In the vacuum all electromagnetic wave have the same', 'frequency', 'speed', 'wavelength', 'amplitude', 'speed', '2021-02-26 04:18:03'),
(21, 3, 8, 1, 'Waves whose speed is equal to speed of light are:', 'X rays', 'shock waves', 'electromagnetic waves', 'sound rays', 'electromagnetic waves', '2021-02-26 04:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

DROP TABLE IF EXISTS `paper`;
CREATE TABLE IF NOT EXISTS `paper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `clid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `chid` varchar(11) DEFAULT NULL,
  `name` text,
  `time` int(11) DEFAULT NULL,
  `mheading` text,
  `tm` int(11) DEFAULT NULL,
  `am` int(11) DEFAULT NULL,
  `mm` int(11) DEFAULT NULL,
  `sheading` text,
  `ts` int(11) DEFAULT NULL,
  `as` int(11) DEFAULT NULL,
  `ms` int(11) DEFAULT NULL,
  `lheading` text,
  `tl` int(11) DEFAULT NULL,
  `al` int(11) DEFAULT NULL,
  `ml` int(11) DEFAULT NULL,
  `sol` int(11) NOT NULL DEFAULT '1',
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`id`, `tid`, `clid`, `sid`, `chid`, `name`, `time`, `mheading`, `tm`, `am`, `mm`, `sheading`, `ts`, `as`, `ms`, `lheading`, `tl`, `al`, `ml`, `sol`, `datec`) VALUES
(16, 1, 3, 8, '%', 'New Sample Test Paper Name', 44, 'Attempt the Following MCQs. No Multiple Marking Allowed.', 9, 10, 1, 'Attempt any 5 Short Questions of your choice. Extra Questions are not Allowed.', 6, 5, 3, 'Attempt any 3 Long Questions of your choice.', 3, 2, 10, 1, '2021-03-02 02:12:23'),
(21, 1, 3, 8, '%', 'Test Paper 1', 35, 'Attempt the Following MCQs. No Multiple Marking Allowed.', 4, 4, 1, 'Attempt any 5 Short Questions of your choice. Extra Questions are not Allowed.', 5, 3, 2, 'Attempt any 3 Long Questions of your choice.', 0, 0, 0, 1, '2021-03-22 01:12:26'),
(22, 1, 3, 8, '%', 'Physics paper New', 36, 'Attempt the Following MCQs. No Multiple Marking Allowed.', 3, 3, 1, 'Attempt any 5 Short Questions of your choice. Extra Questions are not Allowed.', 3, 2, 2, 'Attempt any 3 Long Questions of your choice.', 3, 2, 9, 1, '2021-03-22 03:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `plong`
--

DROP TABLE IF EXISTS `plong`;
CREATE TABLE IF NOT EXISTS `plong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `typeid` int(11) DEFAULT NULL,
  `ordr` int(11) DEFAULT NULL,
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plong`
--

INSERT INTO `plong` (`id`, `pid`, `lid`, `typeid`, `ordr`, `datec`) VALUES
(31, 17, 6, 1, 2, '2021-03-03 08:38:38'),
(30, 17, 4, 1, 1, '2021-03-03 08:38:38'),
(29, 16, 12, 2, 3, '2021-03-02 02:12:23'),
(28, 16, 9, 2, 2, '2021-03-02 02:12:23'),
(27, 16, 11, 2, 1, '2021-03-02 02:12:23'),
(26, 16, 5, 1, 3, '2021-03-02 02:12:23'),
(25, 16, 7, 1, 2, '2021-03-02 02:12:23'),
(24, 16, 13, 1, 1, '2021-03-02 02:12:23'),
(32, 17, 8, 1, 3, '2021-03-03 08:38:38'),
(33, 17, 13, 1, 4, '2021-03-03 08:38:38'),
(34, 17, 7, 1, 5, '2021-03-03 08:38:38'),
(35, 17, 10, 2, 1, '2021-03-03 08:38:38'),
(36, 17, 11, 2, 2, '2021-03-03 08:38:38'),
(37, 17, 9, 2, 3, '2021-03-03 08:38:38'),
(38, 17, 12, 2, 4, '2021-03-03 08:38:38'),
(39, 18, 6, 1, 1, '2021-03-08 08:42:57'),
(40, 18, 5, 1, 2, '2021-03-08 08:42:57'),
(41, 18, 4, 1, 3, '2021-03-08 08:42:57'),
(42, 18, 7, 1, 4, '2021-03-08 08:42:57'),
(43, 18, 12, 2, 1, '2021-03-08 08:42:57'),
(44, 18, 9, 2, 2, '2021-03-08 08:42:57'),
(45, 18, 11, 2, 3, '2021-03-08 08:42:57'),
(46, 18, 10, 2, 4, '2021-03-08 08:42:57'),
(47, 19, 8, 1, 1, '2021-03-09 06:43:22'),
(48, 19, 13, 1, 2, '2021-03-09 06:43:22'),
(49, 19, 5, 1, 3, '2021-03-09 06:43:22'),
(50, 19, 7, 1, 4, '2021-03-09 06:43:22'),
(51, 19, 9, 2, 1, '2021-03-09 06:43:22'),
(52, 19, 12, 2, 2, '2021-03-09 06:43:22'),
(53, 19, 11, 2, 3, '2021-03-09 06:43:22'),
(54, 19, 10, 2, 4, '2021-03-09 06:43:22'),
(55, 20, 13, 1, 1, '2021-03-09 06:43:22'),
(56, 20, 6, 1, 2, '2021-03-09 06:43:22'),
(57, 20, 5, 1, 3, '2021-03-09 06:43:22'),
(58, 20, 7, 1, 4, '2021-03-09 06:43:22'),
(59, 20, 12, 2, 1, '2021-03-09 06:43:22'),
(60, 20, 9, 2, 2, '2021-03-09 06:43:22'),
(61, 20, 10, 2, 3, '2021-03-09 06:43:22'),
(62, 20, 11, 2, 4, '2021-03-09 06:43:22'),
(63, 22, 4, 1, 1, '2021-03-22 03:13:17'),
(64, 22, 7, 1, 2, '2021-03-22 03:13:17'),
(65, 22, 8, 1, 3, '2021-03-22 03:13:17'),
(66, 22, 12, 2, 1, '2021-03-22 03:13:17'),
(67, 22, 10, 2, 2, '2021-03-22 03:13:17'),
(68, 22, 9, 2, 3, '2021-03-22 03:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `pmcqs`
--

DROP TABLE IF EXISTS `pmcqs`;
CREATE TABLE IF NOT EXISTS `pmcqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `ordr` int(11) DEFAULT NULL,
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pmcqs`
--

INSERT INTO `pmcqs` (`id`, `pid`, `mid`, `ordr`, `datec`) VALUES
(77, 16, 16, 14, '2021-03-02 02:12:23'),
(76, 16, 9, 9, '2021-03-02 02:12:23'),
(80, 17, 7, 1, '2021-03-03 08:38:38'),
(74, 16, 20, 7, '2021-03-02 02:12:23'),
(79, 16, 13, 3, '2021-03-02 07:41:27'),
(72, 16, 12, 5, '2021-03-02 02:12:23'),
(71, 16, 10, 4, '2021-03-02 02:12:23'),
(70, 16, 15, 0, '2021-03-02 02:12:23'),
(69, 16, 7, 2, '2021-03-02 02:12:23'),
(68, 16, 8, 1, '2021-03-02 02:12:23'),
(81, 17, 9, 2, '2021-03-03 08:38:38'),
(82, 17, 21, 3, '2021-03-03 08:38:38'),
(83, 17, 20, 4, '2021-03-03 08:38:38'),
(84, 17, 16, 5, '2021-03-03 08:38:38'),
(85, 17, 8, 6, '2021-03-03 08:38:38'),
(86, 17, 17, 7, '2021-03-03 08:38:38'),
(87, 17, 12, 8, '2021-03-03 08:38:38'),
(88, 17, 13, 9, '2021-03-03 08:39:17'),
(89, 18, 21, 1, '2021-03-08 08:42:57'),
(90, 18, 20, 2, '2021-03-08 08:42:57'),
(91, 18, 9, 3, '2021-03-08 08:42:57'),
(92, 18, 18, 4, '2021-03-08 08:42:57'),
(93, 18, 11, 5, '2021-03-08 08:42:57'),
(94, 18, 19, 6, '2021-03-08 08:42:57'),
(97, 19, 15, 1, '2021-03-09 06:43:22'),
(98, 19, 11, 2, '2021-03-09 06:43:22'),
(99, 19, 7, 3, '2021-03-09 06:43:22'),
(100, 19, 16, 4, '2021-03-09 06:43:22'),
(101, 19, 8, 5, '2021-03-09 06:43:22'),
(102, 19, 19, 6, '2021-03-09 06:43:22'),
(103, 19, 21, 7, '2021-03-09 06:43:22'),
(104, 19, 17, 8, '2021-03-09 06:43:22'),
(105, 19, 18, 9, '2021-03-09 06:43:22'),
(106, 19, 12, 10, '2021-03-09 06:43:22'),
(107, 19, 13, 11, '2021-03-09 06:43:22'),
(108, 19, 10, 12, '2021-03-09 06:43:22'),
(109, 19, 14, 13, '2021-03-09 06:43:22'),
(110, 19, 20, 14, '2021-03-09 06:43:22'),
(111, 19, 9, 15, '2021-03-09 06:43:22'),
(112, 20, 9, 1, '2021-03-09 06:43:22'),
(113, 20, 18, 2, '2021-03-09 06:43:22'),
(114, 20, 8, 3, '2021-03-09 06:43:22'),
(115, 20, 14, 4, '2021-03-09 06:43:22'),
(116, 20, 13, 5, '2021-03-09 06:43:22'),
(117, 20, 16, 6, '2021-03-09 06:43:22'),
(118, 20, 10, 7, '2021-03-09 06:43:22'),
(119, 20, 12, 8, '2021-03-09 06:43:22'),
(120, 20, 15, 9, '2021-03-09 06:43:22'),
(121, 20, 17, 10, '2021-03-09 06:43:22'),
(122, 20, 19, 11, '2021-03-09 06:43:22'),
(123, 20, 7, 12, '2021-03-09 06:43:22'),
(124, 20, 20, 13, '2021-03-09 06:43:22'),
(125, 20, 21, 14, '2021-03-09 06:43:22'),
(126, 20, 11, 15, '2021-03-09 06:43:22'),
(127, 21, 18, 1, '2021-03-22 01:12:26'),
(128, 21, 16, 2, '2021-03-22 01:12:26'),
(129, 21, 15, 3, '2021-03-22 01:12:26'),
(130, 21, 20, 4, '2021-03-22 01:12:26'),
(131, 22, 11, 1, '2021-03-22 03:13:17'),
(132, 22, 20, 2, '2021-03-22 03:13:17'),
(133, 22, 9, 3, '2021-03-22 03:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `pshort`
--

DROP TABLE IF EXISTS `pshort`;
CREATE TABLE IF NOT EXISTS `pshort` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `ordr` int(11) DEFAULT NULL,
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pshort`
--

INSERT INTO `pshort` (`id`, `pid`, `sid`, `ordr`, `datec`) VALUES
(32, 16, 11, 6, '2021-03-02 02:12:23'),
(31, 16, 7, 5, '2021-03-02 02:12:23'),
(30, 16, 5, 4, '2021-03-02 02:12:23'),
(29, 16, 4, 3, '2021-03-02 02:12:23'),
(28, 16, 10, 2, '2021-03-02 02:12:23'),
(27, 16, 12, 1, '2021-03-02 02:12:23'),
(33, 17, 5, 1, '2021-03-03 08:38:38'),
(34, 17, 12, 2, '2021-03-03 08:38:38'),
(35, 17, 11, 3, '2021-03-03 08:38:38'),
(36, 17, 3, 4, '2021-03-03 08:38:38'),
(37, 17, 9, 5, '2021-03-03 08:38:38'),
(38, 17, 10, 6, '2021-03-03 08:38:38'),
(39, 18, 3, 1, '2021-03-08 08:42:57'),
(40, 18, 10, 2, '2021-03-08 08:42:57'),
(41, 18, 7, 3, '2021-03-08 08:42:57'),
(42, 18, 8, 4, '2021-03-08 08:42:57'),
(43, 18, 4, 5, '2021-03-08 08:42:57'),
(44, 19, 5, 1, '2021-03-09 06:43:22'),
(45, 19, 3, 2, '2021-03-09 06:43:22'),
(46, 19, 12, 3, '2021-03-09 06:43:22'),
(47, 19, 6, 4, '2021-03-09 06:43:22'),
(48, 19, 8, 5, '2021-03-09 06:43:22'),
(49, 19, 7, 6, '2021-03-09 06:43:22'),
(50, 19, 10, 7, '2021-03-09 06:43:22'),
(51, 19, 9, 8, '2021-03-09 06:43:22'),
(52, 20, 12, 1, '2021-03-09 06:43:22'),
(53, 20, 8, 2, '2021-03-09 06:43:22'),
(54, 20, 11, 3, '2021-03-09 06:43:22'),
(55, 20, 10, 4, '2021-03-09 06:43:22'),
(56, 20, 5, 5, '2021-03-09 06:43:22'),
(57, 20, 7, 6, '2021-03-09 06:43:22'),
(58, 20, 9, 7, '2021-03-09 06:43:22'),
(59, 20, 3, 8, '2021-03-09 06:43:22'),
(60, 21, 10, 1, '2021-03-22 01:12:26'),
(61, 21, 12, 2, '2021-03-22 01:12:26'),
(62, 21, 9, 3, '2021-03-22 01:12:26'),
(63, 21, 6, 4, '2021-03-22 01:12:26'),
(64, 21, 11, 5, '2021-03-22 01:12:26'),
(65, 22, 4, 1, '2021-03-22 03:13:17'),
(66, 22, 10, 2, '2021-03-22 03:13:17'),
(67, 22, 3, 3, '2021-03-22 03:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `slong`
--

DROP TABLE IF EXISTS `slong`;
CREATE TABLE IF NOT EXISTS `slong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `solid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `typeid` int(11) DEFAULT NULL,
  `ans` text,
  `img` text,
  `correct` int(11) NOT NULL DEFAULT '0',
  `marks` int(11) NOT NULL DEFAULT '0',
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slong`
--

INSERT INTO `slong` (`id`, `solid`, `sid`, `pid`, `lid`, `typeid`, `ans`, `img`, `correct`, `marks`, `datec`) VALUES
(1, 11, 1, 22, 4, 1, ' simple pendulum? Diagrammatically show the forces acting on simple pendulum. Also show thasimple pendulum? Diagrammatically show the forces acting on simple pendulum. Also show thasimple pendulum? Diagrammatically show the forces acting on simple pendulum. Also show tha', '', 0, 0, '2021-03-22 07:07:03'),
(2, 11, 1, 22, 7, 1, ' ', '', 0, 0, '2021-03-22 07:07:03'),
(3, 11, 1, 22, 8, 1, ' ripple tank explain reflection, refraction and diffraction of waves.\r\n\r\n simple pendulum? Diagrammatically show the forces acting on simple pendulum. Also show thasimple pendulum?  ripple tank explain reflection, refraction and diffraction of waves.\r\n\r\n ripple tank explain reflection, refraction and diffraction of waves.\r\n\r\nDiagrammatically show the forces acting on simple pendulum. Also show thasimple pendulum? Diagrammatically show the forces acting on simple pendulum. Also show thasimple pendulum? Diagrammatically show the forces acting on simple pendulum. Also show thasimple pendulum? Diagrammatically show the forces acting on simple pendulum. Also show thasimple pendulum? Diagrammatically show the forces acting on simple pendulum. Also show thasimple pendulum? Diagrammatically show the forces acting on simple pendulum. Also show tha', '', 0, 0, '2021-03-22 07:07:03'),
(4, 11, 1, 22, 9, 2, ' ', '', 0, 0, '2021-03-22 07:07:03'),
(5, 11, 1, 22, 10, 2, ' ', '1e552704b36c8fc10db42169eb23df541.png', 0, 0, '2021-03-22 07:07:03'),
(6, 11, 1, 22, 12, 2, ' simple pendulum? Diagrammatically show the forces acting on simple pendulum. Also show thasimple pendulum? Diagrammatically show the forces acting on simple pendulum. Also show thasimple pendulum? Diagrammatically show the forces acting on simple pendulum. Also show thasimple pendulum? Diagrammatically show the forces acting on simple pendulum. Also show thasimple pendulum? Diagrammatically show the forces acting on simple pendulum. Also show tha', '9c498cebc7c469704bc1f3266d537d1e1.png', 0, 0, '2021-03-22 07:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `smcqs`
--

DROP TABLE IF EXISTS `smcqs`;
CREATE TABLE IF NOT EXISTS `smcqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `solid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `ans` text,
  `correct` int(11) NOT NULL DEFAULT '0',
  `marks` int(11) NOT NULL DEFAULT '0',
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smcqs`
--

INSERT INTO `smcqs` (`id`, `solid`, `sid`, `pid`, `mid`, `ans`, `correct`, `marks`, `datec`) VALUES
(41, 12, 1, 16, 15, 'F/x', 1, 1, '2021-03-22 08:57:56'),
(40, 12, 1, 16, 10, 'SHM', 0, 0, '2021-03-22 08:57:56'),
(39, 11, 1, 22, 20, 'speed', 1, 1, '2021-03-22 06:41:12'),
(38, 11, 1, 22, 11, 'T = 1/2âˆšk/m', 0, 0, '2021-03-22 06:41:12'),
(37, 11, 1, 22, 9, 'become four times', 0, 0, '2021-03-22 06:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `spaper`
--

DROP TABLE IF EXISTS `spaper`;
CREATE TABLE IF NOT EXISTS `spaper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `mcqs` int(11) NOT NULL DEFAULT '0',
  `short` int(11) NOT NULL DEFAULT '0',
  `long` int(11) NOT NULL DEFAULT '0',
  `mm` int(11) NOT NULL DEFAULT '0',
  `ms` int(11) NOT NULL DEFAULT '0',
  `ml` int(11) NOT NULL DEFAULT '0',
  `m` int(11) NOT NULL DEFAULT '0',
  `s` int(11) NOT NULL DEFAULT '0',
  `l` int(11) NOT NULL DEFAULT '0',
  `tm` int(11) DEFAULT NULL,
  `ts` int(11) DEFAULT NULL,
  `tl` int(11) DEFAULT NULL,
  `stime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spaper`
--

INSERT INTO `spaper` (`id`, `sid`, `pid`, `mcqs`, `short`, `long`, `mm`, `ms`, `ml`, `m`, `s`, `l`, `tm`, `ts`, `tl`, `stime`, `etime`) VALUES
(10, 1, 21, 4, 3, 0, 1, 2, 0, 1, 1, 0, 3, NULL, NULL, '2021-03-22 01:13:03', '2021-03-21 22:15:52'),
(13, 1, 16, 10, 5, 2, 1, 3, 10, 1, 0, 0, 0, NULL, NULL, '2021-03-22 12:39:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sques`
--

DROP TABLE IF EXISTS `sques`;
CREATE TABLE IF NOT EXISTS `sques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) DEFAULT NULL,
  `subjectid` int(11) DEFAULT NULL,
  `chapterid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sques`
--

INSERT INTO `sques` (`id`, `classid`, `subjectid`, `chapterid`, `ques`, `ans`, `created_at`) VALUES
(3, 3, 8, 1, 'What is simple harmonic motion? What are the conditions for an object to oscillate with SHM?', ' Simple Harmonic Motion:\r\nSimple harmonic motion is the type of vibratory motion in which the acceleration is\r\ndirectly proportional to the displacement from the equilibrium position and is always directed\r\ntowards the equilibrium position.\r\nExplanations:\r\nIf â€œaâ€ is the acceleration of the body and â€œxâ€ represents the displacement of the body from\r\nits mean position.\r\nConditions of SHM:\r\nThe characteristic of SHM are as follows:\r\ni. In SHM a body oscillates about a mean position 0.\r\nii. A restoring force is always directed towards the mean position 0. The acceleration produced\r\nby it is also directed towards the mean position.\r\niii. Its acceleration is directly proportional to its displacement from the mean position. i.e. ð‘Ž âˆ âˆ’x', '2021-02-26 03:29:53'),
(4, 3, 8, 1, 'Show that the mass spring system executes SHM', '  Mass Spring System\r\nConsider a block of mass m attached to one end of elastic string, which can move freely on a\r\nfrictionless horizontal surface as show in figure\r\nExplanation:\r\nWhen the block is displaced the elastic\r\nrestoring force pulls the block towards equilibrium\r\nposition. For an ideal spring that obeys Hookâ€™s law\r\nthe elastic restoring force Fres is directly proportional\r\nto the displacement x from equilibrium position.\r\nð¹res âˆ âˆ’x', '2021-02-26 03:30:52'),
(5, 3, 8, 1, 'Is every oscillatory motion simple harmonic? Give example.', 'No, it is not necessary for every oscillatory motion to be simple harmonic motion. Since all\r\nrestoring forces are not proportional to the displacement. While for SHM the following two\r\nconditions must be satisfied.\r\na) The acceleration of the vibrating body is directly proportional to the displacement and is\r\ndirected towards the mean position.\r\nb) The resorting force is proportional to the displacement and is directed towards the mean\r\nposition.\r\nExample:\r\nMotion of simple pendulum and spring mass system are both oscillatory and simple harmonic\r\nmotion.\r\nWhereas, the Earth revolving around the Sun, a bouncing ball are examples of oscillatory\r\nmotion but not simple harmonic motion. ', '2021-02-26 03:32:57'),
(6, 3, 8, 1, 'For a particle with simple harmonic motion, at what point of the motion does the velocity attain maximum magnitude? Minimum magnitude?', ' For a particle executing SHM its total energy at any instant of time is constant. That is the\r\nsum of kinetic and potential energy remains the same at every point.\r\nWhen the particle is at mean position, the K.E is maximum so at this position the velocity of the\r\nparticle will be maximum.\r\nAt extreme position the particle come to rest and due to restoring force it moves backward.\r\nTherefore, at extreme position it K.E is zero. So, at this position the velocity of the particle will be\r\nminimum or zero.', '2021-02-26 03:33:21'),
(7, 3, 8, 1, 'Is the restoring force on a mass attached to spring in simple harmonic motion ever zero? If so, where?', ' Yes, the restoring force in SHM become zero at the mean position. According to Hookâ€™s law,\r\nwe have\r\nF=-kx---------(1)\r\nIn equation (1) â€˜xâ€™ represents the displacement of vibrating body from mean position.\r\nNow at the mean position, we have\r\nx=0\r\nso, equation (1) becomes\r\nF=-k(0)\r\nF=0 ------ (2)\r\nEquation (2) shows that the restoring force is zero at mean position.', '2021-02-26 03:33:55'),
(8, 3, 8, 1, 'If we shorten the string of the pendulum to half its original length, what is the effect on its time period and frequency?', ' i)we know that the time period of simple pendulum is given by\r\nð‘‡ð‘‡ = 2ðœ‹ðœ‹ï¿½â„“\r\nð‘”ð‘”\r\n ------------- (1)\r\nPut â„“=\r\nâ„“\r\n2\r\n in eq (1), as length of string decreased to half, so we get\r\nð‘‡ð‘‡â€² = 2ðœ‹ðœ‹ï¿½â„“/2\r\nð‘”ð‘”\r\nð‘‡ð‘‡â€² = 2ðœ‹ðœ‹ï¿½ â„“\r\n2ð‘”ð‘”\r\nð‘‡ð‘‡â€² = 2ðœ‹ðœ‹\r\n1\r\nâˆš2\r\nï¿½â„“\r\nð‘”ð‘”\r\nð‘‡ð‘‡â€² = 1\r\nâˆš2\r\nï¿½2ðœ‹ðœ‹ ï¿½â„“\r\nð‘”ð‘”\r\nï¿½\r\nð‘‡ð‘‡â€² = 1\r\nâˆš2\r\nT\r\nð‘‡ð‘‡â€² = ð‘‡ð‘‡\r\nâˆš2\r\n ------- (2)\r\nEquation (2) shows that the time period will decreased by the factor 1\r\nâˆš2 when the length of the\r\nstring becomes half.\r\nii) The frequency of the simple pendulum is given by formula\r\nð‘“ð‘“ = 1\r\n2ðœ‹ðœ‹ ï¿½ð‘”ð‘”\r\nâ„“\r\n ------------- (3)', '2021-02-26 03:34:36'),
(9, 3, 8, 1, ' A thin rope hangs from dark high tower so that its upper end is not visible. How can the length of the rope be determined?', ' To determine the length of rope we attach a stone to its lower end of rope, so that the\r\narrangement becomes like a simple pendulum.\r\nNow time period of simple pendulum is\r\nT= 2ðœ‹ðœ‹ï¿½â„“\r\nð‘”ð‘”\r\nSquaring both sides\r\n(T)2\r\n= (2ðœ‹ðœ‹ï¿½â„“\r\nð‘”ð‘” )\r\n2\r\nâŸ¹ T2\r\n= 4ðœ‹ðœ‹2 â„“\r\nð‘”ð‘”\r\nâŸ¹ gT2\r\n= 4ðœ‹ðœ‹2 â„“\r\nâŸ¹ â„“=\r\nð‘”ð‘”ð‘”ð‘”2\r\n4ðœ‹ðœ‹2 ------ (1)\r\nNow set pendulum into vibration and note the time period of pendulum for one vibration which\r\ngives the time period. Put values of â€œgâ€, â€œTâ€ and â€œðœ‹ðœ‹â€ in eq(1) the length of rope can be calculated.', '2021-02-26 03:38:52'),
(10, 3, 8, 1, 'Explain the difference between the speed of transverse wave traveling along a cord and the speed of a tiny colored part of the cord?', ' Transverse waves are those in which particles of the medium vibrate at right angle to the\r\ndirection of propagation of wave motion.\r\nConsider a cord having a colored tiny part. Itâ€™s one end is fixed and the other end is in our hand.\r\nIf we move our hand up and down transverse waves are produced moving in forward direction. As\r\nthese are transverse waves, so each part of the string moves up and down i.e. vibrating up and\r\ndown, while the transverse waves move in the forward direction. Thus, transverse waves move in\r\nthe forward direction while the colored tiny part of the string moves up and down executing SHM.', '2021-02-26 03:44:48'),
(11, 3, 8, 1, 'Why waves refract at the boundary of shallow and deep water?', ' Refraction of waves involves a change in the direction of waves as they pass from one\r\nmedium to another. In refraction, both speed and wavelength of waves change. The speed of a\r\nwave depends upon the properties of a medium through which it travels. The speed of waves is\r\nnot same in shallow and deep water. Wave travel faster in deep water as compared to shallow\r\nwater. Refraction occurs as the speed of the wave changes.\r\nThus, if water waves are passing from deep water into shallow water, they slow down. The speed\r\nof wave is proportional to the wavelength. So when waves are transmitted from deep water into\r\nshallow water, its speed and wavelength decreases and wave change its direction i.e. refracted.', '2021-02-26 03:45:26'),
(12, 3, 8, 1, 'What is the effect on diffraction if the opening is made small?', ' Diffraction is the bending of waves around corners of an obstacle. The amount of bending of\r\na wave depends upon the relative size of the wavelength of the wave and size of the opening.\r\nIf the opening is much larger than the wavelength, then very less bending occurs which is\r\nun-noticeable. However, the separation is comparable to the size of the wavelength, and then a\r\nconsiderable bending occurs and can be seen easily with naked eye. Thus, the wave bends more\r\nand more if the opening is made small.', '2021-02-26 03:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `sshort`
--

DROP TABLE IF EXISTS `sshort`;
CREATE TABLE IF NOT EXISTS `sshort` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `solid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `sqid` int(11) NOT NULL,
  `ans` text,
  `img` text,
  `correct` int(11) NOT NULL DEFAULT '0',
  `marks` int(11) NOT NULL DEFAULT '0',
  `datec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sshort`
--

INSERT INTO `sshort` (`id`, `solid`, `sid`, `pid`, `sqid`, `ans`, `img`, `correct`, `marks`, `datec`) VALUES
(30, 11, 1, 22, 10, ' ', '0b0a2abf2e9fa82ff2caef97882c4aed1.png', 0, 0, '2021-03-22 06:43:02'),
(26, 10, 1, 21, 11, ' refract at the boundary of shallow and deep wrefract at the boundary of shallow and deep wrefract at the boundary of shallow and deep w', '', 0, 0, '2021-03-22 02:49:42'),
(27, 10, 1, 21, 12, ' ', '0f8f501cf7871d0849a5e2140a0331bb1.png', 0, 0, '2021-03-22 02:49:42'),
(28, 11, 1, 22, 3, ' ', '', 0, 0, '2021-03-22 06:43:02'),
(29, 11, 1, 22, 4, '  What is simple pendulum? Diagrammatically show the forces acting on simple pendulum. Also show that simple\r\npendulum executes SHM. \r\nb) Water waves with wavelength 2.8m, produced in a ripple tank, travel with a speed of 3.80m/s. What is the\r\nfrequency of the straight vibrator that produced them? \r\nQuestion 2: \r\na) Prove the relation between wave speed, wavelength and frequency of wave. \r\nb) A spring requires a force of 100.0N to compress it to a displacement of 4cm.what is its spring constant? ', '', 0, 0, '2021-03-22 06:43:02'),
(23, 10, 1, 21, 6, ' ', '', 0, 0, '2021-03-22 02:49:42'),
(24, 10, 1, 21, 9, ' upper end is not visible. How can the length of the rope be deteupper end is not visible. How can the length of the rope be deteupper end is not visible. How can the length of the rope be deteupper end is not visible. How can the length of the rope be dete', '68cba4679aab08cf16282d5cdf1b2ca91.png', 0, 0, '2021-03-22 02:49:42'),
(25, 10, 1, 21, 10, 'between the speed of transverse wave traveling along a cord and the speed of a tiny colored part between the speed of transverse wave traveling along a cord and the speed of a tiny colored part between the speed of transverse wave traveling along a cord and the speed of a tiny colored part between the speed of transverse wave traveling along a cord and the speed of a tiny colored part ', '', 0, 0, '2021-03-22 02:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(31) NOT NULL,
  `password` varchar(21) NOT NULL,
  `classid` int(11) DEFAULT NULL,
  `img` text,
  `phone` text,
  `block` int(11) DEFAULT '0',
  `blockres` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `password`, `classid`, `img`, `phone`, `block`, `blockres`, `created_at`) VALUES
(1, 'Demo Student', 'student@123.com', 'student', 3, '69c8068bd3838527e28e1e004e2359981.png', '2423423', 0, NULL, '2021-02-17 13:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `ordr` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `ordr`, `created_at`) VALUES
(10, 'Chemistry', 4, '2021-02-17 15:06:05'),
(9, 'Pak-Studies 2', 45, '2021-02-17 15:05:46'),
(8, 'Physics', 0, '2021-02-17 15:05:35'),
(11, 'Islamiat', 2, '2021-02-17 15:06:19'),
(12, 'English', 8, '2021-02-22 07:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(31) NOT NULL,
  `password` varchar(21) NOT NULL,
  `classid` int(11) DEFAULT NULL,
  `img` text,
  `phone` text,
  `block` int(11) DEFAULT '0',
  `blockres` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `password`, `classid`, `img`, `phone`, `block`, `blockres`, `created_at`) VALUES
(1, 'Demo Teacher', 'teacher@123.com', 'teacher', 3, '8e272d2f933400f71138e685cbe091b51.png', '2423423', 0, '', '2021-02-17 13:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Part (a) / Theory'),
(2, 'Part (b) / Numerical');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
