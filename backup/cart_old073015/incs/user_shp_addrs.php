<?php
if (isset($_GET["callMethod"]) && $_GET["callMethod"] == "ajax") {
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
}
?>




<div class="generalFormInput textRight">
    <a href="javascript:showModal('','Shp', '<?php echo $UsrID; ?>', 'cart');" class="textBtn modalCall modalCall2">+ Add Shipping Address</a>
</div>
<div class="row clearfix dynamicCol">
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
        $Phone = $Addr->getVar("Phone");
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
        ?><div class="sm-twelve lg-three" >
            <div class="formWell formWellSelectable <?php echo $isActive; ?>">
                <input type="radio" onchange="addAddrToSession('<?php echo $AddrID; ?>', 'Shp');" id="formSelectableRadioShp_<?php echo $AddrID; ?>" name="selectableRadioShip" <?php echo $isChecked; ?>>
                <label for="formSelectableRadioShp_<?php echo $AddrID; ?>" class="eqHeightJs01" id="lbl_<?php echo $AddrID; ?>">
                    <h3>Shipping #<?php echo $count + 1; ?><?php //echo $isPrimary;                    ?></h3><br />
                    <ul id="shipAddrDet_<?php echo $AddrID; ?>">
                        <li><?php echo $FName . " " . $LName; ?></li>
                        <li><?php echo $Addr1; ?></li>
                        <li><?php echo $Addr2; ?></li>
                        <li><?php echo $City . ", " . $State . " " . $Postal; ?></li>
                        <li><?php echo $Country; ?></li>
                        <li><?php echo $Phone; ?></li>
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
    <!--<label>Shipping Notes</label>
    <textarea id="shipNotesField" name="Notes" onblur="addAddrToSession('<?php //echo $AddrID;  ?>', 'Shp');"></textarea>-->
</div>