<?php
if (!$cartExist) {
    echo "<div class='cartItemsRow'><div class='emptyCartLine lg-twelve' style='text-align: center;'>Your cart is empty.</div></div>";
} else {
    $totalCount = $Cart->count();
    ?><!--
    --><div class="checkoutRightColWrapper md-six lg-seven">
        <div class="cartBrief">
            <h3><?php echo $totalCount; ?> items in your cart</h3>
            <button class="textBtn toggleLink toggleHidden" id="showCart">
                Show Cart
            </button>
        </div>
        <div class="overviewTableWrapper">

            <div class="titleRow">
                <div class="itemTitle sm-five lg-two">Item</div><!--
                --><div class="qtyTitle sm-three lg-two">Qty</div><!--
                --><div class="productTitle sm-zero lg-six">Product Description</div><!--
                --><div class="priceTitle sm-four lg-two">Price</div>
            </div><!--
            --><?php
            foreach ($Cart as $productArr) {
                $product = $productArr["item"];
                $prodQty = $productArr["qty"];
                $PID = $product->getId();
                $ProductName = $product->getProductName();
                $ProdImgUrl = $product->getImageUrl();
                if ($ProdImgUrl == "") {
                    $ProdImgUrl = "/img/product/canvas_black_backpack.png";
                }
                $ProdPrice = number_format((float) $product->getVar("Price"), 2, '.', '');
                ?><div class="belowTopRowWrapper lg-twelve">
                    <div class="cartItemsRow">
                        <div class="cartItemItem sm-five lg-two">
                            <img class="cartProductImage" src="<?php echo $ProdImgUrl; ?>" alt="" />
                            <span class="productNameMobile"><?php echo $ProductName; ?></span>
                            <span class="produtNumber">SKU: 0000000</span>
                        </div><!--
                        --><div class="cartItemQty sm-three lg-two"><?php echo $prodQty; ?></div><!--
                        --><div class="cartItemProduct  sm-zero lg-six">
                            <span class="productName"><?php echo $ProductName; ?></span>
                            <span class="shippingInfo">Shipping Included</span>
                        </div><!--
                        --><div class="cartItemPrice sm-four lg-two">$<?php echo $ProdPrice; ?></div>
                    </div>
                </div>
            <?php } ?><div class="rowsPadding">
                <div class="subTotalRow">
                    <div class="sm-eight"><span>Subtotal</span></div><!--
                    --><div class="sm-four"><span>$<?php echo $Cart->getTotal(); ?></span></div>
                </div>

                <div class="shippingRow">
                    <div class="sm-eight"><span>Shipping Included</span></div><!--
                    --><div class="sm-four"></div>
                </div>
                <!--
                <div class="couponRow">
                    <div class="sm-eight"><span>Coupon Code #0000000</span></div><!--
                    --><!--<div class="sm-four"><span>-$100.00</span></div>
                </div>-->

                <div class="totalRow">
                    <div class="sm-eight"><span>Total</span></div><!--
                    --><div class="sm-four"><span>$<?php echo $Cart->getTotal(); ?></span></div>
                </div>
            </div>

        </div>
    </div>

<?php } ?>