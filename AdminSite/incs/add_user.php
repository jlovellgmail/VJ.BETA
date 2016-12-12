<?php
include_once('/incs/conn.php');
include '/classes/Reg_User.class.php';
include_once('/classes/Ambassador.class.php');

$FName = '';
$LName = '';
$Email = '';
$Password = '';
$ALocID = '';

$UsrID = $_GET['UsrID'];
if (isset($UsrID) || !$UsrID == '') {
    $user = new Reg_User();
    $user->initialize($UsrID);

    $FName = $user->getVar("FName");
    $LName = $user->getVar("LName");
    $Email = $user->getVar("Email");
    $UsrPriv = $user->getVar("UsrPriv");
    $user->decryptPass();
    $Password = $user->getVar("Password");
    
    $query = "{call F_GetAllLocations}";
	 $dbo->doQuery($query);
	 $locations = $dbo->loadObjectList();
	 
	 if ($UsrPriv == 80)
	 {
	 		$query = "{call F_GetAmbassadorID (@UsrID=:UsrID)}";
    		$param = array(":UsrID" => $UsrID);
    		$dbo->doQueryParam($query, $param);
    		$AmbID = $dbo->loadObjectList();
    		$AID = $AmbID[0]['AID'];
    		
	 		$Ambassador = new Ambassador();
    		$Ambassador->initialize($AID);
    		$ALocID = $Ambassador->getVar("LocID");
	 }
}
?>
<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
    <div class="col-xs-8">
        <?php if (!isset($UsrID) || $UsrID == '') { ?>
            <h1 class="page-head-title">ADD USER</h1>
        <?php } else { ?>
            <h1 class="page-head-title">EDIT USER</h1>
        <?php } ?>
		
		<?php
        if (isset($_SESSION["er"]) && $_SESSION["er"] != "") {
            switch ($_SESSION["er"]) {
                case "e":
                    echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          Please enter all the required information.
                        </div>";
                    break;
                case "em":
                    echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          Please enter a valid email address.
                        </div>";
                    break;
				case "pw":
                    echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          Passwords provided do not match.
                        </div>";
                    break;
				case "ue":
                    echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          User already exist.
                        </div>";
                    break;
            }
        }
        ?>
    </div>
    <div class="col-xs-4 text-right" style="padding-top:15px;">
        <a href="users.php">< Back to User's List</a>
    </div>
</div>
<form method="post" id="addUsrFrm" action="add_user_action.php?UsrID=<?php echo $UsrID; ?>">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="FName" name="FName" placeholder="First Name" value="<?php echo $FName; ?>">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="LName" name="LName" placeholder="Last Name" value="<?php echo $LName; ?>">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="form-group">
                <label for="firstName">Email Address</label>
                <input type="email" class="form-control" id="Email" name="Email" placeholder="Email Address" value="<?php echo $Email; ?>">
            </div>
        </div>
		<?php if (!isset($UsrID) || $UsrID == '') { ?>
	        <div class="col-xs-12 col-sm-6">
	            <div class="form-group">
	                <label for="lastName">Password</label>
	                <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" value="<?php echo $Password; ?>">
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-6">
	            <div class="form-group">
	                <label for="lastName">Re-Enter Password</label>
	                <input type="password" class="form-control" id="Password_Conf" name="Password_Conf" placeholder="Password" value="<?php echo $Password; ?>">
	            </div>
	        </div>
		<?php } else { ?>
			<div class="col-xs-12 col-sm-6">
	          <div class="form-group">
	            <label for="lastName">Password</label>
	            <p class="mrg-t-5 form-link"><a href="#" data-toggle="modal" data-target="#updatePwModal">update password</a></p>
	          </div>
	        </div>
	     <div class="col-xs-12 col-sm-6">
            <div class="form-group">
                <label for="firstName">User Role</label>
                <select class="form-control" id="UsrPriv" name="UsrPriv" onchange="updateLocation();">
                	<option value="5" <?php if ($UsrPriv == 5) { echo "selected"; } ?>>Basic User</option>
                	<option value="80" <?php if ($UsrPriv == 80) { echo "selected"; } ?>>Ambassador</option>
                	<option value="90" <?php if ($UsrPriv == 90) { echo "selected"; } ?>>Content Administrator</option>
                	<option value="100" <?php if ($UsrPriv == 100) { echo "selected"; } ?>>Administrator</option>
                </select>
            </div>
        </div>
        		<div id="locationDiv" class="col-xs-12 col-sm-6" <?php if ($UsrPriv != 80) { echo "style='display:none'"; }?>>
					  <div class="form-group">
							<label for="ambLoc">Location</label>
							<select id="Location" name="Location" class="form-control">
								 <option class="placeholder" value="0">Select a Location</option>
								 <?php
								 if ($dbo->getRows() > 0) {
									  $count = 0;
									  foreach ($locations as $location) {
											$LocID = $location["LocID"];
											$location = $location["Location"];
											?>   
											<option <?php if ($ALocID == $LocID) { ?> selected <?php } ?>  value="<?php echo $LocID; ?>"><?php echo $location; ?></option>
											<?php
											$count++;
									  }
									  if ($count == 0) {
											echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Locations.</td></tr>";
									  }
								 }
								 ?> 
							</select>
					  </div>        
				 </div>
		<?php } ?>
    </div>
    <div class="row form-bottom">   
        <div class="col-xs-12 col-sm-12 text-right mrg-t-15">
            <?php if (!isset($UsrID) || $UsrID == '') { ?>
                <button type="button" onclick="validateAddUser();" class="btn btn-primary">Add User</button>
            <?php } else { ?>
                <button type="button" onclick="delUser('<?php echo $UsrID; ?>');" class="btn btn-sm btn-danger pull-left">Remove User</button>
                <button type="button" onclick="validateAddUser();" class="btn btn-primary">Update</button>
            <?php } ?>
        </div>
    </div>
    <?php if (isset($UsrID) && $UsrID != '') { ?>
    	<div class="row form-bottom">   
        	<div class="col-xs-12 col-sm-12 text-right mrg-t-15">
         	<button type="button" class="btn btn-primary mrg-l-30" onclick="window.open('http://www.virgiljames.net/incs/admin_userEdit.php?UsrID=<?php echo $UsrID;?>&editorID=<?php echo $_SESSION["UsrID"]; ?>&sk=84756^!290')">Edit User Page</button>
        	</div>
    	</div>
    <?php } ?>
</form>


<div class="modal fade" id="updatePwModal" tabindex="-1" role="dialog" aria-labelledby="updatePwModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="updatePwModal">Update Passowrd</h4>
      </div>
         <form id="updatePwFrm">
      <div class="modal-body">
           <div class="form-group">
             <label for="exampleInputPassword1">New Password</label>
             <input type="password" class="form-control" id="updatePass" placeholder="Password">
           </div>
           <div class="form-group">
             <label for="exampleInputPassword1">Confirm New Password</label>
             <input type="password" class="form-control" id="Conf_updatePass" placeholder="Confirm Password">
           </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updatePassword('<?php echo $UsrID; ?>');">Save changes</button>
      </div>
         </form>
    </div>
  </div>
</div>
