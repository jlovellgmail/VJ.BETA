<?php
include_once('../incs/conn.php');
include '../classes/ProductList.class.php';

$ListObj = new ProductList();
$type = strtolower($_GET["type"]);
switch ($type) {
    case "mens":
        $List = $ListObj->getMensProducts();
        break;
    case "womens":
        $List = $ListObj->getWomensProducts();
        break;
    Case "accessories":
        $List = $ListObj->getAccessoryProducts();
        break;
    default :
        $List = $ListObj->getAllProducts();
        break;
}
?>

<div class="bgWrapper productBgWrapper">
    <!-- <h2 class="genderTitle">All <?php echo ucfirst($type); ?></h2> -->
    <div class="contentWrapper shopItemsWrapper copyPanel">
        <?php
        foreach ($List as $product) {
            $ProdImgUrl = $product->getImageUrl();
            if ($ProdImgUrl == "") {
                $ProdImgUrl = "/img/product/canvas_black_backpack.png";
            }
            $ProdPrice = number_format((float) $product->getVar("Price"), 2, '.', '');
            $ProdTitle = $product->getProductName();
            ?><a class="shopItem lg-four" href="/product.php?pid=<?php echo $product->getVar("PID"); ?>">
                <img src="<?php echo $ProdImgUrl; ?>" alt="" />
                <span class="shopItemPrice">$<?php echo $ProdPrice; ?></span>
                <span class="shopItemTitle"><?php echo $ProdTitle; ?></span>
                <span class="shopItemSubtitle"><?php echo ucfirst($collName); ?> Collection</span>
            </a><?php
        }
        ?>

    </div>
</div>

<script>
    $('.shopItemsWrapper').imagesLoaded(function () {
        // Fade in the Product images here
        $('.shopItemsWrapper').fadeTo(1000, 1);
        console.log('Mens images loaded.');
    });
</script>