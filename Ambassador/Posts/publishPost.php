<?php

$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include_once($rootpath . '/classes/Post.class.php');

if (isset($_POST["pubFlag"]) && $_POST["pubFlag"]=="true"){
    $pubFlag=1;
} else {
    $pubFlag=0;
}

if ($pubFlag == 1)
{
	$Post = new Post();
	$Post->initialize($_GET["PID"]);
	$postDate = $Post->getVar("PostDate");
	if (!isset($postDate) || $postDate == '')
	{
		$postDate = date('m/d/Y');
	}
	$ImgUrl = $Post->getVar("ImgUrl");
	$HeroImgUrl = $Post->getVar("HeroImgUrl");
	if ($ImgUrl == "" || $HeroImgUrl == "")
	{
		echo "false";
		exit();
	}
	else
	{
		$dbo = database::getInstance();
		$query = "Update Posts Set Publish=".$pubFlag.", PostDate='" . $postDate . "' where PID=".$_GET["PID"];
		$dbo->doQuery($query);
		$datePostObj = new DateTime($postDate);
      $postDate = $datePostObj->format('M d, Y');
      echo $postDate;
	}
}
else
{
	$dbo = database::getInstance();
	$query = "Update Posts Set Publish=".$pubFlag." where PID=".$_GET["PID"];
	$dbo->doQuery($query);
}
?>