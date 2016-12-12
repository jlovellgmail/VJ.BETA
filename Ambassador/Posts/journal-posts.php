<!doctype html>

<?php $page = "userAccount"; ?>
<?php $page2 = "ambPosts"; ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '../incs/conn.php');
include_once($rootpath . '../classes/Ambassador.class.php');

include_once($rootpath . '../incs/session_detect.php');
$UsrID = $_SESSION["UsrID"];

if (isset($_GET['AID']) && $_GET['AID'] != '') {
    $AID = $_GET['AID'];
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
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Ambassadors | Virgil James</title>

        <?php include $rootpath.'/incs/head-links.php'; ?>

        <link rel="stylesheet" href="/css/userAccount.css" />
        <link rel="stylesheet" href="/css/tables.css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="/js/jquery-ui/jquery-ui.min.css" />
        <script src="/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="/Ambassador/js/ambProfile.js"></script> 
        <script src="/Ambassador/posts/js/Post.js"></script>
        <script>
            $(function() {
                $( ".datePicker" ).datepicker();
            });
        </script>
    </head>
    <body>

        <?php include $rootpath.'/incs/nav.php'; ?>
        <div class="sdWrapper">
            <div class="sdContent">
                <?php include 'incs/journal-posts.php'; ?>
            </div>
            <?php include $rootpath.'/incs/footer.php'; ?>
            <?php include $rootpath.'/incs/footer-links.php'; ?>
        </div>
    </body>
</html>