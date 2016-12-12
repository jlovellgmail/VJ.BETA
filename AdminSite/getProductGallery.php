<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once('/incs/conn.php');


$PID = $_GET['PID'];
if (!isset($Product)) {
    include '/classes/Product.class.php';
    $Product = new Product();
    $Product->initialize($PID);
}

$pgallery = $Product->getProductGallery();

foreach ($pgallery as $img) {
    $ImgID = $img->getVar("ImgID");
    $ImgUrl = $img->getVar("ThumbnailUrl");
    $ImgUrl = str_replace('\\', '/', $ImgUrl);
    ?>
    <div class="col-xs-6 col-sm-4 col-md-3">
        <div class="resize-img maxw-200 mrg-0-auto">
            <div><img src="http://www.virgiljames.net<?php echo $ImgUrl; ?>" alt="" /></div>
            <div><a href="javascript:delProductImage('<?php echo $ImgID; ?>', '<?php echo $PID; ?>');">Remove</a></div>
        </div>
    </div>
    <?php
}
?>