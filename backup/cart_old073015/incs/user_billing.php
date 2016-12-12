<?php
$SavedAddrFlag = "Billing";
$paymMeth = "";
if ($cartExist) {
    $paymMeth = $Cart->getPaymMethod();
    $BillAddrCC = $Cart->getBillAddr(); 
}
?>

<div <?php if (!$paymMeth=="cc" && !isset($BillAddrCC)){echo "style='display:none;'";}?> id="ccBillInfo">
    <h2>
        Billing Address
        <span class="fltR size7 fw-300" style="position:relative; top:.8em;">
            <input type="checkbox"  class="collapseCheckAlt" name="sameAddr" id="sameAddr" value="savedBillAddressArea"/>
            <label class="inline"  for="sameAddr">Use Shipping Address</label>
        </span>
    </h2>
    <?php if ($logedIn) { ?>
        <div id="savedBillAddressArea">
            <div class="marBottom15 textRight"><button class="textBtn toggleDivBtn" data-id="showSavedBillAdd">Use A Saved Address</button></div>
            <div id="showSavedBillAdd" class="marBottom30" style="display:none;">
                <?php include 'incs/saved_addresses.php'; ?>
            </div>                                     
        </div>
    <?php } ?>    
    <form class="checkoutForm generalForm generalFormBlock" action="" method="post" id="cartbill" name="cartbill" >
        <div class="row" id="billAddrFormDet"><?php include 'incs/bill_addr_form.php'; ?></div>
    </form>
    <h3>Card Information</h3><br />
    <div class="row"><div class="sm-twelve lg-six"><?php include "creditCardInfo.php"; ?></div></div>
</div>