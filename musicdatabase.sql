-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2018 at 05:42 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Favorites`
--

CREATE TABLE `Favorites` (
  `favorite_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Feedback`
--

CREATE TABLE `Feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `likes` tinyint(1) NOT NULL,
  `dislikes` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Songs`
--

CREATE TABLE `Songs` (
  `song_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` blob,
  `user_id` int(5) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(5) DEFAULT NULL,
  `likes` int(5) DEFAULT NULL,
  `dislikes` int(5) DEFAULT NULL,
  `song_url` blob NOT NULL,
  `tags` varchar(1023) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Songs`
--

INSERT INTO `Songs` (`song_id`, `title`, `artist`, `genre`, `description`, `image`, `user_id`, `date_added`, `views`, `likes`, `dislikes`, `song_url`, `tags`) VALUES
(3, 'Big song', 'Nick Huffman', '', '', '', 5, '2018-12-03 04:23:16', NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `username`, `first_name`, `last_name`, `email`, `password`, `user_img`) VALUES
(3, 'jdog', 'John', 'Smith', 'jsmith@yahoo.com', '912ec803b2ce49e4a541068d495ab570', NULL),
(4, 'jdoggy', 'John', 'Smith', 'jsmithy@yahoo.com', '912ec803b2ce49e4a541068d495ab570', NULL),
(5, 'nickhffm', 'Nick', 'Huffman', 'nickhffm@gmail.com', '912ec803b2ce49e4a541068d495ab570', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `FK_ParentComment` (`parent_comment_id`),
  ADD KEY `FK_CommentUser` (`user_id`),
  ADD KEY `FK_CommentSong` (`song_id`);

--
-- Indexes for table `Favorites`
--
ALTER TABLE `Favorites`
  ADD PRIMARY KEY (`favorite_id`),
  ADD KEY `FK_FavoriteSong` (`song_id`),
  ADD KEY `FK_FavoriteUser` (`user_id`);

--
-- Indexes for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `FK_FeedbackUser` (`user_id`),
  ADD KEY `FK_FeedbackSong` (`song_id`);

--
-- Indexes for table `Songs`
--
ALTER TABLE `Songs`
  ADD PRIMARY KEY (`song_id`),
  ADD KEY `FK_UserSong` (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Songs`
--
ALTER TABLE `Songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `FK_CommentSong` FOREIGN KEY (`song_id`) REFERENCES `Songs` (`song_id`),
  ADD CONSTRAINT `FK_CommentUser` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `FK_ParentComment` FOREIGN KEY (`parent_comment_id`) REFERENCES `Comments` (`comment_id`);

--
-- Constraints for table `Favorites`
--
ALTER TABLE `Favorites`
  ADD CONSTRAINT `FK_FavoriteSong` FOREIGN KEY (`song_id`) REFERENCES `Songs` (`song_id`),
  ADD CONSTRAINT `FK_FavoriteUser` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

--
-- Constraints for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD CONSTRAINT `FK_FeedbackSong` FOREIGN KEY (`song_id`) REFERENCES `Songs` (`song_id`),
  ADD CONSTRAINT `FK_FeedbackUser` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

--
-- Constraints for table `Songs`
--
ALTER TABLE `Songs`
  ADD CONSTRAINT `FK_UserSong` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
