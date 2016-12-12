<br />
<div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-push-3">
        <h1 class="page-head-title">LOGIN</h1>

        <?php
        if (isset($_SESSION["er"]) && $_SESSION["er"] != "") {
            switch ($_SESSION["er"]) {
                case "em":
                    echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          The email you enter is not a valid email address.
                        </div>";
                    break;
                case "exp":
                    echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          Your session has expired. Please login again.
                        </div>";
                    break;
                case "pass":
                    echo " 
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          Email and password does not match.
                        </div>";
                    break;
                case "emex":
                    echo "				
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          Email does not exist in our database.
                        </div>";
                    break;
				case "adu":
                    echo "				
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          Access denied. Only administrators can login.
                        </div>";
                    break;
                case "del":
                    echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          Account has been deleted.
                        </div>";

                    session_start();
                    session_destroy();
                    break;
            }
        }
        ?>

        <form name="login" id="loginForm" action="/login_action.php" method="post" novalidate="novalidate" onsubmit="return validateLoginForm();">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Password">
            </div>
            <div class="row">
                <div class="col-xs-12 text-right"> 	         
                    <button class="btn btn-primary">Submit</button>          	  
                </div>
            </div>
        </form>
    </div>
</div>