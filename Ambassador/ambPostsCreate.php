<!doctype html>
<?php $page = "userAccount"; ?>
<?php $page2 = "ambPosts"; ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include_once($rootpath.'/incs/session_detect.php');
include_once($rootpath.'/classes/Ambassador.class.php');

$UsrID = $_SESSION["UsrID"];

if (isset($_GET['AID']) && $_GET['AID'] != '') {
	$AID = $_GET['AID'];
	if (isset($_SESSION["AmbEditID"]) && $_SESSION["AmbEditID"] !="") {
		$AID = $_SESSION["AmbEditID"];
		$AmbName = $_SESSION["AmbEditName"];
		$adminEdit=TRUE;
	}
}
else
{
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

<?php include '../incs/head-links.php'; ?>

<link rel="stylesheet" href="/css/userAccount.css" />
<link rel="stylesheet" href="/css/forms.css" />
<link rel="stylesheet" href="/js/jquery-ui/jquery-ui.min.css" />
<script src="/js/jquery-ui/jquery-ui.min.js"></script> 
<script src="/ambassador/js/ambProfile.js"></script> 
<script src="/ambassador/js/ambPosts.js"></script> 
</head>
<body>

	<?php include '../incs/nav.php'; ?>
    <div class="sdWrapper">
        <div class="sdContent">
			<?php include $rootpath.'/ambassador/incs/ambPostsCreate.php'; ?>
		</div>
	<?php include '../incs/footer.php'; ?>
	<?php include '../incs/footer-links.php'; ?>
	</div>
</body>
</html>