-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2018 at 01:37 AM
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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(2055) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`comment_id`, `user_id`, `song_id`, `date`, `comment`, `parent_id`) VALUES
(3, 5, 11, '2018-12-05 23:21:52', 'Great song but a little strange', 0),
(4, 5, 11, '2018-12-05 23:53:35', 'What is wrong with this song', 0),
(5, 6, 12, '2018-12-05 23:55:30', 'wtf', 0),
(6, 6, 11, '2018-12-05 23:56:50', 'Not my style', 0),
(7, 5, 13, '2018-12-06 00:04:07', 'Interesting song choice', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Favorites`
--

CREATE TABLE `Favorites` (
  `favorite_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Favorites`
--

INSERT INTO `Favorites` (`favorite_id`, `user_id`, `song_id`, `date`) VALUES
(1, 5, 12, '2018-12-05 22:22:30'),
(2, 6, 12, '2018-12-05 23:55:46'),
(3, 6, 11, '2018-12-05 23:56:45'),
(4, 6, 13, '2018-12-06 00:02:28');

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

--
-- Dumping data for table `Feedback`
--

INSERT INTO `Feedback` (`feedback_id`, `user_id`, `song_id`, `likes`, `dislikes`) VALUES
(1, 5, 12, 1, 0),
(2, 5, 9, 0, 1),
(3, 6, 12, 1, 0),
(4, 6, 13, 1, 0);

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
  `image_url` varchar(1023) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(5) DEFAULT '0',
  `likes` int(5) DEFAULT '0',
  `dislikes` int(5) DEFAULT '0',
  `song_url` varchar(1023) NOT NULL,
  `tags` varchar(1023) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Songs`
--

INSERT INTO `Songs` (`song_id`, `title`, `artist`, `genre`, `description`, `image_url`, `user_id`, `date_added`, `views`, `likes`, `dislikes`, `song_url`, `tags`) VALUES
(9, 'Big opportunities', 'Nick Huffman', '', 'a piece of music unknown by most by known by the rest and is truly enjoyed by those.', '/tuneshare/uploaded-images/1543992673.png', 5, '2018-12-05 06:51:13', 8, 0, 1, '/tuneshare/uploaded-music/1543992673.mp3', 'good music, great music, big'),
(10, 'Trouble Central', 'Nick Huffman', '', 'Electrifying and hair raising in its finest essence.', '/tuneshare/uploaded-images/1543992731.png', 5, '2018-12-05 06:52:10', 5, 0, 1, '/tuneshare/uploaded-music/1543992731.mp3', 'electronic, medieval, hair curling'),
(11, 'Unknown', 'Nick Huffman', '', 'Unfunctional dieties.', '/tuneshare/uploaded-images/1543992789.png', 5, '2018-12-05 06:53:08', 12, 0, 0, '/tuneshare/uploaded-music/1543992789.mp3', 'abstract, noise, polyatomic'),
(12, 'Michaell', 'Nick Huffman', '', 'Debut album by a new star', '/tuneshare/uploaded-images/1543993438.png', 5, '2018-12-05 06:54:11', 72, 2, 0, '/tuneshare/uploaded-music/1543992851.mp3', 'country, vintage, surreal, rock, guitar'),
(13, 'Despacito', 'Austin Villeneuve', '', 'When you write songs, you have to put a face to the lyric a little bit, but it was such a sexy song that there wasn’t really a person. It was a scenario more than a person. I went there. I went to that place, and that place was in a club somewhere, when you get to a club and you just start making that eye contact with this beautiful girl. And that’s kind of how the song starts. It’s really a story. In the beginning of the lyric it says, “Hey, I notice that you’re looking at me. I’m looking at you. Let’s connect.” It kinda goes little by little until it gets to the chorus, where it goes, “All right. We’re here, but now, let’s enjoy the moment. \"That’s kind of what this song is all about, enjoying the moment, not rushing through it. Myself and my co-writer, we were both there sort of in mind in this scenario of this real sexy place, but there really wasn’t a face to it.', '/tuneshare/uploaded-images/1544054487.jpg', 6, '2018-12-06 00:01:27', 8, 1, 0, '/tuneshare/uploaded-music/1544054487.mp3', 'latino, spanish, despacito, big');

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
(5, 'nickhffm', 'Nick', 'Huffman', 'nickhffm@gmail.com', '912ec803b2ce49e4a541068d495ab570', NULL),
(6, 'austindv', 'Austin', 'Villeneuve', 'austin@austin.net', '202cb962ac59075b964b07152d234b70', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `FK_CommentSong` (`song_id`),
  ADD KEY `FK_CommentUser` (`user_id`);

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
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Favorites`
--
ALTER TABLE `Favorites`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Feedback`
--
ALTER TABLE `Feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Songs`
--
ALTER TABLE `Songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `FK_CommentSong` FOREIGN KEY (`song_id`) REFERENCES `Songs` (`song_id`),
  ADD CONSTRAINT `FK_CommentUser` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `FK_ParentComment` FOREIGN KEY (`parent_id`) REFERENCES `Comments` (`comment_id`);

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
