<?php

$list = array();
$list[0] = array("title" => "Big Opportunities", "artist" => "John Smith", "id" => "0",
"description" => "a piece of music unknown by most by known by the rest and is truly enjoyed by those.", 
"image_alt" => "music1", "image" => "sample-data/music1.png", "date" => 'Oct. 22, 2018',
"song" => "sample-data/music1.mp3",
"tags" => array("good music", "great music", "big"));
$list[1] = array("title" => "Trouble Central", "artist" => "Mitch Meyer", "id" => "1",
"description" => "Electrifying and hair raising in its finest essence.", 
"image_alt" => "music2", "image" => "sample-data/music2.png", "date" => 'Oct. 15, 2018',
"song" => "sample-data/music2.mp3",
"tags" => array("electronic", "medieval", "hair curling"));
$list[2] = array("title" => "Unknown", "artist" => "djrmokis", "id" => "2", 
"description" => "Unfunctional dieties.", 
"image_alt" => "music3", "image" => "sample-data/music3.png", "date" => 'Sep. 12, 2017', 
"song" => "sample-data/music3.mp3",
"tags" => array("abstract", "noise", "polyatomic"));
$list[3] = array("title" => "My name is Michael", "artist" => "Michael", "id" => "3",
"description" => "Debut album by a new star", 
"image_alt" => "music4", "image" => "sample-data/music4.png", "date" => 'May 21, 2017',
"song" => "sample-data/music4.mp3",
"tags" => array("country", "vintage", "surreal", "rock", "guitar"));

$comments = array();
$comments[0] = array("id" => "0", "name" => "George", "date" => "11/15/18", "parent" => "", 
"comment" => "Great work, very inspirational, I admire your talent. Keep up the good work mate!");
$comments[1] = array("id" => "1", "name" => "Max", "date" => "11/15/18", "parent" => "0",
"comment" => "I agree!");
$comments[2] = array("id" => "2", "name" => "Dan", "date" => "11/15/18", "parent" => "1",
"comment" => "Me too!");
$comments[3] = array("id" => "3", "name" => "Barb", "date" => "11/16/18", "parent" => "", 
"comment" => "Pretty Good I GUESS");
$comments[4] = array("id" => "4", "name" => "Stan", "date" => "11/16/18", "parent" => "1", 
"comment" => "I could've done the same thing. I dont think there's anything special to this");
$comments[5] = array("id" => "5", "name" => "Pig", "date" => "11/17/18", "parent" => "", 
"comment" => "not my style tbh");

?>