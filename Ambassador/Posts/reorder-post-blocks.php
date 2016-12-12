
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Virgil James Admin - Add Post</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/admin/css/contentAdmin.css" />
    <?php include $rootpath.'/incs/head-links.php'; ?>
    <link rel="stylesheet" href="/css/userAccount.css" />
        <link rel="stylesheet" href="/css/tables.css" />
    <link rel="stylesheet" href="../css/glyphs.css" />
    <link rel="stylesheet" href="/css/robs-admin.css" />
    <link rel="stylesheet" href="/js/jquery-ui/jquery-ui.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/jquery.tablesorter.js" type="text/javascript"></script>
    <script src="js/add_ambassador.js" type="text/javascript"></script>
    <script src="js/add_user.js" type="text/javascript"></script>
    <script src="js/general.js" type="text/javascript"></script>
    <script src="/ambassador/posts/js/Post.js" type="text/javascript"></script>
    <script src="/js/jquery-ui/jquery-ui.min.js"></script>
</head>
<body class="loginBody">
	<div class="sdWrapper">
    	<div class="sdContent">
        	<?php include $rootpath.'/incs/nav.php'; ?>
        	<?php include $rootpath.'/ambassador/posts/incs/reorder-post-blocks.php'; ?>
    	</div>
    	<?php include $rootpath.'/incs/footer.php'; ?>
    	<?php include $rootpath.'/incs/footer-links.php'; ?>
	</div>
    <script>
  $(function() {
    $( "#reorder-content-blocks" ).sortable();
    $( "#reorder-content-blocks .ui-sortable" ).disableSelection();
  });
  </script>
</body>
</html>