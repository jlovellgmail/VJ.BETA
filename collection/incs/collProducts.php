<?php
$collName = $_GET["col"];
$lineName = $_GET["line"];


 $CollProdList = $CollObj->getProducts();
 $CollProductsFromTags = $CollObj->getProductsFromTags();
?>
<div class="bgWrapper productBgWrapper">
    <div class="widthWrapper">
        <?php
        foreach ($CollProdList as $product) {
            $ProdImgUrl = $product->getThumbnailUrl();
            if ($ProdImgUrl == "") {
                $ProdImgUrl = "/img/product/canvas_black_backpack.png";
            }
            $ProdPrice = number_format((float)$product->getVar("Price"), 0, '.', ',');
            $ProdTitle = $product->getProductName();
			$Style = str_replace(" ", "-", $ProdTitle);
            ?><a class="shopItem lg-four" href="/product.php?style=<?php echo $Style; ?>&pid=<?php echo $product->getVar("PID"); ?>">
            <?php ?>
                <img src="<?php echo $ProdImgUrl; ?>" alt="" />
                <span class="shopItemPrice">$<?php echo $ProdPrice; ?></span>
                <span class="shopItemTitle"><?php echo $ProdTitle; ?></span>
                <!-- <span class="shopItemSubtitle"><?php echo ucfirst($collName); ?> Collection</span> -->
            </a><?php } ?>
        <?php
        foreach ($CollProductsFromTags as $product) {
            $ProdImgUrl = $product->getThumbnailUrl();
            if ($ProdImgUrl == "") {
                $ProdImgUrl = "/img/product/canvas_black_backpack.png";
            }
            $ProdPrice = number_format((float)$product->getVar("Price"), 0, '.', ',');
            $ProdTitle = $product->getName();
			$Style = str_replace(" ", "-", $ProdTitle);
            ?><a class="shopItem lg-four" href="/product.php?style=<?php echo $Style; ?>&pid=<?php echo $product->getVar("PID"); ?>">
            <?php ?>
                <img src="<?php echo $ProdImgUrl; ?>" alt="" />
                <span class="shopItemPrice">$<?php echo $ProdPrice; ?></span>
                <span class="shopItemTitle"><?php echo $ProdTitle; ?></span>
                <!-- <span class="shopItemSubtitle"><?php echo ucfirst($collName); ?> Collection</span> -->
            </a><?php } ?>
    </div>
</div>

