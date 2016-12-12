<?php
$accessLevel = 50;
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/session_detect.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once($rootpath.'/core/imageUpload.class.php');

$tmpPath = "";
$imgUrl = $_POST['imgUrl'];
$imgUrl = $rootpath . $imgUrl;
$imgW = $_POST['imgW'];
$imgH = $_POST['imgH'];
$imgY1 = $_POST['imgY1'];
$imgX1 = $_POST['imgX1'];

$image = new imageUpload($imgUrl);

$tmpPath = $image->resizeGalleryItem($imgW, $imgH);
if (!$tmpPath) {
		$response = array(
			"status" => 'error',
			"message" => "Error uploading temp...",
  		);
} else {
	$tmpPath = $rootp . $tmpPath;
	$image = new imageUpload($tmpPath);
	$result = $image->cropGalleryItem($imgW, $imgH, $imgX1, $imgY1);
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

unlink($tmpPath);
unlink($imgUrl);
print json_encode($response);

?>