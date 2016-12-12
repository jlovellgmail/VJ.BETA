<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/conn.php';
include $rootpath . "/classes/Cart.class.php";
include $rootpath . "/classes/Product.class.php";

$Cart = new Cart();
$Product = new Product();
$Product->initialize(10005);
$Cart->addItem($Product);



$Product2 = new Product();
$Product2->initialize(10006);
$Cart->addItem($Product2);

$Product3 = new Product();
$Product3->initialize(10007);
$Cart->addItem($Product3);

$total=0;
foreach ($Cart as $productl) {
    $product = $productl["item"];
    //$total += $productl->getVar("Price");
    echo $product->getProductName()."<br>";
    //print_r($productl);
    echo "<br><br>";
}
//echo $Cart->getTotal();


//$Cart->deleteItem($Product3);
//print_r($Cart);

?>
