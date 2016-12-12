<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once('/incs/conn.php');
include '/classes/ProductImage.class.php';
include_once('/core/imageUpload.class.php');

$PID = $_GET['PID'];

if (isset($_FILES['ImgUrl']) && is_uploaded_file($_FILES['ImgUrl']['tmp_name'])) {
    $image = new imageUpload($_FILES['ImgUrl']);

    if ($image->uploaded) {
        $result = $image->saveProductGal();
        $resultThumb = $image->saveProductGalThumb();
        if (!$result) {
            echo $result;
            die();
        } else {
            $ProductImg = new ProductImage();

            $ProductImg->setVar("PID", $PID);
            $ProductImg->setVar("ImgUrl", $result);
            $ProductImg->setVar("ThumbnailUrl", $resultThumb);
            $ProductImg->store();
        }
    }
}
?>