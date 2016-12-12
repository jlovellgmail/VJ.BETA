<?php
$collName = $_GET["col"];
$lineName = $_GET["line"];
$prodType = $_GET["type"];
$colID = $_GET["colid"];
include '../../classes/Collection.class.php';
include '../../classes/Image.class.php';
$CollObj = new Collection();
$CollObj->setVar("CID", $colID);


switch (strtolower($prodType)) {
    case "mens":
        $CollProdList = $CollObj->getMenProducts();
       
        break;
    case "womens":
        $CollProdList = $CollObj->getWomenProducts();
        break;
    Case "accessories":
        $CollProdList = $CollObj->getAccessoryProducts();
        break;
    default :
        break;
}
/*
foreach ($CollProdList as $product) {
    print_r($product);
    echo "<br><br>";
}
exit();*/
?>

<div class="bgWrapper productBgWrapper">
    <!-- <h2 class="genderTitle copyPanel">All Mens Products</h2> -->
    <div class="contentWrapper shopItemsWrapper copyPanel">
        <?php foreach ($CollProdList as $product) {
            $ProdImgUrlDB = $product->getVar("ImgUrl");
            $ImgObj = new Image($ProdImgUrlDB);
            $ProdImgUrl = $ImgObj->getImageUrl();
            if (!$ImgObj->existImg()){
                $ProdImgUrl = "/img/product/canvas_black_backpack.png";
            }
            $ProdPrice = $product->getVar("Price");
            $ProdTitle = $product->getProductName();
            
        ?><a class="shopItem lg-four" href="/product.php">
                <?php ?>
                <img src="<?php echo $ProdImgUrl;?>" alt="" />
                <span class="shopItemPrice">$<?php echo $ProdPrice; ?></span>
                <span class="shopItemTitle"><?php echo $ProdTitle; ?></span>
                <span class="shopItemSubtitle"><?php echo ucfirst($collName); ?> Collection</span>
            </a><?php } ?>
    </div>
</div>

<script>
    $('.shopItemsWrapper').imagesLoaded(function () {
        // Fade in the Product images here
        $('.shopItemsWrapper').fadeTo(1000, 1);
        console.log('Mens images loaded.');
    });
</script>