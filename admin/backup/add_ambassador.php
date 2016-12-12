<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-xs-8">
        <h1 class="page-head-title">ADD AMBASSADOR</h1>
      </div>
      <div class="col-xs-4 text-right" style="padding-top:15px;"> <a href="ambassadors.php">&lt; Back to Ambassador's List</a> </div>
    </div>
    <form method="post" id="addUsrFrm" action="add_user_action.php?UsrID=">
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="FName" name="FName" placeholder="First Name" value="">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="LName" name="LName" placeholder="Last Name" value="">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="firstName">Email Address</label>
            <input type="email" class="form-control" id="Email" name="Email" placeholder="Email Address" value="">
          </div>
        </div>
        <div class="col-xs-12 col-sm-3">
          <div class="form-group">
            <label for="lastName">Password</label>
            <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" value="">
          </div>
        </div>
        <div class="col-xs-12 col-sm-3">
          <div class="form-group">
            <label for="lastName">Re-Enter Password</label>
            <input type="password" class="form-control" id="Password_Conf" name="Password_Conf" placeholder="Password" value="">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="ambLoc">Location</label>
	            <select id="ambLoc" name="ambRole" class="form-control">
	                <option class="placeholder" value="0">Select a Location</option>
				                <option value="1">Los Angeles</option>
	             </select>
          </div>        
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="ambRole">Role</label>
	            <select id="ambRole" name="ambRole" class="form-control">
	                <option class="placeholder" value="0">Select a Role</option>
				                <option value="1">Lead Ambassador</option>
				                <option value="2">Ambassador</option>
             </select>
          </div>
        </div>
      </div>
      <div class="row form-bottom">
        <div class="col-xs-12 col-sm-12 text-right mrg-t-15">
          <button type="button" class="btn btn-primary">Add Ambassador</button>
        </div>
      </div>
    </form>
  </div>
</div>