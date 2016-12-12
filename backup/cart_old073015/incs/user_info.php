<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include $rootpath . "/classes/AddressList.class.php";
require_once $rootpath . "/core/Countries.class.php";

if (!isset($UsrID) || $UsrID == '') {
    if (isset($_GET['UsrID']) && $_GET['UsrID'] != "") {
        $UsrID = $_GET['UsrID'];
    } else {
        $UsrID = $_SESSION['UsrID'];
    }
}
$Countries = new Countries();
$AddressList = new AddressList($UsrID);

$shipAddressList = $AddressList->getShipAddressList();
$billAddressList = $AddressList->getBillAddressList();
?><h2>Shipping Information</h2>
<form class="checkoutForm generalForm generalFormBlock" action="addAddrToCart.php" method="post" id="cartship" name="cartship" >
    <div style="" id="usrInfoShipAddrs">
        <?php include 'user_shp_addrs.php'; ?>
    </div>    
</form>
<?php include 'paym_options.php'; ?><div style="display:none;" id="ccBillInfo">
    <br />
    <h2>Billing Address<span class="fltR size7 fw-300" style="position:relative; top:.8em;">
            &nbsp;<input id="sameAddr" name="sameAddr" type="checkbox">
            Use Shipping Address
        </span></h2>
    <form class="checkoutForm generalForm generalFormBlock" action="addAddrToCart.php" method="post" id="cartship" name="cartship" >
        <div style="" id="usrInfoBillAddrs"><?php include 'user_bill_addrs.php'; ?></div>
    </form>

    <h3>Card Information</h3>
    <br />
    <div class="row">
        <div class="sm-twelve lg-six"><?php include "creditCardInfo.php"; ?></div>
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

<script>
    function setPrimShipAddr() {
<?php if (isset($primShipAddr) && $primShipAddr != "") { ?>

            addAddrToSession('<?php echo $primShipAddr; ?>', 'Shp');
            shipAddrExist = true;
<?php } ?>
    }

    function setPrimBillAddr() {
<?php if (isset($primBillAddr) && $primBillAddr != "") { ?>
            addAddrToSession('<?php echo $primBillAddr; ?>', 'Bil');
            billAddrExist = true;
<?php } ?>
    }
    
    
    
    
</script>