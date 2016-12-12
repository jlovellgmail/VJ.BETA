<?php
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
if (!isset($Countries)) {
    $Countries = new Countries();
}
//if (!isset($AddressList) && is_array($AddressList)) {
$AddressList = new AddressList($UsrID);
//}

if ($SavedAddrFlag == "Shipping") {
    $AddressList = $AddressList->getShipAddressList();
    $radioID = "formSelectableRadioShp_";
    $radioName = "formSelectableRadioShp_";
    $ulID = "shipAddrDet_";
    $AddrType = "Shp";
}

if ($SavedAddrFlag == "Billing") {
    $AddressList = $AddressList->getBillAddressList();
    $radioID = "formSelectableRadioBil_";
    $radioName = "formSelectableRadioBil_";
    $AddrType = "Bil";
    $ulID = "billAddrDet_";
}
?>
<div class="row clearfix dynamicCol generalForm">
    <?php
    $count = 0;
    foreach ($AddressList as $Addr) {
        $AddrID = $Addr->getVar("AddrID");
        $FName = $Addr->getVar("FName");
        $LName = $Addr->getVar("LName");
        $Addr1 = $Addr->getVar("Addr1");
        $Addr2 = $Addr->getVar("Addr2");
        $City = $Addr->getVar("City");
        $State = $Addr->getVar("State");
        $Postal = $Addr->getVar("Postal");
        $Phone = $Addr->getVar("Phone");
        $Country = $Countries->getCountryName($Addr->getVar("Country"));
        ?>
        <div class="sm-twelve lg-three">
            <div class="formWell formWellSmall formWellSelectable">
                <input onChange="useSavedAddr('<?php echo $AddrID; ?>', '<?php echo $AddrType; ?>');" id="<?php echo $radioID . $AddrID; ?>" name="<?php echo $radioName; ?>"  type="radio">
                <label for="<?php echo $radioID . $AddrID; ?>" class="eqHeightJs01" id="lbl_<?php echo $AddrID; ?>">
                    <h3>Address #<?php echo $count + 1; ?></h3>
                    <ul id="<?php echo $ulID . $AddrID; ?>">
                        <li><?php echo $FName . " " . $LName; ?></li>
                        <li><?php echo $Addr1; ?></li>
                        <?php if (isset($Addr2) && $Addr2 != "") { ?>
                            <li><?php echo $Addr2; ?></li>
                        <?php } ?>
                        <li><?php echo $City . ", " . $State . " " . $Postal; ?></li>
                        <li><?php echo $Country; ?></li>
                        <?php if (isset($Phone) && $Phone != "") { ?>
                            <li><?php echo $Phone; ?></li>
                        <?php } ?>
                    </ul>
                    <!--<a href="javascript:showModal('7015','Shp', '1003', 'cart');" class="formWellLink">edit</a>-->
                </label>
            </div>
        </div><!--
        --><?php
        $count++;
    }
    ?><!--
       
    --></div>