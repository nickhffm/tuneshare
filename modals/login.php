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


<!-- Modal -->
<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4> Login</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                <div class="form-group">
                    <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
                    <input type="text" class="form-control" id="usrname" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                    <input type="text" class="form-control" id="psw" placeholder="Enter password">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value="" checked>Remember me</label>
                </div>
                <button type="submit" class="btn btn-default btn-success btn-block"> Login</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> Cancel
                </button>
                <p>Don't have an account? <a href="#">Sign Up</a></p>
                <p>Forgot <a href="#">Password?</a></p>
            </div>
        </div>
    </div>
</div>