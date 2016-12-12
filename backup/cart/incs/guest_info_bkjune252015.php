<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . "/incs/conn.php";
include $rootpath . "/core/Countries.class.php";

$Countries = new Countries();
?>

<div class="guestCheckoutInputs" style="display:none;">
    <h2>Shipping Address</h2>
    <form class="checkoutForm generalForm generalFormBlock" action="" method="post" id="cartship" name="cartship" >

        <label for="fNameShipField">First Name:</label>
        <input id="fNameShipField" type="text" name="FName" />
        <label for="lNameShipField">Last Name:</label>
        <input id="lNameShipField" type="text" name="LName" />
        <label for="eMailShipField">Email Address:</label>
        <input id="eMailShipField" type="email" name="Email" />
        <label for="address1ShipField">Address Line 1:</label>
        <input id="address1ShipField" type="text" name="Addr1" />
        <label for="address2ShipField">Address Line 2:</label>
        <input id="address2ShipField" type="text" name="Addr2" />
        <label for="cityShipField">City:</label>
        <input id="cityShipField" type="text" name="City" />
        <label for="stateShipField">State / Province:</label>
        <input id="stateShipField" type="text" name="State" />
        <label for="postalCodeShipField">Postal Code:</label>
        <input id="postalCodeShipField" type="text" name="Postal" />
        <label for="countryShipSelect">Country:</label>
        <select id="countryShipSelect" name="Country">
            <?php echo $Countries->getCountriesDropDown('xx'); ?> 

        </select>
        <label for="telShipField">Telephone:</label>
        <input id="telShipField" type="text" name="Phone" />
        <label for="shipNotesField">Shipping Notes:</label>
        <textarea id="shipNotesField" name="Notes" cols="20"></textarea>
    </form>
    <h2>
        Billing Address
        <span class="fltR size7 fw-300" style="position:relative; top:.8em;">&nbsp;<input type="checkbox" id="sameAddr" name="sameAddr" /> Use Shipping Address</span>
    </h2>
    <form class="checkoutForm generalForm generalFormBlock" action="" method="post" id="cartbill" name="cartbill" >
        <label for="fNameBillField">First Name:</label>
        <input id="fNameBillField" type="text" name="FName" />
        <label for="lNameBillField">Last Name:</label>
        <input id="lNameBillField" type="text" name="LName" />
        <label for="address1BillField">Address Line 1:</label>
        <input id="address1BillField" type="text" name="Addr1" />
        <label for="address2BillField">Address Line 2:</label>
        <input id="address2BillField" type="text" name="Addr2" />
        <label for="cityBillField">City:</label>
        <input id="cityBillField" type="text" name="City" />
        <label for="stateBillField">State / Province:</label>
        <input id="stateBillField" type="text" name="State" />
        <label for="postalCodeBillField">Postal Code:</label>
        <input id="postalCodeBillField" type="text" name="Postal" />
        <label for="countryBillSelect">Country:</label>
        <select id="countryBillSelect" name="Country">
            <?php echo $Countries->getCountriesDropDown('xx'); ?> 
        </select>
    </form>
    <h2>Card Information</h2>
    <?php include "creditCardInfo.php"; ?>
</div>
