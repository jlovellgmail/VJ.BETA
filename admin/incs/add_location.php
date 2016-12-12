<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/AmbassadorLocation.class.php';

$Name = '';

$LocID = '';
if (isset($_GET['LocID']) && $_GET['LocID'] != '') {
  $LocID = $_GET['LocID'];
  $Location = new AmbassadorLocation();
  $Location->initialize($LocID);

  $Name = $Location->getVar("Location");
}
?>

<?php include 'nav/robs-admin-nav.php'; ?>

<div class='widthWrapper admin-content-wrapper'>
  
  <div class='xs-twelve sm-ten md-seven lg-five xl-four xxl-three'>
    <div class="sm-twelve md-eight lg-eight">
      <?php if (!isset($LocID) || $LocID == '') { ?>
      <h1 class='caps marBottom10 size5'>Add Location</h1>
      <?php } else { ?>
      <h1 class='caps marBottom10 size5'>Edit Location</h1>
      <?php } ?>
    </div>

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

    <form class="generalForm" method="post" id="LocationFrm" action="add_location_action.php?LocID=<?php echo $LocID; ?>">
      <div class="xs-twelve">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Location" name="Location" id="Location" value="<?php echo $Name; ?>">
        </div>
      </div>
      <div class='xs-twelve textRight marBottom30'>
        <?php if (isset($LocID) && $LocID != '') { ?>
          <!--<button type="button" onclick="delLocation('<?php //echo $LocID; ?>');" class="btn btn-sm btn-danger pull-left">[ - ] Remove Location</button>-->
        <?php } ?>
      </div>
      <div class='row'>
          <!-- <a href='/admin/ambassador_locations.php' type="button" class='admin-add-button'>Cancel</a> -->
          <?php if (isset($LocID) && $LocID != '') { ?>
          <div class='xs-six textLeft'>
            <a href="#" onclick="delLocation('<?php echo $LocID; ?>');" style='color:#fe5252; text-decoration: underline; line-height: 40px;'>Remove</a>
          </div><div class='xs-six textRight'>
            <button type="button" onclick="validateAddLocation();" class='admin-add-button'>Update</button>
          </div>
          <?php }else{ ?>
          <div class='xs-twelve textRight'>
          <button type="button" onclick="validateAddLocation();" class='admin-add-button'>Add Location</button>
          </div>
          <?php } ?>
      </div>
    </form>

  </div>
</div>
