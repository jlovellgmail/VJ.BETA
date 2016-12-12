<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath.'/incs/conn.php';
include $rootpath.'/classes/ProductList.class.php';
include $rootpath.'/classes/Product.class.php';

$ProductList = new ProductList();
$MainPID = $_GET["pid"];
if (isset($MainPID) && $MainPID != "") {
    $mainProduct = new Product();
    $mainProduct->initialize($MainPID);
    $ImgUrl = $mainProduct->getVar("ThumbnailUrl");
    $ImgUrl = str_replace('\\', '/', $ImgUrl);
    //$Name = $mainProduct->getStyleName();
    $Name = $mainProduct->getName();
    ?>
    <div class="row">
        <div class="sm-twelve">
            <h4 class="mrg-t-0 mrg-b-20"><img src="<?php echo $ImgUrl; ?>" alt="" width="75"/>
                <?php echo $Name; ?></h4>
        </div>
    </div>  
    <div class="form-group two-col-css marTop30">
        
            <input type="hidden" name="MainPID" id="MainPID" value="<?php echo $MainPID; ?>">
            <ul class="list-unstyled label-plain">
                <?php
                $products = $ProductList->getAllProductsAdmin();
                $relatedProductList = new ProductList();
                $relatedProducts = $relatedProductList->getAllRelatedProducts($MainPID);
                //We need this because the function couldn't find the first related product
                $relatedPrIds = "00000,";
                foreach ($relatedProducts as $rProduct) {
                    $relatedPrIds .= $rProduct->getVar("PID") . ",";
                }
                $relatedPrIds = rtrim($relatedPrIds, ",");
                foreach ($products as $product) {
                    $PID = $product->getVar("PID");
                    //$Name = $product->getStyleName();
                    $Name = $product->getName();
                    if ($PID <> $MainPID) {

                        if (strpos($relatedPrIds, $PID) != FALSE && strpos($relatedPrIds, $PID) > 0) {
                            $chkCkbx = "checked=''";
                        } else {
                            $chkCkbx = "";
                        }
                        ?>
                <li><label class="inputIndent"><input name="<?php echo $PID ?>_Chkbx" type="checkbox" <?php echo $chkCkbx; ?> value="<?php echo $PID ?>" /> <?php echo $Name; ?></label></li>

                        <?php
                    }
                }
                ?>
            </ul>     
        
    </div>
    <?php
}
?>

