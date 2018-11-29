<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

        <style>
            body {
                background-color: gray;
            }
        </style>

        <?php
            include 'components/navbar.php';
            include 'components/list.php';
        ?>
    </head>

    <body>
        <?php 
            createNavbar('timeline'); 
        ?>
        <div class="container">
            <?php
            $list = array();
            $list[0] = array("title" => "Big Opportunities", "artist" => "John Smith",
            "description" => "a piece of music unknown by most by known by the rest and is truly enjoyed by those.", 
            "image_alt" => "music1", "image" => "sample-data/music1.png", "date" => 'Oct. 22, 2018',
            "tags" => array("good music", "great music", "big"));
            $list[1] = array("title" => "Trouble Central", "artist" => "Mitch Meyer",
            "description" => "Electrifying and hair raising in its finest essence.", 
            "image_alt" => "music2", "image" => "sample-data/music2.png", "date" => 'Oct. 15, 2018',
            "tags" => array("electronic", "medieval", "hair curling"));
            $list[3] = array("title" => "Unknown", "artist" => "djrmokis",
            "description" => "Unfunctional dieties.", 
            "image_alt" => "music3", "image" => "sample-data/music3.png", "date" => 'Sep. 12, 2017', 
            "tags" => array("abstract", "noise", "polyatomic"));
            $list[4] = array("title" => "My name is Michael", "artist" => "Michael",
            "description" => "Debut album by a new star", 
            "image_alt" => "music4", "image" => "sample-data/music4.png", "date" => 'May 21, 2017',
            "tags" => array("country", "vintage", "surreal", "rock", "guitar"));
            createList($list);
            ?>
        </div>
    </body>
</html>
