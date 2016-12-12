<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once('/core/imageUpload.class.php');

if (isset($_POST["Type"]) && $_POST["Type"] == "PostHero")
{
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
				if ($image->getWidth() < 1440 || $image->getHeight() < 475)
				{
					$response = array(
						"status" => 'error',
						"message" => "The image size should be 1440x475.",
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
}
else if (isset($_POST["Type"]) && $_POST["Type"] == "Block")
{
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
				if ($image->getWidth() < 1440 || $image->getHeight() < 900)
				{
					$response = array(
						"status" => 'error',
						"message" => "The image size should be 1440x900.",
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
}
else if (isset($_POST["Type"]) && $_POST["Type"] == "PostPreview")
{
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
				if ($image->getWidth() < 240 || $image->getHeight() < 240)
				{
					$response = array(
						"status" => 'error',
						"message" => "The image size should be 240x240.",
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
}
else if (isset($_POST["Type"]) && $_POST["Type"] == "S")
{
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
}
else if (isset($_POST["Type"]) && $_POST["Type"] == "W")
{
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
				if ($image->getWidth() < 1600 || $image->getHeight() < 800)
				{
					$response = array(
						"status" => 'error',
						"message" => "The image size should be 1600x800.",
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
}
else if (isset($_POST["Type"]) && $_POST["Type"] == "T")
{
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
				if ($image->getWidth() < 800 || $image->getHeight() < 1600)
				{
					$response = array(
						"status" => 'error',
						"message" => "The image size should be 800x1600.",
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
}
else
{
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
	            $response = array(
					"status" => 'success',
					"url" => str_replace("\\", "/", $result),
					"width" => $image->getWidth(),
					"height" => $image->getHeight()
				  );
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
}
//echo $response;
print json_encode($response);
?>