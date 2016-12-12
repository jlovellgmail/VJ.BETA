<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Collection.class.php';
include_once($rootpath."/classes/LineList.class.php");

$Name = '';
$Url = '';
$CLID = '';

$CID = '';
if (isset($_GET['CID']) && $_GET['CID'] != '') {
	 $CID = $_GET['CID'];
    $collection = new Collection();
    $collection->initialize($CID);

    $Name = $collection->getVar("Name");
    $Url = $collection->getVar("Url");
    $CLID = $collection->getVar("LID");
}

$Lines = new LineList();
$lines = $Lines->getLines();
?>

<?php include 'nav/robs-admin-nav.php'; ?>
<div class='widthWrapper admin-content-wrapper'>
	<div class='xs-twelve md-ten lg-nine xl-six xxl-four'>
	<?php if (!isset($CID) || $CID == '') { ?>
	    <h1 class='caps marBottom10 size5'>Add Collection</h1>
	<?php } else { ?>
	    <h1 class='caps marBottom10 size5'>Edit Collection</h1>
	<?php } ?>
	<form class="form generalForm" method="post" id="addCollectionFrm" action="add_collection_action.php?CID=<?php echo $CID; ?>">
		    <div class="sm-twelve">
		      <div class="form-group">
		        <label for="collectionLandingLink">Select Line for this Collection</label>
		        <div class="select">
		            <select id="LID" name="LID" class="form-control">
		                <option class="placeholder" value="0">Select a Line</option>
						<?php
			            //if ($dbo->getRows() > 0) {
			                foreach ($lines as $line) {
			                    $LID = $line->getVar("LID");
			                    $LName = $line->getVar("Name");
			                    ?>  
					                <option <?php if ($CLID == $LID) { ?> selected <?php } ?> value="<?php echo $LID; ?>"><?php echo $LName; ?></option>
					<?php 	}
						//} ?>
		            </select>
		        </div>
		      </div>
		    </div>
		    <div class="sm-twelve">
		      <div class="form-group">
		        <label for="collectionLandingLink">Collection Name</label>
		        <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Collection Name" value="<?php echo $Name; ?>">
		      </div>
		    </div>
		    <input type="hidden" class="form-control" id="Url" name="Url" value="<?php echo $Url; ?>">
		    <!--<div class="col-xs-12">
		      <div class="form-group">
		        <label for="collectionLandingLink">Collection Landing Page Link</label>
		        <input type="text" class="form-control" id="Url" name="Url" placeholder="/incs/somepage.php" value="<?php //echo $Url; ?>">
		      </div>
		    </div>-->
		<div class="form-bottom marTop15">
		    <div class="sm-twelve text-right">
				<?php if (!isset($CID) || $CID == '') { ?>
			        <button type="button" onclick="validateAddCollection();" class="btn btn-primary">Add Collection</button>
				<?php } else { ?>
					<button type="button" onclick="delCollection('<?php echo $CID; ?>');" class="btn btn-sm btn-danger pull-left">Remove Collection</button>
	      			<button type="button" onclick="validateAddCollection();" class="btn btn-primary">Update</button>
				<?php } ?>
		    </div>
		</div>
	</form>
	<?php
		if (isset($CID) && $CID != '') {
		  	  include 'incs/getCollectionTemplates.php'; 
	 	  } ?>
	</div>
</div>