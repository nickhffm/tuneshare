DROP DATABASE IF EXISTS `musicdatabase`;
CREATE DATABASE IF NOT EXISTS `musicdatabase`;
USE `musicdatabase`;

#
# Table stucture for users.
#
DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
`user_id` INTEGER NOT NULL AUTO_INCREMENT,
`username` VARCHAR(255) NOT NULL UNIQUE,
`first_name` VARCHAR(100) NOT NULL,
`last_name` VARCHAR(100) NOT NULL,
`email` VARCHAR(100) NOT NULL UNIQUE,
`password` VARCHAR(100) NOT NULL,
`user_img` VARCHAR(100),
PRIMARY KEY (user_id)
);
#
# Table structure for songs.
#
DROP TABLE IF EXISTS `Songs`;
CREATE TABLE `Songs` (
`song_id` INTEGER NOT NULL AUTO_INCREMENT,
`song_name` VARCHAR(255) NOT NULL,
`artist_name` VARCHAR(255) NOT NULL,
`genre` VARCHAR(100) NOT NULL,
`song_url` VARCHAR(100) NOT NULL,
`song_img` VARCHAR(100),
`user_id` INT(5),
`date_added` DATETIME NOT NULL,
`times_played` int(5),
PRIMARY KEY (song_id),
CONSTRAINT FK_UserSong FOREIGN KEY (user_id)
REFERENCES Users(user_id) 
);