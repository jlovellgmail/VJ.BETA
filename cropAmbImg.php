<?php
$accessLevel = 50;
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/session_detect.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once($rootpath.'/core/imageUpload.class.php');
include_once($rootpath.'/classes/Ambassador.class.php');

$rootp = $_SERVER['DOCUMENT_ROOT'];

if ($_SESSION["UsrPriv"] >= 90 && ($_POST['AID'] == '' || $_POST['AID'] == 0))
{
	$UsrID = $_SESSION["UsrID"];
	$isAdmin = true;
	$FName = '';
	$AID = $_POST['AID'];
	$Type = $_POST['Type'];
}
else
{
	$AID = $_POST['AID'];
	$Type = $_POST['Type'];

	$Ambassador = new Ambassador();
	$Ambassador->initialize($AID);
	$UsrID = $Ambassador->getVar('UsrID');
	$isAdmin = false;
	$FName = $Ambassador->getFName();
}

$tmpPath = "";
$imgUrl = $_POST['imgUrl'];
$imgUrl = $rootp . $imgUrl;
$imgW = $_POST['imgW'];
$imgH = $_POST['imgH'];
$imgY1 = $_POST['imgY1'];
$imgX1 = $_POST['imgX1'];

if ($Type == "P")
{	
    $image = new imageUpload($imgUrl);

		$tmpPath = $image->resizeImage($imgW, $imgH);
		if (!$tmpPath) {
            $response = array(
				"status" => 'error',
				"message" => "Error uploading temp...",
			  );
        } else {
			$tmpPath = $rootp . $tmpPath;
			$image = new imageUpload($tmpPath);
        	$result = $image->cropProfile($UsrID, $imgW, $imgH, $imgX1, $imgY1, $FName);
	        if (!$result) {
	            $response = array(
					"status" => 'error',
					"message" => "Error uploading croped...",
				  );
	        } else {
				if ($Ambassador->getVar("ProfileImg") != "")
				{
					if (file_exists($rootp . $Ambassador->getVar("ProfileImg"))){
						unlink($rootp . $Ambassador->getVar("ProfileImg"));
					}
				}
				$Ambassador->setVar("ProfileImg", $result);
	            $response = array(
					"status" => 'success',
					"url" => str_replace("\\", "/", $result),
					"width" => $image->getWidth(),
					"height" => $image->getHeight(),
					"imgW" => $imgW,
					"imgH" => $imgH,
					"imgX1" => $imgX1,
					"imgY1" => $imgY1
				  );
	        }
        }
}
elseif ($Type == "PP")
{	
    $image = new imageUpload($imgUrl);

		$tmpPath = $image->resizeProfilePrevImage($imgW, $imgH);
		if (!$tmpPath) {
            $response = array(
				"status" => 'error',
				"message" => "Error uploading temp...",
			  );
        } else {
			$tmpPath = $rootp . $tmpPath;
			$image = new imageUpload($tmpPath);
        	$result = $image->cropProfilePrev($UsrID, $imgW, $imgH, $imgX1, $imgY1, $FName);
	        if (!$result) {
	            $response = array(
					"status" => 'error',
					"message" => "Error uploading croped...",
				  );
	        } else {
				if ($Ambassador->getVar("ProfilePrevImg") != "")
				{
					if (file_exists($rootp . $Ambassador->getVar("ProfilePrevImg"))){
						unlink($rootp . $Ambassador->getVar("ProfilePrevImg"));
					}
				}
				$Ambassador->setVar("ProfilePrevImg", $result);
	            $response = array(
					"status" => 'success',
					"url" => str_replace("\\", "/", $result),
					"width" => $image->getWidth(),
					"height" => $image->getHeight(),
					"imgW" => $imgW,
					"imgH" => $imgH,
					"imgX1" => $imgX1,
					"imgY1" => $imgY1
				  );
	        }
        }
}
elseif ($Type == "Return")
{	
    $image = new imageUpload($imgUrl);

		$tmpPath = $image->resizeImage($imgW, $imgH);
		if (!$tmpPath) {
            $response = array(
				"status" => 'error',
				"message" => "Error uploading temp...",
			  );
        } else {
			$tmpPath = $rootp . $tmpPath;
			$image = new imageUpload($tmpPath);
        	$result = $image->cropSquare($UsrID, $imgW, $imgH, $imgX1, $imgY1, $isAdmin, $FName);
	        if (!$result) {
	            $response = array(
					"status" => 'error',
					"message" => "Error uploading croped...",
				  );
	        } else {
	            $response = array(
					"status" => 'success',
					"url" => str_replace("\\", "/", $result),
					"width" => $image->getWidth(),
					"height" => $image->getHeight(),
					"imgW" => $imgW,
					"imgH" => $imgH,
					"imgX1" => $imgX1,
					"imgY1" => $imgY1
				  );
	        }
        }
}
elseif ($Type == "Favorite")
{	
    $image = new imageUpload($imgUrl);

		$tmpPath = $image->resizeImage($imgW, $imgH);
		if (!$tmpPath) {
            $response = array(
				"status" => 'error',
				"message" => "Error uploading temp...",
			  );
        } else {
			$tmpPath = $rootp . $tmpPath;
			$image = new imageUpload($tmpPath);
        	$result = $image->cropSquareFavorite($UsrID, $imgW, $imgH, $imgX1, $imgY1, $FName);
	        if (!$result) {
	            $response = array(
					"status" => 'error',
					"message" => "Error uploading croped...",
				  );
	        } else {
	            $response = array(
					"status" => 'success',
					"url" => str_replace("\\", "/", $result),
					"width" => $image->getWidth(),
					"height" => $image->getHeight(),
					"imgW" => $imgW,
					"imgH" => $imgH,
					"imgX1" => $imgX1,
					"imgY1" => $imgY1
				  );
	        }
        }
}
elseif ($Type == "News" || $Type == "Event")
{	
    $image = new imageUpload($imgUrl);

		$tmpPath = $image->resizeEventsImage($imgW, $imgH);
		if (!$tmpPath) {
            $response = array(
				"status" => 'error',
				"message" => "Error uploading temp...",
			  );
        } else {
			$tmpPath = $rootp . $tmpPath;
			$image = new imageUpload($tmpPath);
        	$result = $image->cropNewsEvents2($UsrID, $imgW, $imgH, $imgX1, $imgY1, $isAdmin, $FName);
	        if (!$result) {
	            $response = array(
					"status" => 'error',
					"message" => "Error uploading croped...",
				  );
	        } else {
	            $response = array(
					"status" => 'success',
					"url" => str_replace("\\", "/", $result),
					"width" => $image->getWidth(),
					"height" => $image->getHeight(),
					"imgW" => $imgW,
					"imgH" => $imgH,
					"imgX1" => $imgX1,
					"imgY1" => $imgY1
				  );
	        }
        }
}
elseif ($Type == "PostHero")
{	
    $image = new imageUpload($imgUrl);

		$tmpPath = $image->resizeHeroImage($imgW, $imgH);
		if (!$tmpPath) {
            $response = array(
				"status" => 'error',
				"message" => "Error uploading temp...",
			  );
        } else {
			$tmpPath = $rootp . $tmpPath;
			$image = new imageUpload($tmpPath);
        	$result = $image->cropPostHero($UsrID, $imgW, $imgH, $imgX1, $imgY1, $isAdmin, $FName);
	        if (!$result) {
	            $response = array(
					"status" => 'error',
					"message" => "Error uploading croped...",
				  );
	        } else {
	            $response = array(
					"status" => 'success',
					"url" => str_replace("\\", "/", $result),
					"width" => $image->getWidth(),
					"height" => $image->getHeight(),
					"imgW" => $imgW,
					"imgH" => $imgH,
					"imgX1" => $imgX1,
					"imgY1" => $imgY1
				  );
	        }
        }
}
elseif ($Type == "PostPreview")
{	
    $image = new imageUpload($imgUrl);

		$tmpPath = $image->resizePostPreview($imgW, $imgH);
		if (!$tmpPath) {
            $response = array(
				"status" => 'error',
				"message" => "Error uploading temp...",
			  );
        } else {
			$tmpPath = $rootp . $tmpPath;
			$image = new imageUpload($tmpPath);
        	$result = $image->cropPostPreview($UsrID, $imgW, $imgH, $imgX1, $imgY1, $isAdmin, $FName);
	        if (!$result) {
	            $response = array(
					"status" => 'error',
					"message" => "Error uploading croped...",
				  );
	        } else {
	            $response = array(
					"status" => 'success',
					"url" => str_replace("\\", "/", $result),
					"width" => $image->getWidth(),
					"height" => $image->getHeight(),
					"imgW" => $imgW,
					"imgH" => $imgH,
					"imgX1" => $imgX1,
					"imgY1" => $imgY1
				  );
	        }
        }
}
elseif ($Type == "Block")
{	
    $image = new imageUpload($imgUrl);

		$tmpPath = $image->resizeBlockImage($imgW, $imgH);
		if (!$tmpPath) {
            $response = array(
				"status" => 'error',
				"message" => "Error uploading temp...",
			  );
        } else {
			$tmpPath = $rootp . $tmpPath;
			$image = new imageUpload($tmpPath);
        	$result = $image->cropBlockImage($UsrID, $imgW, $imgH, $imgX1, $imgY1, $isAdmin, $FName);
	        if (!$result) {
	            $response = array(
					"status" => 'error',
					"message" => "Error uploading croped...",
				  );
	        } else {
	            $response = array(
					"status" => 'success',
					"url" => str_replace("\\", "/", $result),
					"width" => $image->getWidth(),
					"height" => $image->getHeight(),
					"imgW" => $imgW,
					"imgH" => $imgH,
					"imgX1" => $imgX1,
					"imgY1" => $imgY1
				  );
	        }
        }
}
elseif ($Type == "BlockSlideshow")
{	
    $image = new imageUpload($imgUrl);

		$tmpPath = $image->resizeBlockImage($imgW, $imgH);
		if (!$tmpPath) {
            $response = array(
				"status" => 'error',
				"message" => "Error uploading temp...",
			  );
        } else {
			$tmpPath = $rootp . $tmpPath;
			$image = new imageUpload($tmpPath);
        	$result = $image->cropBlockSlideshowImage($UsrID, $imgW, $imgH, $imgX1, $imgY1, $isAdmin, $FName);
	        if (!$result) {
	            $response = array(
					"status" => 'error',
					"message" => "Error uploading croped...",
				  );
	        } else {
	            $response = array(
					"status" => 'success',
					"url" => str_replace("\\", "/", $result),
					"width" => $image->getWidth(),
					"height" => $image->getHeight(),
					"imgW" => $imgW,
					"imgH" => $imgH,
					"imgX1" => $imgX1,
					"imgY1" => $imgY1
				  );
	        }
        }
}
elseif ($Type == "S" || $Type == "W" || $Type == "T")
{	
    $image = new imageUpload($imgUrl);

		$tmpPath = $image->resizeInspirationImage($imgW, $imgH);
		if (!$tmpPath) {
            $response = array(
				"status" => 'error',
				"message" => "Error uploading temp...",
			  );
        } else {
			$tmpPath = $rootp . $tmpPath;
			$image = new imageUpload($tmpPath);
			if ($Type == "S")
			{
        		$result = $image->cropInspSquareImage($UsrID, $imgW, $imgH, $imgX1, $imgY1, $isAdmin, $FName);
        	}
        	else if ($Type == "W")
        	{
        		$result = $image->cropInpsWideImage($UsrID, $imgW, $imgH, $imgX1, $imgY1, $isAdmin, $FName);
        	}
        	else if ($Type == "T")
        	{
        		$result = $image->cropInspTallImage($UsrID, $imgW, $imgH, $imgX1, $imgY1, $isAdmin, $FName);
        	}
	        if (!$result) {
	            $response = array(
					"status" => 'error',
					"message" => "Error uploading croped...",
				  );
	        } else {
	            $response = array(
					"status" => 'success',
					"url" => str_replace("\\", "/", $result),
					"width" => $image->getWidth(),
					"height" => $image->getHeight(),
					"imgW" => $imgW,
					"imgH" => $imgH,
					"imgX1" => $imgX1,
					"imgY1" => $imgY1
				  );
	        }
        }
}

if ($Type != "PostHero" && $Type != "News" && $Type != "Event" && $Type != "Return" && $Type != "Block" && $Type != "BlockSlideshow" && $Type != "PostPreview")
{
	$Ambassador->store();
}
unlink($tmpPath);
unlink($imgUrl);
print json_encode($response);
?>