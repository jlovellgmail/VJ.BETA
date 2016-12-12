<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://d79i1fxsrar4t.cloudfront.net/jquery.liveaddress/2.7/jquery.liveaddress.min.js"></script>
<script>

var liveaddress = $.LiveAddress({
	
		key: "3728269786429952972",
		debug: false,
		autocomplete: 0,
		addresses: [{
			id: 'cartship',
			street: '#address1ShipField',
			street2: '#address2ShipField',
			city: '#cityShipField',
			state: '#stateShipField',
			zipcode: '#postalCodeShipField'
		}]
});

var id = "cartship";
		
//$(function() { 

	//	liveaddress.autoVerify(false); 
//});

//$(function() {
	
	//liveaddress.on("AddressAccepted", function (event, data, previousHandler) {
			
		//	if (data.response.isValid()){
				
			//	previousHandler(event, data);
				//alert("Address is valid");
			//}
		//});
//});
	
//$(function() {
 
	//	liveaddress.on("AddressWasInvalid", function (event, data, previousHandler) {

		//		data.address.accept(data,false);
			//	alert("Address is not valid");
		//});
//});

	
function verifyonclick () { 

	liveaddress.verify(id); 
	
};	

		
</script>
<div class="row textRight"><button onclick="liveaddress.deactivate(id); return false;" class="textBtn"><em>Disable</em></button></div>
<div class="row textRight"><button onclick="verifyonclick();" class="textBtn"><em>Verify</em></button></div>
<form class="checkoutForm generalForm generalFormBlock" action="" method="post" id="cartship" name="cartship" >
    <div class="row" id="shipAddrFormDet"> 
<div class="row textRight"><button onclick="liveaddress.activate();" class="textBtn"><em>Enable</em></button></div>
<div class="sm-twelve lg-six leftCol">
    <label for="fNameShipField">First Name:</label>
    <input id="fNameShipField" type="text" name="FName" value="" />
</div><!--
--><div class="sm-twelve lg-six rightCol">
    <label for="lNameShipField">Last Name:</label>
    <input id="lNameShipField" type="text" name="LName" value=""/>
</div><!--
--><div class="sm-twelve lg-six leftCol">
    <label for="address1ShipField">Address Line 1:</label>
    <input id="address1ShipField" type="text" name="Addr1" value="214 S Cedros Ave" />
</div><!-- 
--><div class="sm-twelve lg-six rightCol">
    <label for="address2ShipField">Address Line 2:</label>
    <input id="address2ShipField" type="text" name="Addr2" value="" />
</div><!--
--><div class="sm-twelve lg-six leftCol">
    <label for="cityShipField">City:</label>
    <input id="cityShipField" type="text" name="City" value="Solana Beach" />
</div><!-- 
--><div class="sm-twelve lg-four centerCol">
    <label for="stateShipField">State / Province:</label>
    <div id="SStateAJAXRes"><input id='stateShipField' type='text' name='State' value='CA' /></div>
</div><!--
<!--
--><div class="sm-twelve lg-two rightCol">
    <label for="postalCodeShipField">Postal Code:</label>
    <input id="postalCodeShipField" type="text" name="Postal" value="92075" />
</div><!-- 
--><div class="sm-twelve lg-four centerCol">
    <label for="stateShipField">Country:</label>
    <div id="SStateAJAXRes"><input id='countryShipField' type='text' name='countryShipField' value='US' /></div>
</div><!--
<!--
--><div class="sm-twelve lg-six leftCol">
</div><!--
--><div class="sm-twelve lg-six rightCol">
    <label for="telShipField">Telephone:</label>
    <input id="telShipField" type="text" name="Phone" value="1234567890" />
</div><!--
--><!--<div class="sm-twelve lg-six leftCol">
        <label for="eMailShipField">Email Address:</label>
        <input id="eMailShipField" type="email" name="Email" value="" />
    </div>--><!--
--></div>
</form>
</html>