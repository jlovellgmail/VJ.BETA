<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include_once($rootpath.'/classes/Ambassador.class.php');

$FName = '';
$LName = '';
$Email = '';
$Role = '';
$ALocID = '';

$AID = '';
if (isset($_GET['AID']) && !$_GET['AID'] == '') {
	 $AID = $_GET['AID'];
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

<?php include 'nav/robs-admin-nav.php'; ?>

<div class='widthWrapper admin-content-wrapper'>
    <div>
        <h1 class="caps marBottom10 mobileElement size5">Edit Account</h1>
        <h1 class="caps marBottom30 desktopElement size5">Edit Ambassador Account</h1>

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
    <form class="generalForm xs-twelve md-ten lg-nine xl-seven xxl-six" method="post" id="addAmbassadorFrm" action="add_ambassador_action.php?AID=<?php echo $AID; ?>">
            <div class="xs-twelve md-six" style="padding-left: 5px; padding-right: 5px;">
                    <label for="firstName">First Name</label>
                    <input type="text" class="" id="FName" name="FName" placeholder="First Name" value="<?php echo $FName; ?>">
            </div><!--
            --><div class="xs-twelve md-six" style="padding-left: 5px; padding-right: 5px;">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="" id="LName" name="LName" placeholder="Last Name" value="<?php echo $LName; ?>">
            </div><!--
            --><div class="xs-twelve md-six" style="padding-left: 5px; padding-right: 5px;">
                    <label for="firstName">Email Address</label>
                    <input type="email" class="" id="Email" name="Email" placeholder="Email Address" value="<?php echo $Email; ?>">
            </div><!--
         --><div class="xs-twelve md-six marBottom15" style="padding-left: 5px; padding-right: 5px;">
                <label for="ambLoc">Location</label>
                <select id="Location" name="Location" class="">
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

            <input type="hidden" id="Role" name="Role" value="80"/>
            <!-- <div class="xs-twelve" style="padding-left: 5px; padding-right: 5px;">
                <button class='admin-add-button marBottom15' style='margin-right: 15px;' type="button" onclick="window.open('http://www.virgiljames.net/ambassador.php?PermLink=<?php echo $PermLink;?>')">View Ambassador Page</button>
                <button class='admin-add-button marBottom15' type="button" onclick="window.open('http://www.virgiljames.net/incs/admin_ambEdit.php?AID=<?php echo $AID;?>&editorID=<?php echo $_SESSION["UsrID"]; ?>&sk=84756^!290')">Edit Ambassador Page</button>
            </div> -->
            <div class="xs-twelve" style="padding-left: 5px; padding-right: 5px;">
                <div class='rel xs-seven marbottom30' style='height: 40px;'>
                    <div class='xs-twelve lg-five xxl-four'>
                        <a href='#' data-toggle="modal" data-target="#updatePwModal" style='text-decoration: underline; line-height: 40px;'>Change Password</a>
                    </div><div class='xs-twelve lg-seven xxl-eight'>
                        <a href='#' onclick="delAmbassador('<?php echo $AID; ?>');" style="color:#fe5252; text-decoration: underline; line-height: 40px;">Remove Ambassador</a>
                    </div>
                </div><div class='xs-five textRight'>
                    <button class='admin-add-button' type="button" onclick="validateAddAmbassador();">Update</button>
                </div>
            </div>
    </form>

    <div class="modal fade" id="updatePwModal" tabindex="-1" role="dialog" aria-labelledby="updatePwModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="updatePwModal">Update Password</h4>
                </div>
                <form class='generalForm textCenter'>
                    <div class="modal-body xs-ten sm-eight md-six lg-five">
                        <div class='row'>
                            <label for="exampleInputPassword1">New Password</label>
                        </div><div class='row marBottom15'>
                            <input type="password" id="updatePass" placeholder="Password">
                        </div><div class='row'>
                            <label for="exampleInputPassword1">Confirm New Password</label>
                        </div><div class='row'>
                            <input type="password" id="Conf_updatePass" placeholder="Confirm Password">
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
</div>