<?php

session_start();

include '../services/database.php';

$song_id = $_SESSION['song_id'];
$title = "";
$description = "";
$tags = "";

$errors = array(); 

$target_image_dir = realpath(dirname(getcwd())) . '/uploaded-images/';
$target_image_file = $target_image_dir . basename($_FILES["imageFile"]["name"]);
$imageFileType = strtolower(pathinfo($target_image_file,PATHINFO_EXTENSION));
$new_image_file = round(microtime(true)) . '.' . $imageFileType;
$new_image_dir = $target_image_dir . $new_image_file;

$uploadOk = 1;

$title = (isset($_POST['title']) ? $_POST['title'] : null);
$description = (isset($_POST['description']) ? $_POST['description'] : null);
$tags = (isset($_POST['tags']) ? $_POST['tags'] : null);

if ($_FILES["imageFile"]["error"] == 0) {
    $check = getimagesize($_FILES["imageFile"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        array_push($errors, "Sorry, there was an error uploading your file.");
    // if everything is ok, try to upload file
    } else {
        if (!move_uploaded_file($_FILES["imageFile"]["tmp_name"], $new_image_dir)) {
            array_push($errors, "Sorry, there was an error uploading your image file.");
        } 
    }

    if (count($errors) == 0) {
        $imagepath = "/tuneshare/uploaded-images/"  . $new_image_file;
        $sql = "UPDATE Songs SET 
        image_url = :imagepath, 
        title = :title, 
        description = :description  
        WHERE song_id = :songid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':imagepath', $imagepath);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':songid', $song_id);
        $stmt->execute();
    }
}
else {
    if (count($errors) == 0) {
        $sql = "UPDATE Songs SET 
        title = :title, 
        description = :description  
        WHERE song_id = :songid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':songid', $song_id);
        $stmt->execute();
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
            echo 'Successfully Updated Song Info.
            <div><button class="btn btn-secondary" onclick="goBack()">Go back</button></div>';
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