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
                <div class="form-group">
                    <label for="username"> Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="username"> Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email address">
                </div>
                <div class="form-group">
                    <label for="password"> Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <label for="password2"> Verify Password</label>
                    <input type="password" class="form-control" id="password2" placeholder="Verify password">
                </div>
                <button type="submit" class="btn btn-default btn-success btn-block"> Create Account</button>
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