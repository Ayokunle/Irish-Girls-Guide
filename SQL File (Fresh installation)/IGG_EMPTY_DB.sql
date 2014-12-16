-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2013 at 01:34 AM
-- Server version: 5.1.68-cll
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quickbiz_lex`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `Activity_id` int(10) NOT NULL AUTO_INCREMENT,
  `Activity_Description` varchar(500) NOT NULL,
  PRIMARY KEY (`Activity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`Activity_id`, `Activity_Description`) VALUES
(1, 'Show that you can care and wear your Guide uniform correctly.'),
(2, 'Discover at least eight things that you have in common with Guides all over the World.'),
(3, 'Find out about Guiding in another country and show how it is similar to and different from Guiding in Ireland.'),
(4, 'Bring a friend who has never been to Guides to a Guide meeting or event.'),
(5, 'Learn how to hoist The Irish Girl Guide or World Flag.'),
(6, 'Make a chart showing the structure of The Irish Girl Guides (IGG).'),
(7, 'Learn how to play Captainball.'),
(8, 'Take part in a Senior Branch event – a hike, weekend away, etc.'),
(9, 'Take part in games or activities that help you to learn about Catholic Guides of Ireland (CGI), Girl Guiding Ulster and Council of Irish Guiding Associations (CIGA).'),
(10, 'Find out about the four World Centres – their locations, logos, their basic programmes, when they were founded, etc.'),
(11, 'Know all the Units operating in your District or Area and write the names of your District Commissioner and your Area Commissioner below.'),
(12, 'Help plan and carry out a Guides’ Own.'),
(13, 'Keep a personal logbook/scrapbook for at least three months about your Guiding activities.'),
(14, 'Take part in a District/Area event and know the name of the District/Area Commissioner.'),
(15, 'Find out about International opportunities available to members of The Irish Girl Guides and how to apply for them.'),
(16, 'With your Patrol or Unit think of ways to advertise your Guide unit and demonstrate one of them.'),
(17, 'With your Patrol plan an activity, display or entertainment for Thinking Day.'),
(18, 'Attend two Ranger/Young Leader meetings and find out about the programme they follow.'),
(19, 'Help at three Ladybird Guide or Brownie Guide meetings and tell them a little about what you do at Guides.'),
(20, 'With another Guide, plan and organize a Unit meeting.'),
(21, 'Invite a young person who has attended an International Guiding event to come to your meeting and talk about the event.'),
(22, 'With other Guides learn and sing The World Song.'),
(23, 'Take part in a Regional, National or International event.'),
(24, 'Through Post Box, correspond with a Guide from another country, exchanging at least three letters, faxes or e-mails.'),
(25, 'A challenge designed to suit your own particular interest.'),
(26, 'With your Patrol build an outdoor shelter.'),
(27, 'Know at least six common trees, and be able to recognise their leaves, buds and fruit.'),
(28, 'Try an adventurous activity such as rock climbing, canoeing, caving with the help of an expert.'),
(29, 'Pitch & strike a tent; know how to care for it.'),
(30, 'Tie up a bedding roll correctly and play a game throwing it in order to test it.'),
(31, 'Lay a trail for your Patrol using tracking signs.'),
(32, 'Make a simple bird feeder and keep a record for two months of the birds seen on a bird table.'),
(33, 'Be able to tie a reef knot, bowline, a clove hitch, a round turn and two half hitches and a sheetbend and demonstrate the use of each one.'),
(34, 'Make a compass showing the 16 points.'),
(35, 'Keep a diary for at least one month noting wildlife and weather.'),
(36, 'Go on an overnight hike.'),
(37, 'Plan, organise and carry out an orienteering course, cover 1-1.5km using a compass.'),
(38, 'Join in an outdoor activity with your Patrol e.g. a hike, a cookout, a wide game.'),
(39, 'Cook a balanced two course meal out of doors for your Patrol.'),
(40, 'Play a stalking game with your Patrol or Unit.'),
(41, 'Compile a campfire songbook containing a variety of items (at least 20) which you have learned.'),
(42, 'Using your pioneering skills construct a bridge or a ladder and try it out.'),
(43, 'Demonstrate the use and care of an axe and a saw.'),
(44, 'Recognise at least 10 spring/summer wild flowers and give reasons why they should not be picked.'),
(45, 'Produce a full personal camp kit, correctly packed and explain to a Patrol why each item is needed.'),
(46, 'Organise an outdoor activity with another Guiding Branch e.g. Ladybird Guides, Brownie Guides.'),
(47, 'A Challenge designed to suit your own particular interest.'),
(48, 'Find out local places of worship and be able to direct a visitor of another denomination.'),
(49, 'Inspect your meeting place to see if it is fire safe.'),
(50, 'Take part in activities that show that you understand the real meaning of thrift as regards time and money.'),
(51, 'Make brown or white soda bread.'),
(52, 'Learn about the dangers in your area caused by pollution and find out what is being done to lessen these dangers.'),
(53, 'Recycle household materials with your family for at least one month &Carry out a survey of recycling facilities in your area.'),
(54, 'Make an Irish gift for a Guide in another country.'),
(55, 'Take your Patrol to visit a place of historical or cultural interest and report on it.'),
(56, 'Describe the common pests that affect indoor plants and know how to control them.'),
(57, 'Know the care needed when storing and cooking/reheating fresh, frozen and cooked food.'),
(58, 'Come up with two ways you could save on water and electricity usage. Try these methods for a month and report on your findings.'),
(59, 'Find out about endangered species in Ireland and what is being done to protect them.'),
(60, 'Find out about the origins of the town in which you live.'),
(61, 'Take part in a local conservation or Tidy Towns project.'),
(62, 'Study the building in which your Guide Unit meets and evaluate how suitable it is for those with disabilities.'),
(63, 'Find out about the work of some organisations involved in conservation and present or display what you have learned.'),
(64, 'On your own or with others, present an Irish cultural activity e.g. song, dance, legend.'),
(65, 'Help to redecorate a room, to incorporate furnishings, wallpapering, painting, etc.'),
(66, 'Know the importance of keeping dangerous articles and substances out of the reach of children.'),
(67, 'Demonstrate your ability to clean and vacuum a room: be able to unblock a vacuum cleaner and fit a dust bag.'),
(68, 'Find out ten interesting facts about a famous person/event connected with your area.'),
(69, 'Understand the meaning of the laundry symbols.'),
(70, 'A challenge designed to suit your own particular interest.'),
(71, 'Make a list of the foods you have eaten for the last 3 days, Decide if you have a healthy balanced diet and if there could be improvement.'),
(72, 'Demonstrate what to do if (i) a stranger offers you a lift, (ii) you witness an accident, (iii) someone is being bullied.'),
(73, 'With your patrol experiment with different hairstyles. Find out how the different hair types – know your own hair type and how to care for it.'),
(74, 'Cover one mile in approximately 12 minutes using Scouts Pace.'),
(75, 'Find out about the sporting clubs and facilities in your locality.'),
(76, 'Know how to maintain healthy toilet and wash areas at camp.'),
(77, 'Take part in a fitness activity for charity e.g. sponsored walk.'),
(78, 'Make a poster to show the correct clothing and equipment for a sport with which you are familiar.'),
(79, 'Take part in a water sport and know the importance of water safety.'),
(80, 'Take part in an Orienteering activity.'),
(81, 'Make a healthy lunch for a school/hike, show it to and discuss it with your Guider.'),
(82, 'Know how someone with a disability could participate in your favourite sport.'),
(83, 'Know what  immunisations and vaccinations you have received and know what diseases they prevent.'),
(84, 'Create an obstacle course and challenge your Patrol or Unit.'),
(85, 'Make a “Do and Don’t” chart about the importance of safety in the sun.'),
(86, 'Take part in a skipping or swimming challenge with your Patrol.'),
(87, 'Improve your athletic skills – running 100 metres, long jump, swimming 100 metres etc.'),
(88, 'Make a chart showing your Patrol’s favourite foods and see how healthy your diets are.'),
(89, 'With your Patrol have a go at exercise used for relaxation, use them at home for a month and see if they work for you.'),
(90, 'Find out the dietary needs of people with such conditions as diabetes, celiac disease, etc.'),
(91, 'With other Guides, hold a fashion parade to show suitable clothing for the following, hike, party, sports, Guides.'),
(92, 'A challenge designed to suit your own particular interest.'),
(93, 'Know how to summon the emergency services and what information they should be given.'),
(94, 'Know how to replace a lightbulb, change a plug and replace a fuse.'),
(95, 'Discuss the feelings you experience when you lose something of value.'),
(96, 'Prepare and present a talk on a topic of your choice.'),
(97, 'Know how to use a microwave and the important safety points about microwave cooking. Cook something & bring letter from parent.'),
(98, 'Design a fire prevention poster and know what to do if fire breaks out at home, at camp and at places of public assembly.'),
(99, 'Improve your self-esteem by taking part in activities which create a more positive personal image.'),
(100, 'Demonstrate your efficiency in using a computer to write a letter, report or other document.'),
(101, 'Demonstrate how to load and use a camera properly.'),
(102, 'Complete a minimum of 2 hours in a Guide Association Special Service Project (GASSP).'),
(103, 'Demonstrate that you know how to check the following in a car – oil, water in radiator and battery, brake fluid.'),
(104, 'Take part in activities which help you to learn decision making skills.'),
(105, 'Learn resuscitation and the recovery position from a qualified instructor.'),
(106, 'Find the way from one place to another by using a map.'),
(107, 'Talk to a nurse or child care worker about the responsibilities of a babysitter.'),
(108, 'Know how to defrost a fridge and turn off water/gas/electricity at the mains.'),
(109, 'Show that you know how to lead a healthy lifestyle.'),
(110, 'Take part in activities which help you to become aware of prejudice and discrimination.'),
(111, 'Clarify your knowledge of HIV/AIDS by taking part in activities on the topic.'),
(112, 'Take part in a debate as one of the speakers.'),
(113, 'A challenge designed to suit your own particular interest.'),
(114, 'Make a scrapbook on a person/group/team you admire.'),
(115, 'With your Patrol learn a song that is associated with your area/country.'),
(116, 'Read an interesting book and tell your Patrol about it.'),
(117, 'Research your hobby on the internet and share it with your Patrol.'),
(118, 'Make a kite. Fly it safely outside.'),
(119, 'Be a collector of a chosen item for at least three months, mount it and make a display.'),
(120, 'With your Patrol, discuss and compare your favourite TV programmes.'),
(121, 'Carry out routine maintenance on your bike and know the safety precautions needed when you are cycling it.'),
(122, 'Play three contrasting pieces of music on an instrument of your choice.'),
(123, 'Take part in a concert, play, etc'),
(124, 'Make a friendship bracelet.'),
(125, 'Eat a meal (that you haven’t tried before) from another culture.'),
(126, 'With your Patrol, work out a secret code and exchange a message with another Patrol.'),
(127, 'Make a presentation using words, pictures, charts or videos about one of the following: a hobby, an activity you participate in or something that interests you.'),
(128, 'Make a mobile.'),
(129, 'Use a home made instrument to accompany a Patrol/Unit song.'),
(130, 'Make yourself something to wear.'),
(131, 'Make a useful item from recycled materials.'),
(132, 'Knit a small article from a pattern.'),
(133, 'Visit a library and find out what facilities are available and how to use a library catalogue.'),
(134, 'On a computer, design a Guide Certificate, Guide special occasion card or Guide poster.'),
(135, 'Make a flower arrangement and know the different types of oasis.'),
(136, 'Make a scrapbook about three religions or cultures other than your own.'),
(137, 'A challenge designed to suit your own particular interest.');

