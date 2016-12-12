<?php 
$rootpath = $_SERVER['DOCUMENT_ROOT'];
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once($rootpath.'/core/imageUpload.class.php');

if (is_uploaded_file($_FILES['img']['tmp_name'])) 
{
	if (!is_array($_FILES['img']['tmp_name']))
	{
		$image = new imageUpload($_FILES['img']);

		if ($image->uploaded) {
			$result = $image->saveTempImg();
			
			if (!$result) {
				header('HTTP/1.1 500 Server Error');
				header('Content-Type: application/json; charset=UTF-8');
				die(json_encode(array('message' => 'Error', 'code' => 1337)));
			}
			else
			{
				if ($image->getWidth() < 1440 || $image->getHeight() < 900)
				{
					header('HTTP/1.1 500 Minimum size should be at least 1440x900.');
					header('Content-Type: application/json; charset=UTF-8');
					die(json_encode(array('message' => 'Minimum size should be at least 1440x900.')));
				}
				else
				{
					echo $result;
				}
			}
		} 
		else 
		{
			echo "An unknown error occurred, please try again.";
		}
	}
	else
	{
		$filecount = count($_FILES['img']['tmp_name']);
		for ($i=0; $i < $filecount; $i++)
		{
			$image = new imageUpload($_FILES['img']);

			if ($image->uploaded) {
				$result = $image->saveTempImg();
				
				if (!$result) {
					header('HTTP/1.1 500 Server Error');
					header('Content-Type: application/json; charset=UTF-8');
  					die(json_encode(array('message' => 'Error', 'code' => 1337)));
				}
				else
				{
					if ($image->getWidth() < 1440 || $image->getHeight() < 900)
					{
						header('HTTP/1.1 500 Minimum size should be at least 1440x900.');
						header('Content-Type: application/json; charset=UTF-8');
						die(json_encode(array('message' => 'Minimum size should be at least 1440x900.')));
					}
					else
					{
						echo $result;
					}
				}
			} 
			else 
			{
				echo "An unknown error occurred, please try again.";
			}
		}
	}
}
?>