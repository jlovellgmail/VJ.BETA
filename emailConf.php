<?php
include_once('incs/conn.php');
include '/classes/Reg_User.class.php';
$verification = false;

if (isset($_GET["EmailToken"]) && $_GET["EmailToken"] != "") {
    $tempArr = explode("-", $_GET["EmailToken"]);
    $UsrID = $tempArr[0];
    $Token = $_GET["EmailToken"];

    $query = "Select EmailConf from Users Where UsrID='" . $UsrID . "' and EmailToken='" . $Token . "'";
    $dbo = database::getInstance();
    $dbo->doQuery($query);
    $dbo->loadObjectList();
    $Arr = $dbo->getRows();

    if ($Arr > 0) {
        $user = new Reg_User();
        $user->initialize($UsrID);

        $user->setVar("EmailConf", 1);
        $user->store();

        $verification = true;
    }
}
?>
<!doctype html>
<?php $page = "userAccount"; ?>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Ambassadors | Virgil James</title>

<?php include '/incs/head-links.php'; ?>
</head>
<body>
<div class="sdWrapper">
<div class="sdContent">
<?php include '/incs/nav.php'; ?>
<?php include '/incs/emailConf.php'; ?>
</div>
<?php include '/incs/footer.php'; ?>
<?php include '/incs/footer-links.php'; ?>
</div>
</body>
</html>