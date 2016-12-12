<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Checkout | Virgil James</title>
<script src="//use.typekit.net/fcs3ojc.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
<script src="/js/vendor/modernizr.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/footer.js"></script>
<script type="text/javascript" src="/js/general.js"></script>
<link rel="stylesheet" href="/css/glyphs.css">
<link rel="stylesheet" href="/css/normalize.css">
<link rel="stylesheet" href="/css/navigation.css">
<link rel="stylesheet" href="/css/common_dev.css">
<link rel="stylesheet" href="/css/cart.css" />
<link rel="stylesheet" href="/css/forms.css" />
<script src="/js/address.js"></script>
<script>
            var shipAddrExist = false;
            var billAddrExist = false;
            var genHeight = 0;
            var ccValid = false;

            $(document).ready(function () {
                $('#ccPaymentSelect').click(function () {

                    $('#ccBillInfo').slideDown();
                    $('.paypalMessage').slideUp();
                    document.getElementById('continueButton').innerHTML = "Review Order";
                    document.getElementById('continueButton').href = "javascript:chekoutSubmit('')";
                    setTimeout(function () {
                        $('#continueButton').removeClass("hide");
                    }, 400);


                });
                $('#paypalPaymentSelect').click(function () {
                    $('.paypalMessage').slideDown();
                    $('#ccBillInfo').slideUp();
                    document.getElementById('continueButton').innerHTML = "Continue to PayPal";
                    document.getElementById('continueButton').href = "javascript:checkoutPaypal('')";
                    setTimeout(function () {
                        $('#continueButton').removeClass("hide");
                    }, 400);
                });
                $("input[type=text]").click(function () {
                    $(this).removeClass("formError");
                });
                $("input[type=email]").click(function () {
                    $(this).removeClass("formError");
                });
                $("select").change(function () {
                    $(this).removeClass("formError");
                });
                $("#sameAddr").change(function () {
                    if (this.checked) {
                            copyShipToBill();
                    } else {
                            emptyBilAddr();
                    }
                });

            });
        </script>
<script src="/js/validation.js" type="text/javascript"></script>
<script src="/js/jquery.creditCardValidator.js"></script>
<script>
            $(function () {
                $('#ccCardType input').validateCreditCard(function (result) {
                    var getCardType = (result.card_type == null ? '-' : result.card_type.name);
                    $("#ccCardType").removeAttr("class");
                    $('#ccCardType').addClass(getCardType);
                    if (result.valid) {
                        ccValid = true;
                        return $("#ccCardType label").addClass('valid');
                    } else {
                        ccValid = false;
                        return $("#ccCardType label").removeClass('valid');
                    }
                });
            });
        </script>
</head>
<body class="cartBody">

<!-- Navgivation -->

<div class="navBg">
    <div class="logoWrapper"> <a href="/index.php">
        <div class="logoSprite logoSpriteTop"></div>
        </a> </div>
    <div class="navBurger menu navBurgerTop">
        <div class="menu-item black"></div>
        <div class="menu-item black"></div>
        <div class="menu-item black"></div>
    </div>
    <div class="navLinksWrapper menuClosed">
        <div class="navLinks">
            <ul>
                <li class="pageLink aboutLink"><a class="" href="/about.php">About</a> <i class="icon-angle-down aboutHoverArrow"></i> <i class="icon-down-dir "></i> </li>
                <li class="pageLink collectionsLink"><a class="" href="/collections.php">Collections</a> <i class="icon-angle-down collectionsHoverArrow"></i> <i class="icon-down-dir "></i> </li>
                <li class="pageLink shopLink"><a class="" href="/shop.php">Shop</a> <i class="icon-angle-down shopHoverArrow"></i> <i class="icon-down-dir "></i> </li>
                <li class="pageLink ambassadorsLink"><a class="" href="/ambassadors.php">Ambassadors</a> <i class="icon-angle-down ambassadorsHoverArrow"></i> <i class="icon-down-dir "></i> </li>
                <li class="iconLink"> <a href="/login.php">
                    <div class="loginSprite iconSpriteTop"></div>
                    </a> <a href="/cart/">
                    <div class="cartSprite iconSpriteTop"></div>
                    </a> </li>
            </ul>
        </div>
    </div>
</div>
<div class="navPlaceholder"></div>
<div class="scrollWaypoint"></div>

<!-- Icons: 26px tall, 18px top padding -->

