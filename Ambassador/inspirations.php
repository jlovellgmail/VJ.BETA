<!doctype html>

<?php $page = "userAccount"; ?>
<?php $page2 = "ambInspirations"; ?>
<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include_once($rootpath . '/classes/Ambassador.class.php');
include_once($rootpath.'/incs/session_detect.php');
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

		<?php include '../incs/head-links.php'; ?>

        <link rel="stylesheet" href="/css/userAccount.css" />
        <link rel="stylesheet" href="/css/ambassadors.css" />
        <link rel="stylesheet" href="/css/ca-ambassador-grid.css" />
        <link rel="stylesheet" href="/css/forms.css" />
        <link rel="stylesheet" href="/css/tables.css" />
        <link rel="stylesheet" href="/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="/css/lifestyle.css">
        <script src="/js/jquery-ui/jquery-ui.min.js"></script> 
        <script src="/Ambassador/js/ambFavorite.js"></script> 
		<script src="/js/jquery.tablesorter.js" type="text/javascript"></script>
    </head>
    <body>

		<?php include '../incs/nav.php'; ?>
        <div class="sdWrapper">
            <div class="sdContent">
			<?php include '../ambassador/incs/inspirations.php'; ?>
        	</div>
		<?php include '../incs/footer.php'; ?>
            
            
            
                    <?php include '../incs/footer-links.php'; ?>
		</div>

	<script>
		//JS FIX FOR UNEVEN COLUMN HEIGHTS ... DIFFICULT WITH JUST CSS -> DYNAMIC / RESPONSIVE NATURE OF THE LAYOUT
			$(window).on("load resize scroll",function(e){
				var heights = $(".eqHeightJs").map(function() {
					return $(this).height();
				}).get(),
				maxHeight = Math.max.apply(null, heights);
				$(".eqHeightJs").height(maxHeight);
				$(".eqHeightJs").css("display" , "inline-block");
			});	
			$(document).ready(function ()
	        {
	            $("#productTbl").tablesorter();
	        });
    </script>

            
    </body>
</html>

