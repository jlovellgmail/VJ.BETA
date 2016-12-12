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
?>
<h2>Shipping Information</h2>
<form class="checkoutForm generalForm generalFormBlock" action="addAddrToCart.php" method="post" id="cartship" name="cartship" >
    <div style="">
        <div class="generalFormInput textRight"><a href="javascript:showModal('','Shp', '<?php echo $UsrID; ?>', 'cart');" class="textBtn modalCall modalCall2">+ Add Shipping Address</a></div>
        <div class="row clearfix">
            <?php
            $count = 0;
            foreach ($shipAddressList as $Addr) {
                $AddrID = $Addr->getVar("AddrID");
                $FName = $Addr->getVar("FName");
                $LName = $Addr->getVar("LName");
                $Addr1 = $Addr->getVar("Addr1");
                $Addr2 = $Addr->getVar("Addr2");
                $City = $Addr->getVar("City");
                $State = $Addr->getVar("State");
                $Postal = $Addr->getVar("Postal");
                $Country = $Countries->getCountryName($Addr->getVar("Country"));
                /* $isPrimary = $Addr->getVar("isPrimary");
                  if ($isPrimary == 1) {
                  $isPrimary = " (Primary)";
                  } else {
                  $isPrimary = "";
                  } */
                $isActive = "";
                $isChecked = "";
                if ($count == 0) {
                    $isActive = "active";
                    $isChecked = "checked='checked'";
                    $primShipAddr = $AddrID;
                }
                ?><div class="lg-twelve">
                    <div class="formWell formWellSelectable <?php echo $isActive; ?>">
                        <input type="radio" onchange="addAddrToSession('<?php echo $AddrID; ?>', 'Shp');" id="formSelectableRadioShp_<?php echo $AddrID; ?>" name="selectableRadio" <?php echo $isChecked; ?>>
                        <label for="formSelectableRadioShp_<?php echo $AddrID; ?>">
                            <h3>Shipping #<?php echo $count + 1; ?><?php //echo $isPrimary;      ?></h3>
                            <ul>
                                <li><?php echo $FName . " " . $LName; ?></li>
                                <li><?php echo $Addr1; ?></li>
                                <li><?php echo $Addr2; ?></li>
                                <li><?php echo $City . ", " . $State . " " . $Postal; ?></li>
                                <li><?php echo $Country; ?></li>
                            </ul>
                            <a href="javascript:showModal('<?php echo $AddrID; ?>','Shp', '<?php echo $UsrID; ?>', 'cart');" class="formWellLink">edit</a>
                        </label>
                    </div>
                </div><?php
                $count++;
            }
            if ($count == 0) {
                echo "<div class='alertMessage textCenter'>There are no Shipping addresses.</div>";
            }
            ?>
        </div>
    </div>
</form>
<h2>Billing Information</h2>
<form class="checkoutForm generalForm generalFormBlock" action="addAddrToCart.php" method="post" id="cartship" name="cartship" >
    <div style="">
        <div class="generalFormInput textRight"><a href="javascript:showModal('','Bil', '<?php echo $UsrID; ?>', 'cart');" class="textBtn modalCall modalCall2">+ Add Billing Address</a></div>
        <div class="row clearfix">
            <?php
            $count = 0;
            $isOddNum = true;
            foreach ($billAddressList as $Addr) {
                $AddrID = $Addr->getVar("AddrID");
                $FName = $Addr->getVar("FName");
                $LName = $Addr->getVar("LName");
                $Addr1 = $Addr->getVar("Addr1");
                $Addr2 = $Addr->getVar("Addr2");
                $City = $Addr->getVar("City");
                $State = $Addr->getVar("State");
                $Postal = $Addr->getVar("Postal");
                $Country = $Countries->getCountryName($Addr->getVar("Country"));
                /* $isPrimary = $Addr->getVar("isPrimary");
                  if ($isPrimary == 1) {
                  $isPrimary = " (Primary)";
                  } else {
                  $isPrimary = "";
                  } */
                $isActive = "";
                $isChecked = "";
                if ($count == 0) {
                    $isActive = "active";
                    $isChecked = "checked='checked'";
                    $primBillAddr = $AddrID;
                }
                ?><div class="lg-twelve">
                    <div class="formWell formWellSelectable <?php echo $isActive; ?>">
                        <input type="radio" onchange="addAddrToSession('<?php echo $AddrID; ?>', 'Bil');" id="formSelectableRadioBil_<?php echo $AddrID; ?>" name="selectableRadio" <?php echo $isChecked; ?>>
                        <label for="formSelectableRadioBil_<?php echo $AddrID; ?>">
                            <h3>Billing #<?php echo $count + 1; ?><?php //echo $isPrimary;      ?></h3>
                            <ul>
                                <li><?php echo $FName . " " . $LName; ?></li>
                                <li><?php echo $Addr1; ?></li>
                                <li><?php echo $Addr2; ?></li>
                                <li><?php echo $City . ", " . $State . " " . $Postal; ?></li>
                                <li><?php echo $Country; ?></li>
                            </ul>
                            <a href="javascript:showModal('<?php echo $AddrID; ?>','Bil', '<?php echo $UsrID; ?>', 'cart');" class="formWellLink">edit</a>
                        </label>
                    </div>
                </div><?php
                $count++;
            }
            if ($count == 0) {
                echo "<div class='alertMessage textCenter'>There are no Billing addresses.</div>";
            }
            ?> 
        </div>
    </div>
</form>
<h2>Card Information</h2>
<?php include "creditCardInfo.php"; ?>
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