<div class="bgWrapperLeaf">
    <div class="leafWrapper cartHeroBgWrapper">
        <div class="tableWrapper">
            <div class="cellWrapper">
                <div class="widthWrapper" style="padding-left:0; padding-right:0;">
                    <div class="cartHeroLine1">My Cart</div>
                    <br>
                    <br>
                    <nav class="stepByNav">
                        <ul>
                            <li class=""><a href="/cart/index.php"><span class="numeral">1.</span> <span class="item">Selected Items</span></a></li>
                            <li class="active"><a href="/cart/checkout.php"><span class="numeral">2.</span> <span class="item">Order Info</span></a></li>
                            <li class="flatRight "><a href="/cart/review.php"><span class="numeral">3.</span> <span class="item">Submit Order</span></a></li>
                        </ul>
                    </nav>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bgWrapper checkoutBgWrapper">
    <div class="widthWrapper">
        <div class="tableWrapper tableHeight">
            <div class="cellWrapper">
                <div> 
                    <!--
    -->
                    <div class="checkoutRightColWrapper sm-twelve">
                        <div class="cartBrief">
                            <h3>1 items in your cart</h3>
                            <button class="textBtn toggleLink toggleHidden" id="showCart"> Show Cart </button>
                        </div>
                        <div class="overviewTableWrapper">
                            <div class="titleRow">
                                <div class="itemTitle sm-five lg-two">Item</div>
                                <!--
                -->
                                <div class="qtyTitle sm-three lg-two">Qty</div>
                                <!--
                -->
                                <div class="productTitle sm-zero lg-six">Product Description</div>
                                <!--
                -->
                                <div class="priceTitle sm-four lg-two">Price</div>
                            </div>
                            <!--
            -->
                            <div class="belowTopRowWrapper lg-twelve">
                                <div class="cartItemsRow">
                                    <div class="cartItemItem sm-five lg-two"> <img class="cartProductImage" src="/uploadedImages/Products/Canvas_document_holder.jpeg" alt="" /> <span class="productNameMobile">Canvas Document Holder</span> <span class="produtNumber">SKU: 0000000</span> </div>
                                    <!--
                        -->
                                    <div class="cartItemQty sm-three lg-two">1</div>
                                    <!--
                        -->
                                    <div class="cartItemProduct  sm-zero lg-six"> <span class="productName">Canvas Document Holder</span> <span class="shippingInfo">Shipping Included</span> </div>
                                    <!--
                        -->
                                    <div class="cartItemPrice sm-four lg-two">$295.00</div>
                                </div>
                            </div>
                            <div class="rowsPadding">
                                <div class="subTotalRow">
                                    <div class="sm-eight textRight"><span>Subtotal</span></div>
                                    <!--
                    -->
                                    <div class="sm-four"><span>$295.00</span></div>
                                </div>
                                <div class="shippingRow">
                                    <div class="sm-eight textRight"><span>Shipping Included</span></div>
                                    <!--
                    -->
                                    <div class="sm-four"></div>
                                </div>
                                <!--
                <div class="couponRow">
                    <div class="sm-eight"><span>Coupon Code #0000000</span></div>
                    <div class="sm-four"><span>-$100.00</span></div>
                </div>-->
                                
                                <div class="totalRow">
                                    <div class="sm-eight textRight"><span>Total</span></div>
                                    <!--
                    -->
                                    <div class="sm-four"><span>$295.00</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--<div class="formValidateMessage error" style="display:none;">Please check the form below for errors.</div>-->
                    <div class="checkoutFormFieldsWrapper sm-twelve">
                        <div id="AddressDiv" class="guestCheckoutInputs">
                            <div class="guestCheckoutInputs">
                                <h2>Shipping Address</h2>
                                <div class="marBottom15 textRight"><button class="textBtn toggleDivBtn" data-id="showSavedShipAdd">Use A Saved Address</button></div>
                                
                                
                                
                                
                                <div id="showSavedShipAdd" class="marBottom30" style="display:none;">
                                    <div class="row clearfix dynamicCol generalForm">
                                        <div class="sm-twelve lg-three">
                                            <div class="formWell formWellSmall formWellSelectable">
                                                <input onChange="addAddrToSession('7015', 'Shp');" id="formSelectableRadioShp_7015" name="selectableRadioShip"  type="radio">
                                                <label for="formSelectableRadioShp_7015" class="eqHeightJs" data-height-group="01" id="lbl_7015">
                                                <h3>Shipping #1</h3>
                                                <ul id="shipAddrDet_7015">
                                                    <li>John Coughlin</li>
                                                    <li>214 N Cedros Ave</li>
                                                    <li></li>
                                                    <li>Solana Beach, CA 92075</li>
                                                    <li>United States</li>
                                                    <li>12336546514321321</li>
                                                </ul>
                                                <a href="javascript:showModal('7015','Shp', '1003', 'cart');" class="formWellLink">edit</a>
                                                </label>
                                            </div>
                                        </div><!--
                                        --><div class="sm-twelve lg-three">
                                            <div class="formWell formWellSmall formWellSelectable ">
                                                <input onChange="addAddrToSession('7020', 'Shp');" id="formSelectableRadioShp_7020" name="selectableRadioShip" type="radio">
                                                <label for="formSelectableRadioShp_7020" class="eqHeightJs" data-height-group="01" id="lbl_7020">
                                                <h3>Shipping #2</h3>
                                                <ul id="shipAddrDet_7020">
                                                    <li>John Coughlin</li>
                                                    <li>214 N Cedros Ave</li>
                                                    <li>555</li>
                                                    <li>Solana Beach, CA 92075</li>
                                                    <li>United States</li>
                                                    <li>1234567894123651564</li>
                                                </ul>
                                                <a href="javascript:showModal('7020','Shp', '1006', 'cart');" class="formWellLink">edit</a>
                                                </label>
                                            </div>
                                        </div><!--
                                        --><div class="sm-twelve lg-three">
                                            <div class="formWell formWellSmall formWellSelectable ">
                                                <input onChange="addAddrToSession('7030', 'Shp');" id="formSelectableRadioShp_7030" name="selectableRadioShip" type="radio">
                                                <label for="formSelectableRadioShp_7030" class="eqHeightJs" data-height-group="01" id="lbl_7030">
                                                <h3>Shipping #3</h3>
                                                <ul id="shipAddrDet_7030">
                                                    <li>John Coughlin</li>
                                                    <li>214 N Cedros Ave</li>
                                                    <li>555</li>
                                                    <li>Solana Beach, CA 92075</li>
                                                    <li>United States</li>
                                                    <li>1234567894123651564</li>
                                                </ul>
                                                <a href="javascript:showModal('7030','Shp', '1010', 'cart');" class="formWellLink">edit</a>
                                                </label>
                                            </div>
                                        </div><!--
                                        --><div class="sm-twelve lg-three">
                                            <div class="formWell formWellSmall formWellSelectable">
                                                <input onChange="addAddrToSession('7050', 'Shp');" id="formSelectableRadioShp_7050" name="selectableRadioShip" type="radio">
                                                <label for="formSelectableRadioShp_7050" class="eqHeightJs" data-height-group="01" id="lbl_7050">
                                                <h3>Shipping #4</h3>
                                                <ul id="shipAddrDet_7050">
                                                    <li>John Coughlin</li>
                                                    <li>214 N Cedros Ave</li>
                                                    <li>555</li>
                                                    <li>Solana Beach, CA 92075</li>
                                                    <li>United States</li>
                                                    <li>1234567894123651564</li>
                                                </ul>
                                                <a href="javascript:showModal('7050','Shp', '1015', 'cart');" class="formWellLink">edit</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>      
                                
                                
                                
                                                          
                                
                                
                                <form class="checkoutForm generalForm generalFormBlock" action="" method="post" id="cartship" name="cartship" >
                                    <div class="row">
                                        <div class="sm-twelve lg-six leftCol">
                                            <label for="fNameShipField">First Name:</label>
                                            <input id="fNameShipField" type="text" name="FName" value="" />
                                        </div><div class="sm-twelve lg-six rightCol">
                                            <label for="lNameShipField">Last Name:</label>
                                            <input id="lNameShipField" type="text" name="LName" value=""/>
                                        </div><div class="sm-twelve lg-six leftCol">
                                            <label for="address1ShipField">Address Line 1:</label>
                                            <input id="address1ShipField" type="text" name="Addr1" value="" />
                                        </div><div class="sm-twelve lg-six rightCol">
                                            <label for="address2ShipField">Address Line 2:</label>
                                            <input id="address2ShipField" type="text" name="Addr2" value="" />
                                        </div><div class="sm-twelve lg-six leftCol">
                                            <label for="cityShipField">City:</label>
                                            <input id="cityShipField" type="text" name="City" value="" />
                                        </div><div class="sm-twelve lg-six rightCol">
                                            <label for="stateShipField">State / Province:</label>
                                            <input id="stateShipField" type="text" name="State" value="" />
                                        </div><div class="sm-twelve lg-six leftCol">
                                            <label for="postalCodeShipField">Postal Code:</label>
                                            <input id="postalCodeShipField" type="text" name="Postal" value="" />
                                        </div><div class="sm-twelve lg-six rightCol">
                                            <label for="countryShipSelect">Country:</label>
                                            <select id="countryShipSelect" name="Country">
                                                <option value='xx' >Please select country</option>
                                                <option value='AF'>Afghanistan</option>
                                                <option value='AX'>Åland Islands</option>
                                                <option value='AL'>Albania</option>
                                                <option value='DZ'>Algeria</option>
                                                <option value='AS'>American Samoa</option>
                                                <option value='AD'>Andorra</option>
                                                <option value='AO'>Angola</option>
                                                <option value='AI'>Anguilla</option>
                                                <option value='AQ'>Antarctica</option>
                                                <option value='AG'>Antigua and Barbuda</option>
                                                <option value='AR'>Argentina</option>
                                                <option value='AM'>Armenia</option>
                                                <option value='AW'>Aruba</option>
                                                <option value='AU'>Australia</option>
                                                <option value='AT'>Austria</option>
                                                <option value='AZ'>Azerbaijan</option>
                                                <option value='BS'>Bahamas</option>
                                                <option value='BH'>Bahrain</option>
                                                <option value='BD'>Bangladesh</option>
                                                <option value='BB'>Barbados</option>
                                                <option value='BY'>Belarus</option>
                                                <option value='BE'>Belgium</option>
                                                <option value='BZ'>Belize</option>
                                                <option value='BJ'>Benin</option>
                                                <option value='BM'>Bermuda</option>
                                                <option value='BT'>Bhutan</option>
                                                <option value='BO'>Bolivia</option>
                                                <option value='BA'>Bosnia and Herzegovina</option>
                                                <option value='BW'>Botswana</option>
                                                <option value='BV'>Bouvet Island</option>
                                                <option value='BR'>Brazil</option>
                                                <option value='BQ'>British Antarctic Territory</option>
                                                <option value='IO'>British Indian Ocean Territory</option>
                                                <option value='VG'>British Virgin Islands</option>
                                                <option value='BN'>Brunei</option>
                                                <option value='BG'>Bulgaria</option>
                                                <option value='BF'>Burkina Faso</option>
                                                <option value='BI'>Burundi</option>
                                                <option value='KH'>Cambodia</option>
                                                <option value='CM'>Cameroon</option>
                                                <option value='CA'>Canada</option>
                                                <option value='CT'>Canton and Enderbury Islands</option>
                                                <option value='CV'>Cape Verde</option>
                                                <option value='KY'>Cayman Islands</option>
                                                <option value='CF'>Central African Republic</option>
                                                <option value='TD'>Chad</option>
                                                <option value='CL'>Chile</option>
                                                <option value='CN'>China</option>
                                                <option value='CX'>Christmas Island</option>
                                                <option value='CC'>Cocos [Keeling] Islands</option>
                                                <option value='CO'>Colombia</option>
                                                <option value='KM'>Comoros</option>
                                                <option value='CG'>Congo - Brazzaville</option>
                                                <option value='CD'>Congo - Kinshasa</option>
                                                <option value='CK'>Cook Islands</option>
                                                <option value='CR'>Costa Rica</option>
                                                <option value='CI'>Côte d’Ivoire</option>
                                                <option value='HR'>Croatia</option>
                                                <option value='CU'>Cuba</option>
                                                <option value='CY'>Cyprus</option>
                                                <option value='CZ'>Czech Republic</option>
                                                <option value='DK'>Denmark</option>
                                                <option value='DJ'>Djibouti</option>
                                                <option value='DM'>Dominica</option>
                                                <option value='DO'>Dominican Republic</option>
                                                <option value='NQ'>Dronning Maud Land</option>
                                                <option value='DD'>East Germany</option>
                                                <option value='EC'>Ecuador</option>
                                                <option value='EG'>Egypt</option>
                                                <option value='SV'>El Salvador</option>
                                                <option value='GQ'>Equatorial Guinea</option>
                                                <option value='ER'>Eritrea</option>
                                                <option value='EE'>Estonia</option>
                                                <option value='ET'>Ethiopia</option>
                                                <option value='FK'>Falkland Islands</option>
                                                <option value='FO'>Faroe Islands</option>
                                                <option value='FJ'>Fiji</option>
                                                <option value='FI'>Finland</option>
                                                <option value='FR'>France</option>
                                                <option value='GF'>French Guiana</option>
                                                <option value='PF'>French Polynesia</option>
                                                <option value='FQ'>French Southern and Antarctic Territories</option>
                                                <option value='TF'>French Southern Territories</option>
                                                <option value='GA'>Gabon</option>
                                                <option value='GM'>Gambia</option>
                                                <option value='GE'>Georgia</option>
                                                <option value='DE'>Germany</option>
                                                <option value='GH'>Ghana</option>
                                                <option value='GI'>Gibraltar</option>
                                                <option value='GR'>Greece</option>
                                                <option value='GL'>Greenland</option>
                                                <option value='GD'>Grenada</option>
                                                <option value='GP'>Guadeloupe</option>
                                                <option value='GU'>Guam</option>
                                                <option value='GT'>Guatemala</option>
                                                <option value='GG'>Guernsey</option>
                                                <option value='GN'>Guinea</option>
                                                <option value='GW'>Guinea-Bissau</option>
                                                <option value='GY'>Guyana</option>
                                                <option value='HT'>Haiti</option>
                                                <option value='HM'>Heard Island and McDonald Islands</option>
                                                <option value='HN'>Honduras</option>
                                                <option value='HK'>Hong Kong SAR China</option>
                                                <option value='HU'>Hungary</option>
                                                <option value='IS'>Iceland</option>
                                                <option value='IN'>India</option>
                                                <option value='ID'>Indonesia</option>
                                                <option value='IR'>Iran</option>
                                                <option value='IQ'>Iraq</option>
                                                <option value='IE'>Ireland</option>
                                                <option value='IM'>Isle of Man</option>
                                                <option value='IL'>Israel</option>
                                                <option value='IT'>Italy</option>
                                                <option value='JM'>Jamaica</option>
                                                <option value='JP'>Japan</option>
                                                <option value='JE'>Jersey</option>
                                                <option value='JT'>Johnston Island</option>
                                                <option value='JO'>Jordan</option>
                                                <option value='KZ'>Kazakhstan</option>
                                                <option value='KE'>Kenya</option>
                                                <option value='KI'>Kiribati</option>
                                                <option value='KW'>Kuwait</option>
                                                <option value='KG'>Kyrgyzstan</option>
                                                <option value='LA'>Laos</option>
                                                <option value='LV'>Latvia</option>
                                                <option value='LB'>Lebanon</option>
                                                <option value='LS'>Lesotho</option>
                                                <option value='LR'>Liberia</option>
                                                <option value='LY'>Libya</option>
                                                <option value='LI'>Liechtenstein</option>
                                                <option value='LT'>Lithuania</option>
                                                <option value='LU'>Luxembourg</option>
                                                <option value='MO'>Macau SAR China</option>
                                                <option value='MK'>Macedonia</option>
                                                <option value='MG'>Madagascar</option>
                                                <option value='MW'>Malawi</option>
                                                <option value='MY'>Malaysia</option>
                                                <option value='MV'>Maldives</option>
                                                <option value='ML'>Mali</option>
                                                <option value='MT'>Malta</option>
                                                <option value='MH'>Marshall Islands</option>
                                                <option value='MQ'>Martinique</option>
                                                <option value='MR'>Mauritania</option>
                                                <option value='MU'>Mauritius</option>
                                                <option value='YT'>Mayotte</option>
                                                <option value='FX'>Metropolitan France</option>
                                                <option value='MX'>Mexico</option>
                                                <option value='FM'>Micronesia</option>
                                                <option value='MI'>Midway Islands</option>
                                                <option value='MD'>Moldova</option>
                                                <option value='MC'>Monaco</option>
                                                <option value='MN'>Mongolia</option>
                                                <option value='ME'>Montenegro</option>
                                                <option value='MS'>Montserrat</option>
                                                <option value='MA'>Morocco</option>
                                                <option value='MZ'>Mozambique</option>
                                                <option value='MM'>Myanmar [Burma]</option>
                                                <option value='NA'>Namibia</option>
                                                <option value='NR'>Nauru</option>
                                                <option value='NP'>Nepal</option>
                                                <option value='NL'>Netherlands</option>
                                                <option value='AN'>Netherlands Antilles</option>
                                                <option value='NT'>Neutral Zone</option>
                                                <option value='NC'>New Caledonia</option>
                                                <option value='NZ'>New Zealand</option>
                                                <option value='NI'>Nicaragua</option>
                                                <option value='NE'>Niger</option>
                                                <option value='NG'>Nigeria</option>
                                                <option value='NU'>Niue</option>
                                                <option value='NF'>Norfolk Island</option>
                                                <option value='KP'>North Korea</option>
                                                <option value='VD'>North Vietnam</option>
                                                <option value='MP'>Northern Mariana Islands</option>
                                                <option value='NO'>Norway</option>
                                                <option value='OM'>Oman</option>
                                                <option value='PC'>Pacific Islands Trust Territory</option>
                                                <option value='PK'>Pakistan</option>
                                                <option value='PW'>Palau</option>
                                                <option value='PS'>Palestinian Territories</option>
                                                <option value='PA'>Panama</option>
                                                <option value='PZ'>Panama Canal Zone</option>
                                                <option value='PG'>Papua New Guinea</option>
                                                <option value='PY'>Paraguay</option>
                                                <option value='YD'>Peoples Democratic Republic of Yemen</option>
                                                <option value='PE'>Peru</option>
                                                <option value='PH'>Philippines</option>
                                                <option value='PN'>Pitcairn Islands</option>
                                                <option value='PL'>Poland</option>
                                                <option value='PT'>Portugal</option>
                                                <option value='PR'>Puerto Rico</option>
                                                <option value='QA'>Qatar</option>
                                                <option value='RE'>Réunion</option>
                                                <option value='RO'>Romania</option>
                                                <option value='RU'>Russia</option>
                                                <option value='RW'>Rwanda</option>
                                                <option value='BL'>Saint Barthélemy</option>
                                                <option value='SH'>Saint Helena</option>
                                                <option value='KN'>Saint Kitts and Nevis</option>
                                                <option value='LC'>Saint Lucia</option>
                                                <option value='MF'>Saint Martin</option>
                                                <option value='PM'>Saint Pierre and Miquelon</option>
                                                <option value='VC'>Saint Vincent and the Grenadines</option>
                                                <option value='WS'>Samoa</option>
                                                <option value='SM'>San Marino</option>
                                                <option value='ST'>São Tomé and Príncipe</option>
                                                <option value='SA'>Saudi Arabia</option>
                                                <option value='SN'>Senegal</option>
                                                <option value='RS'>Serbia</option>
                                                <option value='CS'>Serbia and Montenegro</option>
                                                <option value='SC'>Seychelles</option>
                                                <option value='SL'>Sierra Leone</option>
                                                <option value='SG'>Singapore</option>
                                                <option value='SK'>Slovakia</option>
                                                <option value='SI'>Slovenia</option>
                                                <option value='SB'>Solomon Islands</option>
                                                <option value='SO'>Somalia</option>
                                                <option value='ZA'>South Africa</option>
                                                <option value='GS'>South Georgia and the South Sandwich Islands</option>
                                                <option value='KR'>South Korea</option>
                                                <option value='ES'>Spain</option>
                                                <option value='LK'>Sri Lanka</option>
                                                <option value='SD'>Sudan</option>
                                                <option value='SR'>Suriname</option>
                                                <option value='SJ'>Svalbard and Jan Mayen</option>
                                                <option value='SZ'>Swaziland</option>
                                                <option value='SE'>Sweden</option>
                                                <option value='CH'>Switzerland</option>
                                                <option value='SY'>Syria</option>
                                                <option value='TW'>Taiwan</option>
                                                <option value='TJ'>Tajikistan</option>
                                                <option value='TZ'>Tanzania</option>
                                                <option value='TH'>Thailand</option>
                                                <option value='TL'>Timor-Leste</option>
                                                <option value='TG'>Togo</option>
                                                <option value='TK'>Tokelau</option>
                                                <option value='TO'>Tonga</option>
                                                <option value='TT'>Trinidad and Tobago</option>
                                                <option value='TN'>Tunisia</option>
                                                <option value='TR'>Turkey</option>
                                                <option value='TM'>Turkmenistan</option>
                                                <option value='TC'>Turks and Caicos Islands</option>
                                                <option value='TV'>Tuvalu</option>
                                                <option value='UM'>U.S. Minor Outlying Islands</option>
                                                <option value='PU'>U.S. Miscellaneous Pacific Islands</option>
                                                <option value='VI'>U.S. Virgin Islands</option>
                                                <option value='UG'>Uganda</option>
                                                <option value='UA'>Ukraine</option>
                                                <option value='AE'>United Arab Emirates</option>
                                                <option value='GB'>United Kingdom</option>
                                                <option value='US'>United States</option>
                                                <option value='ZZ'>Unknown or Invalid Region</option>
                                                <option value='UY'>Uruguay</option>
                                                <option value='UZ'>Uzbekistan</option>
                                                <option value='VU'>Vanuatu</option>
                                                <option value='VA'>Vatican City</option>
                                                <option value='VE'>Venezuela</option>
                                                <option value='VN'>Vietnam</option>
                                                <option value='WK'>Wake Island</option>
                                                <option value='WF'>Wallis and Futuna</option>
                                                <option value='EH'>Western Sahara</option>
                                                <option value='YE'>Yemen</option>
                                                <option value='ZM'>Zambia</option>
                                                <option value='ZW'>Zimbabwe</option>
                                            </select>
                                        </div><div class="sm-twelve lg-six leftCol">
                                            <label for="eMailShipField">Email Address:</label>
                                            <input id="eMailShipField" type="email" name="Email" value="" />
                                        </div><div class="sm-twelve lg-six rightCol">
                                            <label for="telShipField">Telephone:</label>
                                            <input id="telShipField" type="text" name="Phone" value="" />
                                        </div><br><br><div class="sm-twelve lg-six leftCol">
                                            <input id="saveNewAddress" class="flTL" type="checkbox">
                                            <label class="inline textBtn" for="saveNewAddress">&nbsp;Save this Address</label>
                                        </div>
                                </div>
                                </form>
                                <br />
                                <h2>Select Payment Method</h2>
                                <br />
                                <div class="radialWrapper sm-six lg-three">
                                    <input id="ccPaymentSelect" class="radial" type="radio" name="group1" value="cc" />
                                    &nbsp; <img class="ccImg" src="/img/cart/amex-min.png" alt="American Express" /> <img class="ccImg" src="/img/cart/mastercard-min.png" alt="MaterCard" /> <img class="ccImg" src="/img/cart/visa-min.png" alt="Visa" /> </div><div class="radialWrapper sm-six lg-three">
                                    <input id="paypalPaymentSelect" class="radial" type="radio" name="group1" value="paypal" />
                                    &nbsp; <img class="ccImg" src="/img/cart/paypal-min.png" alt="Paypal" /> </div>
                                <div class="paypalMessage" style="display:none;"> <span>You will be redirected to PayPal on the next page to enter your billing information.</span> </div>
                                <br />
                                <br />
                                <div style="display:none;" id="ccBillInfo">
                                    <h2> Billing Address <span class="fltR size7 fw-300" style="position:relative; top:.8em;"> &nbsp;
                                        <input type="checkbox" id="sameAddr" name="sameAddr" />
                                        Use Shipping Address </span> </h2>
                                    <br />
                                    <form class="checkoutForm generalForm generalFormBlock" action="" method="post" id="cartbill" name="cartbill" >
                                        <div class="row">
                                            <div class="sm-twelve lg-six leftCol">
                                                <label for="fNameBillField">First Name:</label>
                                                <input id="fNameBillField" type="text" name="FName" />
                                            </div><div class="sm-twelve lg-six rightCol">
                                                <label for="lNameBillField">Last Name:</label>
                                                <input id="lNameBillField" type="text" name="LName" />
                                            </div><div class="sm-twelve lg-six leftCol">
                                                <label for="address1BillField">Address Line 1:</label>
                                                <input id="address1BillField" type="text" name="Addr1" />
                                            </div><div class="sm-twelve lg-six rightCol">
                                                <label for="address2BillField">Address Line 2:</label>
                                                <input id="address2BillField" type="text" name="Addr2" />
                                            </div><div class="sm-twelve lg-six leftCol">
                                                <label for="cityBillField">City:</label>
                                                <input id="cityBillField" type="text" name="City" />
                                            </div><div class="sm-twelve lg-six rightCol">
                                                <label for="stateBillField">State / Province:</label>
                                                <input id="stateBillField" type="text" name="State" />
                                            </div><div class="sm-twelve lg-six leftCol">
                                                <label for="postalCodeBillField">Postal Code:</label>
                                                <input id="postalCodeBillField" type="text" name="Postal" />
                                            </div><div class="sm-twelve lg-six rightCol">
                                                <label for="countryBillSelect">Country:</label>
                                                <select id="countryBillSelect" name="Country">
                                                    <option value='xx' >Please select country</option>
                                                    <option value='AF'>Afghanistan</option>
                                                    <option value='AX'>Åland Islands</option>
                                                    <option value='AL'>Albania</option>
                                                    <option value='DZ'>Algeria</option>
                                                    <option value='AS'>American Samoa</option>
                                                    <option value='AD'>Andorra</option>
                                                    <option value='AO'>Angola</option>
                                                    <option value='AI'>Anguilla</option>
                                                    <option value='AQ'>Antarctica</option>
                                                    <option value='AG'>Antigua and Barbuda</option>
                                                    <option value='AR'>Argentina</option>
                                                    <option value='AM'>Armenia</option>
                                                    <option value='AW'>Aruba</option>
                                                    <option value='AU'>Australia</option>
                                                    <option value='AT'>Austria</option>
                                                    <option value='AZ'>Azerbaijan</option>
                                                    <option value='BS'>Bahamas</option>
                                                    <option value='BH'>Bahrain</option>
                                                    <option value='BD'>Bangladesh</option>
                                                    <option value='BB'>Barbados</option>
                                                    <option value='BY'>Belarus</option>
                                                    <option value='BE'>Belgium</option>
                                                    <option value='BZ'>Belize</option>
                                                    <option value='BJ'>Benin</option>
                                                    <option value='BM'>Bermuda</option>
                                                    <option value='BT'>Bhutan</option>
                                                    <option value='BO'>Bolivia</option>
                                                    <option value='BA'>Bosnia and Herzegovina</option>
                                                    <option value='BW'>Botswana</option>
                                                    <option value='BV'>Bouvet Island</option>
                                                    <option value='BR'>Brazil</option>
                                                    <option value='BQ'>British Antarctic Territory</option>
                                                    <option value='IO'>British Indian Ocean Territory</option>
                                                    <option value='VG'>British Virgin Islands</option>
                                                    <option value='BN'>Brunei</option>
                                                    <option value='BG'>Bulgaria</option>
                                                    <option value='BF'>Burkina Faso</option>
                                                    <option value='BI'>Burundi</option>
                                                    <option value='KH'>Cambodia</option>
                                                    <option value='CM'>Cameroon</option>
                                                    <option value='CA'>Canada</option>
                                                    <option value='CT'>Canton and Enderbury Islands</option>
                                                    <option value='CV'>Cape Verde</option>
                                                    <option value='KY'>Cayman Islands</option>
                                                    <option value='CF'>Central African Republic</option>
                                                    <option value='TD'>Chad</option>
                                                    <option value='CL'>Chile</option>
                                                    <option value='CN'>China</option>
                                                    <option value='CX'>Christmas Island</option>
                                                    <option value='CC'>Cocos [Keeling] Islands</option>
                                                    <option value='CO'>Colombia</option>
                                                    <option value='KM'>Comoros</option>
                                                    <option value='CG'>Congo - Brazzaville</option>
                                                    <option value='CD'>Congo - Kinshasa</option>
                                                    <option value='CK'>Cook Islands</option>
                                                    <option value='CR'>Costa Rica</option>
                                                    <option value='CI'>Côte d’Ivoire</option>
                                                    <option value='HR'>Croatia</option>
                                                    <option value='CU'>Cuba</option>
                                                    <option value='CY'>Cyprus</option>
                                                    <option value='CZ'>Czech Republic</option>
                                                    <option value='DK'>Denmark</option>
                                                    <option value='DJ'>Djibouti</option>
                                                    <option value='DM'>Dominica</option>
                                                    <option value='DO'>Dominican Republic</option>
                                                    <option value='NQ'>Dronning Maud Land</option>
                                                    <option value='DD'>East Germany</option>
                                                    <option value='EC'>Ecuador</option>
                                                    <option value='EG'>Egypt</option>
                                                    <option value='SV'>El Salvador</option>
                                                    <option value='GQ'>Equatorial Guinea</option>
                                                    <option value='ER'>Eritrea</option>
                                                    <option value='EE'>Estonia</option>
                                                    <option value='ET'>Ethiopia</option>
                                                    <option value='FK'>Falkland Islands</option>
                                                    <option value='FO'>Faroe Islands</option>
                                                    <option value='FJ'>Fiji</option>
                                                    <option value='FI'>Finland</option>
                                                    <option value='FR'>France</option>
                                                    <option value='GF'>French Guiana</option>
                                                    <option value='PF'>French Polynesia</option>
                                                    <option value='FQ'>French Southern and Antarctic Territories</option>
                                                    <option value='TF'>French Southern Territories</option>
                                                    <option value='GA'>Gabon</option>
                                                    <option value='GM'>Gambia</option>
                                                    <option value='GE'>Georgia</option>
                                                    <option value='DE'>Germany</option>
                                                    <option value='GH'>Ghana</option>
                                                    <option value='GI'>Gibraltar</option>
                                                    <option value='GR'>Greece</option>
                                                    <option value='GL'>Greenland</option>
                                                    <option value='GD'>Grenada</option>
                                                    <option value='GP'>Guadeloupe</option>
                                                    <option value='GU'>Guam</option>
                                                    <option value='GT'>Guatemala</option>
                                                    <option value='GG'>Guernsey</option>
                                                    <option value='GN'>Guinea</option>
                                                    <option value='GW'>Guinea-Bissau</option>
                                                    <option value='GY'>Guyana</option>
                                                    <option value='HT'>Haiti</option>
                                                    <option value='HM'>Heard Island and McDonald Islands</option>
                                                    <option value='HN'>Honduras</option>
                                                    <option value='HK'>Hong Kong SAR China</option>
                                                    <option value='HU'>Hungary</option>
                                                    <option value='IS'>Iceland</option>
                                                    <option value='IN'>India</option>
                                                    <option value='ID'>Indonesia</option>
                                                    <option value='IR'>Iran</option>
                                                    <option value='IQ'>Iraq</option>
                                                    <option value='IE'>Ireland</option>
                                                    <option value='IM'>Isle of Man</option>
                                                    <option value='IL'>Israel</option>
                                                    <option value='IT'>Italy</option>
                                                    <option value='JM'>Jamaica</option>
                                                    <option value='JP'>Japan</option>
                                                    <option value='JE'>Jersey</option>
                                                    <option value='JT'>Johnston Island</option>
                                                    <option value='JO'>Jordan</option>
                                                    <option value='KZ'>Kazakhstan</option>
                                                    <option value='KE'>Kenya</option>
                                                    <option value='KI'>Kiribati</option>
                                                    <option value='KW'>Kuwait</option>
                                                    <option value='KG'>Kyrgyzstan</option>
                                                    <option value='LA'>Laos</option>
                                                    <option value='LV'>Latvia</option>
                                                    <option value='LB'>Lebanon</option>
                                                    <option value='LS'>Lesotho</option>
                                                    <option value='LR'>Liberia</option>
                                                    <option value='LY'>Libya</option>
                                                    <option value='LI'>Liechtenstein</option>
                                                    <option value='LT'>Lithuania</option>
                                                    <option value='LU'>Luxembourg</option>
                                                    <option value='MO'>Macau SAR China</option>
                                                    <option value='MK'>Macedonia</option>
                                                    <option value='MG'>Madagascar</option>
                                                    <option value='MW'>Malawi</option>
                                                    <option value='MY'>Malaysia</option>
                                                    <option value='MV'>Maldives</option>
                                                    <option value='ML'>Mali</option>
                                                    <option value='MT'>Malta</option>
                                                    <option value='MH'>Marshall Islands</option>
                                                    <option value='MQ'>Martinique</option>
                                                    <option value='MR'>Mauritania</option>
                                                    <option value='MU'>Mauritius</option>
                                                    <option value='YT'>Mayotte</option>
                                                    <option value='FX'>Metropolitan France</option>
                                                    <option value='MX'>Mexico</option>
                                                    <option value='FM'>Micronesia</option>
                                                    <option value='MI'>Midway Islands</option>
                                                    <option value='MD'>Moldova</option>
                                                    <option value='MC'>Monaco</option>
                                                    <option value='MN'>Mongolia</option>
                                                    <option value='ME'>Montenegro</option>
                                                    <option value='MS'>Montserrat</option>
                                                    <option value='MA'>Morocco</option>
                                                    <option value='MZ'>Mozambique</option>
                                                    <option value='MM'>Myanmar [Burma]</option>
                                                    <option value='NA'>Namibia</option>
                                                    <option value='NR'>Nauru</option>
                                                    <option value='NP'>Nepal</option>
                                                    <option value='NL'>Netherlands</option>
                                                    <option value='AN'>Netherlands Antilles</option>
                                                    <option value='NT'>Neutral Zone</option>
                                                    <option value='NC'>New Caledonia</option>
                                                    <option value='NZ'>New Zealand</option>
                                                    <option value='NI'>Nicaragua</option>
                                                    <option value='NE'>Niger</option>
                                                    <option value='NG'>Nigeria</option>
                                                    <option value='NU'>Niue</option>
                                                    <option value='NF'>Norfolk Island</option>
                                                    <option value='KP'>North Korea</option>
                                                    <option value='VD'>North Vietnam</option>
                                                    <option value='MP'>Northern Mariana Islands</option>
                                                    <option value='NO'>Norway</option>
                                                    <option value='OM'>Oman</option>
                                                    <option value='PC'>Pacific Islands Trust Territory</option>
                                                    <option value='PK'>Pakistan</option>
                                                    <option value='PW'>Palau</option>
                                                    <option value='PS'>Palestinian Territories</option>
                                                    <option value='PA'>Panama</option>
                                                    <option value='PZ'>Panama Canal Zone</option>
                                                    <option value='PG'>Papua New Guinea</option>
                                                    <option value='PY'>Paraguay</option>
                                                    <option value='YD'>Peoples Democratic Republic of Yemen</option>
                                                    <option value='PE'>Peru</option>
                                                    <option value='PH'>Philippines</option>
                                                    <option value='PN'>Pitcairn Islands</option>
                                                    <option value='PL'>Poland</option>
                                                    <option value='PT'>Portugal</option>
                                                    <option value='PR'>Puerto Rico</option>
                                                    <option value='QA'>Qatar</option>
                                                    <option value='RE'>Réunion</option>
                                                    <option value='RO'>Romania</option>
                                                    <option value='RU'>Russia</option>
                                                    <option value='RW'>Rwanda</option>
                                                    <option value='BL'>Saint Barthélemy</option>
                                                    <option value='SH'>Saint Helena</option>
                                                    <option value='KN'>Saint Kitts and Nevis</option>
                                                    <option value='LC'>Saint Lucia</option>
                                                    <option value='MF'>Saint Martin</option>
                                                    <option value='PM'>Saint Pierre and Miquelon</option>
                                                    <option value='VC'>Saint Vincent and the Grenadines</option>
                                                    <option value='WS'>Samoa</option>
                                                    <option value='SM'>San Marino</option>
                                                    <option value='ST'>São Tomé and Príncipe</option>
                                                    <option value='SA'>Saudi Arabia</option>
                                                    <option value='SN'>Senegal</option>
                                                    <option value='RS'>Serbia</option>
                                                    <option value='CS'>Serbia and Montenegro</option>
                                                    <option value='SC'>Seychelles</option>
                                                    <option value='SL'>Sierra Leone</option>
                                                    <option value='SG'>Singapore</option>
                                                    <option value='SK'>Slovakia</option>
                                                    <option value='SI'>Slovenia</option>
                                                    <option value='SB'>Solomon Islands</option>
                                                    <option value='SO'>Somalia</option>
                                                    <option value='ZA'>South Africa</option>
                                                    <option value='GS'>South Georgia and the South Sandwich Islands</option>
                                                    <option value='KR'>South Korea</option>
                                                    <option value='ES'>Spain</option>
                                                    <option value='LK'>Sri Lanka</option>
                                                    <option value='SD'>Sudan</option>
                                                    <option value='SR'>Suriname</option>
                                                    <option value='SJ'>Svalbard and Jan Mayen</option>
                                                    <option value='SZ'>Swaziland</option>
                                                    <option value='SE'>Sweden</option>
                                                    <option value='CH'>Switzerland</option>
                                                    <option value='SY'>Syria</option>
                                                    <option value='TW'>Taiwan</option>
                                                    <option value='TJ'>Tajikistan</option>
                                                    <option value='TZ'>Tanzania</option>
                                                    <option value='TH'>Thailand</option>
                                                    <option value='TL'>Timor-Leste</option>
                                                    <option value='TG'>Togo</option>
                                                    <option value='TK'>Tokelau</option>
                                                    <option value='TO'>Tonga</option>
                                                    <option value='TT'>Trinidad and Tobago</option>
                                                    <option value='TN'>Tunisia</option>
                                                    <option value='TR'>Turkey</option>
                                                    <option value='TM'>Turkmenistan</option>
                                                    <option value='TC'>Turks and Caicos Islands</option>
                                                    <option value='TV'>Tuvalu</option>
                                                    <option value='UM'>U.S. Minor Outlying Islands</option>
                                                    <option value='PU'>U.S. Miscellaneous Pacific Islands</option>
                                                    <option value='VI'>U.S. Virgin Islands</option>
                                                    <option value='UG'>Uganda</option>
                                                    <option value='UA'>Ukraine</option>
                                                    <option value='AE'>United Arab Emirates</option>
                                                    <option value='GB'>United Kingdom</option>
                                                    <option value='US'>United States</option>
                                                    <option value='ZZ'>Unknown or Invalid Region</option>
                                                    <option value='UY'>Uruguay</option>
                                                    <option value='UZ'>Uzbekistan</option>
                                                    <option value='VU'>Vanuatu</option>
                                                    <option value='VA'>Vatican City</option>
                                                    <option value='VE'>Venezuela</option>
                                                    <option value='VN'>Vietnam</option>
                                                    <option value='WK'>Wake Island</option>
                                                    <option value='WF'>Wallis and Futuna</option>
                                                    <option value='EH'>Western Sahara</option>
                                                    <option value='YE'>Yemen</option>
                                                    <option value='ZM'>Zambia</option>
                                                    <option value='ZW'>Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    <h3>Card Information</h3>
                                    <br />
                                    <div class="row">
                                        <div class="sm-twelve lg-six">
                                            <form class="checkoutForm generalForm generalFormBlock" action="" method="post" id="cartcc" name="cartcc" >
                                                <div class="row">
                                                    <div class="sm-twelve">
                                                        <label for="cardName">Cardholder Name:</label>
                                                        <input id="CCName" type="text" name="CCName" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="sm-twelve">
                                                        <div id="ccCardType">
                                                            <label for="ccNumber">Credit Card Number:</label>
                                                            <input id="CCNumber" type="text" name="CCNumber" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="sm-twelve lg-six leftCol">
                                                        <label for="ccXMonth">Exp. Month:</label>
                                                        <select id="CCXMonth" name="CCXMonth">
                                                            <option value="">Month</option>
                                                            <option value="1">January</option>
                                                            <option value="2">February</option>
                                                            <option value="3">March</option>
                                                            <option value="4">April</option>
                                                            <option value="5">May</option>
                                                            <option value="6">June</option>
                                                            <option value="7">July</option>
                                                            <option value="8">August</option>
                                                            <option value="9">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">Nobember</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                    </div><div class="sm-twelve lg-three centerCol">
                                                        <label>Exp. Year:</label>
                                                        <select name="CCXYear" id="CCXYear">
                                                            <option value="xx">Year</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                        </select>
                                                    </div><div class="sm-twelve lg-three rightCol">
                                                        <label for="ccCode">Security Code:</label>
                                                        <input id="CCCode" type="text" name="ccCode" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 
                            --> 
                    <a class="continueButton hide" id="continueButton" href="#" onClick="">Continue</a> </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="modalOverlay hide">
    <div class="modalContainer">
        <div class="modalWindow paddingR3">
            <button class="modalClose caps fw-400 size5">X</button>
            <div id="modalContact" class="modalContent hide">
                <h6 class="modalTitle caps fw-700 size6">Contact Us</h6>
                <div class="row">
                    <div class="col sm-four">
                        <p>Phone:</p>
                    </div>
                    <div class="col sm-eight">
                        <p><a href="tel:1-323-336-4122">(+1) 323 336-4122</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col sm-four">
                        <p>Email:</p>
                    </div>
                    <div class="col sm-eight">
                        <p><a href="mailto:support@virgiljames.com">support@virgiljames.com</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col sm-four">
                        <p>Mail:</p>
                    </div>
                    <div class="col sm-eight">
                        <p>214 N. Cedros Avenue Solana&nbsp;Beach, CA&nbsp;92075</p>
                    </div>
                </div>
            </div>
            <div id="modalGuarantee" class="modalContent hide">
                <h6 class="modalTitle caps fw-700 size6">Guarantee</h6>
                <p>If your purchase is in its <span style="text-decoration: underline;">original</span> condition, we will buy it back for the original purchase price - for any reason or at any time.</p>
                <p>If your purchase has been <span style="text-decoration: underline;">used</span>, you may select one of the following options:</p>
                <div class="sm-one">
                    <div class="sm-one md-six"></div>
                    <span>1.</span> </div>
                <div class="sm-eleven">
                    <p>As the original owner, we will repair your purchase, as best we can, at no charge to you.</p>
                </div>
                <div class="sm-one">
                    <div class="sm-one md-six"></div>
                    <span>2.</span> </div>
                <div class="sm-eleven">
                    <p>As the original owner, if your purchase is beyond repair or you no longer want it, we will provide a merchandise credit equal to 33% of the original purchase price.</p>
                </div>
            </div>
            <div id="modalShipping" class="modalContent hide">
                <h6 class="modalTitle caps fw-700 size6">Shipping</h6>
                <p>All purchases are shipped prepaid to your mailing address by UPS 2<sup>nd</sup> Day in the United States, or by expedited international carriers (DHL, FEDEX, etc.) in the rest of the world.</p>
                <p>Return shipping labels are included in the event you want to immediately return your purchase. Unless special arrangements are made, customers are responsible for all non-US customs and/or duty charges.</p>
            </div>
            <div id="modalPrivacy" class="modalContent hide">
                <h6 class="modalTitle caps fw-700 size6">We take your privacy seriously.</h6>
                <p>We respect your privacy. All personal information collected on our website is used solely to manage your user experience. We will never share or sell your personal information.</p>
                <p>Financial information is used only to process order transactions, and is not saved by Virgil James.</p>
                <p>If you register with Virgil James, it's easy to modify your saved information or remove it entirely by clicking on the Account icon at the top of any page.</p>
                <p>If you login, we use temporary session cookies to manage your user experience. Please access your device’s Security Settings to manage these cookies.</p>
                <p>If you have any questions regarding our Privacy Policy or practices, please send an email to: <a href="mailto:privacy@virgiljames.com">privacy@virgiljames.com.</a></p>
            </div>
            <div id="modalCheckout" class="modalContent hide">
                <h1 class="caps fw-700">Sign In</h1>
                <div class="leftLogin leftCol lg-six">
                    <h2 class="ital fw-400">Returning Customer</h2>
                    <form id="signInFormCart" class="generalForm" name="signInFormCart" method="post" action="/login_action.php?from=checkout">
                        <label for="userEmail">Email:</label>
                        <input id="email" name="email" type="text" value="" />
                        <label for="userPass">Password:</label>
                        <input id="passwd" name="passwd" type="password" value="" />
                        <button class="fillBtn mobileElement" form="signInForm" id="cartLoginBtn" onClick="cartLogin()">Sign In</button>
                    </form>
                </div>
                <div class="rightLogin rightCol lg-six">
                    <h2 class="ital fw-400">Guest Customer</h2>
                    <p>Checkout without signing in. During Checkout you can create an account using the information you provide for this transaction.</p>
                    <a class="fillBtn mobileElement" href="checkout.php">Continue</a> </div>
                <div class="desktopElement lg-twelve">
                    <div class="signInButtonWrapper lg-six">
                        <button class="fillBtn" form="signInForm" id="cartLoginBtn" onClick="cartLogin()">Sign In</button>
                    </div>
                    <div class="guestButtonWrapper lg-six"> <a class="fillBtn" href="checkout.php">Continue</a> </div>
                </div>
            </div>
            <div class="modalContent modalContentCart hide">
                <div class="row">
                    <div class="lg-five">
                        <h6 class="modalTitle">Login / Register</h6>
                        <div class="textCenter">
                            <button type="button" class="fillBtn"  onclick="window.location = '/login.php?from=checkout';">CONTINUE</button>
                        </div>
                    </div>
                    <div class="lg-two" style="font-size:16px; padding-top:33px; font-weight:bold; text-align:center;">OR</div>
                    <div class="lg-five">
                        <h6 class="modalTitle">Guest Checkout</h6>
                        <div class="textCenter"> <a href="checkout.php" class="fillBtn">CONTINUE</a> </div>
                    </div>
                </div>
            </div>
            <div id="cartAddrModal" class="modalContent hide">
                <h6 class="modalTitle">Add Shipping Address</h6>
                <form id="AddrFrm" class="generalForm modalForm">
                    <label>First Name</label>
                    <input type="text" id="FName" name="FName" value="John">
                    <label>Last Name</label>
                    <input type="text" id="LName" name="LName" value="Coughlin">
                    <label>Address 1</label>
                    <input type="text" id="Addr1" name="Addr1" value="214 N Cedros Ave">
                    <label>Address 2</label>
                    <input type="text" id="Addr2" name="Addr2" value="">
                    <label>City</label>
                    <input type="text" id="City" name="City" value="Solana Beach">
                    <label>State</label>
                    <input type="text" id="State" name="State" value="CA">
                    <label>Zip Code</label>
                    <input type="text" id="Postal" name="Postal" value="92075">
                    <label>Country</label>
                    <select id="Country" name="Country">
                        <option selected="" value="USA">United States of America</option>
                    </select>
                    <input type="hidden" id="Type" name="Type" value="Shp">
                    <input type="hidden" id="UsrID" name="UsrID" value="1003">
                    <div class="generalFormInput">
                        <input type="checkbox" id="isPrimary" name="isPrimary">
                        <label class="inline" for="setPrimary">Set as primary address</label>
                        <div class="fltR"><a href="#"><em>Delete Address</em></a></div>
                    </div>
                    <div class="generalFormSubmit textCenter">
                        <button type="button" class="fillBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="bgWrapper footerBgWrapper footerGrey">
    <div class="widthWrapper">
        <div class="tableWrapper">
            <div class="cellWrapper">
                <div class ="leftFooterColumn col lg-nine">
                    <ul class="socialIcons">
                        <li><a href="https://twitter.com/virgiljames_" target="_blank"><img src="/img/footer/grey/twitter_sm_icon.png" alt="Twitter" /></a></li>
                        <!-- 

                     -->
                        <li><a href="https://www.facebook.com/virgiljamesdesign" target="_blank"><img src="/img/footer/grey/facebook_sm_icon.png" alt="Facebook" /></a></li>
                        <!-- 

                     -->
                        <li><a href="https://www.pinterest.com/virgiljamesbags/" target="_blank"><img src="/img/footer/grey/pinterest_sm_icon.png" alt="Pinterest" /></a></li>
                        <!-- 

                     -->
                        <li><a href="https://instagram.com/virgiljamesdesign/" target="_blank"><img src="/img/footer/grey/instagram_sm_icon.png" alt="Instagram" /></a></li>
                    </ul>
                    <ul class="footerLinks footShow caps fw-400 size7">
                        <li>
                            <button class="footerLink caps" href="#" onClick="openModal('modalContact');">Contact</button>
                        </li>
                        <li>
                            <button class="footerLink caps" href="#" onClick="openModal('modalGuarantee');">Guarantee</button>
                        </li>
                        <li>
                            <button class="footerLink caps" href="#" onClick="openModal('modalShipping');">Shipping</button>
                        </li>
                        <li>
                            <button class="footerLink caps" href="#" onClick="openModal('modalPrivacy');">Privacy</button>
                        </li>
                    </ul>
                </div>
                <div class ="rightFooterColumn caps fw-300 size8 col lg-three"> <span class="footerCopyright">&copy; 2015 Virgil James </span> </div>
            </div>
        </div>
    </div>
</div>

<!-- Common .js Includes --> 
<script type="text/javascript" src="/js/navigation.js"></script>
<script>
//TOGGLE DIV DIV - USES DATA ID
$(document).ready(function() {
	$('.toggleDivBtn').on("click load resize scroll", function (e) {
		
	
		var heights = $(".eqHeightJs").map(function () {
			return $(this).height();
	
	
		}).get(),
				maxHeight = Math.max.apply(null, heights);
		genHeight = maxHeight;
		$(".eqHeightJs").height(maxHeight);
	
	});

});
</script>
</body>
</html>