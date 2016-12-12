<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');


$PID = $_GET['PID'];
if (!isset($Product)) {
    include $rootpath.'/classes/Product.class.php';
    $Product = new Product();
    $Product->initialize($PID);
}

$pgallery = $Product->getProductGallery();

foreach ($pgallery as $img) {
    $ImgID = $img->getVar("ImgID");
    $ImgUrl = $img->getVar("ThumbnailUrl");
    $ImgUrl = str_replace('\\', '/', $ImgUrl);
    ?>
    <div class="sm-four md-three">
        <div class="flexImage marBottom15">
            <div><img src="<?php echo $ImgUrl; ?>" alt="" /></div>
            <div><a href="javascript:delProductImage('<?php echo $ImgID; ?>', '<?php echo $PID; ?>', 'G');">Remove</a></div>
        </div>
    </div>
    <?php
}
?>