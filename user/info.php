<!doctype html>
<?php 
$rootpath = $_SERVER['DOCUMENT_ROOT'];
 ?>
<?php $page = "userAccount"; ?>
<?php $page2 = "userInfo"; ?>
<?php
include_once($rootpath . '/incs/conn.php');
include_once($rootpath . '/classes/Ambassador.class.php');
include_once($rootpath.'/incs/session_detect.php');
if ($_SESSION["UsrPriv"] >= 80 & $_SESSION["UsrPriv"] < 90) {
    if (isset($_GET['AID']) && $_GET['AID'] != '') {
        $AID = $_GET['AID'];
    } else {
        $query = "{call F_GetAmbassadorID (@UsrID=:UsrID)}";
        $param = array(":UsrID" => $_SESSION["UsrID"]);
        $dbo->doQueryParam($query, $param);
        $AmbID = $dbo->loadObjectList();
        $AID = $AmbID[0]['AID'];
    }

    $ProfilePrevImg = '';
    $Ambassador = new Ambassador();
    $Ambassador->initialize($AID);
    $ProfilePrevImg = $Ambassador->getProfilePrevImgUrl();
}
?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Ambassadors | Virgil James</title>

        <?php include '../incs/head-links.php'; ?>

        <link rel="stylesheet" href="/css/userAccount.css" />
        <link rel="stylesheet" href="/css/forms.css" />
        <link rel="stylesheet" href="/js/jquery-ui/jquery-ui.min.css" />
        <script src="/js/jquery-ui/jquery-ui.min.js"></script> 
        <script src="/user/js/userInfo.js"></script> 
        <script src="/js/address.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="sdWrapper">
            <div class="sdContent">
                <?php include '../incs/nav.php'; ?>
                <div class="navPlaceholder"></div>
                <?php include '/incs/userAccount.php'; ?>
            </div>
            <?php include '../incs/footer.php'; ?>
            <?php include '../incs/footer-links.php'; ?>
            <?php unset($_SESSION["er"]); ?>
        </div>
    </body>
</html>