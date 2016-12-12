<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . "/incs/conn.php";
include $rootpath . "/core/Countries.class.php";
include $rootpath . "/core/States.class.php";
include $rootpath . "/classes/Address.class.php";
include $rootpath . "/incs/check_login.php";


$AddrFrmType = "Shp";
$Countries = new Countries();
if ($cartExist) {
    $ShipAddr = $Cart->getShipAddr();
    if (isset($ShipAddr)) {

        $SFName = $ShipAddr->getVar("FName");
        $SLName = $ShipAddr->getVar("LName");
        $SAddr1 = $ShipAddr->getVar("Addr1");
        $SAddr2 = $ShipAddr->getVar("Addr2");
        $SCity = $ShipAddr->getVar("City");
        $SState = $ShipAddr->getVar("State");
        $SPostal = $ShipAddr->getVar("Postal");
        $SCountry = $ShipAddr->getVar("Country");
        $Email = $ShipAddr->getVar("Email");
        $SPhone = $ShipAddr->getVar("Phone");
        //$SNotes = $Cart->getShipNotes();
        //$SEmail = $Cart->getEmail();
    }
}
if (!isset($SCountry) && ($SCountry == "xx" || $SCountry == "") ) {
    $SCountry = "US";
}



$AddrID = $_GET['AddrID'];
if (isset($AddrID) && $AddrID != "") {
    $Addr = new Address();
    $Addr->initialize($AddrID);

    $SFName = $Addr->getVar("FName");
    $SLName = $Addr->getVar("LName");
    $SAddr1 = $Addr->getVar("Addr1");
    $SAddr2 = $Addr->getVar("Addr2");
    $SCity = $Addr->getVar("City");
    $SState = $Addr->getVar("State");
    $SPostal = $Addr->getVar("Postal");
    $SPhone = $Addr->getVar("Phone");
    $SCountry = $Addr->getVar("Country");
}

?> 
<div class="row textRight"><button onclick="emptyShipAddr();
        return false;" class="textBtn"><em>Clear Address Form</em></button></div>
<div class="sm-twelve lg-six leftCol">
    <label for="fNameShipField">First Name:</label>
    <input id="fNameShipField" type="text" name="FName" value="<?php echo $SFName; ?>" />
</div><!--
--><div class="sm-twelve lg-six rightCol">
    <label for="lNameShipField">Last Name:</label>
    <input id="lNameShipField" type="text" name="LName" value="<?php echo $SLName; ?>"/>
</div><!--
--><div class="sm-twelve lg-six leftCol">
    <label for="address1ShipField">Address Line 1:</label>
    <input id="address1ShipField" type="text" name="Addr1" value="<?php echo $SAddr1; ?>" />
</div><!-- 
--><div class="sm-twelve lg-six rightCol">
    <label for="address2ShipField">Address Line 2:</label>
    <input id="address2ShipField" type="text" name="Addr2" value="<?php echo $SAddr2; ?>" />
</div><!--
--><div class="sm-twelve lg-six leftCol">
    <label for="cityShipField">City:</label>
    <input id="cityShipField" type="text" name="City" value="<?php echo $SCity; ?>" />
</div><!-- 
--><div class="sm-twelve lg-four centerCol">
    <label for="stateShipField">State / Province:</label>
    <div id="SStateAJAXRes"><?php include 'state_input.php'; ?></div>
</div><!--
<!--
--><div class="sm-twelve lg-two rightCol">
    <label for="postalCodeShipField">Postal Code:</label>
    <input id="postalCodeShipField" type="text" name="Postal" value="<?php echo $SPostal; ?>" />
</div><!-- 
--><div class="sm-twelve lg-six leftCol">
    <label for="countryShipSelect">Country:</label>
    <select id="countryShipSelect" name="Country" onchange="changeCountry('Shp')">
        <?php echo $Countries->getCountriesDropDown($SCountry); ?> 
    </select>
</div><!--
--><div class="sm-twelve lg-six rightCol">
    <label for="telShipField">Telephone:</label>
    <input id="telShipField" type="text" name="Phone" value="<?php echo $SPhone; ?>" />
</div><!--
--><?php if (!$logedIn) { ?><!--<div class="sm-twelve lg-six leftCol">
                <label for="eMailShipField">Email Address:</label>
                <input id="eMailShipField" type="email" name="Email" value="<?php //echo $SEmail;   ?>" />
            </div>--><?php } ?><!--
--><?php if ($logedIn) { ?><div class="sm-twelve lg-six leftCol">
        <div class="generalFormInput">
            <input id="saveNewAddress" name="saveNewAddress" class="flTL" type="checkbox">
            <label class="inline textBtn" for="saveNewAddress">&nbsp;Save this Address</label>
        </div>
        <input type="hidden" name="UsrID" id="UsrID" value="<?php echo $_SESSION["UsrID"]; ?>">
    </div>
<?php } ?>