-- --------------------------------------------------------

--
-- Table structure for table `activityaward`
--

CREATE TABLE IF NOT EXISTS `activityaward` (
  `ActivityID` int(10) NOT NULL,
  `Award_id` int(20) NOT NULL,
  PRIMARY KEY (`ActivityID`,`Award_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activityaward`
--

INSERT INTO `activityaward` (`ActivityID`, `Award_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 1),
(5, 2),
(6, 2),
(7, 3),
(8, 4),
(9, 2),
(10, 2),
(11, 1),
(12, 4),
(13, 1),
(13, 2),
(13, 3),
(14, 2),
(15, 4),
(16, 0),
(17, 1),
(17, 2),
(17, 3),
(18, 4),
(19, 3),
(20, 4),
(21, 2),
(21, 3),
(22, 2),
(23, 0),
(24, 0),
(25, 0),
(26, 1),
(26, 2),
(26, 3),
(27, 1),
(28, 0),
(29, 2),
(30, 1),
(31, 1),
(32, 3),
(33, 3),
(34, 1),
(35, 2),
(36, 4),
(37, 4),
(38, 1),
(38, 2),
(38, 3),
(39, 4),
(40, 1),
(41, 2),
(42, 3),
(42, 4),
(43, 3),
(44, 1),
(44, 2),
(44, 3),
(45, 1),
(45, 2),
(45, 3),
(46, 4),
(47, 0),
(48, 1),
(49, 1),
(50, 2),
(51, 3),
(52, 2),
(52, 4),
(53, 1),
(54, 2),
(55, 3),
(55, 4),
(56, 3),
(57, 2),
(58, 1),
(59, 4),
(60, 3),
(60, 4),
(61, 1),
(62, 2),
(63, 4),
(64, 1),
(64, 2),
(65, 3),
(65, 4),
(66, 2),
(67, 1),
(70, 0),
(71, 1),
(72, 1),
(73, 4),
(74, 1),
(75, 2),
(76, 2),
(77, 0),
(78, 2),
(79, 4),
(80, 2),
(80, 3),
(81, 2),
(81, 3),
(82, 4),
(83, 2),
(83, 3),
(84, 1),
(85, 1),
(85, 2),
(86, 2),
(87, 4),
(88, 3),
(89, 4),
(90, 4),
(91, 2),
(92, 0),
(93, 1),
(93, 2),
(94, 2),
(95, 1),
(95, 2),
(95, 3),
(96, 4),
(97, 3),
(98, 4),
(99, 4),
(100, 2),
(101, 3),
(101, 4),
(102, 4),
(103, 4),
(104, 4),
(105, 0),
(106, 2),
(107, 4),
(108, 3),
(109, 0),
(110, 3),
(110, 4),
(111, 4),
(112, 0),
(113, 0),
(114, 2),
(115, 1),
(116, 1),
(117, 2),
(118, 1),
(118, 2),
(119, 0),
(120, 3),
(120, 4),
(121, 3),
(121, 4),
(122, 0),
(123, 0),
(124, 1),
(125, 1),
(126, 2),
(127, 4),
(128, 0),
(129, 2),
(130, 4),
(131, 0),
(132, 0),
(133, 2),
(134, 0),
(135, 3),
(136, 3),
(136, 4),
(137, 0);

-- --------------------------------------------------------

--
-- Table structure for table `adultUnit`
--

CREATE TABLE IF NOT EXISTS `adultUnit` (
  `Scout_id` int(10) NOT NULL,
  `Unit_id` int(20) NOT NULL,
  PRIMARY KEY (`Scout_id`,`Unit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assistantleader`
--

CREATE TABLE IF NOT EXISTS `assistantleader` (
  `Assistant_id` int(10) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `SurName` varchar(50) NOT NULL,
  `Tel` varchar(20) NOT NULL,
  PRIMARY KEY (`Assistant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `assistantleader`
--

INSERT INTO `assistantleader` (`Assistant_id`, `FirstName`, `SurName`, `Tel`) VALUES
(1, 'Jane', 'Lynch', '891265276'),
(2, 'Mary', 'Murphy', '827832190');

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE IF NOT EXISTS `attendence` (
  `Attendence_id` int(10) NOT NULL AUTO_INCREMENT,
  `thedate` date NOT NULL,
  PRIMARY KEY (`Attendence_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`Attendence_id`, `thedate`) VALUES
(31, '2013-03-19'),
(32, '2013-03-19'),
(33, '2013-03-19'),
(34, '2013-03-19'),
(35, '2013-03-19'),
(36, '2013-03-19'),
(37, '2013-03-19'),
(38, '2013-03-19'),
(39, '2013-03-19'),
(40, '0000-00-00'),
(41, '0000-00-00'),
(42, '0000-00-00'),
(43, '0000-00-00'),
(44, '0000-00-00'),
(45, '0000-00-00'),
(46, '0000-00-00'),
(47, '0000-00-00'),
(48, '0000-00-00'),
(49, '0000-00-00'),
(50, '0000-00-00'),
(51, '0000-00-00'),
(52, '0000-00-00'),
(53, '0000-00-00'),
(54, '0000-00-00'),
(55, '0000-00-00'),
(56, '0000-00-00'),
(57, '0000-00-00'),
(58, '0000-00-00'),
(59, '0000-00-00'),
(60, '0000-00-00'),
(61, '0000-00-00'),
(62, '0000-00-00'),
(63, '0000-00-00'),
(64, '0000-00-00'),
(65, '0000-00-00'),
(66, '0000-00-00'),
(67, '0000-00-00'),
(68, '0000-00-00'),
(69, '2013-03-20'),
(70, '2013-03-20'),
(71, '0000-00-00'),
(72, '0000-00-00'),
(73, '2013-03-15'),
(74, '2013-03-15'),
(75, '2013-03-15'),
(76, '2013-03-15'),
(77, '2013-03-15'),
(78, '2013-03-15'),
(79, '2013-03-15'),
(80, '2013-03-29'),
(81, '2013-03-29'),
(82, '2013-03-29'),
(83, '0000-00-00'),
(84, '2013-03-31'),
(85, '2013-03-31'),
(86, '0000-00-00'),
(87, '0000-00-00'),
(88, '0000-00-00'),
(89, '0000-00-00'),
(90, '0000-00-00'),
(91, '0000-00-00'),
(92, '0000-00-00'),
(93, '0000-00-00'),
(94, '0000-00-00'),
(95, '0000-00-00'),
(96, '0000-00-00'),
(97, '0000-00-00'),
(98, '2013-04-06'),
(99, '2013-04-06'),
(100, '2013-04-06'),
(101, '2013-04-16'),
(102, '2013-04-16'),
(103, '2013-04-16'),
(104, '2013-04-28'),
(105, '2013-04-28'),
(106, '2013-04-28'),
(107, '0000-00-00'),
(108, '0000-00-00'),
(109, '2013-04-25'),
(110, '2013-04-25'),
(111, '2013-04-25'),
(112, '0000-00-00'),
(113, '0000-00-00'),
(114, '0000-00-00'),
(115, '0000-00-00'),
(116, '0000-00-00'),
(117, '0000-00-00'),
(118, '0000-00-00'),
(119, '0000-00-00'),
(120, '0000-00-00'),
(121, '0000-00-00'),
(122, '0000-00-00'),
(123, '0000-00-00'),
(124, '0000-00-00'),
(125, '0000-00-00'),
(126, '0000-00-00'),
(127, '0000-00-00'),
(128, '0000-00-00'),
(129, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE IF NOT EXISTS `awards` (
  `Award_id` int(10) NOT NULL AUTO_INCREMENT,
  `Award_Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Award_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`Award_id`, `Award_Name`) VALUES
(1, 'Spurce'),
(2, 'Cooper Beech'),
(3, 'Silver Birch'),
(4, 'Gold');

-- --------------------------------------------------------

--
-- Table structure for table `challengeactivity`
--

CREATE TABLE IF NOT EXISTS `challengeactivity` (
  `Challenge_id` int(10) NOT NULL,
  `Activity_id` int(10) NOT NULL,
  PRIMARY KEY (`Challenge_id`,`Activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `challengeactivity`
--

INSERT INTO `challengeactivity` (`Challenge_id`, `Activity_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(4, 17),
(4, 18),
(4, 19),
(4, 20),
(4, 21),
(4, 22),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 14),
(5, 15),
(5, 16),
(5, 17),
(5, 18),
(5, 19),
(5, 20),
(5, 21),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(6, 11),
(6, 12),
(6, 13),
(6, 14),
(6, 15),
(6, 16),
(6, 17),
(6, 18),
(6, 19),
(6, 20),
(6, 21),
(6, 22),
(6, 23),
(6, 24);

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE IF NOT EXISTS `challenges` (
  `Challenge_id` int(20) NOT NULL AUTO_INCREMENT,
  `Challenge_Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Challenge_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`Challenge_id`, `Challenge_Name`) VALUES
(1, 'Guiding'),
(2, 'Outdoors'),
(3, 'My World'),
(4, 'Health and Fitness'),
(5, 'Life Skills'),
(6, 'My Interests'),
(7, 'Generic');

-- --------------------------------------------------------

--
-- Table structure for table `disabilities`
--

CREATE TABLE IF NOT EXISTS `disabilities` (
  `Disability_id` int(10) NOT NULL AUTO_INCREMENT,
  `Disability_Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Disability_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `disabilities`
--

INSERT INTO `disabilities` (`Disability_id`, `Disability_Name`) VALUES
(1, 'Blindness or Low Vision'),
(2, 'Deaf/Hard-of-Hearing');

-- --------------------------------------------------------

--
-- Table structure for table `emergencycontact`
--

CREATE TABLE IF NOT EXISTS `emergencycontact` (
  `Contact_id` int(10) NOT NULL AUTO_INCREMENT,
  `Scout_id` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Tel` int(20) NOT NULL,
  `Address` varchar(200) NOT NULL,
  PRIMARY KEY (`Contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `leader`
--

CREATE TABLE IF NOT EXISTS `leader` (
  `Leader_id` int(10) NOT NULL AUTO_INCREMENT,
  `Unit_id` int(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `SurName` varchar(50) NOT NULL,
  `Tel` varchar(200) NOT NULL,
  `User_name` varchar(20) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Pic_Link` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Leader_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

-- --------------------------------------------------------

--
-- Table structure for table `leaderassistant`
--

CREATE TABLE IF NOT EXISTS `leaderassistant` (
  `Leader_id` int(10) NOT NULL,
  `Assistant_id` int(10) NOT NULL,
  PRIMARY KEY (`Leader_id`,`Assistant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaderassistant`
--

INSERT INTO `leaderassistant` (`Leader_id`, `Assistant_id`) VALUES
(14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `Parent_id` int(10) NOT NULL AUTO_INCREMENT,
  `Scout_id` int(10) NOT NULL,
  `Parent1_Name` varchar(50) NOT NULL,
  `Parent2_Name` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Tel_Work` varchar(200) NOT NULL,
  `Tel_Home` varchar(200) NOT NULL,
  `Email1` varchar(50) NOT NULL,
  `Email2` varchar(50) NOT NULL,
  PRIMARY KEY (`Parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

-- --------------------------------------------------------

--
-- Table structure for table `payements`
--

CREATE TABLE IF NOT EXISTS `payements` (
  `Payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `Amount` int(10) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Table structure for table `programactivity`
--

CREATE TABLE IF NOT EXISTS `programactivity` (
  `Program_id` int(10) NOT NULL,
  `Activity_id` int(10) NOT NULL,
  `Completed` int(1) NOT NULL,
  PRIMARY KEY (`Program_id`,`Activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `Program_id` int(10) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Week` int(10) NOT NULL,
  PRIMARY KEY (`Program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `savedActivities`
--

CREATE TABLE IF NOT EXISTS `savedActivities` (
  `unit_id` int(11) NOT NULL,
  `thedate` date NOT NULL,
  `challenge` varchar(100) NOT NULL,
  `activity` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scout`
--

CREATE TABLE IF NOT EXISTS `scout` (
  `Scout_id` int(10) NOT NULL AUTO_INCREMENT,
  `Unit_id` int(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `SurName` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Telephone` varchar(200) NOT NULL,
  `School` varchar(50) NOT NULL,
  `Religion` varchar(50) NOT NULL,
  `Ethenic` varchar(50) NOT NULL,
  `Nationality` varchar(50) NOT NULL,
  `Parents_id` int(20) NOT NULL,
  `Child_Doc` varchar(50) NOT NULL,
  `Doc_Phone` varchar(200) NOT NULL,
  `Contact_id` int(10) NOT NULL,
  `allergies` varchar(1000) NOT NULL,
  `Pic_Link` varchar(200) NOT NULL,
  `isActive` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`Scout_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=182 ;

-- --------------------------------------------------------

--
-- Table structure for table `scoutactivity`
--

CREATE TABLE IF NOT EXISTS `scoutactivity` (
  `Scout_id` int(10) NOT NULL,
  `Activity_id` int(10) NOT NULL,
  PRIMARY KEY (`Scout_id`,`Activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scoutactivity`
--

INSERT INTO `scoutactivity` (`Scout_id`, `Activity_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `scoutattendence`
--

CREATE TABLE IF NOT EXISTS `scoutattendence` (
  `Scout_id` int(10) NOT NULL,
  `Attendence_id` int(10) NOT NULL,
  PRIMARY KEY (`Scout_id`,`Attendence_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scoutattendence`
--

INSERT INTO `scoutattendence` (`Scout_id`, `Attendence_id`) VALUES
(5, 81),
(5, 87),
(6, 41),
(6, 43),
(6, 45),
(6, 47),
(6, 49),
(6, 51),
(6, 53),
(9, 28),
(9, 75),
(10, 84),
(15, 37),
(15, 79),
(16, 38),
(17, 39),
(17, 98),
(17, 101),
(17, 107),
(17, 109),
(17, 114),
(17, 116),
(17, 117),
(17, 120),
(17, 127),
(18, 99),
(18, 102),
(18, 108),
(18, 110),
(18, 112),
(18, 115),
(18, 118),
(18, 125),
(18, 126),
(19, 78),
(19, 100),
(19, 111),
(19, 113),
(19, 119),
(19, 121),
(83, 21),
(83, 24),
(83, 29),
(83, 65),
(83, 70),
(83, 80),
(83, 88),
(83, 103),
(83, 104),
(83, 124),
(84, 68),
(84, 106),
(84, 122),
(84, 128),
(177, 82),
(180, 83),
(180, 105),
(180, 123),
(180, 129);

-- --------------------------------------------------------

--
-- Table structure for table `scoutaward`
--

CREATE TABLE IF NOT EXISTS `scoutaward` (
  `Scoud_id` int(10) NOT NULL,
  `Award_id` int(10) NOT NULL,
  `Completion_Date` date NOT NULL,
  PRIMARY KEY (`Scoud_id`,`Award_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scoutdisability`
--

CREATE TABLE IF NOT EXISTS `scoutdisability` (
  `Scout_id` int(10) NOT NULL,
  `Disability_id` int(10) NOT NULL,
  PRIMARY KEY (`Scout_id`,`Disability_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scoutpayments`
--

CREATE TABLE IF NOT EXISTS `scoutpayments` (
  `scout_id` int(10) NOT NULL,
  `payement_id` int(10) NOT NULL,
  PRIMARY KEY (`scout_id`,`payement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `Unit_id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Unit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4546 ;

-- --------------------------------------------------------



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
