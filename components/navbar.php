<?php

function createNavbar($currentPage) {
    echo '
    <nav class="navbar navbar-inverse" style="margin-bottom: 0">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php" style="padding: 6px 25px 6px 25px;">
                    <img src="images/logo.png" alt="SoundShare" style="height: 100%">
                </a>
            </div>
            <ul class="nav navbar-nav">
                <li '; if ($currentPage == 'home') { echo 'class="active"'; } 
                    echo '><a href="index.php">Home</a></li>
                <li '; if ($currentPage == 'timeline') { echo 'class="active"'; }
                    echo '><a href="timeline.php">Timeline</a></li>
                <li '; if ($currentPage == 'upload') { echo 'class="active"'; }
                    echo '><a href="upload.php">Upload</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a id="accountButton"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
                <li><a id="signupButton"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a id="loginButton"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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

include 'modals/login.php';
include 'modals/signup.php';
?>

<script>
$(document).ready(function(){
    $("#loginButton").click(function(){
        $("#loginModal").modal();
    });
    $("#signupButton").click(function(){
        $("#signupModal").modal();
    });
});
</script>