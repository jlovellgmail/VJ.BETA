<?php
include '../incs/userAccountNav.php';

require_once $rootpath . "/classes/Order.class.php";
require_once $rootpath . "/classes/Product.class.php";
require_once $rootpath . "/classes/Address.class.php";
require_once $rootpath . "/core/Countries.class.php";
$OrdID = $_GET["OrdID"];

$OrdExist = FALSE;
if (isset($OrdID) && $OrdID > 0) {
    $OrdExist = TRUE;
    $Order = new Order();
    $Order->initialize($OrdID);
    $Email = $Order->getVar("Email");
    $ShipAddr = $Order->getVar("ShippingAddr");
    $Email = $Order->getVar("Email");
    $ShipAddr = $Order->getVar("ShippingAddr");
    $PaymMethod = $Order->getVar("PaymMethod");
    $ShipNotes = $Order->getVar("ShipNotes");
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
            $CCNum = /* "**********" . */substr($CCNo, -4);
        }
    }
}
?>
<div class="tableWrapper">
    <div class="cellWrapper">
        <div class="widthWrapper">
            <div class="textLeft marBottom30"><a class="textBtn" href="user/orders.php">&lt; Back to Orders</a></div>
            <?php if ($OrdExist) { ?>
                <h3 class="ital black size5 fw-300 textLeft">Order #<?php echo $Order->getOrdID(); ?> - <?php echo $Order->getDate(); ?> </h3>
                <br />
                <div class="row textLeft"> 
                    <div class="sm-twelve lg-four">
                        <h4 class="caps black">Shipping to</h4>
                        <div class="clearfix marTop15">
                            <span><?php echo $SName; ?></span><br />
                            <span><?php echo $SAddr1; ?></span><br />
                            <?php if (isset($SAddr2) && $SAddr2 != "") { ?>
                                <span><?php echo $SAddr2; ?></span><br />    
                            <?php } ?>
                            <span><?php echo $SCityStateZip; ?></span><br />
                            <span><?php echo $SCoutry; ?></span><br />
                            <span><?php echo $Phone; ?></span><br />
                            <span><?php echo $Email; ?></span><br />
                        </div>
                    </div>
                    <?php if ($Order->getVar("PaymMethod") == "cc") { ?><div class="sm-twelve lg-four">
                            <h4 class="caps black">Billed to</h4>
                            <div class="clearfix marTop15">
                                <span><?php echo $BName; ?></span><br />
                                <span><?php echo $BAddr1; ?></span><br />
                                <?php if (isset($BAddr2) && $BAddr2 != "") { ?>
                                    <span><?php echo $BAddr2; ?></span><br />    
                                <?php } ?>
                                <span><?php echo $BCityStateZip; ?></span><br />
                                <span>Visa Ending <?php echo $CCNum; ?></span><br />
                            </div>
                        </div><?php } else { ?><div class="sm-twelve lg-four">
                            <div class="clearfix">
                                <h4 class="caps black">Billed to</h4><br />
                                <span>On file with Paypal</span>
                            </div>
                        </div><?php } ?>
                    <?php if (isset($ShipNotes) && $ShipNotes != "") { ?>
                        <div class="sm-twelve lg-four" style="font-weight:normal;">
                            Shipping Notes:
                            <p><?php echo $ShipNotes; ?></p>                         
                        </div>
                    <?php } ?>
                </div>
                <div class="cartTableWrapper marTop15">
                    <div class="titleRow">
                        <div class="itemTitle sm-five lg-one">Item</div><!--
                        --><div class="qtyTitle sm-three lg-two">Quantity</div><!--
                        --><div class="productTitle sm-zero lg-three">Product</div><!--
                        --><div class="productTitle sm-zero lg-three">Status</div><!--
                        --><div class="priceTitle sm-four lg-three">Price</div>
                    </div>
                    <div class="belowTopRowWrapper lg-twelve">
                        <?php
                        $itemCounter = 0;
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
                                <div class="cartItemItem sm-five lg-one">
                                    <img alt="" src="<?php echo $ProdImgUrl; ?>" class="cartProductImage">
                                    <span class="productNameMobile"><?php echo $ProductName; ?><br /><small>Product ID: #0000</small></span>
                                    <span class="produtNumber">ORDER ID: #<?php echo $OrdID; ?>-<?php echo $itemCounter; ?></span>
                                </div><!--
                                --><div class="cartItemQty sm-three lg-two"><?php echo $prodQty; ?></div><!--
                                --><div class="cartItemProduct  sm-zero lg-three">
                                    <span class="productName"><?php echo $ProductName; ?><br /><small>Product ID: #<?php echo $PID; ?></small></span>
                                </div><!--
                                --><div class="cartItemProduct  sm-zero lg-three">
                                    <span class="productName">Delivered on July 15, 2015</span>
                                </div><!--
                                --><div class="cartItemPrice sm-four lg-three">$<?php echo $ProdPrice; ?></div>
                            </div>

                            <?php
                            $itemCounter++;
                        }
                        ?>
                    </div>
                    <div class="cartItemsRow">
                        <?php if ($Order->getVar("TaxAmt") > 0) { ?>
                            <div class="row cartPriceRow">
                                <div class="subtotalSpacer sm-eight lg-ten">Sub Total&nbsp;&nbsp;&nbsp;</div><!--
                                --><div class="subtotalPrice sm-four lg-two">$<?php echo $Order->getTotalWithOutTax(); ?></div>
                            </div>
                            <br />
                            <?php
                            $TaxAmt = $Order->getVar("TaxAmt");
                            $TaxAmt = number_format((float) $TaxAmt, 2, '.', '');
                            ?>
                            <div class="row cartPriceRow">
                                <div class="subtotalSpacer sm-eight lg-ten">Tax&nbsp;&nbsp;&nbsp;</div><!--
                                --><div class="subtotalPrice sm-four lg-two">$<?php echo $TaxAmt; ?></div>
                            </div>
                            <br />
    <?php } ?>
                        <div class="row cartPriceRow">
                            <div class="subtotalSpacer sm-eight lg-ten">&nbsp;</div><!--
                            --><div class="subtotalPrice sm-four lg-two">Shipping Included</div>
                        </div>
                        <br />
                        <div class="row cartPriceRow">
                            <div class="subtotalSpacer sm-eight lg-ten"><b>Total&nbsp;&nbsp;&nbsp;</b></div><!--
                            --><div class="subtotalPrice sm-four lg-two"><b><?php echo $Order->getTotal(); ?></b></div>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                echo "<div class='alertMessage textCenter' style='font-size:18px;'>Invalid Order ID</div>";
            }
            ?>        
        </div>
    </div>
</div>