<?php
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
    $TransactionID = $Order->getVar("TransID");
    $TaxTransID = $Order->getVar("TaxInvoice");
    $OrdStatus = $Order->getVar("Status");
    $TrackingNo = $Order->getVar("TrackingNo");
    $PaypalEmail = $Order->getVar("PaypalEmail");
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
<input type="hidden" id="OrdIDHidden" value="<?php echo $OrdID; ?>">
<div class="row">
    <div class="sm-twelve mTextCenterDLeft fw-300">
        <div class="leafCorners1 whiteBg pad30">
            <div class="closeCartButton"><a href="JavaScript:window.close()"><img src="/images/close-icon-img.png" alt="" width="17"></a></div>
            <div class="clearfix">
                <div class="lg-eight leftCol">
                    <div class="clearfix">
                        <div class="clearfix marBottom15">
                            <div class="sm-twelve md-six lg-six"><h1 class="black caps">Order Details</h1></div><!--
                            --><div class="sm-twelve md-six lg-six rightCol"><h2 class="black ital fw-300 marBottom30">Order #<?php echo $Order->getOrdID(); ?><br /><?php echo $Order->getDate(); ?></h2></div>
                        </div>
                        <div class="clearfix marBottom30">
                            <div class="sm-twelve md-six lg-six"><b>Transaction ID # <?php echo $TransactionID; ?></b></div><!--
                            --><?php if (isset($TaxTransID) && $TaxTransID != "") { ?><div class="sm-twelve md-six lg-six rightCol"><b>Tax Inovice # <?php echo $TaxTransID; ?></b></div><?php } ?>
                        </div>
                        <div class="sm-twelve lg-six leftCol">
                            <h4 class="caps black">Ship To</h4>
                            <div class="clearfix marTop15"> <?php echo $SName; ?><br />
                                <?php echo $SAddr1; ?><br />
                                <?php if (isset($SAddr2) && $SAddr2 != "") { ?>
                                    <?php echo $SAddr2; ?><br />    
                                <?php } ?>
                                <?php echo $SCityStateZip; ?><br />
                                <?php echo $SCoutry; ?><br />
                                <?php echo $Phone; ?><br />
                                <?php echo $Email; ?><br />
                                <?php if (isset($ShipNotes) && $ShipNotes != "") { ?>
                                    <br /><p>Shipping Notes<br><?php echo $ShipNotes; ?></p>                         
                                <?php } ?>
                            </div>
                        </div><!--
                        --><div class="sm-twelve lg-six rightCol">
                            <h4 class="caps black">Bill To</h4>
                            <div class="clearfix marTop15"><!--
                                --><?php if ($Order->getVar("PaymMethod") == "cc") { ?>
                                    <?php echo $BName; ?><br />
                                    <?php echo $BAddr1; ?><br />
                                    <?php if (isset($BAddr2) && $BAddr2 != "") { ?>
                                        <?php echo $BAddr2; ?><br />    
                                    <?php } ?>
                                    <?php echo $BCityStateZip; ?><br />
                                    Visa Ending <?php echo $CCNum; ?><br />
                                <?php } else { ?>
                                    <?php 
                                    if ($PaypalEmail!=""){    
                                        echo "Paypal Email - ".$PaypalEmail."<br>" ;
                                    }
                                  ?> 
                                    <span>Billing information on file with Paypal</span>
                                <?php } ?><!-- 
                                --></div>
                        </div>
                    </div>
                </div><!--
                --><div class="lg-four rightCol">
                    <div class="textCenter cartSidebar adminOrders lGrayWhiteGradient">
                        <h1 class="ital fw-300"> Order Status </h1>
                        <div class="styledSelectLarge mrg-t-15 mrg-b-15">
                            <select id="OrdStatusDropDown" name="OrdStatusDropDown">
                                <option <?php
                                if (isset($OrdStatus) && $OrdStatus == "PRC") {
                                    echo " selected=''";
                                }
                                ?> value="PRC" >Processing</option>
                                <option <?php
                                if (isset($OrdStatus) && $OrdStatus == "SHP") {
                                    echo " selected=''";
                                }
                                ?> value="SHP">Shipped</option>
                                <option <?php
                                if (isset($OrdStatus) && $OrdStatus == "PND") {
                                    echo " selected=''";
                                }
                                ?> value="PND">Pending</option>
                                <option <?php
                                if (isset($OrdStatus) && $OrdStatus == "CNC") {
                                    echo " selected=''";
                                }
                                ?> value="CNC">Cancelled</option>
                            </select>                            
                        </div>
                        <div class="mrg-15 mrg-b-0">
                            <h3 class="marBottom6">Tracking #</h3>
                            <input type="text" id="TrackingNo" name="TrackingNo" value="<?php echo $TrackingNo; ?>" />
                        </div>
                    </div>
                    <div class="textRight">
                        <div class="alertMessage textCenter" id="UpdMsg" style="display:none">This order was successfully updated.</div>
                        <a class="fillBtn caps" id="UpdOrdBtn" href="#"><b>Update</b></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row marTop30">
                    <div class="sm-twelve">
                        <div class="cartTableWrapper">
                            <div class="titleRow">
                                <div class="itemTitle sm-five lg-two textCenter">Item</div><!--
                                --><div class="qtyTitle sm-three lg-two">Quantity</div><!--
                                --><div class="productTitle sm-zero lg-six">Product</div><!--
                                --><div class="priceTitle sm-four lg-two">Price</div>
                            </div>
                            <div class="updateTotalOverlayWrapper">
                                <?php
                                $itemCounter = 0;
                                foreach ($Order as $productArr) {
                                    $product = $productArr["item"];
                                    //print_r($product);
                                    //exit();
                                    $prodQty = $productArr["qty"];
                                    $SCPID = $product->getId();
                                    $PID = $product->getPID();
                                    $ProductName = $product->getProductName();
                                    $ProdImg = $product->getVar("ThumbnailUrl");
                                    $ProdImgUrl = str_replace('\\', '/', $ProdImg);
                                    if ($ProdImgUrl == "") {
                                        $ProdImgUrl = "/img/product/canvas_black_backpack.png";
                                    }
                                    $ProdPrice = number_format((float) $product->getVar("Price"), 2, '.', '');
                                    ?>
                                    <div class="cartItemsRow">
                                        <div class="cartItemItem sm-five lg-two"><img class="cartProductImage" src="http://virgiljames.net<?php echo $ProdImgUrl; ?>" alt=""><span class="productNameMobile"><?php echo $ProductName; ?></span><span class="produtNumber">Product ID: #<?php echo $PID; ?></span></div><!--
                                        --><div class="cartItemQty sm-three lg-two"><?php echo $Qty; ?></div><!--
                                        --><div class="cartItemProduct  sm-zero lg-six"><span class="productName"><?php echo $ProductName; ?></span><!--<span class="shippingInfo">Shipping Included</span>--></div><!--
                                        --><div class="cartItemPrice sm-four lg-two">$<?php echo $ProdPrice; ?></div>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php
                            if ($Order->getVar("TaxAmt") > 0) {
                                $TaxAmt = $Order->getVar("TaxAmt");
                                $TaxAmt = number_format((float) $TaxAmt, 2, '.', '');
                                ?>
                                <div class="row cartPriceRow">
                                    <div class="subtotalSpacer sm-eight lg-ten">Sub Total&nbsp;&nbsp;&nbsp;</div><!--
                                    --><div class="subtotalPrice sm-four lg-two">$<?php echo $Order->getTotalWithOutTax(); ?></div>
                                </div>
                                <div class="row cartPriceRow">
                                    <div class="subtotalSpacer sm-eight lg-ten">Tax&nbsp;&nbsp;&nbsp;</div><!--
                                    --><div class="subtotalPrice sm-four lg-two">$<?php echo $TaxAmt; ?></div>
                                </div>
                            <?php } ?><div class="row totalRow">
                                <div class="subtotalSpacer sm-eight lg-ten">Total&nbsp;&nbsp;&nbsp;</div><!--
                                --><div class="subtotalPrice sm-four lg-two">$<?php echo $Order->getTotal(); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="row marTop30 v-bottom">
                    <div class="sm-twelve sm-twelve lg-nine v-bottom"><a class="btn-link caps fw-700" href="JavaScript:window.close()">Close</a></div>
                    <div class="sm-twelve sm-twelve lg-three textRight v-bottom"> <a class="fillBtn caps" id="UpdOrdBtn" href="#"><b>Save</b></a> </div>
                </div>-->
            </div>
        </div>
    </div>
</div>
