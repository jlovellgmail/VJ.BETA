<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once('/incs/conn.php');
include_once('/classes/Ambassador.class.php');

$FName = '';
$LName = '';
$Email = '';
$Role = '';
$ALocID = '';

$AID = $_GET['AID'];
if (isset($AID) || !$AID == '') {
    $Ambassador = new Ambassador();
    $Ambassador->initialize($AID);

    $UsrID = $Ambassador->getVar("UsrID");
    $FName = $Ambassador->getFName();
    $LName = $Ambassador->getLName();
    $Email = $Ambassador->getEmail();
    $Role = $Ambassador->getRole();
    $ALocID = $Ambassador->getVar("LocID");
    $PermLink = $Ambassador->getVar("PermLinkKey");
}

$query = "{call F_GetAllLocations}";
$dbo->doQuery($query);
$locations = $dbo->loadObjectList();
?>

<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-8">
                <?php if (!isset($AID) || $AID == '') { ?>
                    <h1 class="page-head-title">ADD AMBASSADOR</h1>
                <?php } else { ?>
                    <h1 class="page-head-title">EDIT AMBASSADOR</h1>
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
            <div class="col-xs-4 text-right" style="padding-top:15px;"> <a href="ambassadors.php">&lt; Back to Ambassador's List</a> </div>
        </div>
        <form method="post" id="addAmbassadorFrm" action="add_ambassador_action.php?AID=<?php echo $AID; ?>">
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
                <?php if (!isset($AID) || $AID == '') { ?>
                    <div class="col-xs-12 col-sm-3">
                        <div class="form-group">
                            <label for="lastName">Password</label>
                            <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" value="">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <div class="form-group">
                            <label for="lastName">Re-Enter Password</label>
                            <input type="password" class="form-control" id="Password_Conf" name="Password_Conf" placeholder="Password" value="">
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="lastName">Password</label>
                            <p class="mrg-t-5 form-link"><a href="#" data-toggle="modal" data-target="#updatePwModal">update password</a></p>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-xs-12 col-sm-6">
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
                <input type="hidden" id="Role" name="Role" value="80"/>
                <div class="col-xs-12 col-sm-6">
                    <!--<div class="form-group">
                        <label for="ambRole">Role</label>
                        <select id="Role" name="Role" class="form-control">
                            <option class="placeholder" value="0">Select a Role</option>
                            <option <?php //if ($Role == 90) { ?> selected <?php //} ?> value="90" >Lead Ambassador</option>
                            <option <?php //if ($Role == 80) { ?> selected <?php //} ?> value="80">Ambassador</option>
                        </select>
                    </div>-->
                </div>
            </div>
            <div class="row form-bottom">
                <div class="col-xs-12 col-sm-12 text-right mrg-t-15">
                    <?php if (isset($AID) || $AID != '') { ?>
                        <button type="button" onclick="delAmbassador('<?php echo $AID; ?>');" class="btn btn-sm btn-danger pull-left">Remove Ambassador</button>
                        <button type="button" onclick="validateAddAmbassador();" class="btn btn-primary">Update Ambassador Info</button>
                    <?php } else { ?>
                        <button type="button" onclick="validateAddAmbassador();" class="btn btn-primary">Add Ambassador</button>
                    <?php } ?>
                </div>
            </div>
            <?php if (isset($AID) || $AID != '') { ?>
                <div class="row form-bottom mrg-t-30">
                    <div class="col-xs-12 text-center mrg-t-15">
                        <button type="button" class="btn btn-primary mrg-r-30" onclick="window.open('http://www.virgiljames.net/ambassador.php?PermLink=<?php echo $PermLink;?>')">View Ambassador Page</button>
                        <button type="button" class="btn btn-primary mrg-l-30" onclick="window.open('http://www.virgiljames.net/incs/admin_ambEdit.php?AID=<?php echo $AID;?>&editorID=<?php echo $_SESSION["UsrID"]; ?>&sk=84756^!290')">Edit Ambassador Page</button>
                    </div>
                </div>
            <?php } ?>
        </form>
    </div>
</div>

<div class="modal fade" id="updatePwModal" tabindex="-1" role="dialog" aria-labelledby="updatePwModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="updatePwModal">Update Passowrd</h4>
            </div>
            <form>
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