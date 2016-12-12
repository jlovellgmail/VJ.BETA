<?php 
$accessLevel = 50;
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/session_detect.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once($rootpath . '/incs/conn.php');
include_once($rootpath . '/core/imageUpload.class.php');
include $rootpath . '/classes/Ambassador.class.php';
include $rootpath . '/classes/AmbassadorImage.class.php';
$dbo = database::getInstance();

$AID = $_GET['AID'];
$imgType = $_GET['Type'];

$Ambassador = new Ambassador();
$Ambassador->initialize($AID);
$UsrID = $Ambassador->getVar('UsrID');
$FName = $Ambassador->getFName();

if ($imgType == "PH")
{
	if (isset($_FILES['ProfileHeroImage']['tmp_name']))
	{
		if (is_uploaded_file($_FILES['ProfileHeroImage']['tmp_name'])) {
		    $image = new imageUpload($_FILES['ProfileHeroImage']);
		
		    if ($image->uploaded) {
				$result = $image->saveProfileHero($UsrID, $FName);
		        if (!$result) {
		            echo str_replace("\\", "/", $result);
		            die();
		        } else {
					echo str_replace("\\", "/", $result);
		            $Ambassador->setVar("ProfileHeroImg", $result);
		        }
		    } else {
		        header("Location: " . $ErrorRedirect . "er=img&msg=0tmpFailed$image->error");
		    }
		}
	}
}
else if ($imgType == "PS")
{
	if (isset($_FILES['ProfileSlideshowImage']['tmp_name']))
	{
		if (is_uploaded_file($_FILES['ProfileSlideshowImage']['tmp_name'])) {
	        $image2 = new imageUpload($_FILES['ProfileSlideshowImage']);
	
	        if ($image2->uploaded) {
				$result2 = $image2->saveProfileSlideshow($UsrID, $FName);
	            if (!$result2) {
	                echo str_replace("\\", "/", $result2);
	                die();
	            } else {
					echo str_replace("\\", "/", $result2);
					$AmbassadorImage = new AmbassadorImage();
					$AmbassadorImage->setVar("AID", $AID);
					$AmbassadorImage->setVar("ImgUrl", $result2);
	                $AmbassadorImage->store();
	            }
	        } else {
	            header("Location: " . $ErrorRedirect . "er=img&msg=0tmpFailed$image2->error");
	        }
	    }
	}
}
else if ($imgType == "POH")
{
	if (isset($_FILES['PostHeroImage']['tmp_name']))
	{
		if (is_uploaded_file($_FILES['PostHeroImage']['tmp_name'])) {
	        $image2 = new imageUpload($_FILES['PostHeroImage']);
	
	        if ($image2->uploaded) {
				$result2 = $image2->savePostHero($AID);
	            if (!$result2) {
	                echo str_replace("\\", "/", $result2);
	                die();
	            } else {
					echo str_replace("\\", "/", $result2);
	            }
	        } else {
	            header("Location: " . $ErrorRedirect . "er=img&msg=0tmpFailed$image2->error");
	        }
	    }
	}
}
$Ambassador->store();
?>