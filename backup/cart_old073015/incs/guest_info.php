<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . "/incs/conn.php";
include $rootpath . "/core/Countries.class.php";

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
        $SPostal=$ShipAddr->getVar("Postal");
        $SCoutry = $ShipAddr->getVar("Country");
        $Email = $ShipAddr->getVar("Email");
        $SPhone = $ShipAddr->getVar("SPhone");
        $SNotes = $Cart->getShipNotes();
        $SEmail = $Cart->getEmail();
    }
}
?>

<div class="guestCheckoutInputs">
    <h2>Shipping Address</h2>
    <form class="checkoutForm generalForm generalFormBlock" action="" method="post" id="cartship" name="cartship" >
        <div class="row">
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
            --><div class="sm-twelve lg-six rightCol">
                <label for="stateShipField">State / Province:</label>
                <input id="stateShipField" type="text" name="State" value="<?php echo $SState; ?>" />
            </div><!--
            <!--
            --><div class="sm-twelve lg-six leftCol">
                <label for="postalCodeShipField">Postal Code:</label>
                <input id="postalCodeShipField" type="text" name="Postal" value="<?php echo $SPostal; ?>" />
            </div><!-- 
            --><div class="sm-twelve lg-six rightCol">
                <label for="countryShipSelect">Country:</label>
                <select id="countryShipSelect" name="Country">
                    <?php echo $Countries->getCountriesDropDown('xx'); ?> 
                </select>
            </div><!--
            --><div class="sm-twelve lg-six leftCol">
                <label for="eMailShipField">Email Address:</label>
                <input id="eMailShipField" type="email" name="Email" value="<?php echo $SEmail; ?>" />
            </div><!--
            --><div class="sm-twelve lg-six rightCol">
                <label for="telShipField">Telephone:</label>
                <input id="telShipField" type="text" name="Phone" value="<?php echo $SPhone; ?>" />
            </div><!--	
            --></div>
    </form>
    <?php include 'incs/paym_options.php'; ?>
    <br /><br />
    <div style="display:none;" id="ccBillInfo">
        <h2>
            Billing Address
            <span class="fltR size7 fw-300" style="position:relative; top:.8em;">
                &nbsp;<input type="checkbox" id="sameAddr" name="sameAddr" />
                Use Shipping Address
            </span>
        </h2>
        <br />
        <form class="checkoutForm generalForm generalFormBlock" action="" method="post" id="cartbill" name="cartbill" >
            <div class="row">
                <div class="sm-twelve lg-six leftCol">            
                    <label for="fNameBillField">First Name:</label>
                    <input id="fNameBillField" type="text" name="FName" />
                </div><!--
                --><div class="sm-twelve lg-six rightCol">              
                    <label for="lNameBillField">Last Name:</label>
                    <input id="lNameBillField" type="text" name="LName" />
                </div><!--
                --><div class="sm-twelve lg-six leftCol">            
                    <label for="address1BillField">Address Line 1:</label>
                    <input id="address1BillField" type="text" name="Addr1" />
                </div><!--
                --><div class="sm-twelve lg-six rightCol">              
                    <label for="address2BillField">Address Line 2:</label>
                    <input id="address2BillField" type="text" name="Addr2" />
                </div><!--
                --><div class="sm-twelve lg-six leftCol">            
                    <label for="cityBillField">City:</label>
                    <input id="cityBillField" type="text" name="City" />
                </div><!--
                --><div class="sm-twelve lg-six rightCol">              
                    <label for="stateBillField">State / Province:</label>
                    <input id="stateBillField" type="text" name="State" />
                </div><!--
                --><div class="sm-twelve lg-six leftCol">            
                    <label for="postalCodeBillField">Postal Code:</label>
                    <input id="postalCodeBillField" type="text" name="Postal" />
                </div><!--
                --><div class="sm-twelve lg-six rightCol">              
                    <label for="countryBillSelect">Country:</label>
                    <select id="countryBillSelect" name="Country">
                        <?php echo $Countries->getCountriesDropDown('xx'); ?> 
                    </select>
                </div>           
            </div>
        </form>
        <h3>Card Information</h3><br />
        <div class="row"><div class="sm-twelve lg-six"><?php include "creditCardInfo.php"; ?></div></div>
    </div>
</div>
