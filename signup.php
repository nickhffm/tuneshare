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
                color:white !important;
                text-align: center;
                font-size: 30px;
            }
            .well {
                margin-top: 25px;
                background-color: black;
                border: none;
            }
        </style>

    </head>

    <body>
        <?php 
            createNavbar('home'); 
        ?>
        <div class="col-lg-3 col-md-3"></div>
        <div class="well col-xs-12 col-sm-12 col-lg-6 col-md-6">
            <div class="header">
                <h4> Create a new account</h4>
            </div>
            <hr>
            <div class="body">
                <form method="post" action="services/newuser.php">
                    <div class="form-group">
                        <label for="username"> Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="username">First Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="Enter firstname">
                    </div>
                    <div class="form-group">
                        <label for="username">Last Name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Enter lastname">
                    </div>
                    <div class="form-group">
                        <label for="username"> Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address">
                    </div>
                    <div class="form-group">
                        <label for="password"> Password</label>
                        <input type="password" class="form-control" name="password_1" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for="password"> Verify Password</label>
                        <input type="password" class="form-control" name="password_2" placeholder="Reenter password">
                    </div>
                    <button type="submit" class="btn btn-default btn-success btn-block" id = "create_account" name="reg_user"> Create Account</button>
                </form>
            </div>
            <div class="footer">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </div>
        <div class="col-lg-3 col-md-3"><div>
    </div>
</div>