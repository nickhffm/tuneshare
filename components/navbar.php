<?php

if (!isset($_SESSION['user_id'])) session_start();

function createNavbar($currentPage) {
    echo '
    <nav class="navbar navbar-inverse" style="margin-bottom: 0">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/tuneshare/index.php" style="padding: 6px 25px 6px 25px;">
                    <img src="/tuneshare/images/logo.png" alt="SoundShare" style="height: 100%">
                </a>
            </div>
            <ul class="nav navbar-nav">
                <li '; if ($currentPage == 'home') { echo 'class="active"'; } 
                    echo '><a href="/tuneshare/index.php">Home</a></li>
                <li '; if ($currentPage == 'timeline') { echo 'class="active"'; }
                    echo '><a href="/tuneshare/timeline.php">Timeline</a></li>
                <li '; if ($currentPage == 'upload') { echo 'class="active"'; }
                    echo '><a href="/tuneshare/upload.php">Upload</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li '; if ($currentPage == 'profile') { echo 'class="active"'; }
                echo '>';
                if (isset($_SESSION['user_id'])) { 
                    echo '<li><a href="/tuneshare/profile.php"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
                    <li><a href="/tuneshare/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>' ;
                }
                else {
                    echo '<li><a href="/tuneshare/signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="/tuneshare/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                }
                echo '
            </ul>
            <form class="navbar-form navbar-right" action="/action_page.php">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form> 
        </div>
    </nav>
    ';
}
?>