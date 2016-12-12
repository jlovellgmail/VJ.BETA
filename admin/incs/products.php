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

<?php include 'nav/robs-admin-nav.php'; ?>

<div class='widthWrapper admin-content-wrapper'>
    <div class='admin-panel-controls marBottom15'>
        <div class='xs-twelve textRight'>
        <a class='textBtn' style='line-height: 28px;' href='add-product.php'>+ Add a Product</a>
        </div>
    </div>

    <div class="generalTableScroll marBottom30">
        <table id="ProductsTbl" class="generalTable">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th class="fixedCell fixedCell75"><a href="#">#ID</a></th>
                    <th><a href="#">Name</a></th>
                    <th><a href="#">Line</a></th>
                    <th><a href="#">Collection</a></th>
                    <!--<th class="textCenter">Preview</th>-->
                    <th class="textCenter">Related</th>
                    <th class="textCenter">Tags</th>
                    <th class="textCenter">Show in 'All Products'</th>
                	<th class="textCenter" style="width:70px;">Hidden</th>
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
                    /*if ($product->getCollectionName()=="n/a"){
                        $PCollName="";
                    }else{
                        $PCollName=$product->getCollectionName();
                    }
                    $ProdName = $product->getVar("ProductName");
                    if ($ProdName==""){
                        $Name = $PCollName . " " .$product->getStyleName();
                    } else {
                        $Name =  $ProdName;
                    }*/
                    $Name = $product->getName();

                    $LName = $product->getLineName();
                    $CName = $product->getCollectionName();
                    $ProdTitle = $product->getProductName();
                    $style = str_replace(" ", "-", $ProdTitle);
                    ?>
                    <tr>
                        <td class="fixedCell fixedCell125">
                            <a class="textLeft" data-toggle="modal" target="_blank" href="/product.php?from=admin&pid=<?php echo $PID; ?>&style=<?php echo $style; ?>">
                                <div class="textCenter fixedCell fixedCell75">
                                    <div><img src="<?php echo $ImgUrl; ?>" width="75"></div>
                                    <small>PREVIEW</small>
                                </div>
                            </a>
                        </td>
                        <td class="fixedCell fixedCell75"><em>#<?php echo $PID; ?></em></td>
                        <td><a href="add-product.php?PID=<?php echo $PID; ?>"><?php echo $Name; ?></a></td>
                        <td><em><?php echo $LName; ?></em></td>
                        <td><em><?php echo $CName; ?></em></td>
                        <!--<td>
                            <a class="btn btn-link flush underline" data-toggle="modal" target="_blank" href="/product.php?from=admin&pid=<?php echo $PID; ?>&style=<?php echo $style; ?>">
                                preview
                            </a>
                        </td>-->
                        <td class="textCenter"><button class="btn btn-link flush underline" data-toggle="modal" onclick="relatedProd(<?php echo $PID ?>)">assign</button></td>
                        <td class="textCenter"><button class="btn btn-link flush underline" data-toggle="modal" onclick="productTags(<?php echo $PID ?>)">assign</button></td>
                        <td class="textCenter"><input type="checkbox" <?php
                            if (isset($featFlag) && $featFlag) {
                                echo "checked='' ";
                            }
                            ?> name="feat_<?php echo $PID; ?>" id="feat_<?php echo $PID; ?>" /></td>
                        <td class="textCenter"><input type="checkbox" <?php
                            if (isset($hiddenFlag) && $hiddenFlag) {
                                echo "checked='' ";
                            }
                            ?> name="hidden_<?php echo $PID; ?>" id="hidden_<?php echo $PID; ?>"  /></td>
                    </tr>
                    <?php
                    $count++;
                }
                if ($count == 0) {
                    echo "<tr><td colspan='6' class='textCenter pad-20 font-16'>There are no Products.</td></tr>";
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
                <form class="generalForm" id="setRelatedProdFrm" name="setRelatedProdFrm" method="post">
                    <div class="modal-body" id="relatedProductModalContent">
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="addRelatedProd()">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="setTagsProdModal" tabindex="-1" role="dialog" aria-labelledby="setTagsProdModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="setTagsProdModal">Select Products Taged To</h4>
                </div>
                <form class="generalForm" id="setProductTagsFrm" name="setRelatedProdFrm" method="post">
                    <div class="modal-body" id="tagsProductModalContent">
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="addRelatedProd()">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
