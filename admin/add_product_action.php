<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once('incs/session_detect.php');
include_once($rootpath . '/incs/conn.php');
include $rootpath . '/classes/Product.class.php';
include $rootpath . '/classes/PTemplates.class.php';
include_once($rootpath . '/core/imageUpload.class.php');

$ErrorRedirect = "add-product.php";
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
    $Product->setVar("Type", $_POST['Type']);
    if (isset($_POST['Type']) && $_POST['Type']=="Bag"){
        $Product->setVar("Height", $_POST['Height']);
        $Product->setVar("Depth", $_POST['Depth']);
        $Product->setVar("Weight", $_POST['Weight']);
        $Product->setVar("WidthCM", $_POST['WidthCM']);
        $Product->setVar("HeightCM", $_POST['HeightCM']);
        $Product->setVar("DepthCM", $_POST['DepthCM']);
        $Product->setVar("WeightKG", $_POST['WeightKG']);
    }elseif (isset($_POST['Type']) && $_POST['Type']=="Accessory") {
        $Product->setVar("AccessorySize", $_POST['AccessorySize']);
    }
    $Product->setVar("Gender", $_POST['Gender']);
    $Product->setVar("Type", $_POST['Type']);
    $Product->setVar("PrimaryMaterial", $_POST['PrimaryMaterial']);
    $Product->setVar("TID", $_POST['TID']);
    $Product->setVar("ProductName", $_POST['ProductName']);
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
    if (isset($_POST['Type']) && $_POST['Type']=="Bag"){
        if (!isset($_POST['Width']) || $_POST['Width'] == "") {
            $Product->setVar("Width", "NULL");
        } else {
            $Product->setVar("Width", $_POST['Width']);
        }
        if (!isset($_POST['Height']) || $_POST['Height'] == "") {
            $Product->setVar("Height", "NULL");
        } else {
            $Product->setVar("Height", $_POST['Height']);
        }
        if (!isset($_POST['Depth']) || $_POST['Depth'] == "") {
            $Product->setVar("Depth", "NULL");
        } else {
            $Product->setVar("Depth", $_POST['Depth']);
        }
        if (!isset($_POST['Weight']) || $_POST['Weight'] == "") {
            $Product->setVar("Weight", "NULL");
        } else {
            $Product->setVar("Weight", $_POST['Weight']);
        }
        if (!isset($_POST['WidthCM']) || $_POST['WidthCM'] == "") {
            $Product->setVar("WidthCM", "NULL");
        } else {
            $Product->setVar("WidthCM", $_POST['WidthCM']);
        }
        if (!isset($_POST['HeightCM']) || $_POST['HeightCM'] == "") {
            $Product->setVar("HeightCM", "NULL");
        } else {
            $Product->setVar("HeightCM", $_POST['HeightCM']);
        }
        if (!isset($_POST['DepthCM']) || $_POST['DepthCM'] == "") {
            $Product->setVar("DepthCM", "NULL");
        } else {
            $Product->setVar("DepthCM", $_POST['DepthCM']);
        }
        if (!isset($_POST['WeightKG']) || $_POST['WeightKG'] == "") {
            $Product->setVar("WeightKG", "NULL");
        } else {
            $Product->setVar("WeightKG", $_POST['WeightKG']);
        }
    }elseif (isset($_POST['Type']) && $_POST['Type']=="Accessory") {
        if (!isset($_POST['AccessorySize']) || $_POST['AccessorySize'] == "") {
            $Product->setVar("AccessorySize","NULL");
        }else {
            $Product->setVar("AccessorySize", $_POST['AccessorySize']);
        }
    }
    $Product->setVar("Gender", $_POST['Gender']);
    $Product->setVar("Type", $_POST['Type']);
    $Product->setVar("PrimaryMaterial", $_POST['PrimaryMaterial']);
    $Product->setVar("TID", $_POST['TID']);
    $Product->setVar("ProductName", $_POST['ProductName']);
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

$query = "delete from ColorProductRelationship where PID=" . $PID;
$dbo->doQuery($query);
$colorSel = rtrim($_POST["colors"], ",");
if (isset($colorSel) && $colorSel != "") {
    $colorsArr = explode(",", $colorSel);
    if (count($colorsArr) > 0) {
        foreach ($colorsArr as $color) {
            $query = "Insert Into ColorProductRelationship (CID,PID) values (" . $color . "," . $PID . ")";

            $dbo->doQuery($query);
        }
    }
}

$query = "delete from SizeProductRelationship where PID=" . $PID;
$dbo->doQuery($query);
$sizesSel = rtrim($_POST["sizes"], ",");
if (isset($sizesSel) && $sizesSel != "") {
    $sizesArr = explode(",", $sizesSel);
    if (count($sizesArr) > 0) {
        foreach ($sizesArr as $size) {
            $query = "Insert Into SizeProductRelationship (SID,PID) values (" . $size . "," . $PID . ")";
            echo $query;
            $dbo->doQuery($query);
        }
    }
}
//print_r($Product);
//exit();

$Product->store();

$_SESSION["er"] = "false";
header("Location: products.php");
?>
