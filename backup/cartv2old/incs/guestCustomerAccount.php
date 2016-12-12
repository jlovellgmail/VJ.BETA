<div class="row cartBorderBottom">
	<h2 class="caps black marTop30 marBottom15">Customer Service</h2>
	<p>Please enter a valid email address and password. This information will be used to setup your
account with Virgil James and send you the order reciept.</p>
    <form class="generalForm">
    	<div class="row">
            <div class="sm-twelve md-six lg-six leftCol">
            	<div class="clearfix">
                	<label>Email Address:</label>
            		<input type="email" id="emailReview" name="emailReview" />
                </div>
                <br />	
                <label class="contrastGrey clearfix">
                	<div class="col"><input type="checkbox" name="accChkbx" id="accChkbx" class="collapseCheck" value="createAccountCheck" onchange="setUsrMode()"/></div><div class="sm-ten" style="padding-left:15px">Save my information and create a Virgil James account.</div>
                </label>
			</div><div class="sm-twelve md-six lg-six leftCol" id="createAccountCheck" style="display:none;">
            	<div class="clearfix">
                	<label>Password:</label>
            		<input type="password" id="psw" name="psw"  />
                </div>
            	<div class="clearfix">
                	<label>Confirm Password:</label>
            		<input type="password" id="confpsw" name="confirmpsw"  />
				</div>
    		</div>
        </div>
    </form>
</div>

<script>
	function setUsrMode(){
		if ($("#accChkbx").prop('checked')){
			usrMode = 'new'
		} else {
			usrMode = 'guest';
		}
	}
</script>