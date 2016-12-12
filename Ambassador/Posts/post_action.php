<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Post.class.php';
include $rootpath.'/classes/PostBlock.class.php';
include $rootpath.'/classes/PostSlideshow.class.php';

$PID = $_GET['PID'];
$AID = $_GET['AID'];

if (isset($PID) && !$PID == '')
{
	$Post = new Post();
	$Post->initialize($PID);
	$Post->setVar("Title", $_POST['Title']);
	if ($_POST['SubTitle'] == "")
	{
		$Post->setVar("SubTitle", "NULL");
	}
	else
	{
		$Post->setVar("SubTitle", $_POST['SubTitle']);
	}
	$Post->setVar("ImgUrl", $_POST['postImg']);
	$Post->setVar("HeroImgUrl", $_POST['postHeroImg']);
	$Post->setVar("Type", $_POST['Type']);
	$Post->store();
	
	foreach ($_POST['Block'] as $block)
	{
		if (isset($block["PBID"]) && $block["PBID"] != "")
		{
			$PostBlock = new PostBlock();
			$PostBlock->initialize($block["PBID"]);
			if ($block["BlockContent"] == "") {
				$PostBlock->setVar("BlockContent", "NULL");
			} else {
				$PostBlock->setVar("BlockContent", $block["BlockContent"]);
			}
			$PostBlock->setVar("MediaType", $block["MediaType"]);
			if ($block["MediaType"] == "I")
			{
				$PostBlock->setVar("ImgUrl", $block["ImgUrl"]);
				if ($block["ImgTitle"] == "") {
					$PostBlock->setVar("Title", "NULL");
				} else {
					$PostBlock->setVar("Title", $block["ImgTitle"]);
				}
				if ($block["ImgCaption"] == "") {
					$PostBlock->setVar("Caption", "NULL");
				} else {
					$PostBlock->setVar("Caption", $block["ImgCaption"]);
				}
				if ($block["ImgCredit"] == "") {
					$PostBlock->setVar("Credit", "NULL");
				} else {
					$PostBlock->setVar("Credit", $block["ImgCredit"]);
				}
			}
			else
			{
				$PostBlock->setVar("ImgUrl", "NULL");
			}
			if ($block["MediaType"] == "S")
			{
				$PostBlock->setVar("Title", $block["SlideshowTitle"]);
				foreach ($block["Slideshow"] as $slide)
				{
					if (isset($slide["PSID"]) && $slide["PSID"] != "")
					{
						$PostSlideshow = new PostSlideshow();
						$PostSlideshow->initialize($slide["PSID"]);
						if ($slide["Caption"] == "") {
							$PostSlideshow->setVar("Caption", "NULL");
						} else {
							$PostSlideshow->setVar("Caption", $slide["Caption"]);
						}
						if ($slide["Credit"] == "") {
							$PostSlideshow->setVar("Credit", "NULL");
						} else {
							$PostSlideshow->setVar("Credit", $slide["Credit"]);
						}
						$PostSlideshow->store();
					}
					else
					{
						if ($slide["ImgUrl"] != "")
						{
							$PostSlideshow = new PostSlideshow();
							$PostSlideshow->setVar("PBID", $block["PBID"]);
							$PostSlideshow->setVar("ImgUrl", $slide["ImgUrl"]);
							$PostSlideshow->setVar("Caption", $slide["Caption"]);
							$PostSlideshow->setVar("Credit", $slide["Credit"]);
							$PostSlideshow->store();
						}
					}
				}
			}
			if ($block["MediaType"] == "V")
			{
				if ($block["VideoUrl"] == "") {
					$PostBlock->setVar("VideoUrl", "NULL");
				} else {
					$PostBlock->setVar("VideoUrl", $block["VideoUrl"]);
				}
				if ($block["VidTitle"] == "") {
					$PostBlock->setVar("Title", "NULL");
				} else {
					$PostBlock->setVar("Title", $block["VidTitle"]);
				}
				if ($block["VidCaption"] == "") {
					$PostBlock->setVar("Caption", "NULL");
				} else {
					$PostBlock->setVar("Caption", $block["VidCaption"]);
				}
				if ($block["VidCredit"] == "") {
					$PostBlock->setVar("Credit", "NULL");
				} else {
					$PostBlock->setVar("Credit", $block["VidCredit"]);
				}
			}
			else
			{
				$PostBlock->setVar("VideoUrl", "NULL");
			}
			
			$PostBlock->store();
		}
		else
		{
			$PostBlock = new PostBlock();
			$PostBlock->setVar("PID", $PID);
			$PostBlock->setVar("BlockContent", $block["BlockContent"]);
			$PostBlock->setVar("MediaType", $block["MediaType"]);
			$PostBlock->store();
			$PBID = $PostBlock->getVar("PBID");
			if ($block["MediaType"] == "I")
			{
				$PostBlock->setVar("Title", $block["ImgTitle"]);
				$PostBlock->setVar("Caption", $block["ImgCaption"]);
				$PostBlock->setVar("Credit", $block["ImgCredit"]);
			}
			else if ($block["MediaType"] == "S")
			{
				$PostBlock->setVar("Title", $block["SlideshowTitle"]);
				foreach ($block["Slideshow"] as $slide)
				{
					if (isset($slide["PSID"]) && $slide["PSID"] != "")
					{
						$PostSlideshow = new PostSlideshow();
						$PostSlideshow->initialize($slide["PSID"]);
						$PostSlideshow->setVar("Caption", $slide["Caption"]);
						$PostSlideshow->setVar("Credit", $slide["Credit"]);
						$PostSlideshow->store();
					}
					else
					{
						if ($slide["ImgUrl"] != "")
						{
							$PostSlideshow = new PostSlideshow();
							$PostSlideshow->setVar("PBID", $PBID);
							$PostSlideshow->setVar("ImgUrl", $slide["ImgUrl"]);
							$PostSlideshow->setVar("Caption", $slide["Caption"]);
							$PostSlideshow->setVar("Credit", $slide["Credit"]);
							$PostSlideshow->store();
						}
					}
				}
			}
			else if ($block["MediaType"] == "V")
			{
				$PostBlock->setVar("Title", $block["VidTitle"]);
				$PostBlock->setVar("Caption", $block["VidCaption"]);
				$PostBlock->setVar("Credit", $block["VidCredit"]);
			}
			$PostBlock->setVar("ImgUrl", $block["ImgUrl"]);
			$PostBlock->setVar("VideoUrl", $block["VideoUrl"]);
			$PostBlock->store();
		}
	}
}
else
{
	$Post = new Post();
	$Post->setVar("AID", $AID);
	$Post->setVar("Title", $_POST['Title']);
	$Post->setVar("SubTitle", $_POST['SubTitle']);
	$Post->setVar("ImgUrl", $_POST['postImg']);
	$Post->setVar("HeroImgUrl", $_POST['postHeroImg']);
	$Post->setVar("Type", $_POST['Type']);
	$Post->store();
	$PID = $Post->getVar("PID");
}

if ($AID == 0)
{
	header("Location: /admin/add_post.php?PID=" . $PID . "&type=".$_POST['Type']);
}
else
{
	header("Location: /ambassador/posts/add_post.php?PID=" . $PID);
}
?>