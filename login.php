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
            include 'components/navbar.php'; 
            include 'components/carousel.php';
        ?>

        <style>
            body {
                background-color: #222;
                color: whitesmoke;
            }
            .header, h4 {
                background-color: #222222;
                color:white !important;
                text-align: center;
                font-size: 30px;
            }
        </style>

    </head>

    <body>
        <?php 
            createNavbar('home'); 
        ?>
        <div class="container col-xs-12 col-sm-12 col-lg-6 col-md-6">

            <div class="header">
                <h4> Login</h4>
            </div>
            <div class="body">
                <form role="form" action="login.php" method = "POST">
                <div class="form-group">
                    <label for="username"><span class="glyphicon glyphicon-user"></span> Email</label>
                    <input type="text" class="form-control" id="usrname" placeholder="Enter email" name = "username">
                </div>
                <div class="form-group">
                    <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                    <input type="text" class="form-control" id="psw" placeholder="Enter password" name="password">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value="" checked>Remember me</label>
                </div>
                <button type="submit" class="btn btn-default btn-success btn-block" id="login" name="login_user"> Login</button>
                </form>
            </div>
            <div class="footer">
                <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                <p>Forgot <a href="#">Password?</a></p>
            </div>
        </div>
    </div>
</div>