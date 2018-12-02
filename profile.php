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
        .card-container {
            margin: 0 20px 0 20px;
            width: calc(100% - 40px);
            width: -webkit-calc(100% - 40px);
            background-color: #121212;
            display: flex;
            padding-bottom: 20px;
        }
        .btn-secondary {
            background-color: #444;
        }
        .nav-tabs>li>a {
            color: whitesmoke;
        }
        .nav-tabs>li>a:hover {
            background-color: #333;
            color: whitesmoke;
        }
        .nav-tabs>li.active>a {
            background-color: #444;
            border:none;
            color: whitesmoke;
        }
        .nav-tabs>li.active>a:focus {
            background-color: #444;
            border:none;
            color: whitesmoke;
        }
        .nav-tabs>li.active>a:hover {
            background-color: #444;
            border:none;
            color: whitesmoke;
        }
        </style>

    </head>
            
    <body>
        <?php 
            createNavbar('profile'); 
        ?>

        <div class="container card-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#profile">Edit Profile</a></li>
                <li><a data-toggle="tab" href="#favorites">My Favorites</a></li>
            </ul>
        </div>

        <div class="tab-content">
            <div id="profile" class="tab-pane fade in active">
                <div class="container card-container">
                    <form class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="title">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="verifyPassword">Verify Password</label>
                            <input type="password" class="form-control" id="verifyPassword" placeholder="Verify Password">
                        </div>
                        <button type="submit" class="btn btn-secondary">Update information</button>
                    </form>
                </div>
            </div>
            <div id="favorites" class="tab-pane fade">
                
            </div>
        </div>

    </body>
</html>
