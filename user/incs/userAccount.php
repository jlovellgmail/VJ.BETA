<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once $rootpath."/classes/Reg_User.class.php";
$UsrID = $_SESSION["UsrID"];
$UsrPriv = $_SESSION["UsrPriv"];

$user = new Reg_User();
$user->initialize($UsrID);

$FName = $user->getVar("FName");
$LName = $user->getVar("LName");
$Email = $user->getVar("Email");
?>

<?php include '../incs/userAccountNav.php'; ?>

<div class="widthWrapper">
    <div class="tableWrapper tableHeight">
        <div class="cellWrapper">
            <?php include '/incs/info.php'; ?>
            <div id="AddressDiv">
                <?php include '/incs/userAddress.php'; ?>
            </div>
        </div>
    </div>
</div>