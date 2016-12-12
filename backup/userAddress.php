<div class="row">
    <div class="lg-ten">
        <h2 class="goldUnderline">Shipping Information</h2>
        <form class="generalForm generalFormBlock clearfix">
            <div class="generalFormInput text-right"><a href="javascript:void(0)" class="blackBtnText modalCall modalCall2">+ Add Shipping Address</a></div>
            <div class="row clearfix">
                <div class="sm-twelve md-six lg-six leftCol">
                    <div class="formWell eqHeightJs">
                        <h3>Primary Shipping</h3>
                        <ul>
                            <li>User Name</li>
                            <li>214 N. Cedros Ave</li>
                            <li>214 Apartment B</li>
                            <li>Solana Beach, CA 92075</li>
                            <li>United States</li>
                        </ul>
                        <a href="#" class="modalCall modalCall1 formWellLink">edit</a>
                	</div>
                </div><div class="sm-twelve md-six lg-six rightCol">
                    <div class="formWell eqHeightJs">
                        <h3>Shipping #2</h3>
                        <ul>
                            <li>User Name</li>
                            <li>214 N. Cedros Ave</li>
                            <li>Solana Beach, CA 92075</li>
                            <li>United States</li>
                        </ul>
                        <a href="#" class="modalCall modalCall1 formWellLink">edit</a>
                	</div>
                </div><div class="sm-twelve md-six lg-six leftCol">
                    <div class="formWell eqHeightJs">
                        <h3>Shipping #3</h3>
                        <ul>
                            <li>User Name</li>
                            <li>214 N. Cedros Ave</li>
                            <li>Solana Beach, CA 92075</li>
                            <li>United States</li>
                        </ul>
                        <a href="#" class="modalCall modalCall1 formWellLink">edit</a>
                	</div>
                </div><div class="sm-twelve md-six lg-six rightCol">
                    <div class="formWell eqHeightJs">
                        <h3>Shipping #4</h3>
                        <ul>
                            <li>User Name</li>
                            <li>214 N. Cedros Ave</li>
                            <li>Solana Beach, CA 92075</li>
                            <li>United States</li>
                        </ul>
                        <a href="#" class="modalCall modalCall1 formWellLink">edit</a>
                	</div>
                </div>   
            </div> 
        </form>
    </div><div class="lg-ten">
        <h2 class="goldUnderline">Billing Information</h2>
        <form class="generalForm generalFormBlock clearfix">
            <div class="generalFormInput text-right"><a href="javascript:void(0)" class="blackBtnText toggleLink">+ Add Billing Address</a></div>
<div class="row clearfix">
                <div class="sm-twelve md-six lg-six leftCol">
                    <div class="formWell eqHeightJs">
                        <h3>Primary Billing</h3>
                        <ul>
                            <li>User Name</li>
                            <li>214 N. Cedros Ave</li>
                            <li>214 Apartment B</li>
                            <li>Solana Beach, CA 92075</li>
                            <li>United States</li>
                        </ul>
                        <a href="#" class="modalCall modalCall1 formWellLink">edit</a>
                	</div>
                </div><div class="sm-twelve md-six lg-six rightCol">
                    <div class="formWell eqHeightJs">
                        <h3>Billing #2</h3>
                        <ul>
                            <li>User Name</li>
                            <li>214 N. Cedros Ave</li>
                            <li>Solana Beach, CA 92075</li>
                            <li>United States</li>
                        </ul>
                        <a href="#" class="modalCall modalCall1 formWellLink">edit</a>
                	</div>
                </div><div class="sm-twelve md-six lg-six leftCol">
                    <div class="formWell eqHeightJs">
                        <h3>Billing #3</h3>
                        <ul>
                            <li>User Name</li>
                            <li>214 N. Cedros Ave</li>
                            <li>Solana Beach, CA 92075</li>
                            <li>United States</li>
                        </ul>
                        <a href="#" class="modalCall modalCall1 formWellLink">edit</a>
                	</div>
                </div>   
            </div>            
        </form>
    </div>
</div>

<div class="modalOverlay modalForm hide">
        <div class="modalContainer">
            <div class="modalWindow">
                <button class="modalButton modalButtonClose">X</button>
                <div class="modalContent modal1 hide">
                    <h6 class="modalTitle">Update Primary Shipping Address</h6>
                    <form class="generalForm">
                        <label>First Name</label>
                        <input type="text" id="FName" name=" " value="User">
                        <label>Last Name</label>
                        <input type="text" id="LName" name=" " value="Name">
                        <label>Address 1</label>
                        <input type="text" id="FName" name=" " value="214 N. Cedros Ave">
                        <label>Address 2</label>
                        <input type="text" id="LName" name=" " value="#54">
                        <label>City</label>
                        <input type="text" id="LName" name=" " value="San Diego">
                        <label>State</label>
                        <input type="text" id="LName" name=" " value="CA">
                        <label>Country</label>
                        <select>
                            <option selected>United States of America</option>
                        </select>
                        <div class="generalFormInput">
                            <input type="checkbox" id="setPrimary"/> <label class="inline" for="setPrimary">Set as primary address</label>
                            <div class="fl-r"><a href="#"><em>Delete Address</em></a></div>
                        </div>
                        <div class="generalFormSubmit text-center">
                            <button type="button" onClick="validateUserInfo();" class="fillBtn">Save</button>
                        </div>
                    </form>
                </div>
                <div class="modalContent modal2 hide">
                    <h6 class="modalTitle">Add Shipping Address</h6>
                    <form class="generalForm">
                        <label>First Name</label>
                        <input type="text" id="FName" name=" " value=" ">
                        <label>Last Name</label>
                        <input type="text" id="LName" name=" " value=" ">
                        <label>Address 1</label>
                        <input type="text" id="FName" name=" " value=" ">
                        <label>Address 2</label>
                        <input type="text" id="LName" name=" " value=" ">
                        <label>City</label>
                        <input type="text" id="LName" name=" " value=" ">
                        <label>State</label>
                        <input type="text" id="LName" name=" " value=" ">
                        <label>Country</label>
                        <select>
                            <option selected>United States of America</option>
                        </select>
                        <div class="generalFormSubmit text-center">
                            <button type="button" onClick="validateUserInfo();" class="fillBtn">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>