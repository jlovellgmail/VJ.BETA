<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include '/classes/ProductList.class.php';

unset($_SESSION["er"]);
$ProductList = new ProductList();

$products = $ProductList->getAllProductsAdmin();
?>
<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
    <div class="col-xs-8">
        <h1 class="page-head-title">PRODUCTS</h1>
    </div>
    <div class="col-xs-4 text-right">
        <a class="btn btn-primary" href="add_product.php">+ Add a Product</a>
    </div>
</div>
<div class="table-responsive">
    <table id="ProductsTbl" class="table table-bordered table-striped adminTable">
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
                    <td style="width:75px;"><div class="resize-img"><div><img src="http://www.virgiljames.net<?php echo $ImgUrl; ?>"></div></div></td>
                    <td><em>#<?php echo $PID; ?></em></td>
                    <td><a href="add_product.php?PID=<?php echo $PID; ?>"><?php echo $Name; ?></a></td>
                    <td><em><?php echo $LName; ?></em></td>
                    <td><em><?php echo $CName; ?></em></td>
                    <td class="text-center"><a class="btn btn-link flush underline" data-toggle="modal" target="_blank" href="http://www.virgiljames.net/product.php?from=admin&pid=<?php echo $PID; ?>">preview</a></td>
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

<!-- Modal -->
<div class="modal fade" id="addLineModal" tabindex="-1" role="dialog" aria-labelledby="addLineModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addLineModalLabel">Add a Line</h4>
            </div>
            <div class="modal-body">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add Line</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="setRelatedProdModal" tabindex="-1" role="dialog" aria-labelledby="setRelatedProdModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="setRelatedProdModal">Select Products Related To</h4>
            </div>
            <form id="setRelatedProdFrm" name="setRelatedProdFrm" method="post">
                <div class="modal-body" id="relatedProductModalContent">
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn" onclick="addRelatedProd()">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>