<?php
if ($cartExist) {

    $ShipAddr = $Cart->getShipAddr();
    $ContFlag = FALSE;
    if ($PaymMethod == "cc") {
        $BillAddr = $Cart->getBillAddr();
    }
    if (isset($ShipAddr) && isset($BillAddr) && isset($PaymMethod) && $PaymMethod == "cc") {
        $ContFlag = TRUE;
    }

    if (isset($ShipAddr) && isset($PaymMethod) && $PaymMethod == "paypal") {
        $ContFlag = TRUE;
    }

    if (!$ContFlag) {
        header("Location: /cart/");
    }
} else {
    header("Location: /cart/");
}
?>

<!-- Top Hero -->
<div class="bgWrapperLeaf">
    <div class="leafWrapper cartHeroBgWrapper">
        <div class="tableWrapper">
            <div class="cellWrapper">
                <div class="widthWrapper" style="padding-left:0; padding-right:0;">
                    <div class="cartHeroLine1">My Cart</div>
                    <br><br><?php include 'incs/cart_nav.php'; ?><br>
                </div>
            </div>
        </div>
    </div>
</div>        

<div class="bgWrapper checkoutBgWrapper">
    <div class="widthWrapper">
        <div class="tableWrapper tableHeight">
            <div class="cellWrapper">
                <h1>Order Review</h1> 
                <br />                    
                <div class="row"><?php include 'incs/cart_overview.php'; ?>
                    <div class="sm-twelve">
                        <div class="row dynamicCol">
                            <div class="sm-twelve md-four lg-four">
                                <div class="well eqHeightJs_01">
                                    <h3 class="black">Shipping Address</h3>
                                    <?php
                                    if ($cartExist) {
                                        //$ShipAddr = $Cart->getShipAddr();
                                        if (isset($ShipAddr)) {
                                            $AddrID = $ShipAddr->getVar("AddrID");
                                            $SName = $ShipAddr->getVar("FName") . " " . $ShipAddr->getVar("LName");
                                            $SAddr1 = $ShipAddr->getVar("Addr1");
                                            $SAddr2 = $ShipAddr->getVar("Addr2");
                                            $SCityStateZip = $ShipAddr->getVar("City") . ", " . $ShipAddr->getVar("State") . " " . $ShipAddr->getVar("Postal");
                                            $SCoutry = $Countries->getCountryName($ShipAddr->getVar("Country"));
                                            //$Email = $ShipAddr->getVar("Email");
                                            $Phone = $ShipAddr->getVar("Phone");
                                            $Email = $Cart->getEmail();
                                        }
                                        if ($logedIn) {
                                            $editLink = "javascript:showModal('" . $AddrID . "','Shp','" . $UsrID . "','review');";
                                        } else {
                                            $editLink = "javascript:updGuestModal('Shp');";
                                        }
                                    }
                                    ?>
                                    <ul>
                                        <li><?php echo $SName; ?></li>
                                        <li><?php echo $SAddr1; ?></li>
                                        <?php
                                        if (isset($SAddr2) && $SAddr2 != "") {
                                            echo "<li>" . $SAddr2 . "</li>";
                                        }
                                        ?>
                                        <li><?php echo $SCityStateZip; ?></li>
                                        <li><?php echo $SCoutry; ?></li>
                                        <?php
                                        if (isset($Email) && $Email != "") {
                                            echo "<li><br>" . $Email . "</li>";
                                        }
                                        if (isset($Phone) && $Phone != "") {
                                            echo "<li>" . $Phone . "</li>";
                                        }
                                        ?>

                                    </ul>
                                    <a href="checkout.php#ship" class="wellLink">edit</a></div>

                            </div><div class="sm-twelve md-four lg-four">
                                <div class="well eqHeightJs_01">
                                    <h3 class="black">Billing Address</h3>
                                    <?php
                                    if ($cartExist) {
                                        if ($PaymMethod == "cc") {
                                            $AddrID = '';
                                            //$BillAddr = $Cart->getBillAddr();
                                            if (isset($BillAddr)) {
                                                $AddrID = $BillAddr->getVar("AddrID");
                                                $BName = $BillAddr->getVar("FName") . " " . $BillAddr->getVar("LName");
                                                $BAddr1 = $BillAddr->getVar("Addr1");
                                                $BAddr2 = $BillAddr->getVar("Addr2");
                                                $BCityStateZip = $BillAddr->getVar("City") . ", " . $BillAddr->getVar("State") . " " . $BillAddr->getVar("Postal");
                                                $BCoutry = $Countries->getCountryName($BillAddr->getVar("Country"));

                                                if ($logedIn) {
                                                    $editLink = "javascript:showModal('" . $AddrID . "','Bil','" . $UsrID . "','review');";
                                                } else {
                                                    $editLink = "javascript:updGuestModal('Bil');";
                                                }
                                                ?>
                                                <ul>
                                                    <li><?php echo $BName; ?></li>
                                                    <li><?php echo $BAddr1; ?></li>
                                                    <?php
                                                    if (isset($BAddr2) && $BAddr2 != "") {
                                                        echo "<li>" . $BAddr2 . "</li>";
                                                    }
                                                    ?>
                                                    <li><?php echo $BCityStateZip; ?></li>
                                                    <li><?php echo $BCoutry; ?></li>

                                                </ul>
                                                <a href="checkout.php#bill" class="wellLink">edit</a>
                                                <?php
                                            }
                                        } else if ($PaymMethod == "paypal") {
                                            ?>
                                            <p class="textCenter"><em>On file with PayPal.</em></p>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div><div class="sm-twelve md-four lg-four">
                                <div class="well eqHeightJs_01">
                                    <h3 class="black">Payment Information</h3>
                                    <?php
                                    if ($cartExist) {
                                        $PaymMethod = $Cart->getPaymMethod();
                                        $CC = $Cart->getCreditCard();
                                        if (isset($CC) && $PaymMethod == "cc") {
                                            $CCHolder = $CC->getVar("CCName");
                                            $CCLastDig = substr($CC->getVar("CCNumber"), -4);
                                            $CCType = $CC->getVar("CCType") . " ending in " . $CCLastDig;
                                            $monthNum = $CC->getVar("CCXMonth");
                                            $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
                                            $CCExp = $monthName . ", " . $CC->getVar("CCXYear");
                                            ?>
                                            <ul>
                                                <li class="inlineTextField"><span>Cardholder:</span> <?php echo $CCHolder; ?></li>
                                                <li class="inlineTextField"><span>Card Type:</span> <?php echo $CCType; ?></li>
                                                <li class="inlineTextField"><span>Card Expires:</span> <?php echo $CCExp; ?></li>
                                            </ul>
                                            <?php
                                        } else if ($PaymMethod == "paypal") {
                                            ?>
                                            <p class="textCenter"><em>On file with PayPal.</em></p>
                                        <?php } ?>
                                        <a href="checkout.php#paym" class="wellLink">change</a> </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <br />
                        <div class="row generalForm">
                            <div class="sm-twelve lg-six v-mid">
                                <label>Shipping Notes</label>
                                <textarea id="shipNotesField" name="Notes"><?php echo $Notes; ?></textarea>
                            </div><?php
                            if (isset($ShipAddr) && isset($BillAddr) && isset($PaymMethod)) {
                                $OrderFlag = TRUE;
                            } else {
                                $OrderFlag = FALSE;
                            }
                            ?><div class="sm-twelve md-six textRight marBottom15 v-mid">
                                <label>
                                    <input type="checkbox" name="termAndCont" id="termAndCont">&nbsp;&nbsp;
                                    I have read and accept the <a style="text-decoration:underline;" href="#">shipping and returns</a> policy.
                                </label>
                                <br />
                                <?php if (!$logedIn) { ?>
                                    <div class="sm-twelve md-six textRight marBottom15 v-mid">
                                        <label>Enter a Valid Email Address</label>
                                        <input id="eMailShipField" type="email" name="Email" value=""  />&nbsp;&nbsp;
                                    </div>
                                <?php } ?>
                            </div>
                            <br /><br />
                            <div class="textRight"><button class="fillBtn" id="placeOrd" onclick="completeOrd('<?php echo $PaymMethod; ?>','<?php echo $logedIn; ?>')">Place Order</button><div class="processBtn" id="processingDiv" style="display:none;">Processing...</div></div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modalOverlay" class="modalOverlay hide">
    <div class="modalContainer">
        <div class="modalWindow">
            <button class="modalClose">X</button>
            <div id="addrModal" class="modalContent modal1 hide">

            </div>            
        </div>
    </div>
</div>

<!--<div class="sm-twelve md-four lg-four">
    <div class="well">
        <h3>
            <div class="checkLabelDisplay fltL">
                <input type="checkbox" class="collapseCheck" id="check01_label" value="check01">
                <label for="check01_label">&nbsp;</label>
            </div>
            Create Virgil James Account?
        </h3>
        <div class="collapseCheckContent" id="check01">
            <div class="row">
                <form class="generalForm small">
                    <input class="textField" type="text" value="usersemail@address.com">
                    <input class="textField" placeholder="Enter Password" type="password" name="Passwd" id="Passwd">
                    <input class="textField" placeholder="Re-Enter Password" type="password" name="Conf_Passwd" id="Conf_Passwd">
                </form>
            </div>                                        
        </div>
    </div>
</div>-->
