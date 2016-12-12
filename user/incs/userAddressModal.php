<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/conn.php';
include $rootpath . '/classes/Address.class.php';
include $rootpath . "/core/Countries.class.php";

$AddrID = $_GET['AddrID'];
$UsrID = $_GET['UsrID'];
$type = $_GET['Type'];
$from = $_GET['from'];

$FName = '';
$LName = '';
$Addr1 = '';
$Addr2 = '';
$City = '';
$State = '';
$Postal = '';
$Country = 'US';
$Phone = "";

if (isset($type) && $type != "") {
    if ($type == "Shp") {
        $ModalHeader = "Shipping";
    } else {
        $ModalHeader = "Billing";
    }
}

$Countries = new Countries();

if (isset($AddrID) && $AddrID != "") {
    $Addr = new Address();
    $Addr->initialize($AddrID);

    $FName = $Addr->getVar("FName");
    $LName = $Addr->getVar("LName");
    $Addr1 = $Addr->getVar("Addr1");
    $Addr2 = $Addr->getVar("Addr2");
    $City = $Addr->getVar("City");
    $State = $Addr->getVar("State");
    $Postal = $Addr->getVar("Postal");
    $Country = $Addr->getVar("Country");
    $Phone = $Addr->getVar("Phone");
    $isPrimary = $Addr->getVar("isPrimary");
    if ($isPrimary == 1) {
        $isPrimary = "checked";
    } else {
        $isPrimary = "";
    }
}
?>
<?php if (isset($AddrID) && $AddrID != "") { ?>	
    <h6 class="modalTitle">Update <?php echo $ModalHeader; ?> Address</h6>
<?php } else { ?>
    <h6 class="modalTitle">Add <?php echo $ModalHeader; ?> Address</h6>
<?php } ?>
<form id="AddrFrm" class="generalForm modalForm">
    <label>First Name</label>
    <input type="text" id="FName" name="FName" value="<?php echo $FName; ?>">
    <label>Last Name</label>
    <input type="text" id="LName" name="LName" value="<?php echo $LName; ?>">
    <label>Address 1</label>
    <input type="text" id="Addr1" name="Addr1" value="<?php echo $Addr1; ?>">
    <label>Address 2</label>
    <input type="text" id="Addr2" name="Addr2" value="<?php echo $Addr2; ?>">
    <label>City</label>
    <input type="text" id="City" name="City" value="<?php echo $City; ?>">
    <label>State</label>
    <div id="UsrAddrAjaxRes"><?php include '../../incs/state_input.php'; ?></div>

    <label>Zip Code</label>
    <input type="text" id="Postal" name="Postal" value="<?php echo $Postal; ?>">
    <label>Country</label>
    <select id="Country" name="Country" onchange="changeCountryUsr()">
        <?php echo $Countries->getCountriesDropDown($Country); ?> 
    </select>
    <?php if ($type == "Shp") { ?>
        <label>Telephone</label>
        <input type="text" id="Phone" name="Phone" value="<?php echo $Phone; ?>">
    <?php } ?>
    <input type="hidden" id="Type" name="Type" value="<?php echo $type; ?>">
    <input type="hidden" id="UsrID" name="UsrID" value="<?php echo $UsrID; ?>">
    <?php if (isset($AddrID) && $AddrID != "" && $from != "cart" && $from != "review") { ?>
        <div class="generalFormInput">		
        <!--<input type="checkbox" id="isPrimary" name="isPrimary" <?php //echo $isPrimary;       ?>/> <label class="inline" for="setPrimary">Set as primary address</label>-->
            <div class="fltR"><a href="javascript:deleteAddress('<?php echo $AddrID; ?>', '<?php echo $UsrID; ?>', '<?php echo $from; ?>');"><em>Delete Address</em></a></div>
        </div>
    <?php } ?>

    <div class="generalFormSubmit textCenter">
        <button type="button" onClick="addAddress('<?php echo $AddrID; ?>', '<?php echo $from; ?>');" class="fillBtn">Save</button>
    </div>

</form>