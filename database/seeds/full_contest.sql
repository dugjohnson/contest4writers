-- phpMyAdmin SQL Dump
-- version 4.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2015 at 07:50 AM
-- Server version: 5.6.19-0ubuntu0.14.04.1
-- PHP Version: 5.6.3-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `contest`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int(10) unsigned NOT NULL,
  `entry_id` int(11) NOT NULL,
  `judge_id` int(11) DEFAULT NULL,
  `scoresheet_id` int(11) DEFAULT NULL,
  `published` tinyint(1) NOT NULL,
  `category` text COLLATE utf8_unicode_ci NOT NULL,
  `ready` tinyint(1) NOT NULL,
  `sentToCoordinator` datetime DEFAULT NULL,
  `sentToJudge` datetime DEFAULT NULL,
  `scoreReceived` datetime DEFAULT NULL,
  `score` smallint(6) NOT NULL DEFAULT '0',
  `followup` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

DROP TABLE IF EXISTS `entries`;
CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `returnScoresheet` tinyint(1) NOT NULL DEFAULT '1',
  `finalist` tinyint(1) NOT NULL DEFAULT '0',
  `received` tinyint(1) NOT NULL DEFAULT '0',
  `author` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `category` text COLLATE utf8_unicode_ci NOT NULL,
  `signed` text COLLATE utf8_unicode_ci NOT NULL,
  `dateOfEntry` datetime NOT NULL,
  `filename` text COLLATE utf8_unicode_ci NOT NULL,
  `publisher` text COLLATE utf8_unicode_ci NOT NULL,
  `editor` text COLLATE utf8_unicode_ci NOT NULL,
  `publicationMonth` text COLLATE utf8_unicode_ci NOT NULL,
  `paymentType` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `judges`
--

