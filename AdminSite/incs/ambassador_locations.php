<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once('/incs/conn.php');

unset($_SESSION["er"]);
$query = "{call F_GetAllLocations}";
$dbo->doQuery($query);
$locations = $dbo->loadObjectList();
?>

<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-xs-8">
        <h1 class="page-head-title">LOCATIONS</h1>
      </div>
      <div class="col-xs-4 text-right"> <a class="btn btn-primary" href="add_location.php">+ Add a Location</a> </div>
    </div>
    <div class="table-responsive">
      <table id="UsrsTbl" class="table table-bordered table-striped">
        <tbody>
			<?php
            if ($dbo->getRows() > 0) {
                $count = 0;
                foreach ($locations as $location) {
                    $LocID = $location["LocID"];
                    $location = $location["Location"];
                    ?>        				
			          <tr>
			            <td><a href="/add_location.php?LocID=<?php echo $LocID; ?>"><?php echo $location; ?></a></td>
			          </tr>		  
		  	<?php
                    $count++;
                }
                if ($count == 0) {
                    echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Locations.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Locations.</td></tr>";
            }
            ?> 
        </tbody>
      </table>
    </div>
  </div>
</div>