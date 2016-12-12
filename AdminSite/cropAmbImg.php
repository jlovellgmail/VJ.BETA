<?php
$accessLevel = 50;
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/session_detect.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once($rootpath.'/core/imageUpload.class.php');
include_once($rootpath.'/classes/Ambassador.class.php');

$rootp = $_SERVER['DOCUMENT_ROOT'];

$AID = $_POST['AID'];
$Type = $_POST['Type'];

$tmpPath = "";
$imgUrl = $_POST['imgUrl'];
$imgUrl = $rootp . $imgUrl;
$imgW = $_POST['imgW'];
$imgH = $_POST['imgH'];
$imgY1 = $_POST['imgY1'];
$imgX1 = $_POST['imgX1'];

if ($Type == "Return")
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
        	$result = $image->cropAdminSquare($AID, $imgW, $imgH, $imgX1, $imgY1);
	        if (!$result) {
	            $response = array(
					"status" => 'error',
					"message" => "Error uploading croped...",
				  );
	        } else {
	            $response = array(
					"status" => 'success',
					"url" => 'http://www.virgiljames.net'.$result,
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
        	$result = $image->cropNewsEvents2($AID, $imgW, $imgH, $imgX1, $imgY1);
	        if (!$result) {
	            $response = array(
					"status" => 'error',
					"message" => "Error uploading croped...",
				  );
	        } else {
	            $response = array(
					"status" => 'success',
					"url" => $result,
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
        	$result = $image->cropPostHero($AID, $imgW, $imgH, $imgX1, $imgY1);
	        if (!$result) {
	            $response = array(
					"status" => 'error',
					"message" => "Error uploading croped...",
				  );
	        } else {
	            $response = array(
					"status" => 'success',
					"url" => $result,
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

//unlink($rootp . $tmpPath);
//unlink($rootp . $imgUrl);
print json_encode($response);
?>