<div class="bgWrapperLeaf">
    <div class="leafWrapper cartHeroBgWrapper">
        <div class="tableWrapper">
            <div class="cellWrapper">
                <div class="widthWrapper">
                    <div class="cartHeroLine1">Order Received</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bgWrapper cartBgWrapper">
    <div class="widthWrapper">
        <div class="tableWrapper tableHeight">
            <div class="cellWrapper">
                <h2>Order Received</h2>
                <div class="cartTableWrapper">
                    <div class="titleRow">
                        <div class="itemTitle sm-five lg-two">Item</div><!--
                        --><div class="qtyTitle sm-three lg-two">Qty</div><!--
                        --><div class="productTitle sm-zero lg-six">Product Description</div><!--
                        --><div class="priceTitle sm-four lg-two">Price</div>
                    </div>
                    <div class="belowTopRowWrapper lg-twelve">
                        <?php
                        if (!$orderExist) {
                            echo "<div class='cartItemsRow'><div class='emptyCartLine lg-twelve' style='text-align: center;'>Invalid Order </div></div>";
                        } else {
                            foreach ($Order as $productArr) {
                                $product = $productArr["item"];
                                $prodQty = $productArr["qty"];
                                $SCPID = $product->getId();
                                $PID = $product->getPID();
                                $ProductName = $product->getProductName();
                                $ProdImgUrl = $product->getImageUrl();
                                if ($ProdImgUrl == "") {
                                    $ProdImgUrl = "/img/product/canvas_black_backpack.png";
                                }
                                $ProdPrice = number_format((float) $product->getVar("Price"), 2, '.', '');
                                ?>
                                <div class="cartItemsRow">
                                    <div class="cartItemItem sm-five lg-two">
                                        <img class="cartProductImage" src="<?php echo $ProdImgUrl; ?>" alt="" />
                                        <span class="productNameMobile"><?php echo $ProductName; ?></span>
                                        <span class="produtNumber">SKU: 0000000</span>
                                    </div><!--
                                    --><div class="cartItemQty sm-three lg-two"><?php echo $prodQty; ?></div><!--
                                    --><div class="cartItemProduct  sm-zero lg-six">
                                        <span class="productName"><?php echo $ProductName; ?></span>
                                    </div><!--
                                    --><div class="cartItemPrice sm-four lg-two">$<?php echo $ProdPrice; ?></div>
                                </div>

                                <?php
                            }
                            $Email = $Order->getVar("Email");
                            $ShipAddr = $Order->getVar("ShippingAddr");
                            $ShipNotes=$Order->getVar("ShipNotes");
                            if (isset($ShipAddr)) {
                                $AddrID = $ShipAddr->getVar("AddrID");
                                $SName = $ShipAddr->getVar("FName") . " " . $ShipAddr->getVar("LName");
                                $SAddr1 = $ShipAddr->getVar("Addr1");
                                $SAddr2 = $ShipAddr->getVar("Addr2");
                                $SCityStateZip = $ShipAddr->getVar("City") . ", " . $ShipAddr->getVar("State") . " " . $ShipAddr->getVar("Postal");
                                $SCoutry = $Countries->getCountryName($ShipAddr->getVar("Country"));

                                $Phone = $ShipAddr->getVar("Phone");
                                $SCoutry = $Countries->getCountryName($ShipAddr->getVar("Country"));
                            }
                            if ($Order->getVar("PaymMethod") == "cc") {
                                $BillAddr = $Order->getVar("BillingAddr");
                                if (isset($BillAddr)) {
                                    $AddrID = $BillAddr->getVar("AddrID");
                                    $BName = $BillAddr->getVar("FName") . " " . $BillAddr->getVar("LName");
                                    $BAddr1 = $BillAddr->getVar("Addr1");
                                    $BAddr2 = $BillAddr->getVar("Addr2");
                                    $BCityStateZip = $BillAddr->getVar("City") . ", " . $BillAddr->getVar("State") . " " . $BillAddr->getVar("Postal");
                                    $BCoutry = $Countries->getCountryName($BillAddr->getVar("Country"));
                                    $CreditCard = $Order->getCreditCard();
                                    $CCNo = $CreditCard->getVar("CCNumber");
                                    $CCNum = "**********" . substr($CCNo, -4);
                                }
                            }
                        }
                        ?>
                        <div class="totalRow"> 
                            <div class="lg-seven leftCol">
                                <div class="receiptOrderInfo lg-twelve">
                                    <h3 class="ital black size5">Order #<?php echo $Order->getOrdID(); ?> - <?php echo $Order->getDate(); ?></h3>
                                    <br>
                                    <div class="shippingTo lg-six">
                                        <span class="titleShipBill black">Shipping To:</span>
                                        <span><?php echo $SName; ?></span>
                                        <span><?php echo $SAddr1; ?></span>
                                        <?php if (isset($SAddr2) && $SAddr2 != "") { ?>
                                            <span><?php echo $SAddr2; ?></span>    
                                        <?php } ?>
                                        <span><?php echo $SCityStateZip; ?></span>
                                        <span><?php echo $SCoutry; ?></span>
                                        <span><?php echo $Phone; ?></span>
                                        <span><?php echo $Email; ?></span>
                                    </div><!-- 
                                    --><?php if ($Order->getVar("PaymMethod") == "cc") { ?><div class="billingTo lg-six">
                                            <span class="titleShipBill black">Billing To:</span>
                                            <span><?php echo $BName; ?></span>
                                            <span><?php echo $BAddr1; ?></span>
                                            <?php if (isset($BAddr2) && $BAddr2 != "") { ?>
                                                <span><?php echo $BAddr2; ?></span>    
                                            <?php } ?>
                                            <span><?php echo $BCityStateZip; ?></span>
                                            <span>Visa Ending in - <?php echo $CCNum; ?></span>
                                        </div><?php } else { ?><div class="billingTo lg-six">
                                            <span class="titleShipBill black">Billing To:</span>
                                            <span>On file with Paypal</span>
                                        </div><?php } ?>
                                    <?php if (isset($ShipNotes) && $ShipNotes != "") { ?>
                                        <div class="lg-twelve" style="font-weight:normal;">
                                            <span class="titleShipBill black">Shipping Notes:</span> 
                                            <p><?php echo $ShipNotes; ?></p>                         
                                        </div>
                                    <?php } ?>
                                </div>
                            </div><!-- 
                            --><div class="receiptTotalInfoWrapper lg-five rightCol">
                                <div class="receiptTotalInfo lg-twelve">
                                    <div class="receiptTotalInfoRow1">
                                        <div class="sm-eight">Subtotal</div><!-- 
                                        --><div class="sm-four  textRight">$<?php echo $Order->getTotal(); ?></div>
                                    </div>
                                    <div class="receiptTotalInfoRow2">
                                        <div class="lg-twelve">Shipping Included</div>
                                    </div>
                                    <!--<div class="receiptTotalInfoRow2">
                                        <div class="couponText sm-eight">Coupon Code #000000</div><!-- 
                                    --><!--<div class="couponText sm-four textRight">-$100.00</div>
                                </div>-->
                                    <div class="receiptTotalInfoRow3">
                                        <div class="sm-eight">Total</div><!-- 
                                        --><div class="sm-four textRight">$<?php echo $Order->getTotal(); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br />
                <?php if (!$logedIn) { ?>
                    <div class="row">
                        <div class="sm-six"></div><div class="sm-six textRight">
                            <div class="checkLabelDisplay fltR">
                                <input type="checkbox" class="collapseCheck" name="checkarea01" id="check01_label" value="check01">
                                <label for="check01_label">
                                    <span class="font-20">Create Virgil James Account?</span></label>
                            </div>
                            <div class="well collapseCheckContent" style="margin-top:42px; margin-left:36px;" id="check01">
                                <div class="generalForm small">
                                    <input id="cartRegEmail" name="Email" class="textField" type="text" placeholder="Enter Email">
                                    <input class="textField" placeholder="Enter Password" type="password" name="Passwd" id="Passwd">
                                    <input class="textField" placeholder="Re-Enter Password" type="password" name="Conf_Passwd" id="Conf_Passwd">
                                    <div class="textCenter"><button class="fillBtn" onclick="cartReg()">Submit</button></div>
                                </div>
                            </div>
                        </div>
                    </div>                
                <?php } ?>    
                <div class="bottomRowButtonsWrapper">
                    <div class="checkoutButtonWrapper lg-twelve">
                        <a class="checkoutButton" href="javascript:printOrd('<?php echo $Order->getOrdID(); ?>');" >Print</a>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>