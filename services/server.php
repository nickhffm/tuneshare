<?php

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
if (isset($_POST['reg_user'])) {
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
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password != $password_2) { array_push($errors, "Password and password verification must match"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $sql = "SELECT * FROM Users WHERE username='$username' OR email='$email' LIMIT 1";
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

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password);   //encrypt the password before saving in the database

    $sql = "INSERT INTO Users (username, first_name, last_name, email, password) 
          VALUES('$username', '$firstname', '$lastname', '$email', '$password')";
    $result = $pdo->query($sql);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($pdo, $_POST['username']);
  $password = mysqli_real_escape_string($pdo, $_POST['password']);

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
    if (mysqli_num_rows($result) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

?>