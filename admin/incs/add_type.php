<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Type.class.php';

$Name = '';
$STID = '';

$TID = '';
if (isset($_GET['TID']) && $_GET['TID'] != '') {
	 $TID = $_GET['TID'];
    $type = new Type();
    $type->initialize($TID);

    $Name = $type->getVar("TypeName");
    $STID = $type->getVar("SID");
}

$query = "{call F_GetStyles}";
$dbo->doQuery($query);
$styles = $dbo->loadObjectList();
?>

<?php include 'nav/robs-admin-nav.php'; ?>
<div class='widthWrapper admin-content-wrapper'>
    <div class='xs-twelve md-eight lg-six xl-four xxl-three'>
		<div class="contentAdminTitleRow">
			<div class="sm-twelve md-eight lg-eight">
				<?php if (!isset($TID) || $TID == '') { ?>
	                  <h1 class='caps marBottom10 size5'>Add Type</h1>
				<?php } else { ?>
	                  <h1 class='caps marBottom10 size5'>Edit Type</h1>
				<?php } ?>
			</div>
		</div>
		<form class="form generalForm" method="post" id="addTypeFrm" action="add_type_action.php?TID=<?php echo $TID; ?>">
			    <div class="sm-twelve">
			      <div class="form-group">
			        <label for="collectionLandingLink">Select Style for this Type</label>
			        <div class="select">
			            <select id="SID" name="SID" class="form-control">
			                <option class="placeholder" value="0">Select a Style</option>
							<?php
				            //if ($dbo->getRows() > 0) {
				                foreach ($styles as $style) {
				                    $SID = $style["SID"];
				                    $SName = $style["Name"];
				                    ?>  
						                <option <?php if ($STID == $SID) { ?> selected <?php } ?> value="<?php echo $SID; ?>"><?php echo $SName; ?></option>
						<?php 	}
							//} ?>
			            </select>
			        </div>
			      </div>
			    </div>
			    <div class="sm-twelve">
			      <div class="form-group">
			        <label for="collectionLandingLink">Type Name</label>
			        <input type="text" class="form-control" id="TypeName" name="TypeName" placeholder="Enter Type Name" value="<?php echo $Name; ?>">
			      </div>
			    </div>
			<div class="form-bottom marBottom30">
			    <div class="rel xs-twelve text-right">
					<?php if (!isset($TID) || $TID == '') { ?>
				        <button type="button" onclick="validateAddType();" class="admin-add-button">Add Type</button>
					<?php } else { ?>
	                        <div class='xs-six textLeft'>
						<a onclick="delType('<?php echo $TID; ?>');" style='color:#fe5252; text-decoration: underline; line-height: 40px;'>Remove Type</a>
	                        </div><div class='xs-six textRight'>
		      			<button type="button" onclick="validateAddType();" class="admin-add-button">Update</button>
	                        </div>
					<?php } ?>
			    </div>
			</div>
		</form>
	</div>
</div>