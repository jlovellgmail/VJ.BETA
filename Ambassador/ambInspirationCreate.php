<!DOCTYPE html>

<?php $page = "userAccount"; ?>
<?php $page2 = "ambInspirations"; ?>
<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include_once($rootpath . '/classes/Ambassador.class.php');
include_once($rootpath . '/incs/session_detect.php');
$UsrID = $_SESSION["UsrID"];

if (isset($_GET['AID']) && $_GET['AID'] != '') {
    $AID = $_GET['AID'];
    if (isset($_SESSION["AmbEditID"]) && $_SESSION["AmbEditID"] !="") {
        $AID = $_SESSION["AmbEditID"];
        $AmbName = $_SESSION["AmbEditName"];
        $adminEdit=TRUE;
    }
} else {
    if (isset($_SESSION["AmbEditID"]) && $_SESSION["AmbEditID"] !="") {
        $AID = $_SESSION["AmbEditID"];
        $AmbName = $_SESSION["AmbEditName"];
        $adminEdit=TRUE;
    }else {
        $query = "{call F_GetAmbassadorID (@UsrID=:UsrID)}";
        $param = array(":UsrID" => $UsrID);
        $dbo->doQueryParam($query, $param);
        $AmbID = $dbo->loadObjectList();
        $AID = $AmbID[0]['AID'];
    }
}


$Ambassador = new Ambassador();
$Ambassador->initialize($AID);
$ProfilePrevImg = $Ambassador->getProfilePrevImgUrl();
?>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <title>Virgil James Admin - Ambassador Grid</title>

    <?php include '../incs/head-links.php'; ?>

    <link rel='stylesheet' href='/css/content-admin.css' />
    <link rel='stylesheet' href='/css/ca-img-grid.css' />
    <link rel='stylesheet' href='/css/userAccount.css' />
    <link rel='stylesheet' href='/css/ca-ambassador-grid.css' />
    <link rel="stylesheet" href="/css/uploadFile.css">
    <link rel="stylesheet" href="/css/croppic_new.css">

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>


    <script type="text/javascript" src="/js/jquery.uploadfile.js"></script>
    <script type="text/javascript" src="/js/croppic_new.js"></script>
    <script type="text/javascript" src="/Ambassador/js/ambInspiration.js"></script>

</head>

<body class='loginBody'>

    <div class='sdWrapper'>
        <div class='sdContent'>
            <?php include '../incs/nav.php'; ?>
            <?php include '../ambassador/incs/ambInspirationCreate.php'; ?>
        </div>
        <?php include '../incs/footer.php'; ?>
        <?php include '../incs/footer-links.php'; ?>
    </div>

    
</body>
</html>