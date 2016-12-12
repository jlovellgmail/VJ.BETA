<div class="widthWrapper">
    <div class="tableWrapper tableHeight">
        <div class="cellWrapper">
            <h2>Selected Items</h2>
            <div class="cartTableWrapper">
                <div class="titleRow">
                    <div class="itemTitle sm-five lg-one">Item</div><!--
                    --><div class="qtyTitle sm-three lg-two">Qty</div><!--
                    --><div class="productTitle sm-zero lg-six">Product Description</div><!--
                    --><div class="priceTitle sm-four lg-three">Price</div>
                </div>
                <?php
                if (!$cartExist) {
                    echo "<div class='cartItemsRow'><div class='emptyCartLine lg-twelve' style='text-align: center;'>Your cart is empty.</div></div>";
                } else {
                    foreach ($Cart as $productArr) {
                        //$sName = $product->getStyleName();
                        //$cName = $product->getCollectionName();
                        //$ProductName = $cName . " Collection" . $sName;
                        $product = $productArr["item"];
                        $prodQty = $productArr["qty"];
                        $SCPID = $product->getId();
                        $PID=$product->getPID();
                        $ProductName = $product->getProductName();
                        $ProdImgUrl = $product->getImageUrl();
                        if ($ProdImgUrl == "") {
                            $ProdImgUrl = "/img/product/canvas_black_backpack.png";
                        }
                        $ProdPrice = number_format((float) $product->getVar("Price"), 2, '.', '');
                        ?>
                        <div class="updateTotalOverlayWrapper">
                            <div class="updateTotalOverlay" style="display:none;"></div>
                            <div class="cartItemsRow">
                                <div class="cartItemItem sm-five lg-one">
                                    <img class="cartProductImage" src="<?php echo $ProdImgUrl; ?>" alt="" />
                                    <span class="productNameMobile"><?php echo $ProductName; ?></span>
                                    <span class="produtNumber">SKU: 0000000</span>
                                </div><!--
                                --><div class="cartItemQty sm-three lg-two">
                                    <input class="qtyInput" type="number"  name="itemQty_<?php echo $PID; ?>_<?php echo $SCPID; ?>" id="itemQty_<?php echo $PID; ?>_<?php echo $SCPID; ?>"  value="<?php echo $prodQty; ?>"/>
                                    <a href="javascript:removeProduct(<?php echo $PID; ?>,'<?php echo $SCPID; ?>')" onclick="return false;" class="removeLinkMobile">Remove</a>
                                </div><!--
                                --><div class="cartItemProduct  sm-zero lg-six">
                                    <span class="productName"><?php echo $ProductName; ?></span>
                                    <span class="shippingInfo">Shipping Included</span>
                                    <a href="javascript:removeProduct(<?php echo $PID; ?>,'<?php echo $SCPID; ?>')"  class="removeLink">Remove</a>
                                </div><!--
                                --><div class="cartItemPrice sm-four lg-three">$<?php echo $ProdPrice; ?></div>
                            </div>
                        </div>
                    <?php }
                    ?>
                    <div class="totalRow">
                        <div class="subtotalSpacer sm-eight lg-ten">Subtotal&nbsp;&nbsp;&nbsp;</div><!--
                        --><div class="subtotalPrice sm-four lg-two">$<?php echo $Cart->getTotal(); ?></div>
                    </div>

                    <?php
                }
                ?>

            </div>
            <?php
            if ($cartExist) {
                ?>
                <div class="bottomRowButtonsWrapper">
                    <!--<div class="couponFieldWrapper sm-twelve md-six lg-three">
                        <form class="couponForm marBottom15" action="whatever.php">
                            <input class="couponField" type="text" on name="coupon_code" placeholder="Enter Coupon Code" />
                        </form>
                    </div>--><!-- 
                    --><!--<div class="couponButtonWrapper sm-twelve md-six lg-three">
                        <a class="couponApplyButton marBottom15" href="#" onclick="return false;">Apply&nbsp;Coupon</a>
                    </div>--><!-- 
                    --><div class="checkoutButtonWrapper sm-twelve md-six lg-six">
                        <?php if ($logedIn) { ?>
                            <div class="row">
                                <div class="md-twelve lg-six">
                                    <a class="fillBtn marBottom15" href="/shop.php">Continue&nbsp;Shopping</a>
                                </div><div class="checkoutButtonWrapper md-twelve lg-six">
                                    <a class="cartLink checkoutButton" href="checkout.php">Checkout</a>
                                </div>                                                        
                            </div>
                        <?php } else { ?>
                            <div class="row">
                                <div class="md-twelve lg-six">
                                    <a class="fillBtn marBottom15" href="/shop.php">Continue&nbsp;Shopping</a>
                                </div><div class="md-twelve lg-six">
                                    <a class="cartLink checkoutButton" href="javascript:openModal('modalCheckout')">Checkout</a>
                                </div>                                                        
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="bottomRowButtonsWrapper">

                    <!-- Add this code for Empty Cart -->
                    <div class="homeButtonWrapper lg-six">
                        <a class="checkoutButton" href="/index.php">Home</a>
                    </div><div class="shopButtonWrapper lg-six">
                        <a class="checkoutButton" href="/shop.php">Shop</a>
                    </div>
                    <!--		/snippet		-->

                </div>
            <?php } ?>
        </div>
    </div>
</div>