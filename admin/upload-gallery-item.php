<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once($rootpath.'/core/imageUpload.class.php');

if (is_uploaded_file($_FILES['img']['tmp_name'])) 
{
	 $image = new imageUpload($_FILES['img']);
	
	 //print_r($image0->getLog());<img src="../uploadedImages/TeamMembers/1015_P.jpg" alt="" border="0">
	 //die();
	 if ($image->uploaded) {
		$result = $image->saveTempImg();
		  if (!$result) {
				$response = array(
				"status" => 'error',
				"message" => "Error uploading... result=false",
			  );
		  } else {
			if ($image->getWidth() < 800 || $image->getHeight() < 800)
			{
				$response = array(
					"status" => 'error',
					"message" => "The image size should be 800x800.",
				);
			}
			else
			{
					$response = array(
					"status" => 'success',
					"url" => str_replace("\\", "/", $result),
					"width" => $image->getWidth(),
					"height" => $image->getHeight()
				  );
			}
		  }
	 } else {
		  $response = array(
			"status" => 'error',
			"message" => "Error uploading... uploaded false",
		);
	 }
}
else
{
	$response = array(
		"status" => 'error',
		"message" => "Error uploading... file exists=false",
	);
}
print json_encode($response);
?>