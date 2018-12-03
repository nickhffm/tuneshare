<?php

include '../services/database.php';

$username = "";
$password = "";
$errors = array(); 

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = (isset($_POST['username']) ? $_POST['username'] : null);
    $password = (isset($_POST['password']) ? $_POST['password'] : null);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $sql = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
        $result = $pdo->query($sql);
        if (!$result->fetch[0]) {
            array_push($errors, "Wrong username/password combination");
        }
        else {

        }
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
            echo 'Successfully logged in!
            <div><a href="index.php"><button class="btn btn-secondary">home</button></a></div>';
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