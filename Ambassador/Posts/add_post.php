<!doctype html>

<?php $page = "userAccount"; ?>
<?php $page2 = "ambPosts"; ?>
<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include_once($rootpath . '/classes/Ambassador.class.php');
include_once($rootpath . '/incs/session_detect.php');

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
        <link rel="stylesheet" href="/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="/css/robs-admin.css" />
        <link rel="stylesheet" href="/admin/css/contentAdmin.css" />
        <script src="/js/jquery-ui/jquery-ui.min.js"></script> 
        <script src="/Ambassador/js/ambProfile.js"></script> 
        <script src="/Ambassador/js/ambPosts.js"></script>
        <script src="/ambassador/posts/js/Post.js" type="text/javascript"></script>
        <script src="/js/jquery-ui/jquery-ui.min.js"></script>
    </head>
    <body>

        <?php include $rootpath.'/incs/nav.php'; ?>
        <div class="sdWrapper">
            <div class="sdContent">
                <?php include $rootpath.'/ambassador/posts/incs/add_post.php'; ?>
            </div>
            <?php include $rootpath.'/incs/footer.php'; ?>
            <?php include $rootpath.'/incs/footer-links.php'; ?>
        </div>
    </body>
</html>