<?php
if (!$cartExist) {
    echo "<div class='cartItemsRow'><div class='emptyCartLine lg-twelve' style='text-align: center;'>Your cart is empty.</div></div>";
} else {
    $totalCount = $Cart->count();
    ?><!--
    --><div class="cartTableWrapper">
        <div class="titleRow">
            <div class="itemTitle sm-five lg-two textCenter">Item</div><!--
            --><div class="qtyTitle sm-three lg-two">Qty</div><!--
            --><div class="productTitle sm-zero lg-six">Product Description</div><!--
            --><div class="priceTitle sm-four lg-two">Price</div>
        </div>
        <?php
        foreach ($Cart as $productArr) {
            $product = $productArr["item"];
            $prodQty = $productArr["qty"];
            $SCPID = $product->getId();
            $PID = $product->getPID();
            $ProductName = $product->getProductName();
            $ProdImgUrl = $product->getThumbnailUrl();
            if ($ProdImgUrl == "") {
                $ProdImgUrl = "/img/product/canvas_black_backpack.png";
            }
            $ProdPrice = number_format((float) $product->getVar("Price"), 2, '.', '');
            ?>
            <div class="updateTotalOverlayWrapper">
                <div class="updateTotalOverlay" style="display:none;"></div>
                <div class="cartItemsRow">
                    <div class="cartItemItem sm-five lg-two">
                        <img class="cartProductImage" src="<?php echo $ProdImgUrl; ?>" alt="">
                        <span class="productNameMobile"><?php echo $ProductName; ?></span>
                        <span class="produtNumber">SKU: <?php echo $PID; ?></span>
                    </div><!--
                    --><div class="cartItemQty sm-three lg-two">
                        <input class="qtyInput" type="number" name="itemQty_<?php echo $PID; ?>_<?php echo $SCPID; ?>" id="itemQty_<?php echo $PID; ?>_<?php echo $SCPID; ?>" value="<?php echo $prodQty; ?>">
                        <a href="javascript:removeProduct(<?php echo $PID; ?>,'<?php echo $SCPID; ?>')" onclick="return false;" class="removeLinkMobile">Remove</a>
                    </div><!--
                    --><div class="cartItemProduct  sm-zero lg-six">
                        <span class="productName"><?php echo $ProductName; ?></span>
                        <span class="shippingInfo">Shipping Included</span>
                        <a href="javascript:removeProduct(<?php echo $PID; ?>,'<?php echo $SCPID; ?>')" class="removeLink">Remove</a>
                    </div><!--
                    --><div class="cartItemPrice sm-four lg-two">$<?php echo $ProdPrice; ?></div>
                </div>
            </div>
        <?php } ?>

        <div class="totalRow">
            <div class="subtotalSpacer sm-eight lg-ten">Total&nbsp;&nbsp;&nbsp;</div><!--
            --><div class="subtotalPrice sm-four lg-two">$<?php echo $Cart->getTotal(); ?></div>
        </div>
    </div>   
<?php } ?>