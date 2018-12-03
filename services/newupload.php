<?php

include '../services/database.php';

$title = "";
$artist = "";
$songurl = "";
$songimg = "";
$descripton = "";
$tags = "";
$errors = array(); 

// LOGIN USER
if (isset($_POST['new_song'])) {
    $title = (isset($_POST['title']) ? $_POST['title'] : null);
    $artist = (isset($_POST['artist']) ? $_POST['artist'] : null);
    $songurl = (isset($_POST['musicFile']) ? $_POST['MusicFile'] : null);
    $songimg = (isset($_POST['imgFile']) ? $_POST['imgFile'] : null);
    $descripton = (isset($_POST['descripton']) ? $_POST['description'] : null);
    $userid = $_SESSION['user_id'];
   
    $sql = "INSERT INTO Users (song_name, artist_name, genre, song_url, song_img, user_id) 
          VALUES('$title', '$artist', '$description', '$songurl', '$songimg','$user_id')";
    if (count($errors) == 0) {
    $sql = "INSERT INTO Users (song_name, artist_name, genre, song_url, song_img, user_id) 
          VALUES('$title', '$artist', '$description', '$songurl', '$songimg','$user_id')";
    $result = $pdo->query($sql);
  }
}

?>
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

        <?php
            include '../components/navbar.php'; 
            include '../components/carousel.php';
        ?>

        <style>
            body {
              background-color: #222;
              color: whitesmoke;
            }
            .header, h4 {
              color:white !important;
              text-align: center;
              font-size: 30px;
            }
            .well {
              margin-top: 25px;
              background-color: black;
              border: none;
            }
            .btn {
              background-color: #444;
              color: whitesmoke;
            }
        </style>

    </head>

    <body>
        <?php 
            createNavbar(''); 
        ?>
        <div class="col-lg-3 col-md-3"></div>
        <div class="well col-xs-12 col-sm-12 col-lg-6 col-md-6">
          <?php
          if (count($errors) > 0) {
            echo '<div class="error">';
              foreach ($errors as $error) {
                echo'<p>' . $error . '</p>';
              }
            echo '<button class="btn btn-secondary" onclick="goBack()">Go back</button></div>';
          }
          else {
            echo 'Successfully Added Song!
            <div><a href="../index.php"><button class="btn btn-secondary">Home</button></a></div>';
          }
          ?>
          
        </div>
        <div class="col-lg-3 col-md-3"><div>
    </div>
</div>

<script>
function goBack() {
  window.history.back();
}
</script>