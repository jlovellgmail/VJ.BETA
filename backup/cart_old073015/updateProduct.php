<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/conn.php';
include $rootpath . "/classes/Cart.class.php";
include $rootpath . "/classes/Product.class.php";

$inputElement =  rtrim($_POST["allInput"],"&");

//$PID = $_GET["pid"];
session_start();
if (isset($_SESSION["Cart"])) {
    $Cart = $_SESSION["Cart"];
    $InputArr = explode("&", $inputElement);
    foreach ($InputArr as $InpBox){
        $tmpArr = explode("=",$InpBox);
        $tmpInpNameArr = explode("_",$tmpArr[0]);
        $PID = $tmpInpNameArr[1];
        $PQty = $tmpArr[1]; 
        $Product = new Product();
        $Product->initialize($PID);
        $Cart->updateItem($Product,$PQty);
    }
    
    
    $_SESSION["Cart"] = $Cart;
} 


header("Location: /cart/");
?>

