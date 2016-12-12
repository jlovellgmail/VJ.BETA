<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-xs-8">
        <h1 class="page-head-title">EDIT AMBASSADOR</h1>
      </div>
      <div class="col-xs-4 text-right" style="padding-top:15px;"> <a href="ambassadors.php">&lt; Back to Ambassador's List</a> </div>
    </div>
    <form method="post" id="addUsrFrm" action="add_user_action.php?UsrID=">
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="FName" name="FName" placeholder="First Name" value="Virgil James">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="LName" name="LName" placeholder="Last Name" value="Los Angeles">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="firstName">Email Address</label>
            <input type="email" class="form-control" id="Email" name="Email" placeholder="Email Address" value="virgiljames@virgiljames.com">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="lastName">Password</label>
            <p class="mrg-t-5"><a href="javascript:void(0)" data-toggle="modal" data-target="#updatePwModal">update password</a></p>
          </div>
        </div>
      </div>
      <div class="row">  
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="ambLoc">Location</label>
	            <select id="ambLoc" name="ambRole" class="form-control">
	                <option class="placeholder" value="0">Select a Location</option>
				                <option value="1" selected>Los Angeles</option>
	             </select>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="ambRole">Role</label>
	            <select id="ambRole" name="ambRole" class="form-control">
	                <option class="placeholder" value="0">Select a Role</option>
				                <option value="1" selected>Lead Ambassador</option>
				                <option value="2">Ambassador</option>
             </select>
          </div>
        </div>
      </div>
      <div class="row form-bottom">
        <div class="col-xs-12 col-sm-12 text-right mrg-t-15 mrg-b-30">
          <button type="button" onclick=" " class="btn btn-sm btn-danger pull-left">Remove Ambassador</button>
          <button type="button" class="btn btn-primary">Update Ambassador Info</button>
        </div>
      </div>
      <div class="row form-bottom mrg-t-30">
        <div class="col-xs-12 text-center mrg-t-15">
          <button type="button" class="btn btn-primary mrg-r-30">View Ambassador Page</button>
          <button type="button" class="btn btn-primary mrg-l-30">Edit Ambassador Page</button>
        </div>
      </div>
    </form>
  </div>
</div>



<div class="modal fade" id="updatePwModal" tabindex="-1" role="dialog" aria-labelledby="updatePwModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="updatePwModal">Update Passowrd</h4>
      </div>
         <form>
      <div class="modal-body">
           <div class="form-group">
             <label for="exampleInputPassword1">New Password</label>
             <input type="password" class="form-control" id="updatePw1" placeholder="Password">
           </div>
           <div class="form-group">
             <label for="exampleInputPassword1">Confirm New Password</label>
             <input type="password" class="form-control" id="updatePw2" placeholder="Confirm Password">
           </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
         </form>
    </div>
  </div>
</div>