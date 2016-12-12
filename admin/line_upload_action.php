<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Line.class.php';
include_once($rootpath.'/core/imageUpload.class.php');

$LID = $_GET['LID'];

if (isset($_FILES['ImgUrl']) && is_uploaded_file($_FILES['ImgUrl']['tmp_name'])) {	
    $image = new imageUpload($_FILES['ImgUrl']);

    if ($image->uploaded) {
        $result = $image->saveOriginal();
        if (!$result) {
            echo $result;
            die();
        } else {
			if (isset($LID) && !$LID == '') {
			    $line = new Line();
			    $line->initialize($LID);
			
			    $line->setVar("ImgUrl", $result);
				$line->store();
			}
			
            echo $result;
        }
    }
}
?>