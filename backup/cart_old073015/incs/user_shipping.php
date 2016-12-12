<?php
$SavedAddrFlag="Shipping";
?>

<h2>Shipping Address</h2>
<!--<div><input id="US" name="ShipZone" value="US" type="radio" checked="">USA&nbsp;&nbsp;<input id="Int" type="radio" name="ShipZone" value="Int" >International</div>-->
<?php if ($logedIn) { ?>
    <div class="marBottom15 textRight"><button class="textBtn toggleDivBtn" data-id="showSavedShipAdd">Use A Saved Address</button></div>
    <div id="showSavedShipAdd" class="marBottom30" style="display:none;">
        <?php include 'incs/saved_addresses.php'; ?>
    </div>                                     
<?php } ?>    

<form class="checkoutForm generalForm generalFormBlock" action="" method="post" id="cartship" name="cartship" >
    <div class="row" id="shipAddrFormDet"><?php include 'incs/ship_addr_form.php'; ?></div>
</form>