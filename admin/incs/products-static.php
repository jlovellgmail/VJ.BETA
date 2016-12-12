<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath.'/classes/ProductList.class.php';

unset($_SESSION["er"]);
$ProductList = new ProductList();

$products = $ProductList->getAllProductsAdmin();
?>

<?php include 'nav/contentAdminNav.php'; ?>

<div class="row textLeft marTop30">
    <div class="sm-tweleve md-eight lg-eight"><h1 class="caps">Products</h1></div><!--
                --><div class="sm-twelve md-four lg-four textRight marBottom10">
        <a class="fillBtn" href="add_product.php">+ Add a Product</a>
    </div>
</div>
<div class=" generalTableScroll marBottom30">
    <table id="ProductsTbl" class="generalTable">
        <thead>
        <tr>
            <th>&nbsp;</th>
            <th><a href="#">Product ID</a></th>
            <th><a href="#">Name</a></th>
            <th><a href="#">Line</a></th>
            <th><a href="#">Collection</a></th>
            <th class="text-center">Preview</th>
            <th class="text-center">Related</th>
            <th style="width:90px;">Featured?</th>
            <th class="header text-center" style="width:70px;">Hidden?</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $count = 0;
        foreach ($products as $product) {
            $PID = $product->getVar("PID");
            $ImgUrl = $product->getVar("ThumbnailUrl");
            $ImgUrl = str_replace('\\', '/', $ImgUrl);
            $featFlag = $product->getVar("Featured");
            $hiddenFlag = $product->getVar("Hidden");
            $Name = $product->getCollectionName() . " " .$product->getStyleName();
            $LName = $product->getLineName();
            $CName = $product->getCollectionName();
            ?>
            <tr>
                <td><div class="resize-img"><div><img src="<?php echo $ImgUrl; ?>" width="75"></div></div></td>
                <td><em>#<?php echo $PID; ?></em></td>
                <td><a href="add_product.php?PID=<?php echo $PID; ?>"><?php echo $Name; ?></a></td>
                <td><em><?php echo $LName; ?></em></td>
                <td><em><?php echo $CName; ?></em></td>
                <td class="text-center"><a class="btn btn-link flush underline" data-toggle="modal" target="_blank" href="/product.php?from=admin&pid=<?php echo $PID; ?>">preview</a></td>
                <td class="text-center"><button class="btn btn-link flush underline" data-toggle="modal" onclick="relatedProd(<?php echo $PID ?>)">assign</button></td>
                <td class="text-center"><input type="checkbox" <?php
                    if (isset($featFlag) && $featFlag) {
                        echo "checked='' ";
                    }
                    ?> name="feat_<?php echo $PID; ?>" id="feat_<?php echo $PID; ?>" /></td>
                <td class="text-center"><input type="checkbox" <?php
                    if (isset($hiddenFlag) && $hiddenFlag) {
                        echo "checked='' ";
                    }
                    ?> name="hidden_<?php echo $PID; ?>" id="hidden_<?php echo $PID; ?>"  /></td>
            </tr>
            <?php
            $count++;
        }
        if ($count == 0) {
            echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Products.</td></tr>";
        }
        ?>

        </tbody>
    </table>
</div>