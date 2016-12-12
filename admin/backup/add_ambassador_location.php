<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-xs-8">
        <h1 class="page-head-title">ADD AMBASSADOR LOCATION</h1>
      </div>
<div class="col-xs-4 text-right" style="padding-top:15px;">
        <a href="ambassador_locations.php">&lt; Back to Ambassador Locations</a>
    </div>    </div>
    <form method="post" id="addUsrFrm" action="add_user_action.php?UsrID=">
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="firstName">Location</label>
            <input type="text" class="form-control" placeholder="Location" value="">
          </div>
        </div>
      </div>
      <div class="row form-bottom">
        <div class="col-xs-12 col-sm-12 text-right mrg-t-15">
          <button type="button" onclick="validateAddUser();" class="btn btn-primary">Add Location</button>
        </div>
      </div>
    </form>
  </div>
</div>