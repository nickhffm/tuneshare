<style>
    .modal-header, h4, .close {
        background-color: #222222;
        color:white !important;
        text-align: center;
        font-size: 30px;
    }
    .modal-footer {
        background-color: #f9f9f9;
    }
</style>
<?php
include('dbconnect.php');
if(isset($_POST['button']))
{
    if($_POST['button']=="create_account")
    {
        $username = mysql_real_escape_string($connection, $_POST['username']);
        $firstname = mysql_real_escape_string($connection, $_POST['firstname']);
        $lastname = mysql_real_escape_string($connection, $_POST['lastname']);
        $email = mysql_real_escape_string($connection, $_POST['email']);
        $password = mysql_real_escape_string($connection, $_POST['password']);
        $query = "SELECT email FROM Users WHERE email'".$email."'";
        $result = mysql_query($connection, $query);
        $numResults = mysql_num_rows($result);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $message = "Invalid email address please type a valid email!";
        }
        elseif($numResults>=1)
        {
            $message = $email."Email Already exists!!";
        }
        else
        {
            mysql_query("insert into Users(username,first_name,last_name,email,password) values('".$username."','".$firstname."','"
                .$lastname."','".md5($password)."')");
            $message = "Signup Sucessful!";
        }
    }
}
?>

<!-- Modal -->
<div class="modal fade" id="signupModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4> Create an account</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                <form action="" method="post">
                <div class="form-group">
                    <label for="username"> Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username">
                </div>
                 <div class="form-group">
                    <label for="username">First Name</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Enter firstname">
                </div>
                <div class="form-group">
                    <label for="username">Last Name</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Enter lastname">
                </div>
                <div class="form-group">
                    <label for="username"> Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email address">
                </div>
                <div class="form-group">
                    <label for="password"> Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password">
                </div>
                <button type="submit" class="btn btn-default btn-success btn-block" id = "create_account"> Create Account</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> Cancel
                </button>
                <p>Already have an account? <a href="#">Login</a></p>
            </div>
        </div>
    </div>
</div>