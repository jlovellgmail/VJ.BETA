<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . "/incs/conn.php";
include $rootpath . "/core/Countries.class.php";
include $rootpath . "/classes/Address.class.php";
include $rootpath . "/incs/check_login.php";

$Countries = new Countries();
if ($cartExist) {
    $BillAddr = $Cart->getBillAddr();
    if (isset($BillAddr)) {

        $BFName = $BillAddr->getVar("FName");
        $BLName = $BillAddr->getVar("LName");
        $BAddr1 = $BillAddr->getVar("Addr1");
        $BAddr2 = $BillAddr->getVar("Addr2");
        $BCity = $BillAddr->getVar("City");
        $BState = $BillAddr->getVar("State");
        $BPostal = $BillAddr->getVar("Postal");
        $BCountry = $BillAddr->getVar("Country");
    }
}
if (!isset($BCountry) && ($BCountry=="xx" || $BCountry=="")){
    $BCountry="US";
}
$AddrFrmType = "Bil";

$AddrID = $_GET['AddrID'];
if (isset($AddrID) && $AddrID != "") {
    $Addr = new Address();
    $Addr->initialize($AddrID);

    $BFName = $Addr->getVar("FName");
    $BLName = $Addr->getVar("LName");
    $BAddr1 = $Addr->getVar("Addr1");
    $BAddr2 = $Addr->getVar("Addr2");
    $BCity = $Addr->getVar("City");
    $BState = $Addr->getVar("State");
    $BPostal = $Addr->getVar("Postal");
    $BPhone = $Addr->getVar("Phone");
    $BCountry = $Addr->getVar("Country");
}
?>
<div class="row textRight"><button onclick="emptyBilAddr();
        return false;" class="textBtn"><em>Clear Address Form</em></button></div>
<div class="sm-twelve lg-six leftCol">            
    <label for="fNameBillField">First Name:</label>
    <input id="fNameBillField" type="text" name="FName" value="<?php echo $BFName; ?>" />
</div><!--
--><div class="sm-twelve lg-six rightCol">              
    <label for="lNameBillField">Last Name:</label>
    <input id="lNameBillField" type="text" name="LName" value="<?php echo $BLName; ?>" />
</div><!--
--><div class="sm-twelve lg-six leftCol">            
    <label for="address1BillField">Address Line 1:</label>
    <input id="address1BillField" type="text" name="Addr1" value="<?php echo $BAddr1; ?>" />
</div><!--
--><div class="sm-twelve lg-six rightCol">              
    <label for="address2BillField">Address Line 2:</label>
    <input id="address2BillField" type="text" name="Addr2" value="<?php echo $BAddr2; ?>" />
</div><!--
--><div class="sm-twelve lg-six leftCol">            
    <label for="cityBillField">City:</label>
    <input id="cityBillField" type="text" name="City" value="<?php echo $BCity; ?>" />
</div><!--
--><div class="sm-twelve lg-four centerCol">              
    <label for="stateBillField">State / Province:</label>
    <div id="BStateAJAXRes"><?php include 'state_input.php'; ?></div>
</div><!--
--><div class="sm-twelve lg-two rightCol">            
    <label for="postalCodeBillField">Postal Code:</label>
    <input id="postalCodeBillField" type="text" name="Postal" value="<?php echo $BPostal; ?>" />
</div><!--
--><div class="sm-twelve lg-six leftCol">              
    <label for="countryBillSelect">Country:</label>
    <select id="countryBillSelect" name="Country" onchange="changeCountry('Bil')">
        <?php echo $Countries->getCountriesDropDown($BCountry); ?> 
    </select>
</div><!--
--><?php if ($logedIn) { ?><div class="sm-twelve">
        <div class="generalFormInput">
            <input id="saveNewAddress" name="saveNewAddress" class="flTL" type="checkbox">
            <label class="inline textBtn" for="saveNewAddress">&nbsp;Save this Address</label>
        </div>
       <input type="hidden" name="UsrID" id="UsrID" value="<?php echo $_SESSION["UsrID"]; ?>" />
    </div>
<?php } ?>