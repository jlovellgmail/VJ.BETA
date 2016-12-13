<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include $rootpath . '/classes/Collection.class.php';
include $rootpath . '/classes/Image.class.php';
$CollObj = new Collection();

$CollObj->initializeByName($collection);
$CollID = $CollObj->getVar("CID");

$CollProdList = $CollObj->getProducts();
$CollProductsFromTags = $CollObj->getProductsFromTags();
?>

<?php
foreach ($CollProdList as $product) {
    $ProdImgUrl = $product->getThumbnailUrl();
    if ($ProdImgUrl == "") {
        $ProdImgUrl = "/img/product/canvas_black_backpack.png";
    }
    $ProdPrice = number_format((float) $product->getVar("Price"), 0, '.', ',');
    $ProdTitle = $product->getProductName();
    $Style = str_replace(" ", "-", $ProdTitle);
    ?><a class="item" href="/product.php?style=<?php echo $Style; ?>&pid=<?php echo $product->getVar("PID"); ?>">
    <?php ?>
        <img src="<?php echo $ProdImgUrl; ?>" alt="" />
        <div class="caption">
            <div class="title"><?php echo $ProdTitle; ?></div>
            <div class="price">$<?php echo $ProdPrice; ?></div>
        </div>
    </a><?php } ?>
<?php
foreach ($CollProductsFromTags as $product) {
    $ProdImgUrl = $product->getThumbnailUrl();
    if ($ProdImgUrl == "") {
        $ProdImgUrl = "/img/product/canvas_black_backpack.png";
    }
    $ProdPrice = number_format((float) $product->getVar("Price"), 0, '.', ',');
    $ProdTitle = $product->getName();
    $Style = str_replace(" ", "-", $ProdTitle);
    ?><a class="item" href="/product.php?style=<?php echo $Style; ?>&pid=<?php echo $product->getVar("PID"); ?>">
    <?php ?>
        <img src="<?php echo $ProdImgUrl; ?>" alt="" />
        <div class="caption">
            <div class="title"><?php echo $ProdTitle; ?></div>
            <div class="price">$<?php echo $ProdPrice; ?></div>
        </div>
    </a><?php } ?>