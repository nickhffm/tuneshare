<?php

session_start();

include '../services/database.php';

// initializing variables
$username = "";
$email    = "";
$firstname = "";
$lastname = "";
$password = "";
$password_2 = "";
$errors = array(); 

// REGISTER USER
if (isset($_POST['update_info'])) {
  // receive all input values from the form
  $username = (isset($_POST['username']) ? $_POST['username'] : null);
  $firstname = (isset($_POST['firstname']) ? $_POST['firstname'] : null);
  $lastname = (isset($_POST['lastname']) ? $_POST['lastname'] : null);
  $email = (isset($_POST['email']) ? $_POST['email'] : null);
  $password = (isset($_POST['password_1']) ? $_POST['password_1'] : null);
  $password_2 = (isset($_POST['password_2']) ? $_POST['password_2'] : null);

  // form validation: ensure that the form is correctly filled
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if ($password != $password_2) { array_push($errors, "Password and password verification must match"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $sql = "SELECT * FROM Users
   WHERE (username='$username' 
   OR email='$email' )
   AND (user_id<>" . $_SESSION['user_id'] . ") 
   LIMIT 1";
  $result = $pdo->query($sql);
  $user = $result->fetch(PDO::FETCH_ASSOC);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  if (count($errors) == 0) {
    if (!empty($password)) {
      $password = md5($password);
      $sql = "UPDATE Users SET 
      username = '$username', 
      first_name = '$firstname', 
      last_name =  '$lastname',
      email = '$email',
      password = '$password' 
      WHERE Users.user_id = " . $_SESSION['user_id'] . ";";

      try {
        $result = $pdo->query($sql);
        $_SESSION['username'] = $username;
        $_SESSION['first_name'] = $firstname;
        $_SESSION['last_name'] = $lastname;
        $_SESSION['email'] = $email;
      } catch (PDOException $e) {
        array_push($errors, $e);
      }
    }
    else {
      $sql = "UPDATE Users SET 
      username = '$username', 
      first_name = '$firstname', 
      last_name =  '$lastname',
      email = '$email'
      WHERE Users.user_id = " . $_SESSION['user_id'] . ";";

      try {
      $result = $pdo->query($sql);
      $_SESSION['username'] = $username;
      $_SESSION['first_name'] = $firstname;
      $_SESSION['last_name'] = $lastname;
      $_SESSION['email'] = $email;
      } catch (PDOException $e) {
          array_push($errors, $e);
      }
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
            echo 'Updated profile info.
            <div><a href="/tuneshare/index.php"><button class="btn btn-secondary">Home</button></a></div>';
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