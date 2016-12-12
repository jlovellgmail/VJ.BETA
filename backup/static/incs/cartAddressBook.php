<div class="toggleDivGroup">
    <div class="toggleDivGroupItem toggleDivGroupDefault">                                
        <div class="row v-btm marBottom30">
            <div class="sm-twelve lg-nine v-btm">
                <h2 class="black caps">Shipping Info</h2>
            </div><div class="sm-twelve lg-three textRight v-btm">
                <a href="#" class="caps underline toggleDivGroupButton" data-id="addressEdit"><b>edit</b></a>
            </div>
        </div>                        
        <div class="clearfix">
            <!--<input class="fltL" type="radio" checked>-->                                
            <div class="">
                First Name<br>
                Last Name<br>
                123 N. Address Lane<br>
                City, State 00000<br><br>
                <p class="contrastGrey">Currently set as your default delivery address.</p>
            </div>    
        </div>
        <div class="clearfix buttonGroup cartBorderBottom marTop15 marBottom30">
            <button class="fillBtn grayBtn toggleDivGroupButton" data-id="addressEdit">Edit Address</button>
            <button class="fillBtn grayBtn toggleDivGroupButton" data-id="addressChange">Choose Another Delivery Address</button>
            <button class="fillBtn grayBtn toggleDivGroupButton" data-id="addressNew">Add Another Delivery Address</button>
        </div>
        <div class="row">
            <div class="sm-twelve lg-six">
                <a class="caps black underline" href="#"><b>Back To Summary</b></a>
            </div><!--
            --><div class="sm-twelve lg-six textRight">
                <a class="fillBtn" href="#"><b>Continue</b></a>
            </div>
        </div>                                
    </div>
    <div class="toggleDivGroupItem clearfix" id="addressEdit">
        <div class="row v-btm marBottom30">
            <div class="sm-twelve lg-nine v-btm">
                <h2 class="black caps">Edit Shipping Address Info</h2>
            </div><div class="sm-twelve lg-three textRight v-btm">
                <a href="#" class="caps underline toggleDivGroupItemClose"><b>close</b></a>
            </div>
        </div>                                        
        <form class="checkoutForm generalForm generalFormBlock" action="" method="post" id="cartship" name="cartship">
            <div class="row" id="shipAddrFormDet"> 
                <div class="sm-twelve lg-six leftCol">
                    <label for="fNameShipField">First Name:</label>
                    <input id="fNameShipField" type="text" name="FName" value="">
                </div><!--
                --><div class="sm-twelve lg-six rightCol">
                    <label for="lNameShipField">Last Name:</label>
                    <input id="lNameShipField" type="text" name="LName" value="">
                </div><!--
                --><div class="sm-twelve lg-six leftCol">
                    <label for="address1ShipField">Address Line 1:</label>
                    <input id="address1ShipField" type="text" name="Addr1" value="">
                </div><!-- 
                --><div class="sm-twelve lg-six rightCol">
                    <label for="address2ShipField">Address Line 2:</label>
                    <input id="address2ShipField" type="text" name="Addr2" value="">
                </div><!--
                --><div class="sm-twelve lg-six leftCol">
                    <label for="cityShipField">City:</label>
                    <input id="cityShipField" type="text" name="City" value="">
                </div><!-- 
                --><div class="sm-twelve lg-four centerCol">
                    <label for="stateShipField">State / Province:</label>
                    <div id="SStateAJAXRes"><select name="State" id="stateShipField"><option value="">Please select state / province</option>
                <option value="">--------------------------</option>
                <option value="xx">Other / Not listed. </option>
                <option value="">--------------------------</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="DC">Washington DC</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
                </select></div>
                </div><!--
                <!--
                --><div class="sm-twelve lg-two rightCol">
                    <label for="postalCodeShipField">Postal Code:</label>
                    <input id="postalCodeShipField" type="text" name="Postal" value="">
                </div><!-- 
                --><div class="sm-twelve lg-six leftCol">
                    <label for="countryShipSelect">Country:</label>
                    <select id="countryShipSelect" name="Country" onChange="changeCountry('Shp')">
                        <option value="xx">Please select country</option>
                <option value="AF">Afghanistan</option>
                <option value="AX">Åland Islands</option>
                <option value="AL">Albania</option>
                <option value="DZ">Algeria</option>
                <option value="AS">American Samoa</option>
                <option value="AD">Andorra</option>
                <option value="AO">Angola</option>
                <option value="AI">Anguilla</option>
                <option value="AQ">Antarctica</option>
                <option value="AG">Antigua and Barbuda</option>
                <option value="AR">Argentina</option>
                <option value="AM">Armenia</option>
                <option value="AW">Aruba</option>
                <option value="AU">Australia</option>
                <option value="AT">Austria</option>
                <option value="AZ">Azerbaijan</option>
                <option value="BS">Bahamas</option>
                <option value="BH">Bahrain</option>
                <option value="BD">Bangladesh</option>
                <option value="BB">Barbados</option>
                <option value="BY">Belarus</option>
                <option value="BE">Belgium</option>
                <option value="BZ">Belize</option>
                <option value="BJ">Benin</option>
                <option value="BM">Bermuda</option>
                <option value="BT">Bhutan</option>
                <option value="BO">Bolivia</option>
                <option value="BA">Bosnia and Herzegovina</option>
                <option value="BW">Botswana</option>
                <option value="BV">Bouvet Island</option>
                <option value="BR">Brazil</option>
                <option value="BQ">British Antarctic Territory</option>
                <option value="IO">British Indian Ocean Territory</option>
                <option value="VG">British Virgin Islands</option>
                <option value="BN">Brunei</option>
                <option value="BG">Bulgaria</option>
                <option value="BF">Burkina Faso</option>
                <option value="BI">Burundi</option>
                <option value="KH">Cambodia</option>
                <option value="CM">Cameroon</option>
                <option value="CA">Canada</option>
                <option value="CT">Canton and Enderbury Islands</option>
                <option value="CV">Cape Verde</option>
                <option value="KY">Cayman Islands</option>
                <option value="CF">Central African Republic</option>
                <option value="TD">Chad</option>
                <option value="CL">Chile</option>
                <option value="CN">China</option>
                <option value="CX">Christmas Island</option>
                <option value="CC">Cocos [Keeling] Islands</option>
                <option value="CO">Colombia</option>
                <option value="KM">Comoros</option>
                <option value="CG">Congo - Brazzaville</option>
                <option value="CD">Congo - Kinshasa</option>
                <option value="CK">Cook Islands</option>
                <option value="CR">Costa Rica</option>
                <option value="CI">Côte d’Ivoire</option>
                <option value="HR">Croatia</option>
                <option value="CU">Cuba</option>
                <option value="CY">Cyprus</option>
                <option value="CZ">Czech Republic</option>
                <option value="DK">Denmark</option>
                <option value="DJ">Djibouti</option>
                <option value="DM">Dominica</option>
                <option value="DO">Dominican Republic</option>
                <option value="NQ">Dronning Maud Land</option>
                <option value="DD">East Germany</option>
                <option value="EC">Ecuador</option>
                <option value="EG">Egypt</option>
                <option value="SV">El Salvador</option>
                <option value="GQ">Equatorial Guinea</option>
                <option value="ER">Eritrea</option>
                <option value="EE">Estonia</option>
                <option value="ET">Ethiopia</option>
                <option value="FK">Falkland Islands</option>
                <option value="FO">Faroe Islands</option>
                <option value="FJ">Fiji</option>
                <option value="FI">Finland</option>
                <option value="FR">France</option>
                <option value="GF">French Guiana</option>
                <option value="PF">French Polynesia</option>
                <option value="FQ">French Southern and Antarctic Territories</option>
                <option value="TF">French Southern Territories</option>
                <option value="GA">Gabon</option>
                <option value="GM">Gambia</option>
                <option value="GE">Georgia</option>
                <option value="DE">Germany</option>
                <option value="GH">Ghana</option>
                <option value="GI">Gibraltar</option>
                <option value="GR">Greece</option>
                <option value="GL">Greenland</option>
                <option value="GD">Grenada</option>
                <option value="GP">Guadeloupe</option>
                <option value="GU">Guam</option>
                <option value="GT">Guatemala</option>
                <option value="GG">Guernsey</option>
                <option value="GN">Guinea</option>
                <option value="GW">Guinea-Bissau</option>
                <option value="GY">Guyana</option>
                <option value="HT">Haiti</option>
                <option value="HM">Heard Island and McDonald Islands</option>
                <option value="HN">Honduras</option>
                <option value="HK">Hong Kong SAR China</option>
                <option value="HU">Hungary</option>
                <option value="IS">Iceland</option>
                <option value="IN">India</option>
                <option value="ID">Indonesia</option>
                <option value="IR">Iran</option>
                <option value="IQ">Iraq</option>
                <option value="IE">Ireland</option>
                <option value="IM">Isle of Man</option>
                <option value="IL">Israel</option>
                <option value="IT">Italy</option>
                <option value="JM">Jamaica</option>
                <option value="JP">Japan</option>
                <option value="JE">Jersey</option>
                <option value="JT">Johnston Island</option>
                <option value="JO">Jordan</option>
                <option value="KZ">Kazakhstan</option>
                <option value="KE">Kenya</option>
                <option value="KI">Kiribati</option>
                <option value="KW">Kuwait</option>
                <option value="KG">Kyrgyzstan</option>
                <option value="LA">Laos</option>
                <option value="LV">Latvia</option>
                <option value="LB">Lebanon</option>
                <option value="LS">Lesotho</option>
                <option value="LR">Liberia</option>
                <option value="LY">Libya</option>
                <option value="LI">Liechtenstein</option>
                <option value="LT">Lithuania</option>
                <option value="LU">Luxembourg</option>
                <option value="MO">Macau SAR China</option>
                <option value="MK">Macedonia</option>
                <option value="MG">Madagascar</option>
                <option value="MW">Malawi</option>
                <option value="MY">Malaysia</option>
                <option value="MV">Maldives</option>
                <option value="ML">Mali</option>
                <option value="MT">Malta</option>
                <option value="MH">Marshall Islands</option>
                <option value="MQ">Martinique</option>
                <option value="MR">Mauritania</option>
                <option value="MU">Mauritius</option>
                <option value="YT">Mayotte</option>
                <option value="FX">Metropolitan France</option>
                <option value="MX">Mexico</option>
                <option value="FM">Micronesia</option>
                <option value="MI">Midway Islands</option>
                <option value="MD">Moldova</option>
                <option value="MC">Monaco</option>
                <option value="MN">Mongolia</option>
                <option value="ME">Montenegro</option>
                <option value="MS">Montserrat</option>
                <option value="MA">Morocco</option>
                <option value="MZ">Mozambique</option>
                <option value="MM">Myanmar [Burma]</option>
                <option value="NA">Namibia</option>
                <option value="NR">Nauru</option>
                <option value="NP">Nepal</option>
                <option value="NL">Netherlands</option>
                <option value="AN">Netherlands Antilles</option>
                <option value="NT">Neutral Zone</option>
                <option value="NC">New Caledonia</option>
                <option value="NZ">New Zealand</option>
                <option value="NI">Nicaragua</option>
                <option value="NE">Niger</option>
                <option value="NG">Nigeria</option>
                <option value="NU">Niue</option>
                <option value="NF">Norfolk Island</option>
                <option value="KP">North Korea</option>
                <option value="VD">North Vietnam</option>
                <option value="MP">Northern Mariana Islands</option>
                <option value="NO">Norway</option>
                <option value="OM">Oman</option>
                <option value="PC">Pacific Islands Trust Territory</option>
                <option value="PK">Pakistan</option>
                <option value="PW">Palau</option>
                <option value="PS">Palestinian Territories</option>
                <option value="PA">Panama</option>
                <option value="PZ">Panama Canal Zone</option>
                <option value="PG">Papua New Guinea</option>
                <option value="PY">Paraguay</option>
                <option value="YD">Peoples Democratic Republic of Yemen</option>
                <option value="PE">Peru</option>
                <option value="PH">Philippines</option>
                <option value="PN">Pitcairn Islands</option>
                <option value="PL">Poland</option>
                <option value="PT">Portugal</option>
                <option value="PR">Puerto Rico</option>
                <option value="QA">Qatar</option>
                <option value="RE">Réunion</option>
                <option value="RO">Romania</option>
                <option value="RU">Russia</option>
                <option value="RW">Rwanda</option>
                <option value="BL">Saint Barthélemy</option>
                <option value="SH">Saint Helena</option>
                <option value="KN">Saint Kitts and Nevis</option>
                <option value="LC">Saint Lucia</option>
                <option value="MF">Saint Martin</option>
                <option value="PM">Saint Pierre and Miquelon</option>
                <option value="VC">Saint Vincent and the Grenadines</option>
                <option value="WS">Samoa</option>
                <option value="SM">San Marino</option>
                <option value="ST">São Tomé and Príncipe</option>
                <option value="SA">Saudi Arabia</option>
                <option value="SN">Senegal</option>
                <option value="RS">Serbia</option>
                <option value="CS">Serbia and Montenegro</option>
                <option value="SC">Seychelles</option>
                <option value="SL">Sierra Leone</option>
                <option value="SG">Singapore</option>
                <option value="SK">Slovakia</option>
                <option value="SI">Slovenia</option>
                <option value="SB">Solomon Islands</option>
                <option value="SO">Somalia</option>
                <option value="ZA">South Africa</option>
                <option value="GS">South Georgia and the South Sandwich Islands</option>
                <option value="KR">South Korea</option>
                <option value="ES">Spain</option>
                <option value="LK">Sri Lanka</option>
                <option value="SD">Sudan</option>
                <option value="SR">Suriname</option>
                <option value="SJ">Svalbard and Jan Mayen</option>
                <option value="SZ">Swaziland</option>
                <option value="SE">Sweden</option>
                <option value="CH">Switzerland</option>
                <option value="SY">Syria</option>
                <option value="TW">Taiwan</option>
                <option value="TJ">Tajikistan</option>
                <option value="TZ">Tanzania</option>
                <option value="TH">Thailand</option>
                <option value="TL">Timor-Leste</option>
                <option value="TG">Togo</option>
                <option value="TK">Tokelau</option>
                <option value="TO">Tonga</option>
                <option value="TT">Trinidad and Tobago</option>
                <option value="TN">Tunisia</option>
                <option value="TR">Turkey</option>
                <option value="TM">Turkmenistan</option>
                <option value="TC">Turks and Caicos Islands</option>
                <option value="TV">Tuvalu</option>
                <option value="UM">U.S. Minor Outlying Islands</option>
                <option value="PU">U.S. Miscellaneous Pacific Islands</option>
                <option value="VI">U.S. Virgin Islands</option>
                <option value="UG">Uganda</option>
                <option value="UA">Ukraine</option>
                <option value="AE">United Arab Emirates</option>
                <option value="GB">United Kingdom</option>
                <option value="US" selected="">United States</option>
                <option value="ZZ">Unknown or Invalid Region</option>
                <option value="UY">Uruguay</option>
                <option value="UZ">Uzbekistan</option>
                <option value="VU">Vanuatu</option>
                <option value="VA">Vatican City</option>
                <option value="VE">Venezuela</option>
                <option value="VN">Vietnam</option>
                <option value="WK">Wake Island</option>
                <option value="WF">Wallis and Futuna</option>
                <option value="EH">Western Sahara</option>
                <option value="YE">Yemen</option>
                <option value="ZM">Zambia</option>
                <option value="ZW">Zimbabwe</option>
            </select>
                </div><!--
                --><div class="sm-twelve lg-six rightCol">
                    <label for="telShipField">Telephone:</label>
                    <input id="telShipField" type="text" name="Phone" value="">
                </div>
           </div>
            <div class="row cartBorderBottom marBottom30">
                <label><input type="checkbox">
                &nbsp; Save my shipping address for future orders</label>
            </div>
            <div class="row">
                <div class="sm-twelve lg-six">
                    <a class="caps black underline" href="#"><b>Back To Summary</b></a>
                </div><!--
                --><div class="sm-twelve lg-six textRight">
                    <a class="fillBtn" href="#"><b>Save</b></a>
                </div>
            </div>                                
         </form>                                    
     </div>
    <div class="toggleDivGroupItem" id="addressChange">
        <div class="row v-btm marBottom30">
            <div class="sm-twelve lg-nine v-btm">
                <h2 class="black caps">Choose Another Shipping Address</h2>
            </div><div class="sm-twelve lg-three textRight v-btm">
                <a href="#" class="caps underline toggleDivGroupItemClose"><b>close</b></a>
            </div>
        </div>                                        
        <div class="clearfix marBottom30 gridLined twoBy">
            <div class="row">
                <div class="sm-twelve lg-six leftCol">
                    <label>
                    <input class="fltL" type="radio" name="chooseAnotherAddress">                               
                    <div class="fltL marginX10">
                        First Name<br>
                        Last Name<br>
                        123 N. Address Lane<br>
                        City, State 00000
                    </div>
                    </label>    
                    <div class="contrastGrey fltL marginX25 marTop15">Currently set as your default delivery address.</div>
                </div><!--
                --><div class="sm-twelve lg-six rightCol">
                    <label>
                    <input class="fltL" type="radio" name="chooseAnotherAddress">                                
                    <div class="fltL marginX10">
                        First Name<br>
                        Last Name<br>
                        123 N. Address Lane<br>
                        City, State 00000
                    </div>
                    </label>                
                </div>            
                <div class="sm-twelve lg-six leftCol">
                    <label>
                    <input class="fltL" type="radio" name="chooseAnotherAddress">                               
                    <div class="fltL marginX10">
                        First Name<br>
                        Last Name<br>
                        123 N. Address Lane<br>
                        City, State 00000
                    </label>
                    </div>    
                </div><!--
                --><div class="sm-twelve lg-six rightCol">
                    <label>
                    <input class="fltL" type="radio" name="chooseAnotherAddress">                                
                    <div class="fltL marginX10">
                        First Name<br>
                        Last Name<br>
                        123 N. Address Lane<br>
                        #54<br />
                        City, State 00000
                    </div>
                    </label>                
                </div>            
                <div class="sm-twelve lg-six leftCol">
                    <label>
                    <input class="fltL" type="radio" name="chooseAnotherAddress">                               
                    <div class="fltL marginX10">
                        First Name<br>
                        Last Name<br>
                        123 N. Address Lane<br>
                        #333<br>
                        City, State 00000
                    </div> 
                    </label>   
                </div><!--
                --><div class="sm-twelve lg-six rightCol">
                    <label>
                    <input class="fltL" type="radio" name="chooseAnotherAddress">                                
                    <div class="fltL marginX10">
                        First Name<br>
                        Last Name<br>
                        123 N. Address Lane<br>
                        City, State 00000
                    </div>
                    </label>                
                </div>            
            </div>                               
        </div>                                    
        <div class="row marTop30">
            <div class="sm-twelve lg-six">
                <button class="fillBtn grayBtn toggleDivGroupButton" data-id="addressNew">Add Another Delivery Address</button>
            </div><!--
            --><div class="sm-twelve lg-six textRight">
                <a class="fillBtn" href="#"><b>Use this Shipping Address</b></a>
            </div>
        </div>    
    </div>
    <div class="toggleDivGroupItem clearfix" id="addressNew">
        <div class="row v-btm marBottom30">
            <div class="sm-twelve lg-nine v-btm">
                <h2 class="black caps">Add New Shipping Address</h2>
            </div><div class="sm-twelve lg-three textRight v-btm">
                <a href="#" class="caps underline toggleDivGroupItemClose"><b>close</b></a>
            </div>
        </div>                                        
        <form class="checkoutForm generalForm generalFormBlock" action="" method="post" id="cartship" name="cartship">
            <div class="row" id="shipAddrFormDet"> 
            <div class="sm-twelve lg-six leftCol">
                <label for="fNameShipField">First Name:</label>
                <input id="fNameShipField" type="text" name="FName" value="">
            </div><!--
            --><div class="sm-twelve lg-six rightCol">
                <label for="lNameShipField">Last Name:</label>
                <input id="lNameShipField" type="text" name="LName" value="">
            </div><!--
            --><div class="sm-twelve lg-six leftCol">
                <label for="address1ShipField">Address Line 1:</label>
                <input id="address1ShipField" type="text" name="Addr1" value="">
            </div><!-- 
            --><div class="sm-twelve lg-six rightCol">
                <label for="address2ShipField">Address Line 2:</label>
                <input id="address2ShipField" type="text" name="Addr2" value="">
            </div><!--
            --><div class="sm-twelve lg-six leftCol">
                <label for="cityShipField">City:</label>
                <input id="cityShipField" type="text" name="City" value="">
            </div><!-- 
            --><div class="sm-twelve lg-four centerCol">
                <label for="stateShipField">State / Province:</label>
                <div id="SStateAJAXRes"><select name="State" id="stateShipField"><option value="">Please select state / province</option>
            <option value="">--------------------------</option>
            <option value="xx">Other / Not listed. </option>
            <option value="">--------------------------</option>
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="DC">Washington DC</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
            </select></div>
            </div><!--
            <!--
            --><div class="sm-twelve lg-two rightCol">
                <label for="postalCodeShipField">Postal Code:</label>
                <input id="postalCodeShipField" type="text" name="Postal" value="">
            </div><!-- 
            --><div class="sm-twelve lg-six leftCol">
                <label for="countryShipSelect">Country:</label>
                <select id="countryShipSelect" name="Country" onChange="changeCountry('Shp')">
                    <option value="xx">Please select country</option>
            <option value="AF">Afghanistan</option>
            <option value="AX">Åland Islands</option>
            <option value="AL">Albania</option>
            <option value="DZ">Algeria</option>
            <option value="AS">American Samoa</option>
            <option value="AD">Andorra</option>
            <option value="AO">Angola</option>
            <option value="AI">Anguilla</option>
            <option value="AQ">Antarctica</option>
            <option value="AG">Antigua and Barbuda</option>
            <option value="AR">Argentina</option>
            <option value="AM">Armenia</option>
            <option value="AW">Aruba</option>
            <option value="AU">Australia</option>
            <option value="AT">Austria</option>
            <option value="AZ">Azerbaijan</option>
            <option value="BS">Bahamas</option>
            <option value="BH">Bahrain</option>
            <option value="BD">Bangladesh</option>
            <option value="BB">Barbados</option>
            <option value="BY">Belarus</option>
            <option value="BE">Belgium</option>
            <option value="BZ">Belize</option>
            <option value="BJ">Benin</option>
            <option value="BM">Bermuda</option>
            <option value="BT">Bhutan</option>
            <option value="BO">Bolivia</option>
            <option value="BA">Bosnia and Herzegovina</option>
            <option value="BW">Botswana</option>
            <option value="BV">Bouvet Island</option>
            <option value="BR">Brazil</option>
            <option value="BQ">British Antarctic Territory</option>
            <option value="IO">British Indian Ocean Territory</option>
            <option value="VG">British Virgin Islands</option>
            <option value="BN">Brunei</option>
            <option value="BG">Bulgaria</option>
            <option value="BF">Burkina Faso</option>
            <option value="BI">Burundi</option>
            <option value="KH">Cambodia</option>
            <option value="CM">Cameroon</option>
            <option value="CA">Canada</option>
            <option value="CT">Canton and Enderbury Islands</option>
            <option value="CV">Cape Verde</option>
            <option value="KY">Cayman Islands</option>
            <option value="CF">Central African Republic</option>
            <option value="TD">Chad</option>
            <option value="CL">Chile</option>
            <option value="CN">China</option>
            <option value="CX">Christmas Island</option>
            <option value="CC">Cocos [Keeling] Islands</option>
            <option value="CO">Colombia</option>
            <option value="KM">Comoros</option>
            <option value="CG">Congo - Brazzaville</option>
            <option value="CD">Congo - Kinshasa</option>
            <option value="CK">Cook Islands</option>
            <option value="CR">Costa Rica</option>
            <option value="CI">Côte d’Ivoire</option>
            <option value="HR">Croatia</option>
            <option value="CU">Cuba</option>
            <option value="CY">Cyprus</option>
            <option value="CZ">Czech Republic</option>
            <option value="DK">Denmark</option>
            <option value="DJ">Djibouti</option>
            <option value="DM">Dominica</option>
            <option value="DO">Dominican Republic</option>
            <option value="NQ">Dronning Maud Land</option>
            <option value="DD">East Germany</option>
            <option value="EC">Ecuador</option>
            <option value="EG">Egypt</option>
            <option value="SV">El Salvador</option>
            <option value="GQ">Equatorial Guinea</option>
            <option value="ER">Eritrea</option>
            <option value="EE">Estonia</option>
            <option value="ET">Ethiopia</option>
            <option value="FK">Falkland Islands</option>
            <option value="FO">Faroe Islands</option>
            <option value="FJ">Fiji</option>
            <option value="FI">Finland</option>
            <option value="FR">France</option>
            <option value="GF">French Guiana</option>
            <option value="PF">French Polynesia</option>
            <option value="FQ">French Southern and Antarctic Territories</option>
            <option value="TF">French Southern Territories</option>
            <option value="GA">Gabon</option>
            <option value="GM">Gambia</option>
            <option value="GE">Georgia</option>
            <option value="DE">Germany</option>
            <option value="GH">Ghana</option>
            <option value="GI">Gibraltar</option>
            <option value="GR">Greece</option>
            <option value="GL">Greenland</option>
            <option value="GD">Grenada</option>
            <option value="GP">Guadeloupe</option>
            <option value="GU">Guam</option>
            <option value="GT">Guatemala</option>
            <option value="GG">Guernsey</option>
            <option value="GN">Guinea</option>
            <option value="GW">Guinea-Bissau</option>
            <option value="GY">Guyana</option>
            <option value="HT">Haiti</option>
            <option value="HM">Heard Island and McDonald Islands</option>
            <option value="HN">Honduras</option>
            <option value="HK">Hong Kong SAR China</option>
            <option value="HU">Hungary</option>
            <option value="IS">Iceland</option>
            <option value="IN">India</option>
            <option value="ID">Indonesia</option>
            <option value="IR">Iran</option>
            <option value="IQ">Iraq</option>
            <option value="IE">Ireland</option>
            <option value="IM">Isle of Man</option>
            <option value="IL">Israel</option>
            <option value="IT">Italy</option>
            <option value="JM">Jamaica</option>
            <option value="JP">Japan</option>
            <option value="JE">Jersey</option>
            <option value="JT">Johnston Island</option>
            <option value="JO">Jordan</option>
            <option value="KZ">Kazakhstan</option>
            <option value="KE">Kenya</option>
            <option value="KI">Kiribati</option>
            <option value="KW">Kuwait</option>
            <option value="KG">Kyrgyzstan</option>
            <option value="LA">Laos</option>
            <option value="LV">Latvia</option>
            <option value="LB">Lebanon</option>
            <option value="LS">Lesotho</option>
            <option value="LR">Liberia</option>
            <option value="LY">Libya</option>
            <option value="LI">Liechtenstein</option>
            <option value="LT">Lithuania</option>
            <option value="LU">Luxembourg</option>
            <option value="MO">Macau SAR China</option>
            <option value="MK">Macedonia</option>
            <option value="MG">Madagascar</option>
            <option value="MW">Malawi</option>
            <option value="MY">Malaysia</option>
            <option value="MV">Maldives</option>
            <option value="ML">Mali</option>
            <option value="MT">Malta</option>
            <option value="MH">Marshall Islands</option>
            <option value="MQ">Martinique</option>
            <option value="MR">Mauritania</option>
            <option value="MU">Mauritius</option>
            <option value="YT">Mayotte</option>
            <option value="FX">Metropolitan France</option>
            <option value="MX">Mexico</option>
            <option value="FM">Micronesia</option>
            <option value="MI">Midway Islands</option>
            <option value="MD">Moldova</option>
            <option value="MC">Monaco</option>
            <option value="MN">Mongolia</option>
            <option value="ME">Montenegro</option>
            <option value="MS">Montserrat</option>
            <option value="MA">Morocco</option>
            <option value="MZ">Mozambique</option>
            <option value="MM">Myanmar [Burma]</option>
            <option value="NA">Namibia</option>
            <option value="NR">Nauru</option>
            <option value="NP">Nepal</option>
            <option value="NL">Netherlands</option>
            <option value="AN">Netherlands Antilles</option>
            <option value="NT">Neutral Zone</option>
            <option value="NC">New Caledonia</option>
            <option value="NZ">New Zealand</option>
            <option value="NI">Nicaragua</option>
            <option value="NE">Niger</option>
            <option value="NG">Nigeria</option>
            <option value="NU">Niue</option>
            <option value="NF">Norfolk Island</option>
            <option value="KP">North Korea</option>
            <option value="VD">North Vietnam</option>
            <option value="MP">Northern Mariana Islands</option>
            <option value="NO">Norway</option>
            <option value="OM">Oman</option>
            <option value="PC">Pacific Islands Trust Territory</option>
            <option value="PK">Pakistan</option>
            <option value="PW">Palau</option>
            <option value="PS">Palestinian Territories</option>
            <option value="PA">Panama</option>
            <option value="PZ">Panama Canal Zone</option>
            <option value="PG">Papua New Guinea</option>
            <option value="PY">Paraguay</option>
            <option value="YD">Peoples Democratic Republic of Yemen</option>
            <option value="PE">Peru</option>
            <option value="PH">Philippines</option>
            <option value="PN">Pitcairn Islands</option>
            <option value="PL">Poland</option>
            <option value="PT">Portugal</option>
            <option value="PR">Puerto Rico</option>
            <option value="QA">Qatar</option>
            <option value="RE">Réunion</option>
            <option value="RO">Romania</option>
            <option value="RU">Russia</option>
            <option value="RW">Rwanda</option>
            <option value="BL">Saint Barthélemy</option>
            <option value="SH">Saint Helena</option>
            <option value="KN">Saint Kitts and Nevis</option>
            <option value="LC">Saint Lucia</option>
            <option value="MF">Saint Martin</option>
            <option value="PM">Saint Pierre and Miquelon</option>
            <option value="VC">Saint Vincent and the Grenadines</option>
            <option value="WS">Samoa</option>
            <option value="SM">San Marino</option>
            <option value="ST">São Tomé and Príncipe</option>
            <option value="SA">Saudi Arabia</option>
            <option value="SN">Senegal</option>
            <option value="RS">Serbia</option>
            <option value="CS">Serbia and Montenegro</option>
            <option value="SC">Seychelles</option>
            <option value="SL">Sierra Leone</option>
            <option value="SG">Singapore</option>
            <option value="SK">Slovakia</option>
            <option value="SI">Slovenia</option>
            <option value="SB">Solomon Islands</option>
            <option value="SO">Somalia</option>
            <option value="ZA">South Africa</option>
            <option value="GS">South Georgia and the South Sandwich Islands</option>
            <option value="KR">South Korea</option>
            <option value="ES">Spain</option>
            <option value="LK">Sri Lanka</option>
            <option value="SD">Sudan</option>
            <option value="SR">Suriname</option>
            <option value="SJ">Svalbard and Jan Mayen</option>
            <option value="SZ">Swaziland</option>
            <option value="SE">Sweden</option>
            <option value="CH">Switzerland</option>
            <option value="SY">Syria</option>
            <option value="TW">Taiwan</option>
            <option value="TJ">Tajikistan</option>
            <option value="TZ">Tanzania</option>
            <option value="TH">Thailand</option>
            <option value="TL">Timor-Leste</option>
            <option value="TG">Togo</option>
            <option value="TK">Tokelau</option>
            <option value="TO">Tonga</option>
            <option value="TT">Trinidad and Tobago</option>
            <option value="TN">Tunisia</option>
            <option value="TR">Turkey</option>
            <option value="TM">Turkmenistan</option>
            <option value="TC">Turks and Caicos Islands</option>
            <option value="TV">Tuvalu</option>
            <option value="UM">U.S. Minor Outlying Islands</option>
            <option value="PU">U.S. Miscellaneous Pacific Islands</option>
            <option value="VI">U.S. Virgin Islands</option>
            <option value="UG">Uganda</option>
            <option value="UA">Ukraine</option>
            <option value="AE">United Arab Emirates</option>
            <option value="GB">United Kingdom</option>
            <option value="US" selected="">United States</option>
            <option value="ZZ">Unknown or Invalid Region</option>
            <option value="UY">Uruguay</option>
            <option value="UZ">Uzbekistan</option>
            <option value="VU">Vanuatu</option>
            <option value="VA">Vatican City</option>
            <option value="VE">Venezuela</option>
            <option value="VN">Vietnam</option>
            <option value="WK">Wake Island</option>
            <option value="WF">Wallis and Futuna</option>
            <option value="EH">Western Sahara</option>
            <option value="YE">Yemen</option>
            <option value="ZM">Zambia</option>
            <option value="ZW">Zimbabwe</option>
        </select>
            </div><!--
            --><div class="sm-twelve lg-six rightCol">
                <label for="telShipField">Telephone:</label>
                <input id="telShipField" type="text" name="Phone" value="">
            </div><!--
            --></div>
            <div class="row cartBorderBottom marBottom30">
                <label><input type="checkbox">
                &nbsp; Save my shipping address for future orders</label>
            </div>
            <div class="row">
                <div class="sm-twelve lg-six">
                    <a class="caps black underline" href="#"><b>Back To Summary</b></a>
                </div><!--
                --><div class="sm-twelve lg-six textRight">
                    <a class="fillBtn" href="#"><b>Save</b></a>
                </div>
            </div>                                
         </form>
    </div>
</div>