DROP TABLE IF EXISTS `judges`;
CREATE TABLE IF NOT EXISTS `judges` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstYear` smallint(6) DEFAULT NULL,
  `judgePub` tinyint(1) NOT NULL DEFAULT '0',
  `judgeUnpub` tinyint(1) NOT NULL DEFAULT '0',
  `judgeEitherNotBoth` tinyint(1) NOT NULL DEFAULT '0',
  `mainstream` tinyint(4) NOT NULL DEFAULT '0',
  `category` tinyint(4) NOT NULL DEFAULT '0',
  `historical` tinyint(4) NOT NULL DEFAULT '0',
  `singleTitle` tinyint(4) NOT NULL DEFAULT '0',
  `paranormal` tinyint(4) NOT NULL DEFAULT '0',
  `inspirational` tinyint(4) NOT NULL DEFAULT '0',
  `maxpubentries` tinyint(4) NOT NULL DEFAULT '0',
  `maxunpubentries` tinyint(4) NOT NULL DEFAULT '0',
  `subcategorylike` text COLLATE utf8_unicode_ci,
  `subcategorydislike` text COLLATE utf8_unicode_ci,
  `comments` longtext COLLATE utf8_unicode_ci,
  `internalComments` text COLLATE utf8_unicode_ci,
  `yearsJudged` tinyint(4) NOT NULL DEFAULT '0',
  `categoriesjudged` text COLLATE utf8_unicode_ci,
  `judgeThisYear` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=458 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `judges`
--

INSERT INTO `judges` (`id`, `user_id`, `firstYear`, `judgePub`, `judgeUnpub`, `judgeEitherNotBoth`, `mainstream`, `category`, `historical`, `singleTitle`, `paranormal`, `inspirational`, `maxpubentries`, `maxunpubentries`, `subcategorylike`, `subcategorydislike`, `comments`, `internalComments`, `yearsJudged`, `categoriesjudged`, `judgeThisYear`, `created_at`, `updated_at`) VALUES
(106, 106, 2007, 0, 1, 0, 4, 2, 1, 3, 0, 1, 0, 5, 'Suspense without the other elements. Funny scary stories isn''t bad.', 'No erotic, steamy is okay', 'I''m checking to see if these comments show up in the confirmation.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 107, 2012, 1, 0, 0, 3, 3, 3, 3, 3, 3, 5, 0, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 108, 2008, 1, 1, 0, 3, 3, 3, 3, 2, 1, 7, 6, NULL, NULL, 'I will willingly judge any multicultural in any category.', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 110, 2012, 1, 0, 0, 0, 2, 3, 2, 3, 0, 5, 0, 'Historical Romance is favorite, but do like Witches in Paranormal.', 'Prefer not to read Vampires, Werewolves. \r\nNO GLBT, please.', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 111, 2009, 1, 1, 0, 3, 2, 3, 2, 3, 3, 7, 3, '', 'Erotica or Amish', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 112, 2010, 1, 0, 0, 3, 3, 3, 3, 3, 0, 7, 0, 'I''d be pleased to judge spicier entries some judges might find objectionable.', '', 'I''d be pleased to judge spicier entries some judges might find objectionable.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 113, 2004, 0, 1, 0, 3, 2, 3, 2, 1, 0, 0, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 114, 2012, 0, 1, 0, 3, 0, 0, 3, 3, 0, 0, 3, '', '', 'Please no vampires or werewolves.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 115, 2012, 0, 1, 0, 3, 2, 4, 3, 1, 1, 0, 4, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 116, 2009, 0, 1, 0, 3, 3, 3, 3, 3, 3, 0, 5, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 117, 2010, 0, 1, 0, 4, 2, 3, 3, 3, 0, 0, 6, NULL, NULL, 'None', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 118, 2012, 0, 1, 0, 0, 0, 4, 3, 3, 0, 0, 5, 'Military\r\n', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 119, 2008, 1, 0, 0, 4, 1, 1, 3, 3, 0, 5, 0, '', '', 'I love judging mainstream but I prefer NOT to judge Cozy mysteries.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 120, 2006, 1, 1, 0, 3, 3, 1, 3, 3, 1, 7, 5, 'suspense, mystery, thriller', 'historicals', 'Prefer published but whereever you need me', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 121, 2011, 1, 0, 0, 3, 3, 3, 3, 3, 1, 6, 0, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 122, 2007, 1, 1, 0, 3, 2, 3, 3, 3, 2, 7, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 123, 2008, 1, 1, 0, 3, 3, 3, 3, 2, 2, 5, 5, 'mainstream and single titled.', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 124, 2003, 0, 1, 0, 3, 3, 3, 3, 3, 3, 0, 5, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 125, 2007, 1, 0, 0, 3, 1, 1, 3, 2, 2, 4, 0, '', '', 'I don\\''t like vampire or warewolf books.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 126, 2008, 1, 1, 0, 2, 3, 3, 3, 3, 2, 3, 4, '', '', 'This judge wishes to thank all those involved in coordinating the Daphne du Maurier Award.\r\n\r\nAll the best  for another wonderful year of the Daphne Awards.\r\n\r\nCheers,\r\nJudge\r\n126\r\nformerly 08-32', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 127, 2011, 1, 0, 0, 1, 2, 3, 4, 2, 0, 5, 0, '', '', 'Prefer books with a higher heat level as opposed to closed door relations, but am flexible.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 128, 2002, 1, 0, 0, 3, 2, 3, 3, 2, 0, 5, 0, 'Regencies. 19th and 20th century history. Slightly more mature characters, not leaning toward chick lit.  ', 'In paranormal, prefer just a light touch -- more along the lines of second sight and friendly ghosts than heavy-duty werewolves. In history, prefer trending toward more recent centuries, not medieval.', 'Hi, [notes from last year still applicable]\r\nI''m pretty open about what I''ll read/judge. In Paranormal, I prefer the ones that are subtle/psychological rather than slavering werewolves. I''ll read in Category, but I''m not current on what''s hot in that category.\r\nI think I started judging around 2003 -- paper entries back then. I judge unpubbed for a couple of years, and switched to published later. Happy to be volunteering again.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 129, 2010, 1, 1, 0, 3, 4, 0, 4, 2, 2, 10, 5, NULL, NULL, '', 'Notoriously late with score sheets and not pleasant.', 0, '', 'RM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 130, 2012, 1, 0, 0, 3, 2, 4, 3, 3, 0, 7, 0, '', 'GLBT, M/M, or kink.', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 131, 2010, 1, 0, 0, 3, 2, 3, 2, 4, 1, 5, 0, '', '', 'Hi there! Thanks for coordinating the contest. Here are my requests:\r\nNo more than 3 books per category (they start to run together)\r\nNo heroes who are evil. (I''ll never forget the Daphne entry the opened with the ''hero'' raping a street walker.)\r\n\r\nAnd if you get in a bind I can probably take more books. :) Cheers, Rachel', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 132, 2009, 1, 0, 0, 0, 3, 1, 0, 1, 0, 0, 0, NULL, NULL, 'If I have to judge paranormal, no vampires, werewoves, shapeshifters, zombies. Time travel is about the only paranormal genre I feel comfortable judging. I''m willing to judge historical if needed, but my knowledge of history is somewhere around minus two on a scale of one to ten, so I might not be as effective as someone familiar with history.  I''ve entered in single title and mainstream, so I can''t judge those.', 'This is one we''ve removed internally.', 0, '', 'RM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 133, 2008, 1, 0, 0, 2, 3, 2, 2, 1, 1, 8, 0, '', '', 'In historical, I''d prefer pirates, Revolutionary War or Civil War era.  If paranormal, I''d prefer witches or time travel.  Not thrilled with vampires, zombies, or werewolves.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 134, 2006, 1, 0, 0, 2, 2, 2, 2, 4, 2, 7, 0, NULL, NULL, 'Prefer fantasy or scifi  --  not too many vampires and demons! :-)', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 135, 2011, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, '', '', '', NULL, 0, NULL, 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 136, 2011, 0, 1, 0, 1, 1, 2, 2, 3, 0, 0, 6, NULL, NULL, '', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 137, 2011, 0, 1, 0, 3, 0, 2, 3, 0, 0, 0, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 138, 2005, 1, 0, 0, 2, 3, 3, 2, 4, 3, 5, 0, 'Paranormal', 'GLBT  Please don''t send me books with a same sex couple as the main characters.', 'Thanks for the opportunity to judge again this year.  I always enjoy it!', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 139, 2009, 1, 1, 0, 3, 2, 2, 4, 2, 2, 1, 15, 'I''ll judge anything ex/ interracial.', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 140, 2010, 1, 0, 0, 3, 3, 2, 3, 2, 2, 7, 0, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 141, 2010, 1, 1, 0, 3, 3, 3, 3, 3, 3, 8, 6, '', '', 'I''m not sure how many years but I have done it for at least the last two maybe more so I guessed. Looking forward to judging again.The online scoring made the job so much easier.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 142, 2002, 1, 1, 0, 2, 3, 2, 2, 0, 3, 4, 5, 'My preference is for published books is the Harlequin/Silhouette lines:  Love Inspired, Love Inspired Historical, Silhouette Romantic Suspense, Harlequin Intrigue, etc.  ', 'I''m not a big fan of paranormal, so best to save that for other judges.  ', 'I know from my previous years as a judge and co-coordinator of this contest that it''s sometimes hard to find Inspirational judges.  I am happy to help out there, but please no more than 2, and preferably mixed with Category?  Thank you!', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 143, 2012, 1, 1, 0, 4, 2, 3, 2, 2, 2, 7, 6, 'Humorous', '', 'Looking forward to it!!', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 144, 2011, 1, 0, 0, 3, 1, 0, 3, 1, 0, 7, 0, '', 'erotic', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 145, 2005, 1, 0, 0, 1, 4, 2, 3, 1, 0, 6, 0, '', '', 'I would judge if asked a paranormal dealing with witches.  I do not like vampire, werewolves.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 146, 2010, 1, 1, 0, 3, 3, 3, 3, 4, 1, 5, 5, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 147, 2007, 1, 0, 0, 3, 3, 1, 3, 2, 2, 6, 0, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 148, 2012, 1, 0, 0, 0, 0, 4, 1, 0, 0, 5, 0, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 149, 2000, 1, 1, 0, 3, 3, 3, 3, 3, 3, 4, 4, '', 'No erotica; no gay/lesbian', '', '', 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 150, 2009, 1, 0, 0, 3, 0, 2, 3, 0, 1, 5, 0, '', '', 'Nikki,\r\nI have a bit of a problem this year. March 18th to 25th, I will be in NC, looking for a house. If I find one, I will be moving down there--and packing, packing, packing. I would hate to commit to reading and be unable to do so. I do like doing this contest, so could you hold off until 2015?  Dorice', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 152, 2010, 1, 0, 0, 2, 1, 3, 3, 4, 1, 7, 0, NULL, NULL, '', '', 0, '', 'PP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 153, 2009, 0, 1, 0, 4, 1, 0, 3, 1, 0, 0, 5, '', '', 'I will be relocating for the summer to my Iowa home on approximately May 12. Judging should be over by then, so this shouldn''t be a problem.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 154, 2011, 1, 1, 0, 2, 2, 3, 2, 4, 2, 7, 6, 'I love paranormal but especially ghosts witches magical elements or paranormal with fantasy worlds or time travel\r\nI love historical novels up through 1900. I am most familiar with the histories of the US, England, and the Continental Europe as opposed to Oriental and Eastern European countries.', '', 'I love paranormal but especially ghosts witches magical elements or paranormal with fantasy worlds or time travel\r\nI love historical novels up through 1900. I am most familiar with the histories of the US, England, and the Continental Europe as opposed to Oriental and Eastern European countries.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 155, 2005, 1, 0, 0, 2, 0, 2, 4, 0, 2, 3, 0, '', 'erotica, paranormal, GLBT', 'No erotica, no LGBT, entering the Category division so I cannot judge there.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 157, 2005, 1, 1, 0, 1, 2, 4, 3, 3, 0, 7, 7, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 158, 2002, 1, 1, 0, 4, 0, 0, 3, 2, 2, 0, 10, '', '', 'I''ll be happy to judge both published and unpublished as backup (excluding mainstream and single title.)  Thanks, Nancy.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 159, 2009, 1, 0, 0, 3, 3, 2, 3, 0, 3, 7, 0, NULL, NULL, 'I don''t want to judge paranormal at all.\r\nI can''t judge inspirational because I''m entered in that category.', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 160, 2011, 0, 1, 0, 3, 2, 2, 2, 2, 2, 0, 0, NULL, NULL, 'I''m happy to help in any category; have preferences for mainstream or single title but I can handle whatever works for you.  If you run into a problem getting judges for published, just let me know. A lot depends upon my schedule -- I''m a freelance editor so time is sometimes flexible. Looking forward to helping out!', '', 0, '', 'PP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 161, 2013, 0, 1, 0, 0, 0, 3, 0, 1, 3, 0, 5, '', '', 'I will be entering the unpublished mainstream categories.  I''m free to judge other categories as indicated above.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 162, 2007, 0, 1, 0, 3, 1, 2, 0, 2, 0, 0, 5, '', 'zombies', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 163, 2006, 1, 1, 0, 0, 3, 3, 0, 2, 0, 4, 2, 'I''m hoping not to judge the categories where I''m entered.', '', 'I might be able to judge more but slightly overwhelmed by RITA books right now.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 164, 2007, 1, 0, 1, 3, 3, 2, 3, 0, 1, 6, 6, '', 'LGBT', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 165, 2008, 1, 1, 0, 3, 1, 3, 3, 3, 0, 6, 4, NULL, NULL, 'I lapsed in my KOD membership last year, but have rejoined as of Jan 30th (via myRWA). If you require confirmation of membership, I can send a copy of the RWA transaction page and the paypal receipt.\r\n\r\n~Kate', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 166, 2005, 1, 1, 0, 3, 3, 3, 3, 4, 1, 8, 3, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 167, 2011, 1, 1, 0, 3, 3, 3, 3, 3, 1, 7, 6, '', '', 'Not crazy about Amish or Inspirational but I\\''m happy to judge pretty much everything else.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 168, 2011, 1, 0, 0, 3, 3, 2, 3, 3, 1, 4, 0, 'suspense, paranormal', '', 'No specific preferences. I am comfortable with all pairings and heat levels.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 169, 2010, 1, 0, 0, 0, 3, 2, 3, 3, 0, 5, 0, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 170, 2010, 0, 1, 0, 3, 0, 3, 4, 1, 0, 0, 4, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 171, 2008, 0, 1, 0, 3, 3, 3, 3, 4, 3, 0, 10, NULL, NULL, '', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 172, 2009, 1, 0, 0, 4, 3, 2, 4, 2, 3, 8, 0, '', '', 'I would prefer not to judge anything erotic or anything with vampires, werewolves or demons. I''m cool with ghosts and paranormal that''s not too evil or graphic.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 173, 2006, 0, 1, 0, 3, 2, 2, 4, 3, 2, 6, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 174, 2004, 1, 0, 0, 3, 3, 2, 3, 3, 0, 7, 0, 'steam-punk; FBI/police', 'vampires', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 175, 2008, 1, 0, 0, 3, 0, 2, 2, 1, 0, 4, 0, '', '', 'I take mass transportation to my job.  I also carry a knapsack which is heavy. I read on the train and the subway.  Two years ago, I specifically said I wanted paperbacks.  My request was not honored and I received two trades and 2 hardcovers.  These are difficult to read on a train and the subway.  Therefore, please send me mass market paperbacks.  If this is  a problem, please let me know.\r\nThanks.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 176, 2010, 1, 0, 0, 3, 0, 2, 3, 0, 1, 6, 0, 'No preference', 'Erotica, M/M, religious', 'I am entered in the Published Category and Published Paranormal categories and cannot judge those.\r\nPlease do not send me Final Accounting by Linda Lovely (critique partner).\r\n\r\nThanks!', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 177, 2011, 1, 1, 0, 3, 3, 4, 3, 4, 1, 6, 3, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 178, 2011, 1, 0, 0, 3, 3, 3, 3, 1, 0, 10, 7, NULL, NULL, 'I ''enjoy'' the published contests more ... but sometimes there is a lack of judges/judging available for unpublished.  I will fill in the blanks as you need and always look forward to the opportunity to read the works from your participants!\r\n\r\nLisa', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 179, 2004, 1, 1, 0, 4, 3, 3, 3, 1, 2, 7, 0, 'This is a test.\r\n\r\n3/4/2014:  No longer a test.  Updated as of today.  Thanks!! Brooke', 'Do you really only want to judge next year? Can''t i put you down for this year? If so, go back and test. i think we''re good to start sending out reminders.  \r\n\r\nLOL!  Yes, will judge this year...but needed to change something!  Have made more changes... now I just need to remember to fill in the "real deal" when we get going.', 'Brooke, I''m testing the returning judge updates. This is a test to see if you get the email.\r\nNancy', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 180, 2008, 1, 0, 0, 4, 1, 1, 3, 0, 0, 4, 0, 'I love mainstream thrillers.', 'I especially don''t like horror, sci-fi, fantasy, paranormal and inspirational.', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 181, 2008, 0, 1, 0, 0, 0, 4, 3, 0, 3, 0, 4, NULL, NULL, 'Hi...I''m VERY busy with two books and 3 critique groups currently, but I would love to help out.  \r\n\r\nCarolyn (KOD trained judge since forever :))', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 182, 2010, 0, 1, 0, 3, 1, 1, 3, 3, 1, 0, 7, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 183, 2013, 0, 1, 0, 3, 1, 3, 3, 3, 0, 0, 6, NULL, NULL, 'Not really into inspirationals, or Angels and Demons. Otherwise, anything from hobby-cozies to Princes in the Tower to Jack the Ripper to Demolished Man to....', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 184, 2013, 1, 1, 0, 2, 1, 3, 2, 3, 1, 6, 6, '', 'Time travel', 'Love paranormal, but I''m not that fond of time travel (has to be brilliantly done to work for me). Favorite time period for historicals is Regency.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 186, 2013, 0, 1, 0, 4, 0, 2, 3, 2, 0, 2, 2, 'My preference is for Single Title and Mainstream. I like paranormal, but prefer a psychic theme or ghosts to other worlds', ' erotic romance or for the violence to be super graphic with blood and body pieces everywhere, fantasy with other worlds, or shape shifters, vampires, or  werewolves', 'My second book is coming out sometime this spring, which is why I''m limiting my involvement this year. ', NULL, 0, NULL, 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 187, 2009, 0, 1, 0, 3, 3, 3, 3, 0, 3, 0, 9, '', 'gay/lesbian romances, vampires,witches ', 'I''ve enjoyed judging the Daphne previously and am excited to see this year''s entries. Thanks for asking me.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 188, 2013, 0, 1, 0, 4, 4, 4, 4, 1, 1, 0, 6, '', '', 'No erotica.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 189, 2013, 1, 1, 0, 3, 3, 3, 3, 4, 3, 6, 6, '', '', 'I''d actually love to judge Paranormal, but since I''m entered in that category...uhm...nope. That would be a bad thing. I''ll happily judge any other category, in whatever combination you need.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 190, 2010, 0, 1, 0, 2, 3, 1, 3, 0, 1, 0, 10, '', 'paranormal, erotica, time travel, fantasy', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 191, 2005, 1, 1, 0, 3, 3, 3, 3, 3, 0, 5, 4, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 193, 2000, 0, 1, 0, 3, 3, 1, 3, 2, 3, 0, 6, '', 'horror, x-rated, vampires, were wolves, shape changers, etc.', '', '', 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 194, 2003, 1, 0, 0, 3, 1, 2, 3, 1, 0, 6, 0, NULL, NULL, 'No vampires, zombies, or shape-shifters.', '', 0, '', 'PP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 195, 2009, 0, 1, 0, 3, 1, 1, 3, 2, 0, 0, 5, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 196, 2010, 1, 0, 0, 4, 2, 2, 3, 3, 1, 5, 0, NULL, 'Not a fan of the current male/male romance subgenre', 'Update to schedule - I did not enter the contest', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 197, 2013, 1, 0, 0, 3, 3, 0, 3, 0, 0, 3, 0, '', 'Paranormal', 'Prefer not to read about vampires and werewolves.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 198, 2013, 1, 1, 0, 3, 2, 3, 3, 2, 2, 7, 6, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 199, 2009, 1, 0, 0, 2, 3, 2, 3, 0, 1, 5, 6, 'Women in jeopardy', 'Ranches, cowboys, etc', 'I can\\''t start judging until April 16. I can do published again. If dates for unpublished become later again, I could judge them.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 200, 2013, 1, 1, 0, 3, 3, 0, 3, 4, 1, 7, 7, NULL, NULL, 'I have the strongest experience with any and all paranormal, since I edit for a paranormal based publisher. But I do have experience with other categories I just don''t edit them with the same frequency, but I am more than willing to judge anything you need me to.', '', 0, '', 'PP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 201, 2011, 1, 0, 0, 3, 3, 3, 3, 3, 3, 7, 0, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 202, 2002, 1, 0, 0, 3, 2, 4, 3, 3, 2, 7, 0, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 203, 2002, 0, 1, 0, 3, 1, 4, 3, 0, 0, 0, 5, 'single title', 'any sub-categories of paranormal, inspirational or catagory', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 204, 2010, 0, 1, 0, 2, 1, 4, 2, 2, 0, 0, 5, 'Regency or anything to do with Russian history but I''m fine with other periods and places.', 'I would be a bad judge of erotiica or inspirational writing. ', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 205, 2014, 1, 1, 0, 0, 4, 2, 2, 2, 0, 5, 5, 'Romantic Suspense, Home and Hearth, Blaze', 'Inspirational, women''s fiction', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 206, 2007, 1, 0, 0, 3, 4, 1, 3, 3, 1, 10, 0, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 207, 2013, 0, 1, 0, 4, 2, 2, 3, 2, 1, 0, 6, '', '', 'I have a lot of travel planned this spring to help my brother''s widow, so can only offer to do this in an emergency this year.  It would be better my end to simply give it a pass this year and resume next year.\r\n\r\nRe the paranormal category, I do not want to do vampires or werewolves (I don''t feel I could do them justice).  I don''t know a lot about Inspirational, which is why I would prefer not.\r\n', NULL, 0, NULL, 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 208, 2010, 1, 1, 0, 3, 3, 4, 3, 3, 1, 5, 5, '', 'Same-gender romance', 'Looking forward to this year''s entries!', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 209, 2010, 0, 1, 0, 4, 2, 3, 3, 1, 2, 0, 6, NULL, NULL, 'Looking forward to judging again.', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 210, 2011, 0, 0, 0, 3, 3, 2, 3, 2, 2, 0, 0, 'mysteries-single title with suspense ;', 'not a fan of lgtb books. have read some nice ones though.', 'Just let me know that you are mailing the books if its published so I know when to look at the mail.', '2014 Committee Removed. This is the second year she was late turning in entries and even as the committee is announcing finalists, she''s oblivious to emails and is ready to submit her scores. two weeks after the deadline.', 0, NULL, 'RM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 211, 2005, 0, 1, 0, 0, 3, 0, 1, 2, 0, 0, 6, 'Series Romantic Suspense\r\nParanormal Romance', 'Historical Romance\r\nInspirational Romance', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 212, 2013, 0, 1, 0, 3, 2, 1, 3, 3, 1, 0, 6, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 213, 2008, 1, 0, 0, 4, 4, 4, 4, 0, 2, 6, 0, '', '', 'Can''t judge paranormal because I will be entering that category. \r\nThanks!\r\nAngie', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 214, 2007, 0, 1, 0, 3, 4, 0, 3, 4, 0, 0, 6, 'YA', 'GLBT', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 215, 2007, 0, 1, 0, 3, 1, 3, 3, 2, 0, 0, 5, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 216, 2009, 1, 1, 0, 3, 4, 3, 3, 1, 2, 4, 5, 'RS, contemporary, some historical', 'paranormals, (not much experience reading them,) no vampires or other creatures, please! ', '', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 218, 2010, 0, 1, 0, 4, 3, 3, 3, 0, 0, 0, 4, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 219, 2011, 1, 0, 0, 0, 2, 3, 2, 3, 1, 4, 0, '', '-stories with an emphasis on pets\r\n', 'I would feel very uncomfortable judging books by Liz Mugavero, Edith Maxwell and Barbara Ross as I have both a personal and close professional connection with each of these writers. ', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 220, 2012, 1, 0, 0, 3, 3, 3, 3, 3, 3, 5, 0, NULL, NULL, '', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 221, 2000, 1, 0, 0, 3, 1, 0, 3, 1, 1, 5, 0, 'mystery', 'erotica', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 222, 2011, 1, 1, 0, 3, 3, 2, 3, 1, 0, 6, 4, '', 'Christian/inspirational'' paranormal'' werewolves/vampires; fantasy', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 223, 2009, 0, 1, 0, 3, 3, 2, 3, 2, 2, 0, 6, NULL, NULL, '', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 224, 2008, 0, 1, 0, 1, 3, 0, 2, 3, 1, 0, 4, '', '', 'Always love to do unpubs! And since I''m published in category I think those entries would benefit most.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 225, 2003, 1, 1, 0, 4, 1, 3, 4, 4, 1, 4, 4, NULL, NULL, 'I am equally excited to judge paranormal, mainstream, and single title.  I would enjoy judging Historical as well.  Category I find unbelievable when the hero and heroine have a romantic interlude nearly in the opening scene when either they haven\\''t yet formally met or they have just met.  I just can\\''t suspend my disbelief enough to get around that!  :)  If you have category that isn\\''t like that, I can judge it.  With inspirational, if it\\''s too religious then I can\\''t judge it.  If it\\''s more spiritual and low-key, then I\\''m fine with it.  I\\''m looking forward to judging this year!  Thank you for the opportunity.\r\n\r\nI forgot to say in the comments section that I will take YA as well.\r\nLooking forward to judging!', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 226, 2009, 1, 1, 0, 2, 2, 3, 2, 3, 2, 2, 3, '', '', 'I can judge most anything except eroctica. \r\nThanks', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 227, 2010, 1, 0, 0, 3, 2, 0, 2, 4, 0, 5, 0, NULL, NULL, 'As a content editor with many years of judging to my credit, my strongest suit is paranormal, fantasy, thrillers, suspense, police procedurals with or without romantic elements. I do not feel qualified to judge historical or inspirational. Thank you.', '', 0, '', 'PP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 228, 2013, 1, 1, 0, 3, 3, 3, 3, 3, 3, 7, 6, NULL, NULL, 'I have been a trained RWA contest judge for 17 years. I am multi-published and willing to judge wherever you need me. I am also mentor beginning writers; am a reviewer, and Copy Editor for a publishing firm. I like electronic submissions and score sheets.', '', 0, '', 'PP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 229, 2006, 1, 0, 0, 0, 1, 2, 3, 4, 0, 4, 0, NULL, NULL, 'Cannot judge any entry by Kristin Miller, as she is my critique partner.', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 230, 2008, 1, 1, 0, 4, 1, 2, 3, 2, 2, 7, 8, 'Suspense, mystery', 'Paranormal, catagory', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 231, 2011, 1, 0, 0, 1, 1, 1, 1, 1, 1, 3, 0, '', '', '', NULL, 0, NULL, 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 232, 2013, 0, 0, 0, 3, 2, 1, 3, 1, 0, 0, 0, 'Contemporary single title', 'Paranormal or with pnr elements', '', 'Committee Removed for no show 2014', 0, NULL, 'RM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 233, 2013, 1, 0, 0, 3, 2, 3, 3, 3, 2, 4, 0, '', 'erotic', 'Been judging for years (10+) and have been a coordinator more than once for chapter contests (years each). Please limit my entries to 4. Will be out of town (at a conference) but will have email on March 15th weekend. Thanks and look forward to helping out. My sister (Julie Moffett) may be entering, so please don''t send me hers.\r\n\r\nSandy', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 234, 2006, 1, 1, 0, 3, 3, 3, 3, 3, 3, 7, 5, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 235, 2010, 1, 0, 0, 3, 1, 2, 1, 2, 2, 10, 0, 'Mainstream', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 236, 2008, 1, 1, 0, 3, 3, 3, 3, 3, 3, 7, 10, '', '', 'I have judged every section before and am willing to serve wherever you need me.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 237, 2011, 0, 1, 0, 4, 2, 2, 3, 1, 1, 0, 4, '', '', 'I am on a very tight schedule, and cannot judge this year. Sorry.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 238, 2010, 1, 0, 0, 2, 4, 3, 2, 1, 0, 3, 0, 'Paranormal, Romantic Suspense, or Historical Romantic Suspense', 'Inspirational', 'I''m on a tight deadline, so 3 full books is the maximum I can do this year.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 239, 2010, 1, 1, 0, 3, 3, 3, 3, 4, 1, 0, 6, 'medieval historicals/american west historicals\r\nwitches/angels/demons who seek redemption\r\ncops and lawenforcement officers', 'Do not read BDSM or M/M or F/F romance.', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 240, 2010, 1, 1, 0, 3, 3, 3, 3, 3, 3, 7, 6, NULL, NULL, '', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 241, 2007, 1, 0, 0, 3, 3, 3, 4, 0, 1, 8, 0, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 242, 2005, 1, 0, 0, 3, 1, 0, 3, 4, 0, 7, 0, '', '', 'I''m a multi-published member of KoD (for longer than I can recall), a finalist in the single title division (again, farther back than I can recall), and wrote my master''s thesis on British detective stories of the "Golden Age": 1920s and 1930s. I judged in more chapter contests than I can count, both unpublished and published, and read quickly enough that if need be, I can probably pick up a couple of extra entries. I will be happy to judge almost any category, but don''t have enough background in historical periods to be helpful and am not keen on inspirationals. No problems with anything that goes bump, howl, or boo in the night.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 243, 2000, 0, 1, 0, 3, 3, 2, 3, 1, 0, 0, 5, '', '', 'I can\\''t take more than five this year. I have three books coming out right then, and am just swamped. However, I love this contest, and will help as much as I can.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 244, 2011, 1, 1, 0, 3, 3, 1, 3, 2, 0, 4, 5, 'Preference is for cozy mysteries, fun paranormal and thrillers.', 'I particularly hate mysteries with ''creatures'' that are not human (ghosts okay - no vampires, etc.). I also dislike mysteries that are filled with a lot of descriptions of violence. And while I''m a huge animal lover and love for them to play a role in the mystery, I do not like animals that talk. ', 'Looking forward to another fun year of reading!', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 245, 2011, 1, 0, 0, 3, 4, 3, 3, 3, 2, 7, 0, NULL, NULL, '', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 246, 2011, 1, 1, 0, 3, 3, 3, 3, 3, 3, 6, 6, NULL, NULL, 'I''m willing to take a maximum of six publications in any combination of publication / unpublished, and any genre.', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 247, 2009, 1, 0, 0, 3, 1, 0, 4, 2, 1, 7, 0, '', 'erotica, would prefer no GLBT', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 248, 2004, 1, 0, 0, 3, 3, 0, 3, 1, 1, 3, 5, 'My speciality is mystery/suspense - romance a subplot.  Story does not have  "happily ever after" ending.\r\n \r\n\r\n', 'Am not a fan of Paranormal or Historical and will judge if an emergency. ', 'Please send email briefly reviewing "Category". To me it means a series of no less than 3 books within the same genre.  I will be happy to judge the following: Mainstream, Single Title, Category will judge wherever needed.  Though I respect all genres I mainly read, review, edit, mystery/suspense, character driver plots with romantic overtones or strong romance with a happily ever after ending.  Love quirky characters and multicultural, creative plot twists, and/or Hiassen, DeMille type humor.  Am native NYer familiar with its topography; knowledge of NYPD & FDNY protocol. \r\nParanormal and Historical are my weakness. \r\nLook forward to hearing from you.\r\nGood luck,\r\nAnne\r\nAm flexible with the above maximum numbers - depends on the amount of submissions received.\r\n\r\n\r\n\r\n\r\n5 Unpublished', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 249, 2005, 0, 1, 0, 4, 1, 1, 4, 1, 1, 0, 10, '', '', 'I''ll be traveling late March/early April.', '', 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 250, 2013, 0, 1, 0, 3, 2, 1, 3, 0, 0, 0, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 251, 2010, 1, 0, 0, 2, 2, 3, 2, 4, 0, 7, 0, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 252, 2013, 0, 1, 0, 3, 1, 3, 3, 1, 1, 0, 6, NULL, NULL, 'I\\''m happy to judge Historical, as I\\''ve indicated along with the others, for unpublished. But keep in mind that I am entered in the published Historical category. I don\\''t know if that matters or not. Looking forward to some good reading.', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 253, 2013, 1, 0, 0, 3, 3, 0, 3, 0, 2, 5, 0, NULL, NULL, 'I am entered in both paranormal and historical categories, so I marked those will not judge.', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 254, 2013, 1, 0, 0, 4, 0, 3, 1, 3, 1, 4, 0, '', '', 'In paranormal, I prefer to read ghosts, psychics, and supernatural over vampire and werewolves. \r\n\r\n', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 255, 2013, 0, 1, 0, 3, 3, 1, 3, 3, 1, 0, 6, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 256, 2009, 1, 1, 0, 3, 3, 3, 3, 3, 3, 7, 5, NULL, NULL, 'I\\''d love to judge the Paranormal for UNPUBLISHED authors, but I can\\''t for Published authors because I entered in the paranormal category.', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 257, 2013, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 258, 2005, 0, 1, 0, 1, 2, 3, 3, 3, 1, 0, 4, 'paranormal and historical. ', 'I would prefer not to judge erotic or glbt.\r\n', 'I would only judge mainstream and inspirational in an emergency because I don''t usually read those types of books and am unsure about how to judge them.', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 259, 2013, 1, 1, 0, 2, 3, 1, 2, 4, 0, 7, 6, '', '', 'I would prefer to judge unpublished entries, but will do both if needed.', NULL, 0, NULL, 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 260, 2009, 1, 1, 0, 3, 3, 3, 3, 3, 1, 4, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 261, 2013, 0, 1, 0, 3, 1, 0, 3, 1, 0, 3, 5, '', '', 'Any category that would include a mystery/thriller element is a good category for me.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 262, 2013, 0, 1, 0, 4, 1, 2, 2, 0, 0, 0, 6, '', '', 'Prefer mainstream fiction if possible.  What I write is suspense with elements of romance.  I like stories with foreign settings.  \r\n\r\nJudy', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, 263, 2013, 0, 1, 0, 3, 3, 3, 3, 3, 0, 0, 6, NULL, NULL, 'No werewolves, zombies, or vampires, please.', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 264, 2013, 1, 0, 0, 0, 0, 1, 4, 1, 3, 5, 0, NULL, NULL, 'I\\''m not a big reader of erotic or super-hot romances. I\\''m not sure I\\''d be a good judge of what makes them work.', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 265, 2013, 0, 1, 0, 2, 0, 1, 4, 3, 1, 0, 6, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 266, 2013, 0, 1, 0, 2, 2, 0, 2, 4, 0, 0, 6, 'paranormao', 'inspirationals', 'Have been a participant in both categorys and will gald help in any way I can. Though my latest is s PNR as you suggest above I would like to avoid Vampires, Werewolves, Ghouls, Zombies, etc... a nive witch tale (which I write about) would be welome. Looking forward to the opportunity', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 267, 2013, 0, 1, 0, 4, 2, 2, 0, 0, 0, 0, 6, '', '', 'I have submitted an entry to the Single Title category, so it''s not appropriate for me to judge anything in that category.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 268, 2013, 0, 1, 0, 1, 1, 1, 1, 3, 1, 0, 6, NULL, NULL, '', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 269, 2013, 0, 1, 0, 3, 1, 3, 3, 1, 2, 0, 0, NULL, NULL, 'Hi I live in Australia so I''m not sure I am completely eligible to be a judge but have elected to judge the unpublished entreis which are electronic.', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 270, 2013, 0, 1, 0, 1, 4, 3, 3, 0, 1, 0, 5, 'Thrillers, cozy mysteries, romantic suspense', 'paranormal, horror, inspirational', 'Prefer no werewolves, vampires, and the like. Also prefer not to judge paranormal as a whole or inspirational, as I never read books in those categories and am afraid I wouldn''t do a good job of critiquing. However, I WILL judge them if you''re pressed for judges.\r\n\r\nAgain, thank you for the honor of participating.\r\n\r\nJane', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, 271, 2013, 0, 1, 0, 4, 2, 2, 2, 1, 3, 0, 5, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 273, 2007, 1, 0, 0, 3, 1, 2, 4, 2, 2, 7, 0, 'Single Title and Mainstream. I can do one set of 5-7 books - maybe 2 sets of 4 if needed. I prefer Single Title. I do not read glbt, or erotica. I could read Historical. All other info is the same.\r\n\r\n1st choice is Single Title\r\n\r\n2nd choice is Mainstream\r\n\r\n3rd choice is Historical or historical inspirational', '', 'I just found the email to judge in this year\\\\\\\\\\\\\\''s contest. Please notify me at both email addresses if possible. I am able to judge 5-7 books or one packet. Last year I received books from both Single Title and Mainstream. I would enjoy receiving a packet like that again if possible.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 276, 2011, 1, 0, 0, 3, 3, 1, 3, 1, 1, 5, 0, 'ST/Mainsream/Category', '', 'Good luck with the contest!', '', 0, NULL, 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 277, 2013, 0, 1, 0, 3, 3, 3, 4, 2, 2, 0, 6, '', '', 'I will be gone the month of March and have a deadline before that. I''m sorry I can''t judge this year.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, 278, 2013, 0, 1, 0, 2, 0, 3, 2, 1, 2, 0, 5, NULL, NULL, 'I will judge either unpublished or published, but not both. Put me where needed the most.', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, 279, 2013, 0, 1, 0, 3, 2, 4, 2, 0, 0, 0, 4, NULL, NULL, '', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, 280, 2013, 1, 0, 0, 4, 3, 1, 3, 3, 1, 0, 0, '', '', 'Sorry, I can''t this year. :(', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, 281, 2013, 1, 1, 0, 2, 2, 3, 3, 3, 1, 2, 2, 'mystery\r\nYoung adult', '', 'I would judge inspirational but prefer to not judge strongly religious texts.\r\nI am part Native American and would be happy to judge anything along those lines.  \r\n', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, 282, 2013, 1, 1, 0, 3, 2, 4, 2, 2, 2, 1, 2, 'military', 'GLBT', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(283, 283, 2004, 1, 0, 0, 0, 0, 0, 3, 3, 1, 5, 0, NULL, NULL, 'Please no erotic of any kind.\r\nI would also prefer not to read vampires or werewolves.', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, 284, 2012, 1, 0, 0, 0, 0, 1, 3, 3, 0, 7, 0, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, 285, 2011, 1, 1, 0, 2, 1, 1, 3, 3, 1, 4, 5, '', '', 'I''m a chapter president this year, so time is short, but if you''re in a pinch, please contact me.', NULL, 0, NULL, 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, 286, 2011, 1, 0, 0, 3, 3, 4, 3, 1, 0, 7, 0, 'Humor is appreciated. I write it, so feel I can judge it well.', 'I do not enjoy books of any genre that feature serial killers, rapists, torture, child or animal abuse, slavery or human trafficking. I''ll judge erotica or LGBT if you need help, but don''t care for those genres.', 'Thanks for offering this opportunity to give back to other writers!  I love that you have inquired about my personal likes and dislikes.  Also - if you need help with unpublished entries, please contact me. I''ll make time to assist.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, 287, 2005, 0, 1, 0, 1, 1, 3, 1, 3, 3, 0, 3, NULL, NULL, 'This year, for the first time since I''ve been entering the Daphnee, it''s nearly impossible for me to judge.  I''ve asked to be added on an emergency basis only since I have book due in May that is going to require all of my attention as it''s a deadline that cannot be extended or missed.  I''m sorry I can''t do better ... and thanks for understanding.', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, 288, 2013, 1, 1, 0, 3, 3, 3, 3, 3, 1, 7, 5, NULL, NULL, '', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, 289, 2008, 0, 1, 0, 4, 1, 0, 1, 0, 0, 0, 8, NULL, NULL, '', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, 290, 2006, 0, 1, 0, 3, 2, 3, 2, 2, 1, 0, 5, '', '', ' I might be able to do one or two emergency published entries. I will probably be out of town from March 15 till the end of April, so I really do mean last minute in an emergency.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, 291, 2003, 1, 0, 0, 3, 3, 1, 3, 4, 0, 4, 0, 'I absolutely love the paranormal, mystery and or suspense/thriller elements in any of the mainstream, category and single title books.', 'The only ones I really can''t judge are inspirational or erotica. ', 'I noticed the erotica is no longer listed as a separate category. I''m great with some motivated hot sex scenes and love sexual tension but would rather not read erotica in any of the categories if I can avoid it. Also I apologize for only putting in 4 books - I had been judging for the contest for years until health issues precluded it the last year or so. I really want to get back at it but would like to ease in more slowly with 3-4 books. If you can''t accommodate the smaller packet, I totally understand - you could even just put me on your emergency judge list if that would be more useful for you.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(292, 292, 2008, 0, 1, 0, 4, 2, 2, 2, 3, 1, 0, 10, 'Mainstream and paranormal, will judge any science fiction also.', 'paranormal using vampires, werewolves, shapeshifters,', 'Mainstream is my big love, and always has been since I''ve been judging the Daphne but I would judge Paranormal. Probably not a great judge for werewolves and vampires since I do not read them at all. Love science fiction also. ', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, 293, 2013, 1, 0, 0, 0, 2, 2, 3, 2, 0, 5, 0, '', '', 'No futuristic, no vampires/fairies/werewolves/creatures, etc. -- only paranormal I\\''m really interested in would be ghost stories or time travel. \r\n\r\nAlso, I\\''m entered in Mainstream so cannot judge that category.\r\n\r\nMail books after April 9th as I''ll be traveling and can''t have them sitting in the PO.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, 294, 2013, 1, 0, 0, 2, 2, 0, 3, 0, 0, 6, 0, NULL, NULL, 'I\\''ve entered the Inspirational category, so please don\\''t give me any of those. Thanks, Laura', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, 295, 2012, 0, 1, 0, 4, 3, 3, 2, 1, 1, 0, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, 296, 2013, 0, 1, 0, 4, 2, 3, 3, 0, 0, 0, 6, 'Mystery', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, 297, 2013, 0, 1, 0, 0, 3, 1, 3, 2, 3, 0, 5, NULL, NULL, '', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(298, 298, 2013, 0, 1, 0, 3, 3, 3, 3, 1, 0, 0, 4, 'I like paranormal ( spirits, sixth sense, psychic) not supernatural (vampires and other worlds). Romantic suspense, cozy mysteries. Not fussy.', NULL, 'I don''t read thrillers. Much better with amateur sleuths.', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, 299, 2000, 1, 1, 0, 1, 3, 1, 3, 1, 1, 5, 3, '', 'LGBT', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(300, 300, 2011, 1, 1, 0, 3, 3, 3, 3, 0, 0, 5, 5, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, 301, 2005, 1, 1, 0, 3, 2, 3, 2, 0, 2, 3, 6, '', '', 'I''m sorry but will not be able to judge this year due to upcoming retirement and long distance move.  Please contact me again next year.  Will have same email address and I''ll watch for notification in 2015.  Sorry I can''t help this year.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(302, 302, 2013, 0, 1, 0, 2, 2, 2, 2, 3, 1, 0, 6, NULL, NULL, 'I am a veteran law enforcement officer and forensic investigator who is currently working on my first two manuscripts, one paranormal mystery and one crime thriller. I have not judged any writing contests before, but am a life long mystery and paranormal genre reader. I received an email that the contest was in need of judges so if I can help, I would be honored to do so. Thanks.', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(303, 303, 2013, 0, 1, 0, 3, 3, 3, 3, 3, 1, 5, 5, '', '', '', 'Likes to judge Published, but lives in Australia.', 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(304, 304, 2010, 0, 1, 1, 3, 3, 3, 3, 3, 3, 5, 5, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(305, 305, 2013, 1, 0, 0, 2, 2, 2, 1, 1, 3, 5, 0, 'Inspirational suspension', '', 'I prefer to read things without a high heat factor.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(306, 306, 2013, 0, 1, 0, 0, 2, 4, 3, 3, 2, 0, 5, '', '', 'I enjoy reading all genres. My entry was mainstream, so I understand I''m not supposed to receive those to judge.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(307, 307, 2013, 1, 0, 0, 3, 3, 3, 3, 3, 0, 4, 0, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(308, 308, 2009, 0, 1, 0, 4, 3, 2, 3, 2, 1, 0, 6, NULL, NULL, '', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(309, 309, 2013, 1, 0, 0, 3, 2, 3, 2, 3, 3, 7, 0, '', '', 'Published entries my first choice, unpublished a close second - be glad to do either, but not sure I\\''m up for both. I read mostly mystery/suspense & mainstream, hence the hesitation in judging Category or Single Title romance. Don\\''t care for vampires, werewolves, etc but like other paranormal.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(310, 310, 2008, 0, 1, 0, 3, 3, 2, 3, 3, 2, 0, 6, '', '', 'I said I''d do up to 6, if for some reason you need me to do a few more let me know. Thank you for organizing!', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(311, 311, 2012, 0, 1, 1, 3, 2, 1, 3, 3, 1, 5, 5, '', 'Inspirational', 'Could only do a total of 6 books.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `judges` (`id`, `user_id`, `firstYear`, `judgePub`, `judgeUnpub`, `judgeEitherNotBoth`, `mainstream`, `category`, `historical`, `singleTitle`, `paranormal`, `inspirational`, `maxpubentries`, `maxunpubentries`, `subcategorylike`, `subcategorydislike`, `comments`, `internalComments`, `yearsJudged`, `categoriesjudged`, `judgeThisYear`, `created_at`, `updated_at`) VALUES
(313, 313, 2013, 0, 1, 0, 2, 3, 1, 3, 3, 2, 0, 6, NULL, NULL, 'I am happy to swap published for unpublished if this is more helpful', 'Australia Editor Arabian Studs and Stallions Vink Publishing\r\n\\"\r\n', 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(314, 314, 2013, 0, 1, 0, 3, 3, 3, 3, 3, 3, 0, 6, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(315, 315, 2013, 1, 1, 0, 4, 3, 2, 3, 2, 3, 6, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(316, 316, 2013, 0, 1, 0, 0, 0, 0, 0, 2, 0, 0, 3, 'I entered the Paranormal category last year. Since I will not be submitting an entry this year I wouldn''t mind helping out in that category. My manuscript is in edit. I am 51 years old and have been reading Romance fiction since age 22. Glad to help.  ', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(317, 317, 2013, 0, 1, 0, 3, 2, 3, 3, 3, 2, 0, 6, NULL, NULL, '', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(318, 318, 2013, 0, 1, 0, 4, 3, 3, 3, 3, 3, 5, 5, 'Crime fiction', 'Vampire, christian, excessively violoent', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(319, 319, 2013, 0, 1, 0, 0, 0, 4, 3, 2, 2, 0, 3, '', '', 'I can not judge mainstream because I''m entered in it.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(320, 320, 2013, 1, 0, 0, 3, 2, 1, 3, 1, 2, 7, 0, '', '', 'I would be honored to be a judge in this contest. I''ve served as a selector for the Colorado Book Awards for the past two years and have enjoyed the experience. I am a Colorado Springs, Colorado resident; however, I am currently in Germany due to my husband''s military obligations. That''s why my address is a CMR APO and my phone number is so long. If you mail me books, you DO NOT have to pay international rates. It''s just the same as mailing to an address in the United States. You would address the following: Margi Desmond, CMR 445 Box 933, APO, AE 09046. You would not put the country on it. I have unlimited long distance calling to the U.S. and can Skype, so if verbal communication is needed, I can accommodate you. Thanks for the opportunity!', 'Has an obvious bias against self-published books. Had to re-assign those 2014.', 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(321, 321, 2013, 0, 1, 0, 3, 2, 2, 3, 2, 2, 0, 5, '', '', 'I have chaired our chapter''s wrting contest (CORW) and understand the need for good written feedback, with positive comments and writing examples where there is a need for improvement.  I will be happy to accept and read your judge guidelines as I understand we all need to be on the same page in your contest.  I judge fairly and tend to be gentle in my comments.  Looking forward to participating in your well known contest.  Regards.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(322, 322, 2013, 1, 0, 0, 3, 1, 3, 2, 1, 1, 5, 0, NULL, NULL, 'We have moved. I would be happy to judge for you.  A packet of 5-7 books would be fine.  Should you need an emergency reader, please ask.  I do not read vampires, werewolves, but I am comfortable with spirits or ghosts who come to visit.  I also do not prefer to read, unless asked, category romance (Harlequin series type).  At this time I cannot do E books. Thanks.  Hope I can be of help.', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(323, 323, 2011, 1, 0, 0, 4, 3, 3, 3, 1, 3, 5, 0, 'romantic suspense, thrillers', 'erotica', 'Prefer romantic suspense or a good thriller', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(324, 324, 2013, 1, 0, 0, 4, 0, 2, 1, 0, 0, 5, 0, 'Mainstream.', 'paranormal, inspirational.', 'I chose Mainstream because that''s what I write.  And enjoy.\r\nI don''t care for books with sex and/or vast violence. I skip over those parts, and this would not be fair to the writers if I were their judge. Vampires and such do not work for me. At all.  \r\nIf you have a category novel that fits the above paramaters, I would judge it. Same with Historical. I''m not big on books where the romance is the driving element, especially with sex. \r\nTotal bore, these are, for me. Please don''t send me any. I would make a poor judge of these entries.', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(325, 325, 2013, 0, 1, 0, 0, 1, 2, 2, 0, 4, 0, 5, 'mystery/ suspense: Amateur sleuth, cozy, private detective  ', 'Erotic, supernatural, zombie, police procedural, hard-boiled detective ', 'Prefer not to judge sexually explicit entries. Thanks.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(328, 328, 2013, 1, 0, 0, 3, 2, 3, 3, 4, 0, 7, 0, NULL, NULL, '', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(329, 329, 2013, 1, 0, 0, 3, 3, 3, 3, 3, 3, 0, 0, NULL, NULL, 'No special instructions, I would love to judge any entry', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(330, 330, 2013, 0, 1, 0, 3, 3, 3, 3, 3, 3, 0, 0, NULL, NULL, '', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(331, 331, 2013, 0, 1, 0, 0, 3, 3, 3, 0, 3, 0, 10, '', '', '.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(332, 332, 2013, 0, 1, 0, 3, 2, 3, 0, 0, 1, 0, 6, NULL, NULL, 'I don''t read category much and I have never read an inspirational, so while I would be happy to judge if there is really nobody else, it might not be fair to the contestants.', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(333, 333, 2013, 0, 1, 0, 3, 2, 3, 3, 3, 2, 0, 6, NULL, NULL, '', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(334, 334, 2013, 1, 1, 0, 4, 3, 3, 3, 1, 0, 7, 6, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(335, 335, 2013, 0, 1, 0, 2, 2, 4, 3, 2, 3, 0, 6, '', '', 'As a formal nurse, I would be well-suited to medical plot lines.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(336, 336, 2013, 0, 1, 0, 2, 2, 1, 4, 2, 1, 0, 6, 'suspense, paranormal, erotic, ', 'historical, inspirational ', 'I am working on a masters thesis due April 10, but would gladly step up if you are short of judges (especially if it''s not due until late April). I would prefer category or paranormal; I''m entered in single title. Although I never read them, I could do historical or inspirational if you''re really desperate. :-)', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(337, 337, 2013, 0, 1, 0, 3, 3, 0, 4, 0, 0, 2, 4, NULL, NULL, 'Just a reminder, I am entered in two categories - paranormal and single title:).', '', 0, '', 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(338, 338, 2013, 0, 1, 0, 3, 3, 3, 3, 3, 3, 0, 6, NULL, NULL, '', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(340, 340, 2013, 0, 1, 0, 3, 2, 3, 2, 0, 3, 0, 5, NULL, NULL, 'I will be in the midst of final edits for a new title so be "gentle" with me this first time.', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(341, 341, 2013, 0, 0, 1, 2, 1, 1, 2, 0, 3, 2, 3, '', 'Erotica, zombie or vampire related, m/m or f/f romances', 'I''m currently judging for the RITAs and have 8 books to read by 3/7. Yikes! If I don''t enter (not sure at this point) I could judge the single title category. ', NULL, 0, NULL, 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(342, 342, 2010, 1, 1, 0, 2, 0, 2, 2, 0, 0, 4, 4, '', '', 'Just filling this out in case Nancy needs an emergency judge.', NULL, 0, NULL, 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(343, 343, 2013, 0, 1, 0, 0, 0, 3, 0, 2, 0, 0, 5, NULL, NULL, 'My category choices are narrow this year because I find myself not being interested in certain sub-genres and don''t want to project my tastes onto the entries.', '', 0, '', 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(344, 344, 2005, 1, 1, 0, 0, 3, 1, 3, 3, 0, 0, 4, NULL, NULL, 'Old judging number was 68', '', 0, '', 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(351, 351, 2014, 0, 1, 0, 3, 3, 3, 3, 0, 0, 0, 5, 'Historical set from 1820 on, preferably turn of the 20th century. Not so fond of Rome/Middle Ages..', 'Horror', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(352, 352, 2014, 0, 1, 1, 3, 3, 3, 0, 2, 2, 5, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(353, 353, 2012, 1, 1, 1, 3, 3, 3, 3, 3, 3, 5, 6, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(354, 354, 2004, 1, 0, 1, 3, 3, 3, 4, 0, 1, 5, 6, '', 'No erotica, please.', 'No specific instructions.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(355, 355, 2012, 1, 0, 0, 3, 3, 3, 3, 1, 0, 5, 6, '', '', 'I''m not sure what the first year I judged was - 2011? 2012? - so I just guessed.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(356, 356, 2014, 0, 1, 0, 3, 4, 3, 3, 1, 0, 5, 6, 'cozy mysteries', '', 'Sorry I can''t volunteer this year - I''m moving and up to my ears in boxes.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(358, 358, 2014, 0, 1, 0, 3, 1, 3, 3, 3, 0, 5, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(359, 359, 2011, 1, 1, 0, 3, 3, 2, 2, 1, 4, 4, 5, '', 'Erotica', '', NULL, 0, NULL, 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(361, 361, 2014, 1, 0, 0, 3, 3, 1, 3, 3, 3, 5, 0, 'Mainstream, Suspense', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(363, 363, 2014, 1, 0, 0, 3, 4, 1, 3, 3, 1, 4, 1, '', '', 'But if you do get the e entries in kindle next year do keep me in mind\r\nThanks\r\nKamy', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(364, 364, 2010, 0, 1, 0, 2, 2, 1, 4, 1, 1, 3, 4, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(365, 365, 2011, 0, 1, 1, 3, 3, 1, 3, 4, 1, 5, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(366, 366, 2014, 1, 0, 0, 1, 4, 0, 3, 1, 0, 5, 6, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(367, 367, 2011, 0, 1, 0, 2, 0, 3, 1, 1, 3, 0, 6, 'Historical novels that take place in Victorian and Edwardian England and the American West/frontier.  I love inspirational suspense and cozy mysteries as well.', 'I loathe vampires and sci-fi sub-categories', 'I''m the critique partner of Melissa Robbins who will be entering in this year''s contest.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(368, 368, 2009, 0, 1, 0, 3, 3, 3, 3, 3, 3, 0, 2, '', '', '', NULL, 0, NULL, 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(369, 369, 2005, 1, 0, 0, 3, 3, 1, 3, 3, 1, 5, 6, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(370, 370, 2014, 1, 0, 0, 3, 3, 3, 3, 3, 3, 5, 6, '', 'Horror or erotica', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(371, 371, 2014, 0, 1, 0, 3, 3, 3, 3, 3, 3, 5, 6, 'suspense', 'erotica', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(372, 372, 2014, 0, 1, 0, 3, 3, 3, 3, 3, 3, 5, 6, 'I am planning to enter either Mainstream or Single Title. I would love to judge whichever one I did not enter. ,', 'I''m not good with historical because I don''t know the language', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(373, 373, 2014, 1, 0, 0, 4, 2, 3, 3, 0, 0, 3, 0, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(374, 374, 2014, 1, 0, 0, 3, 3, 3, 3, 3, 3, 5, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(375, 375, 2014, 0, 1, 0, 4, 3, 3, 3, 4, 0, 3, 6, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(376, 376, 2014, 0, 1, 0, 0, 2, 0, 3, 4, 0, 0, 6, '', '', 'I look forward to helping. Thanks for the invitation!', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(377, 377, 2014, 1, 0, 0, 2, 2, 0, 2, 0, 3, 5, 0, '', 'Erotica, or overly explicit sexual content.', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(378, 378, 2014, 1, 0, 0, 3, 3, 0, 4, 2, 1, 5, 5, 'Single title romantic suspense. I also read a ton of mysteries, with and without romantic elements, so I''d feel comfortable judging those if you need me to.', 'Not a huge fan of inspirational, but I can judge in a pinch.', 'I am blog mates with: Rachel Grant, Gwen Hernandez, Lena Diaz, Carey Baldwin, Krista Hall, Sarah Andre, Sharon Wray and Diana Belchase so please don''t send me any of their work.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(379, 379, 2014, 1, 0, 0, 3, 3, 3, 3, 3, 0, 5, 6, 'Simply good writing', 'I checked off Inspirational because I''m entered in that category.', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(380, 380, 2005, 1, 1, 0, 3, 1, 2, 3, 0, 0, 4, 2, 'Dark / gritty romantic suspense, mainstream and single title, historical thriller', 'Comedic romantic suspense, erotica, inspirational, paranormal, fluffy-light historical capers', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(381, 381, 2014, 1, 1, 0, 3, 2, 4, 3, 2, 0, 1, 3, 'I write historical inspirational. I read just about everything. I can give the best feedback related to historicals.', 'I don''t read much category or paranormal.', 'I''m not sure who is entering this year. You may want to ask me about the novel you send out just in case.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(382, 382, 2014, 1, 1, 1, 3, 3, 3, 3, 3, 3, 5, 6, '', '', 'Please keep me on your lists of potential judges for future years, but this year I''m expecting my first child at the end of March and strongly suspect I will not have time to judge. Thanks!', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(383, 383, 2014, 1, 0, 0, 3, 3, 3, 4, 0, 0, 5, 0, 'Single title or mainstream.', 'Erotica, paranormal (witches are okay, but not vampires, werewolves, etc.).', 'March and early April are very busy for me (speaking engagements, etc.), so it would be better if I could judge the published entries this year.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(384, 384, 2014, 0, 1, 1, 3, 3, 3, 3, 3, 2, 5, 6, '', 'Inspirational.', 'I''m a former journalist who covered book publishing and also edited an early e-book feature, Open Book,  for USA TODAY.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(385, 385, 2005, 1, 0, 0, 1, 0, 4, 1, 0, 1, 4, 5, '', '', 'This year (2014) I will be at a different mailing address on March 15th.  Please mail my books to be judged to the mailing address below.  Thanks.\r\nJan Hambright\r\n1510 1/2 E. Sycamore Ave\r\nEl Segundo, CA  90245 ', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(386, 386, 2009, 0, 1, 1, 3, 2, 3, 3, 3, 2, 5, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(387, 387, 2014, 1, 0, 1, 0, 1, 3, 3, 0, 0, 5, 6, 'Historical.', 'Prefer no inspirational or paranormal. I don''t have enough background in those areas.', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(388, 388, 2014, 1, 1, 0, 0, 0, 0, 0, 3, 3, 5, 6, 'Inspirational and paranormal.', 'Category and historical because I don''t read them often.', 'I am a member of Lethaladies but have not participated in 2013. I am familiar with John Foxjohn''s work and cannot judge his entries. I don''t feel qualified to judge category or historical because I don''t read much of it.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(389, 389, 2014, 1, 0, 0, 1, 3, 0, 2, 3, 3, 3, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(390, 390, 2014, 0, 1, 0, 3, 1, 2, 0, 0, 2, 5, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(391, 391, 2014, 1, 0, 0, 3, 3, 3, 3, 2, 0, 5, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(392, 392, 2012, 0, 1, 1, 3, 3, 3, 3, 3, 3, 5, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(393, 393, 2014, 0, 1, 0, 3, 1, 2, 0, 4, 0, 0, 5, 'Paranormal', 'I don''t read Inspirational or Category romance so I don''t think I would be a good judge in those categories.', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(394, 394, 2014, 1, 0, 0, 2, 4, 4, 2, 2, 2, 3, 0, '', 'erotica/bdsm', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(395, 395, 2014, 1, 0, 0, 4, 4, 1, 3, 3, 2, 3, 1, '', '', 'First-timer, please be gentle. :)', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(396, 396, 2008, 0, 1, 0, 3, 3, 3, 3, 0, 2, 0, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(397, 397, 2014, 0, 1, 0, 3, 3, 3, 3, 1, 3, 4, 4, 'mystery suspense', 'paranormal witchcraft horror', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(398, 398, 2014, 0, 1, 0, 0, 3, 3, 3, 0, 3, 5, 6, 'Medical plot or characters', '', 'Thank you for the invitation for this year but book 2 is in the works. I would love to judge in 2015.  Great contest!  Pamela', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(399, 399, 2014, 0, 1, 0, 3, 3, 1, 3, 0, 0, 0, 6, 'chicklit', '', 'I''m committed to another contest, and don''t want to spread myself too thin, so I''ve opted for unpublished. I don''t read historical so I''m probably not the best judge there, but in a pinch I could do it. ', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(400, 400, 2014, 0, 0, 1, 3, 3, 3, 3, 3, 0, 5, 6, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(401, 401, 2014, 1, 1, 0, 3, 3, 3, 3, 2, 1, 5, 6, '', 'paranormal', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(402, 402, 2014, 0, 1, 1, 2, 0, 4, 2, 0, 1, 5, 6, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(403, 403, 2014, 1, 0, 0, 3, 3, 3, 3, 3, 3, 5, 6, 'I am an avid reader. I read everything.', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(404, 404, 2014, 1, 1, 1, 3, 3, 0, 3, 4, 0, 4, 5, '', '', '', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(405, 405, 2014, 1, 1, 1, 3, 3, 3, 3, 2, 3, 5, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(406, 406, 2014, 0, 1, 0, 3, 3, 3, 3, 3, 1, 5, 6, '', '', 'My house is currently undergoing repairs for severe damage sustained in a bush fire on the 12th January 2014.  At the moment we are in temporary housing but are due to move back home in another few weeks.  I do not see this as interfering with judging duties, especially in electronic form.  I am currently judging the preliminary rounds of the RWA RITA awards, which is in the form of physical books, and am finding it an excellent and enjoyable distraction from the trials and tribulations of dealing with insurance and repair tradespeople.  ', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(407, 407, 2014, 0, 1, 0, 3, 3, 2, 3, 0, 2, 0, 6, '', '', '', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(408, 408, 2014, 1, 0, 0, 4, 3, 0, 0, 3, 1, 3, 0, 'Anything Military; ghosts/spirits; contemporary', '', 'don''t send books by Karen Brees\r\n\r\nThus far I do not know anyone entering the Daphne, but I would notify you if a colleague''s book showed up for judging. Just noticed that my editor, Kendel Flaum, is the final judge for Mainstream if that is a conflict of interest??? I''m not sure???\r\n\r\nI''m glad to help out, but I don''t think  I can take more than 3 books this first year as I''m working under a deadline AND judging 8 Ritas and 5 Golden Hearts in Feb/Mar. SO, maybe more next year :-) Thanks for understanding.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(409, 409, 2012, 1, 1, 1, 3, 3, 1, 3, 3, 1, 5, 6, '', '', '', NULL, 0, NULL, 'PP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(410, 410, 2014, 0, 1, 1, 3, 3, 3, 3, 3, 3, 5, 6, 'Historical', 'Paranormal', NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(411, 411, 2014, 0, 1, 0, 2, 0, 0, 0, 0, 0, 5, 6, NULL, NULL, NULL, NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(412, 412, 2014, 1, 0, 0, 2, 2, 2, 2, 2, 0, 5, 0, 'I''m entered in the single title contest, but I do love to read those. I also love mainstream and paranormal.', 'I''m not a good judge of inspirational or Amish romances, simply because I don''t read them.', 'I am critique partners with Katie Reus, but I''m not sure if she''s entering the Daphne this year. ', NULL, 0, NULL, 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(414, 414, 2014, 1, 0, 0, 3, 3, 3, 3, 0, 1, 5, 5, NULL, NULL, NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(415, 415, 2008, 0, 1, 0, 3, 3, 3, 3, 3, 1, 5, 6, NULL, NULL, NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(416, 416, 2012, 1, 0, 0, 3, 0, 0, 0, 0, 3, 3, 0, 'Suspense, romance optional.', NULL, 'Could be traveling the week of 17-21. Send early so I have something to read!   :-)\r\nI may have filled this out before.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(417, 417, 2014, 1, 0, 0, 0, 4, 0, 0, 0, 3, 3, 0, 'Harlequin''s Intrigue line and Love Inspired Suspense', NULL, NULL, NULL, 0, NULL, 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(418, 418, 2009, 1, 0, 0, 2, 2, 2, 3, 3, 2, 5, 0, NULL, NULL, NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(419, 419, 2012, 1, 1, 0, 3, 3, 1, 3, 1, 1, 2, 4, 'Romantic Suspense\r\nMystery', 'Paranormal or Inspirational mainly because I don''t read them very often. ', NULL, NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(420, 420, 2012, 0, 1, 1, 4, 2, 0, 2, 0, 2, 2, 3, 'Mystery, suspense, humor, thriller, cozy, hobbies, pets', NULL, 'I''m not sure about entering yet.  Please contact prior to submitting books or ms''s.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(421, 421, 2005, 1, 0, 0, 2, 1, 3, 4, 2, 0, 2, 0, 'Please, if possible...only send me "funny" books like Gemma Holiday, etc. Romantic Comedies with mystery.  Thanks!!', 'Please no SELF-Pubbed books\r\nno Hard-Core, political intrigue, spies, etc.', 'Please no SELF-Pubbed books', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(422, 422, 2009, 1, 1, 0, 3, 0, 3, 3, 3, 0, 3, 3, NULL, NULL, NULL, NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(423, 423, 2010, 0, 1, 0, 3, 1, 3, 1, 1, 1, 5, 6, 'Mainstream/suspense/women''s fiction/historical', 'no snuff killings, please', 'This year I can only commit to judging unpublished entries, although I might be able to help out in an emergency and have filled out my address and preferences only for that purpose. Thank you.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(424, 424, 2014, 0, 1, 0, 3, 3, 3, 3, 2, 2, 0, 10, NULL, 'I am not overly familiar with Paranormal or Inspirational, so this is probably not the best category for me to judge. However I am happy to do so if you need judges in this area.', NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(425, 425, 2008, 0, 1, 0, 2, 2, 1, 2, 4, 0, 5, 6, NULL, 'Please - no inspirational.  I don''t read them and don''t feel equipped to judge them.', NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(426, 426, 2014, 0, 1, 0, 3, 3, 3, 3, 3, 3, 5, 6, NULL, NULL, NULL, NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(427, 427, 2014, 0, 1, 0, 3, 3, 3, 3, 3, 3, 5, 6, NULL, NULL, NULL, NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(428, 428, 2014, 0, 1, 0, 3, 3, 3, 3, 3, 3, 0, 8, NULL, 'Not so fond of erotica.', 'I will be out of town from March 11-13, 2014. Just in case that conflicts with when you send materials.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(429, 429, 2014, 1, 0, 0, 3, 4, 3, 3, 0, 3, 5, 6, NULL, 'erotic romance', NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(430, 430, 2014, 1, 0, 0, 0, 0, 2, 4, 4, 1, 4, 0, NULL, 'YA, mainstream or first person', 'I do not have the time to judge unpublished.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(431, 431, 2014, 0, 1, 1, 3, 3, 1, 3, 0, 3, 5, 6, NULL, NULL, NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(432, 432, 2014, 1, 1, 1, 0, 0, 3, 4, 1, 1, 5, 6, NULL, NULL, 'I am taking two writing courses in March and April, and won\\''t have time to judge this year. However, I\\''d be happy to remain on the mailing list and be considered next year. Thank you!', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(433, 433, 2014, 0, 1, 0, 3, 3, 3, 3, 3, 1, 5, 6, 'medical elements or military/police involvement. ', NULL, NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(434, 434, 2014, 1, 0, 0, 3, 1, 3, 3, 1, 3, 5, 3, NULL, NULL, 'I did enter in the unpublished paranormal category already.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(435, 435, 2014, 0, 1, 0, 3, 3, 3, 3, 3, 3, 5, 6, 'SINGLE TITLE, MAINSTREAM', 'HISTORICAL, INSPIRATIONAL', NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(436, 436, 2014, 1, 1, 0, 3, 0, 3, 0, 2, 2, 5, 5, NULL, NULL, NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(438, 438, 2014, 1, 0, 0, 3, 3, 3, 3, 0, 0, 5, 6, 'historical', 'homosexual,  vampire, werewolves, etc.', NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(439, 439, 2014, 1, 0, 1, 2, 4, 1, 3, 3, 3, 3, 6, NULL, NULL, 'I am coordinating the historical category for the 2014 Lone Star Writing Competition (Northwest Houston Chapter) as such I would prefer to only judge historical in an emergency. Thanks.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(440, 440, 2014, 1, 1, 1, 3, 2, 3, 3, 3, 2, 5, 6, NULL, NULL, NULL, NULL, 0, NULL, 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(441, 441, 2009, 1, 0, 0, 3, 3, 3, 3, 3, 3, 5, 0, NULL, NULL, 'I think my assigned judge number in previous years was 09-114. Thanks for asking me to judge again!\r\n\r\nTina', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(442, 442, 2014, 1, 0, 0, 3, 3, 3, 3, 0, 3, 5, 2, NULL, 'Anything Paranormal!', NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(443, 443, 2014, 0, 1, 0, 3, 4, 1, 0, 2, 2, 0, 10, 'Love Single title but am planning to enter that category.  Like to read mainstream and category. Have read inspirational and paranormal in past.', 'I do not believe I have read any historical suspense. So I do not feel I would be a very good judge in that category.', NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(444, 444, 2014, 0, 1, 0, 3, 3, 3, 3, 3, 3, 5, 6, NULL, NULL, NULL, NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(445, 445, 2011, 0, 1, 0, 0, 1, 3, 2, 1, 0, 5, 5, NULL, NULL, 'Will be on vacation March 16-21. If I am sent entries to judge, I will not respond until I return home on March 22.', NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(446, 446, 2014, 0, 1, 0, 3, 1, 1, 3, 1, 2, 5, 6, 'I''m a mainstream writing, having done family drama as well as mysteries so I feel most qualified to judge in that area.', 'I''ve never written any other category and rarely read outside my own genre, so my fear would be that I wouldn''t know the rules of the other genres.  I suspect that good writing is good writing, regardless of the genre, so I would certainly do it if you needed me too. And I suspect you''ll send guidelines by which to judge each genre. \r\n', 'I''m sorry I''m unable to help this year. Other commitments.', NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(447, 447, 2014, 0, 1, 0, 0, 0, 3, 3, 3, 3, 0, 6, NULL, NULL, NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(448, 448, 2014, 1, 1, 1, 3, 3, 3, 3, 0, 0, 3, 6, NULL, NULL, 'I have never judged a contest, and I''ve recently started entering contests. I''m not sure how good I''ll be, but I''m happy to help if you absolutely need me. If not, maybe next year I''ll be more confident.  Thanks for asking.', NULL, 0, NULL, 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(449, 449, 2014, 0, 1, 0, 3, 3, 3, 3, 3, 3, 0, 6, 'Single title\r\nParanormal\r\nMainstream', NULL, NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(450, 450, 2014, 0, 1, 0, 2, 2, 2, 2, 2, 2, 5, 6, NULL, NULL, NULL, NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(451, 451, 2014, 0, 1, 1, 0, 3, 3, 3, 3, 3, 5, 6, 'all kinds of suspense', 'Don''t usually read category', NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(452, 452, 2014, 0, 1, 0, 3, 2, 3, 3, 3, 2, 5, 5, NULL, NULL, NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(453, 453, 2014, 1, 0, 1, 3, 2, 0, 3, 3, 2, 5, 6, 'Paranormal (when I''m not entered in that category) is my favorite.  Also love mainstream and Single Title.  I read category now and then too. I read and write a lot of M/M so I would be perfectly comfortable judging that in any category.', 'Historical. I don''t normally read them and I don''t think I would be a good judge in that category.', NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(454, 454, 2014, 1, 1, 0, 2, 2, 2, 2, 2, 2, 5, 6, 'Thriller, mystery', NULL, NULL, NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(455, 455, 2014, 0, 1, 0, 0, 1, 1, 2, 0, 1, 1, 3, NULL, 'syfi or paranormal', 'I entered two novellas this year but fear I entered the wrong category of ''unpublished''.  These books are under 30K words and are published.  What should I do?? ', NULL, 0, NULL, 'EJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(456, 456, 2014, 1, 0, 1, 3, 0, 3, 3, 2, 1, 5, 6, 'I''ve entered the series category so I can''t be a judge there.', NULL, NULL, NULL, 0, NULL, 'LJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(457, 457, 2014, 1, 0, 0, 3, 3, 3, 3, 3, 0, 5, 0, NULL, NULL, NULL, NULL, 0, NULL, 'NY', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_12_24_195315_create_users_table', 1),
('2014_12_24_200622_create_judges_table', 1),
('2014_12_24_200640_create_entries_table', 1),
('2014_12_24_200703_create_scoresheets_table', 1),
('2014_12_24_200733_create_assignments_table', 1),
('2014_12_27_165903_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('doug@asknice.com', 'c42ddc29315ffed987fcd91770173eb7e0cf2599', '2015-01-02 17:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `scoresheets`
--

DROP TABLE IF EXISTS `scoresheets`;
CREATE TABLE IF NOT EXISTS `scoresheets` (
  `id` int(10) unsigned NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `writingName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipCode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=458 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstName`, `lastName`, `writingName`, `phone1`, `phone2`, `phone3`, `street`, `city`, `state`, `zipCode`, `country`, `email2`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'doug@asknice.com', '$2y$10$9XEscArrDENT8n6JnnBaV.pca3VjdTKAKHRaz.VR3bX0vyCwj4KXO', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'w1FuYN0LQTRMIz5uH4GPc0khge70EbA7vwNo3LEZpQ437ZTq5nRCganmkWYo', '2015-01-02 17:49:06', '2015-01-02 17:49:37'),
(106, 'ndjnich@gmail.com', 'thispass', 'Nancy J', 'Nicholson', 'Nancy J Nicholson', '830-443-4915', '', '', 'Sailing the Caribbean', '', '', '', 'Here and There', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'aprcox@american-usa.com', 'thispass', 'April', 'Cox', '', '2053254708', '2057465384', '', '2916 16th Street North', 'Birmingham', 'Alabama', '35207', 'United States', 'aprcox@american-usa.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'nphill53@roadrunner.com', 'thispass', 'Nanci', 'Race', '', '413-229-3386', '413-854-3465', '413-528-2663 ext 23', 'P.O. Box 273', 'Ashley Falls', 'MA', '01222', 'USA', 'nanci532001@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'allisonbcollins@hotmail.com', 'thispass', 'Allison', 'Collins', '', '972-955-0323', '214-743-7603 (work)', '', '3714 Creststone Dr.', 'Garland', 'TX', '75040', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'nancyjfarrier@gmail.com', 'thispass', 'Nancy', 'Farrier', '', '520-403-5421', '760-242-6912', '', '15716 Pohez Road', 'Apple Valley', 'CA', '92307', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'tammyhoganson@lonstel.com', 'thispass', 'Tammy', 'Hoganson', 'Tamara Hogan', '507-744-3171', '', '', '6436 Le Sueur Ave.', 'New Prague', 'MN', '56071', 'USA', 'tamara@tamarahogan.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'mhdonley@aol.com', 'thispass', 'Marianne', 'Donley', 'Marianne Donley', '610-285-2460', '909-229-7329', 'Only have two phones', '2989 Silver Creek Circle', 'Kutztown', 'PA', '19530', '19530', 'mariannedonley@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'Lita.Harris@comcast.net', 'thispass', 'Lita', 'Milochik', 'Lita Harris', '908-276-3270', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'callieb16@msn.com', 'thispass', 'Callie', 'Burdette', 'Callie Russell', '804-338-0108', '804-897-3851', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'hnwstone@arkansas.net', 'thispass', 'Jerlyn', 'Stone', '', '870-845-5873', '870-200-1809', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'kkay3@comcast.net', 'thispass', 'Arlene', 'Kay', 'Arlene Kay', '508-3856116', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'capitolathais@msn.com', 'thispass', 'Charlotte', 'Hunter', '', '321-626-8962', '', '', '172 Balfour Drive', 'Winter Park', 'FL', '32792', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'intrigue@idirect.com', 'thispass', 'Cindy', 'Carroll', '', '519-767-9930', '', '', '8 Laurelwood Court', 'Guelph', 'ON', 'N1G 4E8', 'Canada', 'intrigue@cindycarroll.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'Myslady@aol.com', 'thispass', 'Cynthia', 'Clark', 'Cynthia Lea CLark', '818 239 6333', '818 762 4456', '', '12500 Hatteras St', 'Valley Village', 'Ca', '91607', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'mrsgodiva@comcast.net', 'thispass', 'Amanda', 'Murphy', 'Jill James', '925-628-0110', '', '', '370 Surrey Way', 'Brentwood', 'CA', '94513', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'linda@lindawisdom.com', 'thispass', 'Linda', 'Wisdom', 'Linda Wisdom', '9516969719', '9517043743', '', '23786 Castinette Way', 'Murrieta', 'CA', '92562', 'US', 'contact@lindawisdom.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'lisa@perryfam.net', 'thispass', 'Lisa', 'Perry', 'Lisa Perry', '6194027024', '6194027024', '6194027024', '1034 Tarlo Ct', 'El Cajon', 'California', '92019', 'United States', 'lisa@perryfam.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'mhren1021@aol.com', 'thispass', 'Margaret', 'Hren', 'Juliet Martini', '7032442611', '7038660824', '7036101260', '7707-D Lexton Place', 'Springfield', 'VA', '22152', 'United States', 'margaret@pedorthics.org', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'd.gatrell@gmail.com', 'thispass', 'Dee', 'Gatrell', '', '386-738-9606', '407-325-4744', '', '2020 Chinaberry Lane', 'DELAND', 'FL', '32720', 'usa', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'vjanes@telusplanet.net', 'thispass', 'Virginia', 'Janes', '', '403-228-6635', '', '', '618 - 22nd Avenue SW', 'Calgary', 'Alberta', 'T2S 0H8', 'Canada', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'gm.hernandez@me.com', 'thispass', 'Gwen', 'Hernandez', '', '703-398-4145', '', '', '14422 William Carr Ln', 'Centreville', 'VA', '20120', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'mgbutler2@yahoo.com', 'thispass', 'Mary Grace', 'Butler', '', '336-793-7773', '336-917-9406', '', '2685 Windy Crossing', 'Winston-Salem', 'NC', '27127', 'USA', 'mgbtoo@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'lzenk@charter.net', 'thispass', 'Lori', 'Cameron', '', '218-821-5599', '', '', '607 3rd Avenue NE', 'Brainerd', 'MN', '56401', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'annmarsh94703@yahoo.com', 'thispass', 'Ann', 'Marsh-Flores', 'Anne Marsh', '9259436032', '', '', '835 Nicholas Court', 'Brentwood', 'CA', '94513', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'Rakleinsorge@gmail.com', 'thispass', 'Rachel', 'Kleinsorge', 'Rachel Graves', '757-634-4884', '757-585-2786', '', '202 Old Cart Rd', 'Williamsburg', 'VA', '23188', 'USA', 'Rachel@rachelgraves.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'tlco777@juno.com', 'thispass', 'Terry', 'Odell', 'Terry Odell', '196867704', 'n/a', 'n/a', '3221 Blue Mesa Drive', 'Divide', 'CO', '80814', 'USA', 'terry@terryodell.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'PatMarinel@yahoo.com', 'thispass', 'Patricia A', 'Marinelli', 'Pat Marinelli', '732-750-4762', '', '', '605 S Lincoln Ave', 'Woodbridge', 'NJ', '07095-2302', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'sundogelec@aol.com', 'thispass', 'Mary J.', 'Adamski', '', '248-437-005', '', '', '6090 Seven Mile Road', 'South Lyon', 'Michigan', '48178', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'ajbrower@charter.net', 'thispass', 'Andree', 'Swanson', 'AJ Brower', '618-622-9952', '618-960-0055', '', '1136 Lazy Hollow Ct', 'O Fallon', 'IL', '62269', 'US', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'romntklady@hotmail.com', 'thispass', 'Liz', 'Slawinski', '', '(631) 368-3307', '845-641-7722 cell', '', '', '', '', '', '', 'lizslawinski@hotmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'authorlovely@gmail.com', 'thispass', 'Linda', 'Lovely', '', '864-888-4802', '', '', '710 Navigators Pt', 'Seneca', 'South Carolina', '29672', 'United States', 'lindalovely@bellsouth.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'tsrhen@iland.net', 'thispass', 'Tammy', 'Henley', '', '660-668-3344', '', '', '11082 Bohling Avenue', 'Mora', 'Missouri', '65345', 'United States', 'tsrhen@hotmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'rcostelloe@sbcglobal.net', 'thispass', 'Robert', 'Costelloe', '', '832-248-9030', '', '', '13015 Plumwood Dr', 'Cypress', 'TX', '77429', 'USA', 'rcostelloe@sbcglobal.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'rebeccajclark.author@gmail.com', 'thispass', 'Rebecca', 'Clark', '', '425-246-8955', '', '', '19923 131st St SE', 'Monroe', 'WA', '98272', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'kcr2696439@aol.com', 'thispass', 'Kathy', 'Crouch', 'C. K. Crouch', '903-275-5950', '903-275-5950', '903-275-5950', '907 CRYMES LANE APT A', 'HARKER HEIGHTS', 'TX', '76548', 'UNITED STATES', 'kathleenwritestx@aol.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'tinaferraro@charter.net', 'thispass', 'Christina', 'Ferraro', 'Tina Ferraro', '818-395-8128', '818-249-6626', '', '5021Dunsmore Avenue', 'La Crescenta', 'CA', '91214', 'USA', 'admin@tinaferraro.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'mhannanmandel@yahoo.com', 'thispass', 'Marie', 'Hannan-Mandel', 'same', '(347) 405-4294', '(607) 962-9372', '(607) 732-6809', '163 Oakwood Avenue', 'Elmira Heights', 'NY', '14903', 'US', 'anarkali68@hotmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'pjmellor@entouch.net', 'thispass', 'PJ', 'Mellor', 'PJ Mellor', '281-304-0464', '', '713-557-4203', '14211 Bloomingdale Manor Dr.', 'Cypress', 'TX', '77429', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'sbooth001@nycap.rr.com', 'thispass', 'Sally', 'Booth', 'Sally Booth', '518-725-6644', '', '', '658 County Highway 146', 'Gloversville', 'NY', '12078', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'romancingmisty@yahoo.com', 'thispass', 'Misty', 'Simon', 'Misty Simon', '717.756.7797', '717.691.8362', '', '32 West Keller Street', 'Mechanicsburg', 'PA', '17055', 'USA', 'misty@mistysimon.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'babateman@shaw.ca', 'thispass', 'Beverley', 'Bateman', 'Beverley Bateman', '250-768-0893', '619-245-5587', '', '2825 Shannon Lake Road', 'Westbank', 'BC', 'V4T 1T6', 'Canada', 'beverley1@shaw.ca', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'deborahuchida@yahoo.com', 'thispass', 'Deborah', 'Uchida', 'Deborah Wilding', '808 985-7303', '', '', 'PO Box 173, 11-3923 Eleventh St.', 'Volcano', 'HI', '96785', 'USA', 'debbi@aloha.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'jmwille55@yahoo.com', 'thispass', 'Jean', 'Willett', '', '770-607-9514', '330-766-2400', '', '3619 Highway 411 NE', 'White', 'Georgia', '30184', 'United States', 'jeanwillett@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'doricenelson@aol.com', 'thispass', 'Dorice', 'Nelson', 'Dorice Nelson', '518-677-2399', '', '', '49 Gilbert Street', 'Cambridge', 'NY', '12816', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'drelizfortin@aol.com', 'thispass', 'Elizabeth', 'Fortin', '', '810-516-5566', '', '', '10700 N. La Reserve Dr. #10106', 'Oro Valley', 'AZ', '85737', 'USA', 'efortin@tell-talepublishing.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'bique263@gmail.com', 'thispass', 'Barbara', 'Kroon', 'Barbara Barrett', '515-865-6388', '407-566-0567', '515-222-1902', '', '', '', '', '', 'barbarabarrett747@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'margaretbreashears@tx.rr.com', 'thispass', 'Margaret', 'Breashears', 'Margaret Breashears', '214-478-5630', '', '', '1426 Creek Springs Dr', 'Allen', 'TX', '75002', 'USA', 'margaretbreashears@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'bcornelison@comcast.net', 'thispass', 'Beth', 'Cornelison', 'Beth Cornelison', '3183968605', '3183559290', '3183968605', '213 BRIARCLIFF DR', 'WEST MONROE', 'LA - Louisiana', '712919028', 'usa', 'bcornelison@comcast.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'nomdeplum888@yahoo.com', 'thispass', 'patti', 'chung', '', '3234595782', '', '', '4036 tropico way', 'los angeles', 'CA', '90065', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'bellson@comcast.net', 'thispass', 'Donnell', 'Bell', 'Donnell Ann Bell', '719 540 8632', '719 339 8711', '', '3002 springmeadow drive', 'Colorado Springs', 'CO', '80906', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'LorenaMcc@centurylink.net', 'thispass', 'Lorena', 'McCourtney', 'Lorena McCourtney', '541-476-2894', '', '', '1762 Patriot Lane', 'Grants Pass', 'Oregon', '97527', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'lcannonmenges@optonline.net', 'thispass', 'Lynne', 'Cannon', 'LynneRose Cannon', '631 262 1293', '516 429 2160 (cel but the one', '', '82 Ellis Avenue', 'Northport', 'New York', '11768', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'paulrpirate@aol.com', 'thispass', 'PAUL', 'PARADISE', 'PAUL PARADISE', '201-656-2042', '201-795-6618', '', '722 Willow Avenue', 'Hoboken', 'New Jersey', '07030', 'United States', 'paulrpirate@hotmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'sas141@aol.com', 'thispass', 'sarah', 'andre', '', '7136600108', '7132566525', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'toniannanderson@gmail.com', 'thispass', 'Toni', 'Anderson', '', '204 453 1803', '', '', '936 North Dr', 'Winnipeg', 'MB', 'R3T 0A8', 'CANADA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'gullwood@gmail.com', 'thispass', 'Susan', 'Vaughan', 'Susan Vaughan', '207-372-8284', '', '', '65 Glad Farm Road', 'Saint George', 'ME', '04860', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'kwishart@comcast.net', 'thispass', 'Kate', 'Wishart', 'KH LeMoyne, LW Herndon', '301 873 2952', '', '', '18304 Redbridge Court', 'Olney', 'MD', '20832', 'US', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'k.mccullough@earthlink.net', 'thispass', 'Karen', 'McCullough', 'Karen McCullough', '336-707-0933', '336-272-3352', '', '201 S. Elam Ave', 'Greensboro', 'NC', '27403', 'US', 'karen@kmccullough.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 'Treethyme@aol.com', 'thispass', 'Becke', 'Davis', 'Becke Martin', '773-643-1924', '513-260-7873', '', '1765 East 55th Street, Apt. M-1', 'Chicago', 'IL', '60615', 'USA', 'beckemartin@aol.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'brynna@brynnacurry.com', 'thispass', 'Bethany', 'Cagle', 'Brynna Curry', '2052696212', 'none - just IM me at brynnaswo', '', '4005 County Highway 99', 'Haleyville', 'AL', '35565', 'United States', 'brynnasword@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 'bnickerson1231@sbcglobal.net', 'thispass', 'Brandie', 'Nickerson', 'Brandie Nickerson', '8329670146', '8329670146', '8329670146', '3319 Fountain Hills Dr', 'Missouri City', 'Texas', '77459', 'United States', 'bnickerson1231@sbcglobal.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'jackidelecki@gmail.com', 'thispass', 'jacqueline', 'delecki', '', '206 7210161', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'jbnewlin@ aol.com', 'thispass', 'jean', 'newlin', 'newlin', '630 464 0761', '630 536  8422', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'sherry@sherrylewisbooks.com', 'thispass', 'Sherry', 'Lewis', 'Sherry Lewis, Jacklyn Brady', '850-346-1351', '', '850-345-1255', '6956 Cotton Boll Lane', 'Navarre', 'FL', '32566', 'USA', 'jacklyn@jacklynbrady.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'spatsmom@comcast.net', 'thispass', 'Grace', 'Larralde', 'same', '303-658-0400', '', '', '3902-B S. Atchison Way', 'Aurora', 'CO', '80014', 'USA', 'gracelarralde@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'robinmatheson@rogers.com', 'thispass', 'Robin', 'Matheson', 'Robie Madison', '705-727-0633', '', '', '46 Jones Dr.', 'Barrie', 'Ontario', 'L4M 6H7', 'CANADA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'sdeegan101@aol.com', 'thispass', 'Susan', 'Egan', 'Susan Egan', '646-226-9576', '212-264-5096', '', '1815 Palmer Avenue #2R', 'Larchmont', 'New York', '10538', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'sugeniarw@yahoo.com', 'thispass', 'Robin', 'Weaver', '', '704-795-1092', '', '', '9908 Madres Ct', 'Concord', 'NC', '28027', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'inkgrrl@gmail.com', 'thispass', 'Kari', 'Hayes', 'Sophia Wilde', '3106866684', '', '', '1158 26th Street #505', 'Santa Monica', 'California', '90403', 'United States', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'ldfisk@gmail.com', 'thispass', 'Lisa', 'Fisk', 'Lisa Fisk', '6022922222', '6022922222', '6022922222', '8102 E. Buena Terra Way', 'Scottsdale', 'AZ', '85250', 'United States', 'ldfisk@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'bwills@tfb.com', 'thispass', 'Brooke', 'Wills', 'Brooke Wills', '760-728-9658', '760 728-9658', '760 728-9658', '4233 Los Padres Dr.', 'Fallbrook', 'CA', '92028', 'USA', 'thewillbrookco@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'margeryscott@gmail.com', 'thispass', 'Margery', 'Wyzynski', 'Margery Scott', '705-786-7947', '905-683-6756', '', '3270 Shelby Street', 'The Villages', 'Florida', '32162', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'Aelis10@aol.com', 'thispass', 'Carolyn', 'Heinemann', 'Carolyn Domini', '203-798-7838', '', '', '', '', '', '', '', 'CarolynRDomini@aol.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'kiayaphd@aol.com', 'thispass', 'Angelyn', 'Sherrod', 'Angelyn Sherrod', '901-230-2268', '', '', '', '', '', '', '', 'angelyn.sherrod@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 'caitlin@caitdonnelly.com', 'thispass', 'Caitlin', 'Donnelly', 'Cait Donnelly', '3607973369', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 'sd@sd-writer.com', 'thispass', 'Shannon', 'Donnelly', '', '818-667-3153', '', '', 'HC 32 Box 726', 'Quemado', 'NM', '87829', 'US', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 'marsha@marsharwest.com', 'thispass', 'Marsha', 'West', 'Marsha R. West', '817-235-5217', '817-738-4987', '', '', '', '', '', '', 'mwest7012@sbcglobal.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 'csoy64@yahoo.com', 'thispass', 'Cynthia', 'Soyars', 'same', '903 556 0470', '903 280 1921', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 'Giovanna@xtra.co.nz', 'thispass', 'Giovanna', 'Lee', '', '64 4 2984696', '', '', '61 marine parade', 'Paraparaumu beach', 'Kapiti coast', '5032', 'New zealand', 'Giovannaalee@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 'silverjames@swbell.net', 'thispass', 'Penny', 'James', 'Silver James', '4054952957', '4056406355', '', '1721 N. Rolling Ridge', 'Bethany', 'OK', '73008', 'United States', 'teamprettypony@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 'clan.macfarlane@bellaliant.net', 'thispass', 'Anne', 'MacFarlane', 'Anne MacFarlane', '9028356980', '', '', '', '', '', '', '', 'annem@bellaliant.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 'FAMeiners@msn.com', 'thispass', 'Fredericka', 'Meiners', 'Ann Macela', '630-540-1946', '', '', '610 Golfers Ln', 'Bartlett', 'IL', '60103', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 'debrabarber@rocketmail.com', 'thispass', 'DEBRA', 'BARBER', '', '512-470-7470', '', '512-261-3186', '608 Rolling Green Dr', 'Lakeway', 'TX', '78734', 'USA', 'tbarber2@austin.rr.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 'winston72@verizon.net', 'thispass', 'Lois', 'Winston', 'Lois Winston', '908-389-0475', '908-456-2036', '', '116 Hardwick Ave.', 'Westfield', 'NJ', '07090', 'USA', 'lois@loiswinston.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'katewyland@earthlink.net', 'thispass', 'Kathleen', 'Wyland', 'Kate Wyland', '408-778-3860', '408-569-8972', '', '', '', '', '', '', 'k.wyland@earthlink.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'cpperkins@gmail.com', 'thispass', 'Cathy', 'Perkins', '', '5096281335', '', '', '1204 Adair Drive', 'Richland', 'WA', '99352', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 'lch7315@yahoo.com', 'thispass', 'Laura', 'Haley-McNeil', 'Laura Haley-McNeil', '303-229-1380', '', '', '1351 W Caley Ave', 'Littleton', 'CO', '80120', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 'carific@hotmail.com', 'thispass', 'Cari', 'Davis', '', '909-263-5231', '', '', '17170 Farwell Street', 'Fontana', 'CA', '92336', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 'mkfoss@att.net', 'thispass', 'Mary Kay', 'Foss', '', '925.648-3660', '', '', '555 Ygnacio Valley Rd #220', 'Walnut Creek', 'CA', '94596', 'U.S.', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 'katreborn@me.com', 'thispass', 'Kathryn', 'Steves', 'Kathryn Koller', '9105845941', '', '', '440 Deerpath Dr', 'Fayetteville', 'NC', '28311', 'USA', 'ufreviews@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 'roekei2002@yahoo.com', 'thispass', 'Rosemary', 'Smith', '', '610-759-2437', '', '', '486 East Lawn Road', 'Nazareth', 'PA', '18064', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 'RaineEng@aol.com', 'thispass', 'Lorraine', 'Yetke', 'Raine English', '203-213-9158', '203-269-3248', '203-930-0518', '32 Patton Road', 'Wallingford', 'CT', '06492', 'USA', 'Loranwd@aol.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 'templarlady@comcast.net', 'thispass', 'Debbi', 'Ward', '', '4042552772', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 'omllym@aol.com', 'thispass', 'Mary', 'O''Malley', 'Emma Westport', '2068248632', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 'lisalinn1963@yahoo.com', 'thispass', 'Lisa', 'McKinney', 'Lisa McKinney', '9048744163', '', '', '5202 Blossom Hill Drive', 'Haymarket', 'VA', '20169', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 'vickycapano@hotmail.com', 'thispass', 'Vicky', 'Capano', 'Victoria Krain', '4039267702', '4039267702', '', '89 Eversyde Court SW', 'Calgary', 'Alberta', 'T2Y 4S3', 'CANADA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 'elizabeth@elizabethdevlin.com', 'thispass', 'Elizabeth', 'McIntyre', 'Elizabeth Devlin', '401-293-0104', '', '', '', '', '', '', '', 'Elishka_M@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 'shortne@hotmail.com', 'thispass', 'Courtney', 'Lewis', 'Courtney Leigh', '9282435926', '9285362908', '', '958 Cheney Ranch Loop', 'Show Low', 'Az', '85901', 'USA', 'shortne@hotmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 'galicesonedwards@earthlink.net', 'thispass', 'Goldie', 'Edwards', 'G. Aliceson Edwards', '8167326481', '8164198441', '', '', '', '', '', '', 'goldiee@mindspring.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 'teritru@live.com', 'thispass', 'Nicole', 'Harmon', 'Yasmine Jameson', '(908) 463-2437', '', '', '322 Regina Avenue', 'Rahway', 'NJ', '07065', 'USA', 'teri.harmon@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 'sjmiller87@charter.net', 'thispass', 'Julie', 'Miller', 'Julie Miller', '308-383-5376', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 'samanthamacdouglas@gmail.com', 'thispass', 'Samantha', 'MacDouglas', 'Samantha MacDouglas', '818-235-7812', '', '', '6749 Mason Ave', 'Winnetka', 'CALIFORNIA', '91306', 'United States', 'smacdouglas@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'angie@angiefox.com', 'thispass', 'Angie', 'Fox', 'Angie Fox', '314-276-3768', '', '', '433 Bethany Court', 'Valley Park', 'MO', '63088', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'tammyhooker@ymail.com', 'thispass', 'Tammy', 'Hooker', '', '(802) 272-3131', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 'BlairGAK@aol.com', 'thispass', 'Grace', 'Kone', 'Blair Bancroft', '407-736-8656', '407-408-0108', '', '', '', '', '', '', 'blairbancroft@aol.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 'sherryweddle@juno.com', 'thispass', 'Sherry', 'Weddle', '', '630-369-6332', '630-267-9776', '', '1402 Middleburg Ct.', 'Naperville', 'IL', '60540', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 'staceyapurcell@yahoo.com', 'thispass', 'Stacey', 'Purcell', '', '281 251 5266', '832 755 3256', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 'jessie@jessiecrockett.com', 'thispass', 'Jessie', 'Crockett', 'Jessie Crockett', '603 781-4537', '603923-9405', '', 'PO Box 117', 'Milton Mills', 'NH', '03852', 'United States', 'jessie@jessiecrockett.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 'kdawnbyrd@yahoo.com', 'thispass', 'Kimberly', 'Byrd', 'K. Dawn Byrd', '276-780-2816', '276-783-9223', '', '242 Staley St', 'Marion', 'VA', '24354', 'USA', 'libertyu4me@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 'soulem@aol.com', 'thispass', 'Maris', 'Soule', 'Maris Soule', '269-377-2291', 'None', 'None', '1237 Grenadine Way', 'Venice', 'Florida', '34285', 'USA', 'mysterywrtr@aol.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 'bluefiat79@yahoo.com', 'thispass', 'Susan', 'Belsky', '', '920.233.4712', '', '', '838 Eastman St.', 'oshkosh', 'wi', '54901', 'USA', 'brooklynbunch@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 'luvtowrite2@gmail.com', 'thispass', 'Michelle', 'Bean', 'Rosalie Ross', '9194033357', '9192251272', '', '3903 Kettering Drive', 'DURHAM', 'North Carolina', '27713', 'United States', 'beanross@mindspring.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 'susanmeier1@verizon.net', 'thispass', 'Susan', 'Meier', 'susan meier', '814 266 2557', 'None', 'None...sheesh I\\\\\\''m sorta out', '', '', '', '', '', 'none', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 'thinkspin@yahoo.com', 'thispass', 'Lauren', 'Simpson', 'Lauren M. Catherine', '860.354.9047', '', '', '23 Town View Drive', 'New Milford', 'CT', '06776', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 'dllarson_60518@yahoo.com', 'thispass', 'Deb', 'Larson', 'DL Larson', '815-246-9450', '815-303-9450', '', '4478 E. 1675 Road', 'Earlville', 'IL', '60518', 'LaSalle', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 'joellewildrose@aol.com', 'thispass', 'Jodi', 'O''Shea-Walker', 'Joelle Walker, editor', '9408081331', '4053174349', '', '2024 Kendolph Drive', 'Denton', 'TX', '76205', 'USA', 'jloshea@aol.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 'joellen.conger@gmail.com', 'thispass', 'Joan C.', 'Powell', 'JoEllen Conger', '831-425-1458', '', '', '313 Highview court', 'Santa Cruz', 'CA', '95060-2303', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 'vkwriter@yahoo.com', 'thispass', 'Karin', 'Ohlson', 'Vanessa Kier', '925-989-1431', '', '', '328 Rheem Blvd Apt 5', 'Moraga', 'CA', '94556', 'United States', 'author@vanessakier.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 'twelvestoneslady@yahoo.com', 'thispass', 'Vicki', 'Lockwood', 'Ryder Islington', '6605642662', '', '', '203 E. First St', 'Grant City', 'MO', '64456', 'USA', 'ryderislington@hotmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 'knelsonbooks@gmail.com', 'thispass', 'Kerri', 'Nelson', 'Kerri Nelson', '3343003646', '', '', '2466 Eastwood Blvd.', 'Prattville', 'AL', '36066', 'USA', 'kerribookwriter@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 'email@ambershah.com', 'thispass', 'Amber', 'Shah', 'Amber Lin', '8328665899', '', '', '11818 Cedar Form Ln', 'Stafford', 'TX', '77477', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 'sandymoffett@earthlink.net', 'thispass', 'Sandy', 'Parks', '', '321-259-6881', '321-795-3899', '3212596881', '3899 Beechgrove Rd.', 'Melbourne', 'FL', '32934', 'USA', 'sandyparks@earthlink.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 'kathleennance@yahoo.com', 'thispass', 'Kathleen', 'Nance', 'Kathleen Nance', '8286937757', '2484706671', '', '187 Mountain Maple Dr', 'Zirconia', 'NC', '28790', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 'jean.osborn@yahoo.com', 'thispass', 'jean', 'osborn', 'tj abba', '904 261 8306', '904 556 1557', '', '403 tarpon ave 118', 'fernandina beach', 'FL', '32034-2168', 'USA', 'msjeano@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 'emarente5@yahoo.ca', 'thispass', 'Evelyn', 'Marentette', '', '905-570-7688', '', '', '29 Cameron Avenue North', 'Hamilton', 'Ontario', 'L8H 4Y9', 'Canada', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 'wendy@wendydelaney.com', 'thispass', 'Wendy', 'Delaney', 'Wendy Delaney', '4258831252', '4259991890', '', '', '', '', '', '', 'wendylinstad@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 'mary@marybehre.com', 'thispass', 'Mary', 'Behre', '', '5402201388', '5407753228', '', '7421 Taft Court', 'King George', 'VA', '22485', 'USA', 'mary.behre@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 'enisa_h@yahoo.com', 'thispass', 'Enisa', 'Hasic', 'Enisa Hasic', '61295414491', '295411646', '0410064327', 'PO Box 163', 'Menai Central', 'New South Wales', '2234', 'Australia', 'enisa_h@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 'jkm1024@comcast.net', 'thispass', 'Joan', 'Maze', 'J. K. Maze', '(651) 451-8228', '(612) 323-4412', '', '5840 Cahill Avenue, Apt. 318', 'Inver Grove Heights', 'Minnesota', '55076', 'United States', 'jmjazzy32@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 'jm_stewart@shaw.ca', 'thispass', 'Judy', 'Stewart', 'Judy Stewart', '250-752-6149', '250-954-8001', '', '440 Memorial Avenue', 'Qualicum Beach', 'British Columbia', 'V9K 1G8', 'Canada', 'j_mstewart@shaw.ca', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 'katefreiman@novelwriter.net', 'thispass', 'Kate', 'Freiman', '', '416-485-9823', '', '', '47 Glenayr Road', 'Toronto', 'Ontario', 'M5P 3B9', 'Canada', 'katefreiman@rogers.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 'horses5@frontier.net', 'thispass', 'D\\''Ann', 'Linscott-Dunham', 'D\\''ANn Lindun', '970-323-6662', 'n/a', 'n/a', '', '', '', '', '', 'dldauthor@frontier.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 'rcbum@aol.com', 'thispass', 'Rayanne', 'Chamberlain', '', '517-281-5029', '', '', '7395 Kimball', 'Lyons', 'MI', '48851', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 'chutchtne03@yahoo.com', 'thispass', 'Carol', 'Hutchens', 'Carol Hutchens', '336-824-4372', '', '', '941 Grantville Lane', 'Asheboro', 'NC', '27205', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 'writerpllevin@gmail.com', 'thispass', 'Philip', 'Levin', 'Philip L. Levin', '228-596-7217', '(228) 239-3575', '(228) 239-3575', '710 W Beach Blvd', 'Long Beach', 'MS', '39560', 'United States', 'writerpllevin@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 'michelle@mgbraden.com', 'thispass', 'Michelle', 'Puffer', 'MG Braden', '604-467-1572', '', '', '#25 - 11737 236th Street', 'Maple Ridge', 'BC', 'V4R 2E5', 'Canada', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 'fletcher867@yahoo.com', 'thispass', 'Anne', 'Fletcher Price', 'Anne Fletcher', '617-763-6441', '', '', '90B Quannacut Road', 'westerly', 'RI', '02891', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 'allison@allisonbrennan.com', 'thispass', 'Allison', 'Brennan', '', '916-203-3151', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 'wtbyrne@sbcglobal.net', 'thispass', 'Wendy', 'Byrne', 'Wendy Byrne', '(630) 983-6341', '(630) 768-4071', '', '2441 Newport Drive', 'Naperville', 'IL', '60565', 'USA', 'wtbyrne793@msn.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 'jgoliver@magespell.com', 'thispass', 'Jana', 'Oliver', 'Jana Oliver', '', '678-773-3466', '', '4944 Glenwhite Drive', 'Duluth', 'GA', '30096', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 'Kathryn@writebyyou.com', 'thispass', 'Kathryn', 'Johnson', 'Mary Hart Perry, among others', '301-439-7567', '301-675-8703', '', '807 Patton Drive', 'Silver Spring', 'MD', '20901', 'US', 'Mary@Maryhartperry.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 'jillstone@mac.com', 'thispass', 'Jillian', 'Stone', 'Jillian Stone', '(951) 587-5422', '', '', '33920 Gloria Road', 'Menifee', 'CA', '92584', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 'schurshan@gmail.com', 'thispass', 'Shannon', 'Schuren', 'Shannon Schuren', '9206940849', '9202545329', '9204677908', '126 ROCHESTER DR', 'SHEBOYGAN FALLS', 'WI', '53085', 'United States', 'schurshan@hotmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 'jackie@forceconstant.com', 'thispass', 'Jackie', 'Cruz-Wagener', '', '561-665-0281', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 'rebeccaAzanetti@gmail.com', 'thispass', 'Rebecca', 'Zanetti', '', '208-755-7529', '', '', '9400 Clarkview Place', 'Hayden', 'Idaho', '83835', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 'leslietentler@gmail.com', 'thispass', 'Leslie', 'Tentler', 'Leslie Tentler', '770 614-9071', '770 614-9071', '770 614-9071', '', '', '', '', '', 'leslietentler@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 'sharonbwray@verizon.net', 'thispass', 'Sharon', 'Wray', 'Sharon Wray', '703 263-0680', '703 263-0680', '703 263-0680', '13135 Penndale Lane', 'Fairfax', 'VA', '22033', 'United States', 'sharonbwray@verizon.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 'jacquigoff@shaw.ca', 'thispass', 'Jacqui', 'Goff', 'Jenna Ryan', '250-544-0977', '250-881-4085', '250-652-9899', '#20-7509 Central Saanich Road', 'Saanichton', 'British Columbia', 'V8M 2B5', 'Canada', 'kathygoff@shaw.ca', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 'kendra@kendraelliot.com', 'thispass', 'Kendra', 'Elliot-Boucher', 'Kendra Elliot', '5033147534', '', '', '15673 SW Barrington Terrace', 'Tigard', 'OR', '97224', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 'rstaab@yahoo.com', 'thispass', 'Rochelle', 'Staab', '', '818-422-4021', '818-761-3472', '', '4235A Colfax Avenue', 'Studio City', 'CA', '91604', 'USA', 'rochelle@rochellestaab.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 'judy@copek.com', 'thispass', 'Judith', 'Copek', 'Judith Copek', '508-698-8803', '617-571-6622', '', '22 Cannon Forge Dr.', 'Foxborough', 'MA', '02035', 'USA', 'jcopek@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, 'dlschubert@verizon.net', 'thispass', 'Debra', 'Schubert', 'Debra Lynn Lazar', '6105646188', '', '', '953 Dutch Drive', 'East Norriton', 'PA', '19403', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 'paulagraves@charter.net', 'thispass', 'Paula', 'Graves', 'Paula Graves', '205-631-3511', '205-939-1353 (daytime only)', '205-602-0329', '415 Payne Road', 'Gardendale', 'AL', '35071', 'United States of America', 'paula@alexanderadvertising.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 'padepaul@padepaul.com', 'thispass', 'Penni', 'DePaul', 'P.A. DePaul', '267-566-8822', '', '', '', '', '', '', '', 'padepaul@ymail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 'ksymmons@comcast.net', 'thispass', 'Kevin', 'Symmons', 'Kevin V. Symmons', '617-774-9874', '508-209-2923', '508-369-4800', '', '', '', '', '', 'jsymmons@comcast.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 'aliceakemp@gmail.com', 'thispass', 'Alice Abel', 'Kemp', 'Alice Abel Kemp', '504-430-5590', '504-529-9886', '504-427-3770', '', '', '', '', '', 'waynecmoore001@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 'kyrlane@hotmail.com', 'thispass', 'Kathy', 'Lane', 'Kathy lane', '863-640-6485', '8636400494', '8636400494', '4025 Lane Street', 'Mulberry', 'Florida', '33860', 'United States', 'kyrlane@hotmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 'pamela@justwrite.net.au', 'thispass', 'Pamela', 'Cook', 'Pamela Cook', '0432 884 885', '9522 5163', '', '', '', '', '', '', 'pe_cook@hotmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 'skidawayme@yahoo.com', 'thispass', 'Jane', 'Vasarhelyi', 'Britt Vasarhelyi', '443-471-6509', '011-507-720-2233', '011-507-6671-4468', '', '', '', '', '', 'skidawayme@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, 'c_kowalski@yahoo.com', 'thispass', 'Charles', 'Kowalski', 'Charles Kingsman', '(+81) 463-69-5224', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 'bettyzs1@juno.com', 'thispass', 'Betty', 'Sheets', '', '480-964-0306', '', '', '901 E. 11th Ave.', 'Mesa', 'AZ', '85204', 'United States of America', 'bettyzs@hotmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 'bevpettersen@eastlink.ca', 'thispass', 'Bev', 'Pettersen', 'Bev Pettersen', '902-826-2209', '9028262209', '9028262209', '159 White Birch Drive', 'Upper Tantallon', 'Nova Scotia', 'B3Z 1C8', 'Canada', 'bevpettersen@hfx.eastlink.ca', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 'bjdaniels@mtintouch.net', 'thispass', 'Barb', 'Heinlein', 'B.J. Daniels', '406-579-2195', '406 654-2811', '406 654-5277', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, 'liztalley@att.net', 'thispass', 'Amy', 'Talley', 'Liz Talley', '3187979614', '3185608057', '', '2829 Tuscany Circle', 'Shreveport', 'LA', '71106', 'US', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, 'mary@marycastillo.com', 'thispass', 'Mary', 'Castillo', '', '949-933-6279', '949-574-0151', '', '1048 Irvine Ave PMB477', 'Newport Beach', 'CA', '92660', 'USA', 'marycastillopr@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, 'mlmcgowan@bell.net', 'thispass', 'Maureen', 'McGowan', 'Maureen McGowan', '4167780412', '4165774162', '4165774162', '2 Hurndale Avenue', 'Toronto', 'Ontario', 'M4K1R5', 'Canada', 'info@maureenmcgowan.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, 'gaylanita@gmail.com', 'thispass', 'Gayl', 'Wilson', 'P.I. Gale', '918-584-1593', '', '918-960=1784', '221 E 18th St', 'Tulsa', 'OK', '74119', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, 'robbinsnest01@live.com', 'thispass', 'Melissa', 'Robbins', '', '316-687-7275', '316-304-9364', '3163049364', '1237 N. Bracken CT', 'Wichita', 'KS', '67206', 'United States', 'aussie_clown@hotmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(283, 'sandra@sandrakerns.com', 'thispass', 'Sandra', 'Kerns', 'Sandra S. Kerns', '970-443-9738', '970-203-1223', '', '1016 SW 23rd Street', 'Loveland', 'CO', '80537', 'USA', 'sskerns2@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, 'susanmboyer@gmail.com', 'thispass', 'Susan', 'Boyer', 'Susan M. Boyer', '(864) 901-2378', '', '', '105 Rockledge Drive', 'Greenville', 'SC', '29609', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, 'gail.chianese@yahoo.com', 'thispass', 'Gail', 'Chianese', '', '860-535-9933', '', '', '30 Pond Drive', 'North Stonington', 'CT', '06359', 'US', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, 'ashantay1@gmail.com', 'thispass', 'Lynda Ashantay', 'Peters', 'Ashantay Peters', '828-595-9179', '', '', '2415 Greater Druid Hills Blvd', 'Hendersonville', 'NC', '28791', 'USA', 'lynda.peters2@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, 'cgerard@iowatelecom.net', 'thispass', 'cindy', 'gerard', 'cindy gerard', '319-642-7748', '319-551-7758', '', '1947 212th Blvd', 'Marengo', 'IA', '52301', 'usa', 'cindyg@cindygerard.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, 'MMARVELLAB@aol.com', 'thispass', 'Mary', 'Barfield', 'Mary Marvella', '770-476-1733', '404-966-9066', '', '3265 Paddle Wheel Court', 'Suwanee', 'GA', '30024', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, 'jvscribo@roadrunner.com', 'thispass', 'Jeanne', 'Vincent', '', '518-359-3983', '', '', '4 Arden Street', 'Tupper Lake', 'New York', '12986', 'United States', 'writegirl@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, 'bmonajem@yahoo.com', 'thispass', 'Barbara', 'Monajem', '', '678-779-0639', '770-925-1572', '678-778-3100', '282 Rockbridge Rd. NW', 'Lilburn', 'GA', '30047', 'USA', 'barbara@ormandysoftware.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, 'bcollinswriter@gmail.com', 'thispass', 'Brenda', 'Collins', 'Brenda M. Collins', '403-831-1626', '403-620-7726 (husband\\''s cell)', '', '985 Citadel Drive NW', 'Calgary', 'Alberta', 'T3G 3X4', 'Canada', 'collib@shaw.ca', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(292, 'cghannah@verizon.net', 'thispass', 'Carol', 'Hannah', '', '914-962-9583', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, 'wnstr@aol.com', 'thispass', 'Wendy', 'Staub', 'Wendy Corsi Staub', '9142152249', '9142152249', '9142152249', 'PO Box 137', 'Katonah', 'New York', '10536', 'United States', 'wnstr@aol.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, 'liding@wi.rr.com', 'thispass', 'Laura', 'Iding', 'Laura Scott', '414-640-7663', '', '', '11745 W. Underwood Parkway', 'Wauwatosa', 'WI', '53226', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, 'suzifosternew@gmail.com', 'thispass', 'Susan', 'Battle', 'Suzi Foster', '4044558595', '4043108282', 'none', '2390 Waterford Cove', 'Decatur', 'GA', '30033', 'USA', 'sbattle@midtownbank.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, 'terry@satoriwebdesign.com', 'thispass', 'Terry', 'Ambrose', 'Terry Ambrose', '760-842-8672', '760-208-8550', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, 'ginnaleath@aol.com', 'thispass', 'Regina', 'Leatherbury', 'ginna Leatherbury', '7037340565', '', '', '7022 Green Oak Drive', 'McLean', 'VA', '22101', 'US', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(298, 'judyhudson@shaw.ca', 'thispass', 'Judy', 'Hudson', 'Judy Hudson', '250-748-5879', '', '', '2772 Ortona Road', 'Duncan', 'BC', 'V9L 6B8', 'Canada', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, 'deb.lb53@gmail.com', 'thispass', 'Deb', 'Boone', '', '562-429-5495', '', '', '5512 E Peabody Street', 'Long Beach', 'CA', '90808-2609', 'USA', 'deb.lb@verizon.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(300, 'Ntindall@gmail.com', 'thispass', 'Natalie', 'Tindall', '', '2406785680', '', '', '2055 lake park drive Apt i', 'Smyrna', 'ga', '30080', 'United states', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, 'debramaher@gmail.com', 'thispass', 'Debra', 'Maher', '', '610-746-0258', '610-580-5869', '', '195 Creekside Drive', 'Nazareth', 'PA', '18064', 'USA', 'debswords@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(302, 'rechelleowens@gmail.com', 'thispass', 'Regina', 'Mize', 'Rechelle Owens', '8284234797', '', '', '', '', '', '', '', 'regmize@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(303, 'heleneyoung01@gmail.com', 'thispass', 'Helene', 'Young', 'Helene Young', '61409576567', '61 7 40576567', '', '483 Vulture St', 'East Brisbane', 'QLD', '4169', 'Australia', 'grahamnhelene@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(304, 'alison_stone@yahoo.com', 'thispass', 'Alison', 'Stone', 'Alison Stone', '7166892044', '', '', '137 MILL VALLEY CT', 'EAST AMHERST', 'NY', '14051', 'United States', 'Alison@AlisonStone.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(305, 'jessicarodriguez101@gmail.com', 'thispass', 'Jessica', 'Rodriguez', 'Jessica Rodriguez', '4104207122', '4436173197', '', '2184 Sewanee DR', 'Forest Hill', 'MD', '21050', 'United States', 'jessicarodriguez101@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(306, 'ltownsdin@gmail.com', 'thispass', 'Linda', 'Townsdin', '', '916-717-0418 Cell', '916-570-3239', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(307, 'kprairie@stonecountry.ca', 'thispass', 'Katherine', 'Prairie', '', '604-563-6604', '', '', '610 1633 Ontario Street', 'Vancouver', 'British Columbia', 'V5Y 0C2', 'Canada', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(308, 'lizziedew@cox.net', 'thispass', 'Elizabeth', 'Dewey', '', '480-390-3894', '', '', '10365 E. Penstamin Drive', 'Scottsdale', 'AZ', '85255', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(309, 'ses@snapenh.com', 'thispass', 'Sue Ellen', 'Snape', 'Sue Ellen Snape', '603-547-3739', '', '', '51 Fletcher Farm Road', 'Greenfield', 'NH', '03047', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(310, 'yolandasly@gmail.com', 'thispass', 'Yolanda', 'Sly Kozuha', '', '202-252-3083', '', '', '', '', '', '', '', 'umainechio@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(311, 'nl963@live.com', 'thispass', 'Nikkie', 'Leonard', 'Nikkie Leonard', '612-269-2196', '651-552-0663', '', '225 3rd Ave S #2', 'South St. Paul', 'Minnesota', '55075', 'United States', 'nl963@live.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(313, 'sarah@barritaorchids.com.au', 'thispass', 'Sarah', 'Barrie', 'Sarah Barrie', '+61243731778', '', '0428696039', '121 Barnes Rd', 'Kulnura', 'NSW', '2250', 'Australia', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(314, 'rebecca@matthiasmail.com', 'thispass', 'Rebecca', 'Matthias', 'Rebecca Matthias', '267-973-9749', '', '215-668-4349', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(315, 'pprbckwrtr@gmail.com', 'thispass', 'Marylee', 'Woods', 'Sparkle Abbey', '515-249-1731', '515-283-4501', '515-249-7929', '2406 Emma Ave', 'Des Moines', 'IA', '50321', 'USA', 'pprbckwrtr@aol.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(316, 'cajamison@drdashboard.com', 'thispass', 'Cynthia', 'Moore', 'C.A. Jamison', '812 431-6534', '812 9253276', '812 431-6535', '.', '', '', '', '', 'jetcam601@drdashboard.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(317, 'howard-g-lewis@earthlink.net', 'thispass', 'Howard', 'Lewis', 'Howard Lewis', '864 9448020', '864 7103522', '', '138 Howgin Hollar Dr', 'Salem', 'SC', '29676', 'United States', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(318, 'shirley@shirleymckinnon.com', 'thispass', 'Shirley', 'McKinnon', '', '61405155245', '618997252895', '61897920555', '14 Cheviot Way', 'Eaton', 'WA', '6232', 'Australia', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(319, 'amorse91@yahoo.com', 'thispass', 'Allison', 'Morse', '', '818 986-9408', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(320, 'margidesmond@gmail.com', 'thispass', 'Margi', 'Desmond', 'Margi Desmond', '001.49.1520.585.2016', '011.49.71157097443', '', 'CMR 445 Box 933', 'APO', 'AE', '09046', 'United States', 'margi.desmond@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(321, 'ladyrprter@aol.com', 'thispass', 'Jody', 'Lebel', '', '413 569-2572', '', '', '16B Depot Street, #28', 'Southwick', 'MA', '01077', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(322, 'judithluke10@gmail.com', 'thispass', 'Judith', 'Luke', 'Judith Luke', '3032042513', '3032042513', '3032042513', '141 Route 123 South', 'Stoddard', 'New Hampshire', '03464', 'United States', 'judithluke10@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(323, 'carolynwilliamson@charter.net', 'thispass', 'Carolyn', 'Williamson', 'Carolyn Rae', '817-368-3855', '682-553-8417', '', '1745 Brown Trail', 'Hurst', 'TX', '76054-3736', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(324, 'rossel@fairpoint.net', 'thispass', 'Carol-Lynn', 'RÃ¶ssel', 'Carol-Lynn RÃ¶ssel', '207-377-6769', '', '', '17 Morrill Street', 'Winthrop', 'Maine', '04364-1220', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(325, 'hughescribe@comcast.net', 'thispass', 'Nancy', 'Hughes', 'Nancy A. Hughes', '610-678-1951', '', '484-772-5921', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(328, 'jen@marcoullier.com', 'thispass', 'Jennifer', 'Marcoullier', '', '415-860-5056', '', '', '4525 Nassau Pl', 'Boulder', 'CO', '80301', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(329, 'writing22000@yahoo.com', 'thispass', 'Angela', 'Johnson', '', '972-964-6861', '', '214-738-3923', '4837 Frost Hollow Drive', 'Plano', 'TX', '75093', 'United States', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(330, 'Kelliann_c@juno.com', 'thispass', 'Kelli', 'Carlson', '', '760-583-0592', '', '', '3816 S Flower St Apt A', 'Santa Ana', 'Ca', '92707', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(331, 'sonambreck@yahoo.com', 'thispass', 'Harriet', 'Hamilton', 'Hamilton Crow', '970 389 8094', '', '', '', '', '', '', '', 'hamiltoncrow@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(332, 'carly.main@iinet.net.au', 'thispass', 'Carly', 'Main', 'C.A. Main', '0431971531', '', '', '', '', '', '', '', 'main.carly@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(333, 'suekier27@me.com', 'thispass', 'Susan', 'Kiernan-Lewis', 'Susan Kiernan-Lewis', '(404) 285-2468', '', '', '141 Indian Hills Court', 'Marietta', 'GA', '30068', 'USA', 'kiernanlewis@att.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(334, 'tgoodyear48@aol.com', 'thispass', 'Toni', 'Goodyear', 'T. Goodyear', '9199325318', '', '', '40 Rocky Knolls Rd  Apt B', 'Chapel Hill', 'NC', '27516', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `users` (`id`, `email`, `password`, `firstName`, `lastName`, `writingName`, `phone1`, `phone2`, `phone3`, `street`, `city`, `state`, `zipCode`, `country`, `email2`, `remember_token`, `created_at`, `updated_at`) VALUES
(335, 'bgmacmanus@gmail.com', 'thispass', 'Bethany', 'Macmanus', '', '8328674471', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(336, 'randee@randeeleigh.com', 'thispass', 'Randee', 'Paraskevopoulos', 'Randee Leigh', '214-435-8185', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(337, 'denny@dennysbryce.com', 'thispass', 'Denise', 'Stovell', 'Denny S. Bryce', '2023680403', '2023680403', '2023680403', '1662 Waters Edge Lane', 'Reston', 'VA', '20190', 'United States', 'denny@dennysbryce.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(338, 'reniangel@yahoo.com', 'thispass', 'Karen', 'MacMurray', '', '704-292-7870', '', '', '1011 Calhoun Street', 'Monroe', 'NC', '28112', 'USA', 'reniangel@juno.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(340, 'regina@rjeffers.com', 'thispass', 'Regina', 'Montenaro', 'Regina Jeffers', '704-882-4833', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(341, 'tracypoole@yahoo.com', 'thispass', 'Tracy', 'Poole', 'Tracy Poole', '704-841-2874', '704-293-5113', '', '', '', '', '', '', 'tracypoole2@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(342, 'rkhan@wcc.net', 'thispass', 'Rashda', 'Khan', 'Mina Khan', '3259491232', '', '3256562824', '1708 Catalina Dr', 'San Angelo', 'Texas', '76901', 'United States', 'minakhan@wcc.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(343, 'hhpilz@aol.com', 'thispass', 'Helen', 'Pilz', '', '505-865-4539', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(344, 'conniegillam@comcast.net', 'thispass', 'Constance', 'Gillam', '', '770-317-1672', '770-498-1459', '', '6949 Springbank Way', 'Stone Mountain', 'Ga', '30087', 'USA', 'globhe7675@comcast.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(351, 'jehalpin9@gmail.com', 'thispass', 'Janet', 'Halpin', '', '508-523-9400', '614-504-5187', '', '', '', '', '', '', 'jehalpin@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(352, 'cece7000@gmail.com', 'thispass', 'Carolyn', 'Crooke', 'Carolyn Crane', '612-827-0391', '', '', '3657 Grand Avenue South', 'Minneapolis', 'MN', '55409', 'USA', 'carolyn7000@earthlink.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(353, 'dmooradi@yahoo.com', 'thispass', 'Dawn', 'Mooradian', 'Dawn Eastman', '515-556-5009', '515-987-5327', '(515) 987-5327', '1735 SE Hawthorne Ridge Dr', 'Waukee', 'IA', '50263', 'United States', 'dawnaeastman@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(354, 'lfpinto74@hotmail.com', 'thispass', 'Lena', 'Pinto', 'Lena Pinto', '2154620586', '2154620586', '2154620586', '2728 S. Colorado St.', 'Philadelphia', 'PA', '19145', 'United States', 'lfpinto74@hotmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(355, 'myownship@icoud.com', 'thispass', 'Fran', 'Stewart', 'Fran Stewart', '770-682-7483', '', '', '1500 Fieldrock Court', 'Lawrenceville', 'GA', '30043', 'USA', 'myownship@earthlink.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(356, 'cttiger@optonline.net', 'thispass', 'Tiger', 'Wiseman', '', '203.803.3210', '', '', '', '', '', '', '', 'twiseman1@optonline.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(358, 'hryan@whdh.com', 'thispass', 'Hank', 'Phillippi Ryan', 'Hank Phillippi Ryan', '617 965 2522', '617 5121906', '617 725 0848', '19 River St', 'West Newwton', 'MA', '02465', 'US', 'hryan@comcast.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(359, 'ramonarichards@aol.com', 'thispass', 'Ramona', 'Richards', 'Ramona Richards', '615-415-4396', '615-749-6715', '', '104B Spring Valley Road', 'Nashville', 'TN', '37214', 'US', 'rrichards@abingdonpress.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(361, 'maryo@maryogara.com', 'thispass', 'Mary', 'O''Gara', 'Mary O''Gara', '505-872-4990', '505-220-1463', '', '2354 Valencia Dr. NE', 'Albuquerque', 'NM', '87110-4011', 'United States', 'mary_ogara@comcast.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(363, 'kamychetty@yahoo.com', 'thispass', 'Kamy', 'Chetty', 'Kamy Chetty', '+6494789023', '+6421868667', '', '10 Crimson Park, Oteha', 'Auckland', 'North Island', '0632', 'New Zealand', 'kamychetty@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(364, 'nicolamck@hotmail.com', 'thispass', 'Nicola', 'McKenna', 'Nikki Weston', '0035318954759', '00353872674104', '', '', '', '', '', '', 'author.nikki.weston@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(365, 'design@kerineal.com', 'thispass', 'Keri', 'Neal', 'Keri Neal', '512-567-6165', '', '', '309 Golden Gate Dr', 'Leander', 'TX', '78641', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(366, 'barbarahan24@yahoo.com', 'thispass', 'Barb', 'Han', '', '9726977539', '', '', '3404 Mason Drive', 'Plano', 'Texas', '75025', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(367, 'CShifflet@aol.com', 'thispass', 'Cheryl', 'Shifflet', 'Cheryl Shifflet', '347-325-0857', '212-819-7092', '', '', '', '', '', '', 'c.shifflet@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(368, 'cdesmet@dcs.wisc.edu', 'thispass', 'Christine', 'DeSmet', 'Christine DeSmet', '608-262-3447 office', '608-222-5642 home', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(369, 'feliciaforella@comcast.net', 'thispass', 'Lea', 'Moyer', 'Felicia Forella', '610-562-0947', '610-223-5233', '', '360 Fisher Dam Rd.', 'Hamburg', 'PA', '19526', 'USA', 'romnzwrtr@comcast.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(370, 'mrsroman1@aol.com', 'thispass', 'Riccarla', 'Roman', 'Riccarla Roman', '626-332-0575', '626-806-7748', '626-931-2800 x4851', '130 S. Fircroft St.', 'West Covina', 'California', '91791', 'US', 'bobrom@aol.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(371, 'jbiggar@telusplanet.net', 'thispass', 'Jacquie', 'Biggar', 'Jacquie Biggar', '780 712-1284', '', '', '620 340 Island Highway', 'Victoria', 'British Columbia', 'V9B1H1', 'Canada', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(372, 'kathy@novaappraisal.com', 'thispass', 'Kathy', 'Mueller', 'Tia Catalina', '317-509-8560', '317-535-7400', '', '', '', '', '', '', 'tiacatalina@live.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(373, 'john.lofranco@gmail.com', 'thispass', 'John', 'Lofranco', 'John Lofranco', '5145190255', '', '5145694783', '2353 rue Grand Trunk', 'Montreal', 'QC', 'H3K1M8', 'Canada', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(374, 'robin@robinperini.com', 'thispass', 'Robin', 'Perini', 'Robin Perini', '505-934-3424', '505-890-2932', 'N/A', '1204 Ruffian CT SE', 'Albuquerque', 'NM', '87123', 'United States', 'rlperini@icloud.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(375, 'tonyaburrows22@yahoo.com', 'thispass', 'Tonya', 'Burrows', 'Tonya Burrows', '727-373-8465', '', '', '10800 Brighton Bay Blvd NE #8107', 'Saint Petersburg', 'FL', '33716', 'United States', 'tonya@tonyaburrows.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(376, 'amydaviscayron@gmail.com', 'thispass', 'Amy', 'Davis-Cayron', 'Sidney T. Blake', '(331)60.18.92.68', '(336)65.64.21.77', '', '', '', '', '', '', 'sidney.t.blake@orange.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(377, 'christine_trent@yahoo.com', 'thispass', 'Christine', 'Trent', 'Christine Trent', '3014757810', '', '', '20644 Chestnut Ridge Drive', 'LEONARDTOWN', 'Maryland', '20650', 'United States', 'christine@christinetrent.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(378, 'mandacoll@gmail.com', 'thispass', 'Manda', 'Collins', 'same', '2515542875', '2513803874', '2513803874', '313 1st Street', 'Chickasaw', 'Alabama', '36611', 'United States', 'acollins@shc.edu', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(379, 'diann@diannmills.com', 'thispass', 'DiAnn', 'Mills', 'DiAnn Mills', '281-235-4213', '', '', '14410 Dracaena Court', 'Houston', 'TX', '77070', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(380, 'loreth.anne@gmail.com', 'thispass', 'Loreth', 'Beswetherick', 'Loreth Anne White', '6049320186', '', '', '2367 Cheakamus Way', 'Whistler', 'British Columbia', 'V0N 1B2', 'Canada', 'loreth.anne@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(381, 'jilly11@cinci.rr.com', 'thispass', 'Jill', 'Nutter', 'Jillian Kent', '513-382-8199', '513-761-6511', '513-862-2737', '918 Springfield Pike', 'Cincinnati', 'Ohio', '45215', 'USA', 'storyteller111@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(382, 'anna@annaleehuber.com', 'thispass', 'Anna', 'Aycock', 'Anna Lee Huber', '2604152810', '2604894748', '', '225 Beaulieu Pl', 'Fort Wayne', 'IN', '46825', 'USA', 'info@annaleehuber.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(383, 'gailbarrett@myactv.net', 'thispass', 'Gail', 'Barrett', 'Gail Barrett', '(301) 393-5967', '', '', '20308 Parkwood Ct.', 'Hagerstown', 'MD', '21742', 'USA', 'gail@gailbarrett.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(384, 'ayesha_court@yahoo.com', 'thispass', 'Ayesha', 'Court', 'Ayesha Court', '3012293408', '2026411914', '', '6409 83rd Street', 'Cabin John', 'Maryland', '20818', 'United States', 'acourt@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(385, 'djanhambright@juno.com', 'thispass', 'Jan', 'Hambright', 'Jan Hambright', '208-630-4781', '208-634-1038', '208-630-4900', '41 Garden Ln.', 'McCall', 'ID', '83638', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(386, 'ilona.schmidt@charter.net', 'thispass', 'Ilona', 'Schmidt', 'Helena Gowan', '6073774293', '', '', '35 Tall Meadow Vt', 'Painted Post', 'NY', '14870', 'USA', 'helena.gowan@charter.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(387, 'bobbi.mumm@shaw.ca', 'thispass', 'Bobbi', 'Mumm', 'Bobbi Mumm', '306 665 6776', '306 229 0680', '', '507 Lansdowne Avenue', 'Saskatoon', 'Saskatchewan', 'S7N 1C9', 'Canada', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(388, 'jmfisher@tampabay.rr.com', 'thispass', 'Joni M', 'Fisher', 'Joni M. Fisher', '863-602-5013', '', '', '127 Van Fleet Court', 'Auburndale', 'FL', '33823', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(389, 'kateparkerbooks@aol.com', 'thispass', 'Kate', 'Parker', 'Kate Parker', '252-637-2909', '', '', '112 Baden Lane', 'New Bern', 'NC', '28562', 'USA', 'kaycrs@aol.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(390, 'cjpetterson@gmail.com', 'thispass', 'Marilyn', 'Johnston', 'cj petterson', '251-633-9977', '251-377-2583', '', '', '', '', '', '', 'maj.johnston3@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(391, 'katymadison@gmail.com', 'thispass', 'Karen', 'King', 'Katy Madison', '8164443655', '8168630157', '8164443655', '8748 Minnehaha Ln.', 'Kansas City', 'MO', '64114', 'United States', 'katymadison@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(392, 'LenaJoyDiaz@Gmail.com', 'thispass', 'Lena', 'Diaz', 'Lena Diaz', '904-608-6633', '904-218-7181', '904-940-9721', '933 Indian River Road', 'Saint Augustine', 'Florida', '32092', 'USA', 'Lena@LenaDiaz.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(393, 'nina@ninapierce.com', 'thispass', 'Deb', 'Dunn', 'Nina Pierce', '207-217-5462', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(394, 'dlovesnell@bellsouth.net', 'thispass', 'Dianna', 'Snell', 'Dianna Love', '404-403-6352', '', '', '1029 N Peachtree Pkwy, Suite 335', 'Peachtree City', 'GA', '30269', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(395, 'janiecrouch@verizon.net', 'thispass', 'Janie', 'Crouch', 'Janie Crouch', '757-338-1160', '757-822-1134', '', '5405 Larissa Court', 'Virginia Beach', 'VA', '23464', 'USA', 'janiecrouch007@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(396, 'klaltman@yahoo.com', 'thispass', 'Kathy', 'Altman', '', '540-809-2037', '', '', '', '', '', '', '', 'kathy@kathyaltman.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(397, 'Atouchofeden1@gmail.com', 'thispass', 'Christine', 'Bean', '', '5176283422', '5176283422', '5176283422', '5225 Stimson Rd', 'Eaton Rapids', 'Michigan', '48827', 'United States', 'Atouchofeden1@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(398, 'Pamela.Triolo@gmail.com', 'thispass', 'Pamela', 'Triolo', 'Pamela Triolo', '2812900302', '2815469003', '', '6615 Green Gable MNR', 'Spring', 'TX', '77389', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(399, 'dianevallere@gmail.com', 'thispass', 'Diane', 'Vallere', 'Diane Vallere', '4698659640', '', '', '', '', '', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(400, 'julie.ann.walker@gmail.com', 'thispass', 'Julie', 'Walker', 'Julie Ann Walker', '3122064898', '3122064898', '3124505290', '474 N. Lake Shore Dr. #3602', 'Chicago', 'IL', '60611', 'United States', 'julie.ann.walker@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(401, 'bv@bvlawson.com', 'thispass', 'Bonnie', 'Vanaman', 'BV Lawson', '703-241-7581', '', '', '6312 Seven Corners Center, Box 257', 'Falls Church', 'VA', '22044', 'USA', 'bvanaman@earthlinbk.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(402, 'regina@rjeffers', 'thispass', 'REGINA', 'MONTENARO', 'REGINA JEFFERS', '704-882-4833', '', '', '3605 Iris Street', 'Indian Trail', 'NC', '28079', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(403, 'peggyholloway62@yahoo.com', 'thispass', 'Peggy ', 'Holloway', 'Peggy Holloway', '904-392-3971', '', '', '2043 S. Atlantic Ave., Apartment 202', 'Daytona BVeach', 'Florida', '32118', 'USA', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(404, 'bjmcdow8@gmail.com', 'thispass', 'Barbara', 'McDowell', 'Barbara McDowell', '(216) 513-3361', '(216) 831-4977', '', '22190 Fairmount Blvd.', 'Shaker Heights', 'OH', '44118', 'USA', 'bjmcdow@aol.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(405, 'anne.cleeland@gmail.com', 'thispass', 'anne', 'cleeland', 'anne cleeland', '949 637 7163', '', '', '219 pearl ave', 'newport beach ', 'ca', '92662', 'usa', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(406, 'carolyn_guy@iinet.net.au', 'thispass', 'Carolyn ', 'de Ridder', 'Carolyn Wren', '011 61 8 92953422', '011 61 8 416262150', '', '', '', '', '', '', 'bwucey@hotmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(407, 'claudiawhitsitt@gmail.com', 'thispass', 'Claudia', 'Whitsitt', 'Claudia Whitsitt', '734-507-0728', '734-429-7841', '', '9606 Sherwood Dr.', 'Saline', 'MI', '48176', 'U.S.A', 'cjwhitsitt@comcast.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(408, 'heatherashbyauthor@gmail.com', 'thispass', 'Heather', 'Nickodem', 'Heather Ashby', '904-472-5842', '904-241-0843', '', '127 Oceanforest Dr. N.', 'Atlantic Beach', 'FL', '32233', 'USA', 'hashbyauthor@aol.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(409, 'gina.pangione@gmail.com', 'thispass', 'Gina ', 'Pangione', 'Gina Fava', '508-246-9770', '', '', '27 South Meadow Rd', 'Carver', 'Massachusetts', '02330', 'United States', 'ginafava1@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(410, 'Sunflower05@comcast.net', 'thispass', 'Barbara', 'Robinson', 'B. J. Robinson', '407-979-4795', NULL, NULL, '3636 Late Morning Circle', 'Kississimmee', 'FL', '34744', 'USA', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(411, 'barbaraross@maineclambakemysteries.com', 'thispass', 'Barbara', 'Ross', NULL, '6179697081', NULL, NULL, '411A Highland Avenue, #413', 'Somerville', 'MA', '02144', 'USA', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(412, 'kariandtodd@shaw.ca', 'thispass', 'Kari', 'Walker', 'Kaylea Cross', '604-531-6688', 'same', 'same', '13050-15A Ave', 'Surrey', 'BC', 'V4A1M3', 'Canada', 'info@kayleacross.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(414, 'lhfleming61@gmail.com', 'thispass', 'Leigh', 'Fleming', 'same', '304-676-7332', '304-267-2348', NULL, '149 Linwood Way', 'Martinsburg', 'WV', '25403', 'USA', 'leigh@scrapbookcottages.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(415, 'Liz.thomas@mac.com', 'thispass', 'Elizabeth', 'Thomas', NULL, '4438059505', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Seekizknit@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(416, 'carrie@stuartparks.com', 'thispass', 'Carrie', 'Stuart Parks', 'Carrie Stuart Parks', '208 682 2831', '208 682 4564', NULL, 'PO Box 73, 15644 S, Skeel Gulch Road', 'Cataldo', 'Idaho', '83810', 'USA', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(417, 'sjv@vandentech.com', 'thispass', 'Sandra', 'van den Bogerd', 'Sandra Orchard', '905-892-0215', NULL, NULL, '2170 Maple St. RR#3', 'FENWICK', 'ON', 'L0S1C0', 'Canada', 'sanvan100@yahoo.ca', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(418, 'megunticook@sbcglobal.net', 'thispass', 'Stefani', 'Catenzaro', NULL, '8604361876', NULL, NULL, '8 Ryan Court', 'Cromwell', 'CT', '06416', 'United States', 'megunticook@sbcglobal.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(419, 'dar2drm4ever@gmail.com', 'thispass', 'Denise', 'Wolf', 'Denise Wolf', '360 376-7545', NULL, NULL, 'P.O. Box 996', 'Eastsound', 'Washington', '98245', 'USA', 'dar2drm4ever@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(420, 'DogMomMystery@aol.com', 'thispass', 'Chelle', 'Martin', 'Chelle Martin', '732-718-2861', '732-721-1428', NULL, '16 Crescent Avenue', 'South Amboy', 'NJ', '08879-1405', 'USA', 'ChihuahuaMama@hotmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(421, 'cherylm112@aol.com', 'thispass', 'Cheryl', 'Mansfield', 'Cheryl Mansfield', '813-475-4186', NULL, NULL, 'PO Box 26174', 'Tampa', 'FL', '33623', 'USA', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(422, 'dvberkom@yahoo.com', 'thispass', 'Daphne', 'Van Berkom', 'DV Berkom', '3609082421', NULL, NULL, 'PO Box 5373', 'Bremerton', 'WA', '98312-0521', 'United States', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(423, 'dakester@sbcglobal.net', 'thispass', 'DOLORES', 'KESTER', 'D A KESTER', '608-770-7061', NULL, NULL, '1818 WINCHESTER STREET', 'MADISON', 'WISCONSIN', '53704', 'U.S.', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(424, 'vickivirtue@yahoo.com', 'thispass', 'Vicki', 'Virtue', 'Vicki Virtue', '+64 21 248 1484', '+64 9 307 6802', '+64 21 783 603', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(425, 'susfryer@telus.net', 'thispass', 'Susan', 'Fryer', 'Susann Elliott', '6048882950', '6048882950', '6048882950', '21231 - 93 Avenue', 'Langley', 'British Columbia', 'V1M 1K3', 'Canada', 'susannelliott@telus.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(426, 'gpar0719@aol.com', 'thispass', 'Golden', 'Keyes Parsons', NULL, '254-644-8435', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(427, 'lakestormblue@yahoo.com', 'thispass', 'Nancy', 'Smith', 'Catherine Trizzino', '123-456-7890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cattrizz@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(428, 'amo1143@yahoo.com', 'thispass', 'Anne', 'Belen', 'same', '206-351-8137', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'anne@pnwa.org', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(429, 'crista@cristamchugh.com', 'thispass', 'Christy', 'Gibson', 'Crista McHUgh', '253-569-0036', NULL, NULL, '1034 231ST PL NE', 'SAMMAMISH', 'WA', '98074', 'USA', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(430, 'Angi@AngiMorgan.com', 'thispass', 'Angela', 'Platt', 'Angi Morgan', '2147273398', '2147273398', '2147273398', '13405 Charcoal Lane', 'Farmers Branch', 'Texas', '75234', 'United States', 'Angi.Morgan.Books@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(431, 'ekba@msn.com', 'thispass', 'Elaine', 'Douts', 'E. B. Davis', '703 967-4069', '703 444-6301', NULL, '154 Seneca Ridge Dr.', 'Sterling', 'VA', '20164', 'USA', 'ebdavis@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(432, 'vagoughs@mac.com', 'thispass', 'Donna', 'Gough', 'Donna Gough', '703-851-6623', '703-648-0219', NULL, '1928 Winterport Cluster', 'Reston', 'VA', '20191', 'USA', 'vagoughs@me.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(433, 'katemillermd@gmail.com', 'thispass', 'D. Kate', 'Miller', 'Kate Miller', '7274593025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dkmillermd@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(434, 'jlouisesimpson@comcast.net', 'thispass', 'Julia', 'Simpson-Urrutia', 'Julia Simpson-Urrutia', '5592220428', '9165483186', NULL, '1327 W. Cortland Ave.', 'Fresno', 'CA', '93705', 'USA', 'jlouisesimpson@gmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(435, 'kathybremner@live.ca', 'thispass', 'Kathy', 'BREMNER', 'KATHRYN JANE', '604-541-2677', '604-329-0171', NULL, '1005 168 Street - back', 'Surrey', 'British Columbia', 'V3S9R8', 'Canada', 'authorkathrynjane@hotmail.ca', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(436, 'veronicaforand@gmail.com', 'thispass', 'Deborah', 'Evans', 'Veronica Forand', '215 872-7131', '215 872-7131', NULL, '504 Patriots Way', 'Newtown Square', 'PA', '19073', 'United States', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(438, 'sandraleesmith@me.com', 'thispass', 'Sandra', 'Smith', 'Sandra Leesmith', '480 839 0584', '480 225 6245  (cell verizon)', NULL, '5433 S. Mill Avenue', 'Tempe', 'AZ', '85283', 'usa', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(439, 'lostsoullitchik@att.net', 'thispass', 'Christiana', 'Tegethoff', 'Tiana Dawn', '2812107975', NULL, NULL, '17119 Red Oak Dr Unit 90121', 'Houston', 'TX', '77290', 'USA', 'lostsoullitchik@icloud.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(440, 'kmrockwood@comcast.net', 'thispass', 'Kathleen', 'Rockwood', 'KM Rockwood', '717 642-5086', NULL, NULL, '180 Girl Scout Rd.', 'Fairfield', 'PA', '17320', 'USA', 'kmrockwood@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(441, 'tina@tinabeckett.com', 'thispass', 'Tina', 'Butts', 'Tina Beckett', '9374515122', '9374515122', '9374515122', '508 Park Avenue', 'Piqua', 'Ohio', '45356', 'United States', 'tinabutts@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(442, 'renee@reneeryan.com', 'thispass', 'Renee', 'Halverson', 'Renee Ryan', '912-220-2779', NULL, NULL, '6365 Gabrielle Drive', 'Lincoln', 'NE', '68526', 'US', 'RM316@aol.com ', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(443, 'marshall.patricia31@yahoo.com', 'thispass', 'Patricia', 'Marshall', 'Tricia Tyler', '(603) 554-5697', NULL, '(603) 554-5691', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(444, 'PL1834@aol.com', 'thispass', 'Pamela', 'Loy', 'Pamela Sherwood', '3103976814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ps_loy@yahoo.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(445, 'margaret.golla@gmail.com', 'thispass', 'Margaret', 'Golla', 'Maggie Lyles', '918-252-0184', '918-645-6617', NULL, '9901 S. 98th E. Ave.', 'Tulsa', 'OK', '74133', 'USA', 'magolla@cox.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(446, 'susancgold@aol.com', 'thispass', 'Susan', 'Clayton-Goldner', 'same', '541 479 3161', '(541) 479-3161', '541 441-0348', '330 Seclusion Loop', 'Grants Pass', 'OR', '97526', 'United States', 'susancgold@aol.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(447, 'joannterpstra@ymail.com', 'thispass', 'Jo-Ann', 'Terpstra', 'Jo-An Carson', '2507542052', '2507542052', '250616-2109', '109-50 Mill Street', 'Nanaimo', 'B.C.', 'V9R 5A6', 'Canada', 'joannterpstra@ymail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(448, 'joyfuljel@gmail.com', 'thispass', 'Jackie ', 'Layton', 'Jackie Layton', '859-858-8170', NULL, '859-948-1371', '117 Callis Circle', 'Wilmore', 'KY', '40390', 'USA', 'jlayton@qx.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(449, 'Brnjen12@hotmail.com', 'thispass', 'Jeannie', 'Hall', 'Same', '7477842248', NULL, '7577842064', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(450, 'fallenangelsbookclub@gmail.com', 'thispass', 'Rae', 'James', 'R. Franklin James', '916.652.7811', '916.316.7403', NULL, NULL, NULL, NULL, NULL, NULL, 'raej@sprintmail.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(451, 'tolnitch@fuse.net', 'thispass', 'amy', 'tolnitch', 'amy tolnitch', '5136510239', '5136083555', NULL, '1245 Ida Street', 'Cincinnati', 'OH', '45202', 'USA', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(452, 'nicole.slaunwhite@gmail.com', 'thispass', 'Nicole', 'Slaunwhite', 'Nicola R. White', '902-406-0257', '902-579-5657', NULL, NULL, NULL, NULL, NULL, NULL, 'nicola@nicolarwhite.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(453, 'skuest@msn.com', 'thispass', 'Sarah', 'Kuest', 'Sarah Brady', '509-990-5302', '509-927-0522', NULL, '14504 E 7th Ave', 'Spokane Valley', 'WA', '99216', 'USA', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(454, 'martha@marthapoundmiller.com', 'thispass', 'Martha', 'Miller', 'MarthaPound Miller', '503/351-0045', '503/286-0945', NULL, '1503 N Hayden Island Drive, #129', 'Portland', 'OR', '97217', 'USA', 'mattie@chantiquesltd.com', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(455, 'trishsugar@aol.com', 'thispass', 'Trisha', 'Sugarek, Author', 'Trisha Sugarek', '912.925.8590', '912.713.7011', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(456, 'Hillla@Lewisu.edu', 'thispass', 'Lawrence', 'Hill', 'L.G.Hill', '815-715-8726', '815-436-7730', NULL, '25408 W. Willow Drive', 'Plainfield', 'Ill', '60544', 'US', 'Hill@anl.gov', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(457, 'mariaelena.alonsosierra@gmail.com', 'thispass', 'Maria Elena', 'Alonso-Sierra', 'same as above', '(305) 302-2633', NULL, NULL, '4424 Mountain Cove Drive', 'Charlotte', 'North Carolina', '28216-7764', 'USA', 'malelena1@bellsouth.net', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judges`
--
ALTER TABLE `judges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scoresheets`
--
ALTER TABLE `scoresheets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `judges`
--
ALTER TABLE `judges`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=458;
--
-- AUTO_INCREMENT for table `scoresheets`
--
ALTER TABLE `scoresheets`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=458;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
