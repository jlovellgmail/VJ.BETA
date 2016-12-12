<div class="row">
    <div class="sm-twelve md-eight">
        <form class="generalForm generalFormBlock" id="userInfoFrm" method="post" action="/user/userInfo_action.php">
            <h2 class="caps black">User Information</h2>
            <br />
            <?php
            if (isset($_SESSION["er"]) && $_SESSION["er"] != "") {
                switch ($_SESSION["er"]) {
                    case "e":
                        echo "
						<div class='alertMessage'>Please enter all the required information.</div>";
                        break;
                    case "em":
                        echo "
						<div class='alertMessage'>Please enter a valid email address.</div>";
                        break;
                    case "ue":
                        echo "
						<div class='alertMessage'>User already exist.</div>";
                        break;
                }
            }
            ?>
            <div class="row">
                <div class="md-twelve lg-six leftCol">
                    <label>First Name</label>
                    <input type="text" id="FName" name="FName" value="<?php echo $FName; ?>">
                </div><div class="md-twelve lg-six rightCol">
                    <label>Last Name</label>
                    <input type="text" id="LName" name="LName" value="<?php echo $LName; ?>">
                </div><div class="md-twelve lg-six leftCol">
                    <label>Email</label>
                    <input type="text" id="Email" name="Email" value="<?php echo $Email; ?>">
                </div><div class="md-twelve lg-six rightCol"><div class="generalFormInput"><br /><button type="button" class="textBtn toggleDivBtn" data-id="showChangePw">Change Password</button></div>
                    <div id="showChangePw" class="formWell" style="display: none;">
                        <div id="passErrDiv" class="alertMessage"></div>
                        <label for="password">New Password:</label>
                        <input class="textField" type="password" name="Passwd" id="Passwd">
                        <label for="password">Re-Type New Password:</label>
                        <input class="textField" type="password" name="Conf_Passwd" id="Conf_Passwd">
                        <div class="generalFormSubmit textRight"><button type="button" onclick="validateChangePass();" class="fillBtn small">Change Password</button></div>
                    </div>
                </div>
            </div>
            <br />
            <div class="generalFormSubmit textRight"><button type="button" onclick="validateUserInfo();" class="fillBtn">Save</button></div>
        </form>
    </div>
</div>