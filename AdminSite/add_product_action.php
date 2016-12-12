<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
include_once('/incs/session_detect.php');
include_once('/incs/conn.php');
include '/classes/Product.class.php';
include '/classes/PTemplates.class.php';
include_once('/core/imageUpload.class.php');

$ErrorRedirect = "/add_product.php";
$PID = $_GET['PID'];

if (empty($_POST)) {
    $_SESSION["er"] = "e";
    header("Location: " . $ErrorRedirect);
    exit();
}


$Product = new Product();

if (!isset($PID) || $PID == '') {
    $Product->setVar("LID", $_POST['LID']);
    $Product->setVar("CID", $_POST['CID']);
    $Product->setVar("SID", $_POST['SID']);
    $Product->setVar("Price", $_POST['Price']);
    $Product->setVar("ShortDescription", $_POST['ShortDescription']);
    $Product->setVar("Description", $_POST['Description']);
    $Product->setVar("Width", $_POST['Width']);
    $Product->setVar("Height", $_POST['Height']);
    $Product->setVar("Depth", $_POST['Depth']);
    $Product->setVar("Weight", $_POST['Weight']);
    $Product->setVar("WidthCM", $_POST['WidthCM']);
    $Product->setVar("HeightCM", $_POST['HeightCM']);
    $Product->setVar("DepthCM", $_POST['DepthCM']);
    $Product->setVar("WeightKG", $_POST['WeightKG']);
    $Product->setVar("Gender", $_POST['Gender']);
    $Product->setVar("Type", $_POST['Type']);
    $Product->setVar("PrimaryMaterial", $_POST['PrimaryMaterial']);
    $Product->store();

    $PID = $Product->getVar("PID");

    $query = "{call F_GetCTemplates (@CID=:CID)}";
    $param = array(":CID" => $_POST['CID']);
    $dbo->doQueryParam($query, $param);
    $ctemplates = $dbo->loadObjectList();

    if ($dbo->getRows() > 0) {
        foreach ($ctemplates as $ctemplate) {
            $CID = $ctemplate["CID"];
            $CTID = $ctemplate["CTID"];
            $Name = $ctemplate["Name"];
            $ImgUrl = $ctemplate["ImgUrl"];
            $ImgUrl = str_replace('\\', '/', $ImgUrl);

            $PTemplates = new PTemplates();
            $PTemplates->setVar("PID", $PID);
            $PTemplates->setVar("Name", $ctemplate["Name"]);
            $PTemplates->setVar("Description", $ctemplate["Description"]);
            $PTemplates->setVar("ImgUrl", $ctemplate["ImgUrl"]);
            $PTemplates->store();
        }
    }
} else {
    $Product->initialize($PID);
    $Product->setVar("LID", $_POST['LID']);
    $Product->setVar("CID", $_POST['CID']);
    $Product->setVar("SID", $_POST['SID']);
    $Product->setVar("Price", $_POST['Price']);
    $Product->setVar("ShortDescription", $_POST['ShortDescription']);
    $Product->setVar("Description", $_POST['Description']);
    $Product->setVar("Width", $_POST['Width']);
    $Product->setVar("Height", $_POST['Height']);
    $Product->setVar("Depth", $_POST['Depth']);
    $Product->setVar("Weight", $_POST['Weight']);
    $Product->setVar("WidthCM", $_POST['WidthCM']);
    $Product->setVar("HeightCM", $_POST['HeightCM']);
    $Product->setVar("DepthCM", $_POST['DepthCM']);
    $Product->setVar("WeightKG", $_POST['WeightKG']);
    $Product->setVar("Gender", $_POST['Gender']);
    $Product->setVar("Type", $_POST['Type']);
    $Product->setVar("PrimaryMaterial", $_POST['PrimaryMaterial']);
}

if (isset($_FILES['ImgUrl']) && is_uploaded_file($_FILES['ImgUrl']['tmp_name'])) {
    $image = new imageUpload($_FILES['ImgUrl']);

    if ($image->uploaded) {
        $result = $image->saveProduct();
        $resultThumb = $image->saveProductThumb();
        if (!$result) {
            echo $result;
            die();
        } else {
            $Product->setVar("ImgUrl", $result);
            $Product->setVar("ThumbnailUrl", $resultThumb);
        }
    }
}

//print_r($Product);
//exit();

$Product->store();

$_SESSION["er"] = "false";
header("Location: /products.php");
?>
