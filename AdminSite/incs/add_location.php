<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once('/incs/conn.php');
include '/classes/AmbassadorLocation.class.php';

$Name = '';

$LocID = $_GET['LocID'];
if (isset($LocID) || !$LocID == '') {
    $Location = new AmbassadorLocation();
    $Location->initialize($LocID);

    $Name = $Location->getVar("Location");
}
?>


<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-xs-8">
	  	<?php if (!isset($LocID) || $LocID == '') { ?>
	        <h1 class="page-head-title">ADD AMBASSADOR LOCATION</h1>
		<?php } else { ?>
			<h1 class="page-head-title">EDIT AMBASSADOR LOCATION</h1>
		<?php } ?>
		
		<?php
        if (isset($_SESSION["er"]) && $_SESSION["er"] != "") {
            switch ($_SESSION["er"]) {
                case "e":
                    echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          Please enter a Location name.
                        </div>";
                    break;
                case "ex":
                    echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          The Location entered already exists.
                        </div>";
                    break;
            }
        }
        ?>
      </div>
<div class="col-xs-4 text-right" style="padding-top:15px;">
        <a href="ambassador_locations.php">&lt; Back to Ambassador Locations</a>
    </div>    </div>
    <form method="post" id="LocationFrm" action="add_location_action.php?LocID=<?php echo $LocID; ?>">
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="firstName">Location</label>
            <input type="text" class="form-control" placeholder="Location" name="Location" id="Location" value="<?php echo $Name; ?>">
          </div>
        </div>
      </div>
      <div class="row form-bottom">
        <div class="col-xs-12 col-sm-12 text-right mrg-t-15">
			<?php if (isset($LocID) || $LocID != '') { ?>
				<button type="button" onclick="delLocation('<?php echo $LocID; ?>');" class="btn btn-sm btn-danger pull-left">Remove Location</button>
			<?php } ?>
	            <button type="button" onclick="validateAddLocation();" class="btn btn-primary">Add Location</button>
        </div>
      </div>
    </form>
  </div>
</div>