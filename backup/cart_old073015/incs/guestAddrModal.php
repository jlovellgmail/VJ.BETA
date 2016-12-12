<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/conn.php';
require_once $rootpath . "/classes/Cart.class.php";
include $rootpath . '/classes/Address.class.php';
include $rootpath . "/core/Countries.class.php";

$cartExist = FALSE;
if (!isset($_SESSION)) {
    session_start();
}
//unset($_SESSION["Cart"]);
if (isset($_SESSION["Cart"])) {
    $Cart = $_SESSION["Cart"];
    if ($Cart->count() > 0) {
        $cartExist = TRUE;
    }
}


$type = $_GET['Type'];

$FName = '';
$LName = '';
$Addr1 = '';
$Addr2 = '';
$City = '';
$State = '';
$Postal = '';
$Country = 'xx';

if (isset($type) && $type != "") {
    if ($type == "Shp") {
        $ModalHeader = "Shipping";
        $Addr = $Cart->getShipAddr();
    } else {
        $ModalHeader = "Billing";
        $Addr = $Cart->getBillAddr();
    }
}

$Countries = new Countries();



if (isset($Addr) ) {
    
    $FName = $Addr->getVar("FName");
    $LName = $Addr->getVar("LName");
    $Addr1 = $Addr->getVar("Addr1");
    $Addr2 = $Addr->getVar("Addr2");
    $City = $Addr->getVar("City");
    $State = $Addr->getVar("State");
    $Postal = $Addr->getVar("Postal");
    $Country = $Addr->getVar("Country");
    if ($type == "Shp") {
        $Email = $Cart->getEmail();
    }
}
?>
<h6 class="modalTitle">Update <?php echo $ModalHeader; ?> Address</h6>
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
    <input type="text" id="State" name="State" value="<?php echo $State; ?>">
    <label>Zip Code</label>
    <input type="text" id="Postal" name="Postal" value="<?php echo $Postal; ?>">
    <label>Country</label>
    <select id="Country" name="Country">
        <?php echo $Countries->getCountriesDropDown($Country); ?> 
    </select>
    <label>Telephone</label>
    <input type="text" id="Phone" name="Phone" value="">
<?php if ($type == "Shp") { ?>
    <label>Email</label>
    <input id="Email" name="Email" value="<?php echo $Email ?>" type="email">
<?php } ?>
    
    
    <input type="hidden" id="Type" name="Type" value="<?php echo $type; ?>">

    <div class="generalFormSubmit textCenter">
        <button type="button" onClick="updGuestData('<?php echo $type; ?>')" class="fillBtn">Save</button>
    </div>

</form>