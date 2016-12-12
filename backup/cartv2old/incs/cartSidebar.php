<?php
if (!$cartExist) {
    echo "<div class='cartItemsRow'><div class='emptyCartLine lg-twelve' style='text-align: center;'>Your cart is empty.</div></div>";
} else {
    $totalCount = $Cart->count();
    ?><!--
    --><div class="cartSidebar">
        <h2 class="caps">Order Details</h2>
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
            <div class="row cartSidebarRow">
                <div class="lg-three v-mid textCenter">
                    <div class="flexImage">
                        <div><img src="<?php echo $ProdImgUrl; ?>" alt="" width="90"></div>
                    </div>
                </div><div class="lg-one">&nbsp;</div><!--
                --><div class="lg-eight v-mid textRight">
                    <?php echo $ProductName; ?>                          
                </div><!--
                --><div class="lg-three v-bottom textCenter">
                    <?php echo $prodQty; ?>                             
                </div><!--
                --><div class="lg-one"></div><!--
                --><div class="lg-eight v-bottom textRight">
                    $<?php echo $ProdPrice; ?>                               
                </div>
            </div>
        <?php } ?>        
        <div class="cartTotalsRow">
            <div class="row marBottom15">
                <div class="lg-three v-bottom caps">
                    Subtotal
                </div><div class="lg-one">&nbsp;</div><!--
                --><div class="lg-eight v-bottom textRight">
                    $<?php echo $Cart->getTotal(); ?>                         
                </div>
            </div>                        
            <?php if ($page == 'cartSummary') { ?>
                <div class="row marBottom15">
                    <div class="lg-three v-bottom caps">
                        Sales Tax
                    </div><div class="lg-one">&nbsp;</div><!--
                    --><div class="lg-eight v-bottom textRight">
                        $261.60                            
                    </div>
                </div>       
                <div class="row marBottom15">
                    <div class="lg-three v-bottom caps">
                        &nbsp;
                    </div><div class="lg-one">&nbsp;</div><!--
                    --><div class="lg-eight v-bottom textRight">
                        <em>Shipping Included</em>                            
                    </div>
                </div>       
            <?php } ?>                 
            <div class="row finalTotalRow">
                <div class="lg-three v-bottom caps">
                    <b>Total</b>
                </div><div class="lg-one">&nbsp;</div><!--
                --><div class="lg-eight v-bottom textRight">
                    <b>$<?php echo $Cart->getTotal(); ?></b>                            
                </div>
            </div>                        
        </div>
    </div>
<?php } ?> 